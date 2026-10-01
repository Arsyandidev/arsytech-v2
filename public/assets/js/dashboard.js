(function () {
  'use strict';

  var csrf = document.querySelector('meta[name="csrf-token"]').content;

  function toast(message, isError) {
    var wrap = document.getElementById('toasts');
    var el = document.createElement('div');
    el.className = 'toast-x' + (isError ? ' err' : '');
    el.setAttribute('role', isError ? 'alert' : 'status');
    el.innerHTML = '<i class="bi ' + (isError ? 'bi-exclamation-circle-fill' : 'bi-check-circle-fill') + '"></i><div></div>';
    el.lastChild.textContent = message;
    wrap.appendChild(el);
    autoHide(el);
  }

  function autoHide(el) {
    setTimeout(function () {
      el.style.transition = 'opacity .3s';
      el.style.opacity = '0';
      setTimeout(function () { el.remove(); }, 300);
    }, 4500);
  }

  document.querySelectorAll('#toasts .toast-x').forEach(autoHide);

  function request(method, url, body) {
    var isForm = body instanceof FormData;
    return fetch(url, {
      method: method,
      headers: Object.assign({ 'X-CSRF-TOKEN': csrf, 'Accept': 'application/json' }, isForm || !body ? {} : { 'Content-Type': 'application/json' }),
      body: isForm ? body : (body ? JSON.stringify(body) : undefined)
    }).then(function (res) {
      return res.json().catch(function () { return {}; }).then(function (data) {
        if (!res.ok) throw new Error(firstError(data) || 'Terjadi kesalahan. Coba lagi.');
        return data;
      });
    });
  }

  function firstError(data) {
    if (data && data.errors) {
      var key = Object.keys(data.errors)[0];
      return data.errors[key][0];
    }
    return data && data.message;
  }

  var body = document.body;
  document.querySelectorAll('[data-side-toggle]').forEach(function (btn) {
    btn.addEventListener('click', function () { body.classList.toggle('side-open'); });
  });
  document.querySelectorAll('[data-side-close]').forEach(function (el) {
    el.addEventListener('click', function () { body.classList.remove('side-open'); });
  });

  var modalEl = document.getElementById('confirmModal');
  var modal = modalEl ? bootstrap.Modal.getOrCreateInstance(modalEl) : null;
  var pending = null;

  function confirmAction(text, onOk) {
    if (!modal) { if (window.confirm(text)) onOk(); return; }
    modalEl.querySelector('[data-confirm-text]').textContent = text;
    pending = onOk;
    modal.show();
  }

  if (modalEl) {
    modalEl.querySelector('[data-confirm-ok]').addEventListener('click', function () {
      modal.hide();
      if (pending) pending();
      pending = null;
    });
  }

  document.querySelectorAll('form[data-confirm]').forEach(function (form) {
    form.addEventListener('submit', function (ev) {
      if (form.dataset.confirmed) return;
      ev.preventDefault();
      confirmAction(form.dataset.confirm, function () {
        form.dataset.confirmed = '1';
        form.submit();
      });
    });
  });

  document.querySelectorAll('[data-delete-form]').forEach(function (btn) {
    btn.addEventListener('click', function () {
      var form = document.querySelector(btn.dataset.deleteForm);
      form.requestSubmit ? form.requestSubmit() : form.dispatchEvent(new Event('submit', { cancelable: true }));
    });
  });

  function slugify(text) {
    return text.toString().normalize('NFKD').replace(/[̀-ͯ]/g, '').toLowerCase()
      .replace(/[^a-z0-9\s-]/g, '').trim().replace(/[\s-]+/g, '-').slice(0, 200);
  }

  document.querySelectorAll('[data-slug-source]').forEach(function (source) {
    var target = document.querySelector(source.dataset.slugSource);
    if (!target) return;
    var touched = !!target.dataset.slugLocked || target.value !== '';
    target.addEventListener('input', function () { touched = target.value !== ''; });
    target.addEventListener('blur', function () { target.value = slugify(target.value); });
    source.addEventListener('input', function () {
      if (!touched) target.value = slugify(source.value);
    });
  });

  document.querySelectorAll('input[name="status"]').forEach(function (radio) {
    function sync() {
      var checked = document.querySelector('input[name="status"]:checked');
      document.querySelectorAll('[data-show-when]').forEach(function (el) {
        el.hidden = !checked || el.dataset.showWhen !== checked.value;
      });
    }
    radio.addEventListener('change', sync);
    sync();
  });

  function resizeImage(file, max) {
    return new Promise(function (resolve) {
      if (!/^image\/(jpeg|png|webp)$/.test(file.type)) return resolve(file);
      var url = URL.createObjectURL(file);
      var img = new Image();
      img.onload = function () {
        URL.revokeObjectURL(url);
        var ratio = Math.min(1, max / Math.max(img.naturalWidth, img.naturalHeight));
        if (ratio === 1 && file.size < 1.5 * 1024 * 1024) return resolve(file);
        var canvas = document.createElement('canvas');
        canvas.width = Math.round(img.naturalWidth * ratio);
        canvas.height = Math.round(img.naturalHeight * ratio);
        var ctx = canvas.getContext('2d');
        ctx.fillStyle = '#fff';
        ctx.fillRect(0, 0, canvas.width, canvas.height);
        ctx.drawImage(img, 0, 0, canvas.width, canvas.height);
        canvas.toBlob(function (blob) {
          if (!blob) return resolve(file);
          var name = file.name.replace(/\.[^.]+$/, '') + '.jpg';
          resolve(new File([blob], name, { type: 'image/jpeg', lastModified: Date.now() }));
        }, 'image/jpeg', 0.88);
      };
      img.onerror = function () { URL.revokeObjectURL(url); resolve(file); };
      img.src = url;
    });
  }

  document.querySelectorAll('input[type="file"][data-resize]').forEach(function (input) {
    var drop = input.closest('[data-cover-drop]');
    var preview = drop && drop.querySelector('[data-cover-preview]');
    var placeholder = drop && drop.querySelector('.ph');

    input.addEventListener('change', function () {
      var file = input.files[0];
      if (!file) return;
      if (preview) {
        preview.src = URL.createObjectURL(file);
        preview.hidden = false;
        if (placeholder) placeholder.hidden = true;
      }
      var remove = document.getElementById('remove_cover');
      if (remove) remove.checked = false;
      if (input.dataset.resized === file.name) return;
      resizeImage(file, parseInt(input.dataset.resize, 10)).then(function (resized) {
        if (resized === file || typeof DataTransfer === 'undefined') return;
        var dt = new DataTransfer();
        dt.items.add(resized);
        input.dataset.resized = resized.name;
        input.files = dt.files;
      });
    });

    if (drop) {
      ['dragenter', 'dragover'].forEach(function (type) {
        drop.addEventListener(type, function () { drop.classList.add('drag'); });
      });
      ['dragleave', 'drop'].forEach(function (type) {
        drop.addEventListener(type, function () { drop.classList.remove('drag'); });
      });
    }
  });

  var editorEl = document.querySelector('[data-editor]');
  if (editorEl && window.tinymce) {
    var uploadUrl = editorEl.dataset.uploadUrl;
    tinymce.init({
      target: editorEl,
      license_key: 'gpl',
      language: 'id',
      language_url: 'https://cdn.jsdelivr.net/npm/tinymce-i18n@24.12.9/langs7/id.js',
      menubar: false,
      branding: false,
      promotion: false,
      min_height: 480,
      max_height: 900,
      plugins: 'autoresize lists advlist link image table wordcount searchreplace code fullscreen',
      toolbar: [
        'undo redo | blocks fontsize | bold italic underline strikethrough | alignleft aligncenter alignright alignjustify',
        'bullist numlist outdent indent | blockquote hr | link image table | removeformat | searchreplace code fullscreen'
      ],
      toolbar_mode: 'wrap',
      block_formats: 'Paragraf=p; Subjudul=h2; Subjudul kecil=h3; Subjudul lebih kecil=h4; Kode=pre',
      font_size_formats: '12px 14px 16px 18px 20px 24px 28px 32px',
      content_css: editorEl.dataset.contentCss,
      convert_urls: false,
      link_default_target: '_blank',
      link_assume_external_targets: 'https',
      image_caption: false,
      image_dimensions: false,
      automatic_uploads: true,
      paste_data_images: true,
      images_file_types: 'jpeg,jpg,png,webp,gif',
      images_upload_handler: function (blobInfo) {
        var file = new File([blobInfo.blob()], blobInfo.filename(), { type: blobInfo.blob().type });
        return resizeImage(file, 1600).then(function (resized) {
          var data = new FormData();
          data.append('image', resized);
          return request('POST', uploadUrl, data);
        }).then(function (res) {
          return res.data.filePath;
        }).catch(function (err) {
          toast(err.message, true);
          throw err;
        });
      },
      setup: function (editor) {
        editor.on('change input undo redo', function () { editor.save(); });
      }
    });
  }

  var grid = document.querySelector('[data-photo-grid]');
  var dropzone = document.querySelector('[data-dropzone]');

  if (grid && dropzone) {
    var fileInput = dropzone.querySelector('input[type="file"]');
    var emptyState = document.querySelector('[data-photo-empty]');
    var countEl = document.querySelector('[data-photo-count]');
    var queue = [];
    var active = 0;

    function refreshCount() {
      var total = grid.querySelectorAll('.photo-card:not(.failed)').length;
      countEl.textContent = '(' + total + ')';
      emptyState.hidden = grid.children.length > 0;
    }

    function saveOrder() {
      var ids = Array.prototype.map.call(grid.querySelectorAll('[data-photo-id]'), function (el) {
        return parseInt(el.dataset.photoId, 10);
      });
      if (!ids.length) return;
      request('PATCH', grid.dataset.reorderUrl, { order: ids })
        .then(function (res) { toast(res.message); })
        .catch(function (err) { toast(err.message, true); });
    }

    function bindCard(card) {
      var textarea = card.querySelector('[data-caption]');
      var state = card.querySelector('[data-save-state]');
      var timer = null;
      var last = textarea.value;

      function save() {
        clearTimeout(timer);
        if (textarea.value === last) return;
        var value = textarea.value;
        state.textContent = 'Menyimpan…';
        request('PATCH', card.dataset.updateUrl, { caption: value }).then(function () {
          last = value;
          state.textContent = 'Tersimpan';
          setTimeout(function () { if (state.textContent === 'Tersimpan') state.textContent = ''; }, 2000);
        }).catch(function (err) {
          state.textContent = 'Gagal';
          toast(err.message, true);
        });
      }

      textarea.addEventListener('input', function () {
        state.textContent = '';
        clearTimeout(timer);
        timer = setTimeout(save, 900);
      });
      textarea.addEventListener('blur', save);

      card.querySelector('[data-delete-photo]').addEventListener('click', function () {
        confirmAction('Hapus foto ini dari album?', function () {
          card.style.opacity = '.4';
          request('DELETE', card.dataset.deleteUrl).then(function (res) {
            card.remove();
            refreshCount();
            toast(res.message);
          }).catch(function (err) {
            card.style.opacity = '';
            toast(err.message, true);
          });
        });
      });

      card.querySelector('[data-set-cover]').addEventListener('click', function () {
        grid.prepend(card);
        saveOrder();
      });
    }

    grid.querySelectorAll('[data-photo-id]').forEach(bindCard);

    if (window.Sortable) {
      Sortable.create(grid, {
        animation: 160,
        handle: '.handle',
        filter: '.uploading, .failed',
        ghostClass: 'sortable-ghost',
        onEnd: function (ev) { if (ev.oldIndex !== ev.newIndex) saveOrder(); }
      });
    }

    function placeholderCard(file) {
      var card = document.createElement('div');
      card.className = 'photo-card uploading';
      card.innerHTML = '<div class="thumb"><img alt=""><span class="bar"></span></div><div class="err" hidden></div>';
      card.querySelector('img').src = URL.createObjectURL(file);
      grid.appendChild(card);
      emptyState.hidden = true;
      return card;
    }

    function upload(item) {
      active++;
      resizeImage(item.file, 2400).then(function (file) {
        var data = new FormData();
        data.append('photo', file);
        var xhr = new XMLHttpRequest();
        xhr.open('POST', dropzone.dataset.uploadUrl);
        xhr.setRequestHeader('X-CSRF-TOKEN', csrf);
        xhr.setRequestHeader('Accept', 'application/json');
        xhr.upload.onprogress = function (ev) {
          if (ev.lengthComputable) item.card.querySelector('.bar').style.width = Math.round(ev.loaded / ev.total * 100) + '%';
        };
        xhr.onload = function () {
          var res = {};
          try { res = JSON.parse(xhr.responseText); } catch (e) {}
          if (xhr.status >= 200 && xhr.status < 300 && res.html) {
            var tmp = document.createElement('div');
            tmp.innerHTML = res.html.trim();
            var card = tmp.firstChild;
            item.card.replaceWith(card);
            bindCard(card);
          } else {
            fail(item, xhr.status === 413 ? 'Ukuran file melebihi batas server.' : (firstError(res) || 'Gagal mengunggah.'));
          }
          done();
        };
        xhr.onerror = function () { fail(item, 'Koneksi terputus.'); done(); };
        xhr.send(data);
      });
    }

    function fail(item, message) {
      item.card.classList.remove('uploading');
      item.card.classList.add('failed');
      var err = item.card.querySelector('.err');
      err.hidden = false;
      err.innerHTML = '<i class="bi bi-exclamation-circle me-1"></i>';
      err.appendChild(document.createTextNode(item.file.name + ': ' + message + ' '));
      var close = document.createElement('a');
      close.href = '#';
      close.textContent = 'Tutup';
      close.addEventListener('click', function (ev) { ev.preventDefault(); item.card.remove(); refreshCount(); });
      err.appendChild(close);
    }

    function done() {
      active--;
      refreshCount();
      next();
      if (!active && !queue.length) toast('Unggahan selesai.');
    }

    function next() {
      while (active < 2 && queue.length) upload(queue.shift());
    }

    function addFiles(files) {
      Array.prototype.forEach.call(files, function (file) {
        if (!/^image\//.test(file.type)) return;
        queue.push({ file: file, card: placeholderCard(file) });
      });
      next();
    }

    fileInput.addEventListener('change', function () {
      addFiles(fileInput.files);
      fileInput.value = '';
    });

    ['dragenter', 'dragover'].forEach(function (type) {
      dropzone.addEventListener(type, function () { dropzone.classList.add('drag'); });
    });
    ['dragleave', 'drop'].forEach(function (type) {
      dropzone.addEventListener(type, function () { dropzone.classList.remove('drag'); });
    });
  }
})();

(function () {
  'use strict';

  var data = window.dashboardCharts;
  if (!data || !window.Chart) return;

  var brand = '#A90E14';
  var brandDark = '#7E0A0F';
  var brandTint = '#EDC3C5';
  var ink = '#111519';
  var muted = '#6B7683';
  var grid = '#F0F2F5';
  var nf = new Intl.NumberFormat('id-ID');

  Chart.defaults.font.family = "'Plus Jakarta Sans', system-ui, sans-serif";
  Chart.defaults.font.size = 12;
  Chart.defaults.color = muted;

  var tooltip = {
    backgroundColor: ink,
    padding: 12,
    cornerRadius: 10,
    titleFont: { weight: '700', size: 12 },
    bodyFont: { size: 12 },
    displayColors: false
  };

  var metrics = {
    visitors: { label: 'Pengunjung', title: 'Pengunjung' },
    pageviews: { label: 'Tayangan', title: 'Tayangan halaman' },
    readers: { label: 'Pembaca blog', title: 'Pembaca blog' },
    conversions: { label: 'Konsultasi', title: 'Konsultasi terkirim' }
  };
  var unit = data.monthly ? 'bulan' : 'hari';
  var current = 'visitors';

  var trendEl = document.getElementById('trendChart');
  if (trendEl) {
    var trend = new Chart(trendEl, {
      type: 'bar',
      data: {
        labels: data.trend.map(function (row) { return row.label; }),
        datasets: [{
          label: metrics[current].label,
          data: data.trend.map(function (row) { return row[current]; }),
          backgroundColor: brand,
          hoverBackgroundColor: brandDark,
          borderRadius: { topLeft: 4, topRight: 4 },
          borderSkipped: 'start',
          maxBarThickness: 28,
          categoryPercentage: 0.82,
          barPercentage: 0.9
        }]
      },
      options: {
        maintainAspectRatio: false,
        interaction: { mode: 'index', intersect: false },
        plugins: {
          legend: { display: false },
          tooltip: Object.assign({}, tooltip, {
            callbacks: {
              title: function (items) { return data.trend[items[0].dataIndex].full; },
              label: function () { return null; },
              afterBody: function (items) {
                var row = data.trend[items[0].dataIndex];
                return [
                  'Pengunjung: ' + nf.format(row.visitors),
                  'Tayangan: ' + nf.format(row.pageviews),
                  'Pembaca blog: ' + nf.format(row.readers),
                  'Konsultasi: ' + nf.format(row.conversions)
                ];
              }
            }
          })
        },
        scales: {
          x: { grid: { display: false }, border: { display: false }, ticks: { maxRotation: 0, autoSkipPadding: 14 } },
          y: { beginAtZero: true, grid: { color: grid }, border: { display: false }, ticks: { precision: 0, callback: function (v) { return nf.format(v); } } }
        }
      }
    });

    var title = document.querySelector('[data-chart-title]');
    document.querySelectorAll('[data-metric]').forEach(function (btn) {
      btn.addEventListener('click', function (ev) {
        ev.preventDefault();
        current = btn.dataset.metric;
        document.querySelectorAll('[data-metric]').forEach(function (b) { b.classList.toggle('on', b === btn); });
        trend.data.datasets[0].label = metrics[current].label;
        trend.data.datasets[0].data = data.trend.map(function (row) { return row[current]; });
        trend.update();
        if (title) title.textContent = metrics[current].title + ' per ' + unit;
      });
    });
  }

  var hourEl = document.getElementById('hourChart');
  if (hourEl) {
    var totals = data.hours.map(function (row) { return row.total; });
    var peak = Math.max.apply(null, totals);
    new Chart(hourEl, {
      type: 'bar',
      data: {
        labels: data.hours.map(function (row) { return row.label.slice(0, 2); }),
        datasets: [{
          label: 'Kunjungan',
          data: totals,
          backgroundColor: totals.map(function (v) { return peak > 0 && v === peak ? brand : brandTint; }),
          hoverBackgroundColor: brandDark,
          borderRadius: { topLeft: 4, topRight: 4 },
          borderSkipped: 'start',
          categoryPercentage: 0.86,
          barPercentage: 0.9
        }]
      },
      options: {
        maintainAspectRatio: false,
        plugins: {
          legend: { display: false },
          tooltip: Object.assign({}, tooltip, {
            callbacks: {
              title: function (items) { return 'Pukul ' + data.hours[items[0].dataIndex].label + ' WIB'; },
              label: function (item) { return nf.format(item.raw) + ' kunjungan' + (item.raw === peak && peak > 0 ? ' (paling ramai)' : ''); }
            }
          })
        },
        scales: {
          x: { grid: { display: false }, border: { display: false }, ticks: { maxRotation: 0, autoSkip: false, callback: function (v, i) { return i % 3 === 0 ? this.getLabelForValue(v) : ''; } } },
          y: { beginAtZero: true, grid: { color: grid }, border: { display: false }, ticks: { precision: 0, maxTicksLimit: 4 } }
        }
      }
    });
  }
})();

(function () {
  'use strict';

  var form = document.querySelector('[data-range-picker]');
  if (!form || !window.flatpickr) return;

  var input = form.querySelector('[data-range-input]');
  var from = form.querySelector('input[name="dari"]');
  var to = form.querySelector('input[name="sampai"]');
  var maxDays = parseInt(input.dataset.maxDays, 10) || 731;
  var today = new Date(input.dataset.max + 'T00:00:00');

  function iso(date) {
    var m = String(date.getMonth() + 1).padStart(2, '0');
    var d = String(date.getDate()).padStart(2, '0');
    return date.getFullYear() + '-' + m + '-' + d;
  }

  function daysAgo(n) {
    var d = new Date(today);
    d.setDate(d.getDate() - n);
    return d;
  }

  function submit(start, end) {
    from.value = iso(start);
    to.value = iso(end);
    form.submit();
  }

  var presets = [
    { label: 'Hari ini', range: function () { return [today, today]; } },
    { label: '7 hari', range: function () { return [daysAgo(6), today]; } },
    { label: '30 hari', range: function () { return [daysAgo(29), today]; } },
    { label: '90 hari', range: function () { return [daysAgo(89), today]; } },
    { label: 'Bulan ini', range: function () { return [new Date(today.getFullYear(), today.getMonth(), 1), today]; } },
    { label: 'Bulan lalu', range: function () { return [new Date(today.getFullYear(), today.getMonth() - 1, 1), new Date(today.getFullYear(), today.getMonth(), 0)]; } },
    { label: '12 bulan', range: function () { return [new Date(today.getFullYear() - 1, today.getMonth() + 1, 1), today]; } }
  ];

  flatpickr(input, {
    mode: 'range',
    locale: Object.assign({}, flatpickr.l10ns.id, { rangeSeparator: ' – ' }),
    dateFormat: 'Y-m-d',
    altInput: true,
    altFormat: 'j M Y',
    altInputClass: 'form-control',
    defaultDate: [input.dataset.start, input.dataset.end],
    maxDate: input.dataset.max,
    showMonths: window.matchMedia('(min-width: 768px)').matches ? 2 : 1,
    position: 'auto right',
    disableMobile: true,
    onReady: function (selected, str, fp) {
      var bar = document.createElement('div');
      bar.className = 'rp-presets';
      presets.forEach(function (preset) {
        var btn = document.createElement('button');
        btn.type = 'button';
        btn.textContent = preset.label;
        btn.addEventListener('click', function () {
          var r = preset.range();
          fp.setDate(r, false);
          submit(r[0], r[1]);
        });
        bar.appendChild(btn);
      });
      var hint = document.createElement('div');
      hint.className = 'rp-hint';
      hint.textContent = 'Klik tanggal awal, lalu tanggal akhir.';
      fp.calendarContainer.appendChild(hint);
      fp.calendarContainer.appendChild(bar);
    },
    onClose: function (selected, str, fp) {
      if (selected.length === 1) selected = [selected[0], selected[0]];
      if (selected.length !== 2) return;
      var span = Math.round((selected[1] - selected[0]) / 86400000) + 1;
      if (span > maxDays) {
        selected[0] = new Date(selected[1]);
        selected[0].setDate(selected[0].getDate() - (maxDays - 1));
      }
      if (iso(selected[0]) === from.value && iso(selected[1]) === to.value) return;
      submit(selected[0], selected[1]);
    }
  });
})();
