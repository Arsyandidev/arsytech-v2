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
  if (editorEl && window.EasyMDE) {
    var uploadUrl = editorEl.dataset.uploadUrl;
    var editor = new EasyMDE({
      element: editorEl,
      spellChecker: false,
      nativeSpellcheck: true,
      autoDownloadFontAwesome: true,
      minHeight: '420px',
      placeholder: 'Mulai menulis di sini…',
      status: ['words', 'lines'],
      uploadImage: true,
      imageAccept: 'image/jpeg, image/png, image/webp, image/gif',
      imageUploadFunction: function (file, onSuccess, onError) {
        resizeImage(file, 1600).then(function (resized) {
          var data = new FormData();
          data.append('image', resized);
          return request('POST', uploadUrl, data);
        }).then(function (res) {
          onSuccess(res.data.filePath);
        }).catch(function (err) {
          onError(err.message);
          toast(err.message, true);
        });
      },
      toolbar: [
        { name: 'heading-2', action: EasyMDE.toggleHeading2, className: 'fa fa-header', title: 'Subjudul' },
        { name: 'heading-3', action: EasyMDE.toggleHeading3, className: 'fa fa-header fa-header-x fa-header-3', title: 'Subjudul kecil' },
        '|',
        { name: 'bold', action: EasyMDE.toggleBold, className: 'fa fa-bold', title: 'Tebal' },
        { name: 'italic', action: EasyMDE.toggleItalic, className: 'fa fa-italic', title: 'Miring' },
        { name: 'quote', action: EasyMDE.toggleBlockquote, className: 'fa fa-quote-left', title: 'Kutipan' },
        '|',
        { name: 'unordered-list', action: EasyMDE.toggleUnorderedList, className: 'fa fa-list-ul', title: 'Daftar berpoin' },
        { name: 'ordered-list', action: EasyMDE.toggleOrderedList, className: 'fa fa-list-ol', title: 'Daftar bernomor' },
        '|',
        { name: 'link', action: EasyMDE.drawLink, className: 'fa fa-link', title: 'Sisipkan tautan' },
        { name: 'upload-image', action: EasyMDE.drawUploadedImage, className: 'fa fa-image', title: 'Unggah gambar' },
        { name: 'table', action: EasyMDE.drawTable, className: 'fa fa-table', title: 'Sisipkan tabel' },
        { name: 'horizontal-rule', action: EasyMDE.drawHorizontalRule, className: 'fa fa-minus', title: 'Garis pemisah' },
        '|',
        { name: 'preview', action: EasyMDE.togglePreview, className: 'fa fa-eye no-disable', title: 'Pratinjau' },
        { name: 'side-by-side', action: EasyMDE.toggleSideBySide, className: 'fa fa-columns no-disable no-mobile', title: 'Tulis & pratinjau berdampingan' },
        { name: 'fullscreen', action: EasyMDE.toggleFullScreen, className: 'fa fa-arrows-alt no-disable no-mobile', title: 'Layar penuh' },
        '|',
        { name: 'guide', action: 'https://www.markdownguide.org/basic-syntax/', className: 'fa fa-question-circle', title: 'Panduan format' }
      ],
      imageTexts: {
        sbInit: 'Seret gambar ke sini atau tempel dari clipboard.',
        sbOnDragEnter: 'Lepaskan untuk mengunggah gambar.',
        sbOnDrop: 'Mengunggah #images_names#…',
        sbProgress: 'Mengunggah #file_name#: #progress#%',
        sbOnUploaded: 'Selesai mengunggah #image_name#',
        sizeUnits: ' B, KB, MB'
      },
      errorMessages: {
        noFileGiven: 'Pilih file gambar dulu.',
        typeNotAllowed: 'Format gambar tidak didukung.',
        fileTooLarge: 'Ukuran gambar terlalu besar.',
        importError: 'Gambar gagal diunggah.'
      }
    });
    editorEl.form.addEventListener('submit', function () { editorEl.value = editor.value(); });
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
