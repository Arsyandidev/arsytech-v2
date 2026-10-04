(function () {
  'use strict';
  var reduced = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

  var nav = document.getElementById('siteNav');
  var toTop = document.getElementById('toTop');
  function onScroll() {
    var y = window.scrollY;
    if (nav) nav.classList.toggle('is-stuck', y > 8);
    if (toTop) toTop.classList.toggle('on', y > 600);
  }
  window.addEventListener('scroll', onScroll, { passive: true });
  onScroll();

  var collapseEl = document.getElementById('mainNav');
  if (collapseEl) {
    collapseEl.querySelectorAll('a.nav-link:not(.dropdown-toggle), a.dropdown-item').forEach(function (a) {
      a.addEventListener('click', function () {
        if (collapseEl.classList.contains('show')) {
          bootstrap.Collapse.getOrCreateInstance(collapseEl).hide();
        }
      });
    });
  }

  var revealables = document.querySelectorAll('.rv');
  if (reduced || !('IntersectionObserver' in window)) {
    revealables.forEach(function (el) { el.classList.add('in'); });
  } else {
    var io = new IntersectionObserver(function (entries) {
      entries.forEach(function (e) {
        if (!e.isIntersecting) return;
        e.target.classList.add('in');
        io.unobserve(e.target);
      });
    }, { threshold: 0, rootMargin: '0px 0px -60px 0px' });
    revealables.forEach(function (el) { io.observe(el); });
  }

  function runCounter(el) {
    var target = parseInt(el.dataset.count, 10);
    var suffix = el.dataset.suffix || '';
    if (reduced) { el.textContent = target + suffix; return; }
    var t0 = null, dur = 900;
    function tick(t) {
      if (!t0) t0 = t;
      var p = Math.min((t - t0) / dur, 1);
      el.textContent = Math.round(target * (1 - Math.pow(1 - p, 3))) + suffix;
      if (p < 1) requestAnimationFrame(tick);
    }
    requestAnimationFrame(tick);
  }
  var counters = document.querySelectorAll('[data-count]');
  if ('IntersectionObserver' in window) {
    var ioC = new IntersectionObserver(function (entries) {
      entries.forEach(function (e) {
        if (!e.isIntersecting) return;
        runCounter(e.target);
        ioC.unobserve(e.target);
      });
    }, { threshold: 0.6 });
    counters.forEach(function (el) { ioC.observe(el); });
  } else {
    counters.forEach(runCounter);
  }

  function beacon(url, data) {
    var body = new URLSearchParams(data);
    try {
      if (navigator.sendBeacon && navigator.sendBeacon(url, body)) return;
    } catch (e) {}
    if (window.fetch) fetch(url, { method: 'POST', body: body, keepalive: true, credentials: 'same-origin' }).catch(function () {});
  }

  var trackBase = window.location.origin + '/t/';

  function ping() {
    setTimeout(function () { beacon(trackBase + 'ping', { path: window.location.pathname }); }, 1200);
  }

  if (document.readyState === 'complete') ping();
  else window.addEventListener('load', ping);

  document.addEventListener('click', function (ev) {
    var link = ev.target.closest ? ev.target.closest('a[href]') : null;
    if (!link) return;
    var href = link.getAttribute('href') || '';
    var type = null;
    if (/wa\.me\/|api\.whatsapp\.com|^whatsapp:/i.test(href)) type = 'whatsapp';
    else if (link.dataset.track === 'konsultasi' || (link.hostname === window.location.hostname && /^\/kontak\/?$/.test(link.pathname))) type = 'konsultasi';
    if (!type) return;
    var label = link.dataset.trackLabel || (link.textContent || '').replace(/\s+/g, ' ').trim() || link.getAttribute('aria-label') || '';
    beacon(trackBase + 'event', { type: type, label: label.slice(0, 110), path: window.location.pathname });
  }, true);

  document.querySelectorAll('form.needs-validation').forEach(function (form) {
    form.addEventListener('submit', function (ev) {
      form.classList.add('was-validated');
      if (!form.checkValidity()) {
        ev.preventDefault();
        ev.stopPropagation();
        var first = form.querySelector(':invalid');
        if (first) {
          first.focus({ preventScroll: true });
          first.scrollIntoView({ block: 'center', behavior: reduced ? 'auto' : 'smooth' });
        }
        return;
      }
      var btn = form.querySelector('[data-loading]');
      if (btn) {
        btn.classList.add('is-loading');
        btn.innerHTML = btn.dataset.loading;
      }
    }, false);
  });
})();
