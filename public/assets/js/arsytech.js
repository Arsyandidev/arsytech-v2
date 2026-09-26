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
    }, { threshold: 0.12, rootMargin: '0px 0px -40px 0px' });
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

  document.querySelectorAll('form.needs-validation').forEach(function (form) {
    form.addEventListener('submit', function (ev) {
      if (!form.checkValidity()) {
        ev.preventDefault();
        ev.stopPropagation();
        var first = form.querySelector(':invalid');
        if (first) {
          first.focus({ preventScroll: true });
          first.scrollIntoView({ block: 'center', behavior: reduced ? 'auto' : 'smooth' });
        }
      }
      form.classList.add('was-validated');
    }, false);
  });
})();
