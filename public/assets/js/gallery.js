(function () {
  'use strict';

  var modalEl = document.getElementById('lightbox');
  if (!modalEl) return;

  var carouselEl = document.getElementById('lbCarousel');
  var modal = bootstrap.Modal.getOrCreateInstance(modalEl);
  var carousel = bootstrap.Carousel.getOrCreateInstance(carouselEl, { interval: false, ride: false, touch: true, keyboard: false, wrap: true });
  var items = carouselEl.querySelectorAll('.carousel-item');
  var counter = modalEl.querySelector('[data-lb-count]');
  var thumbs = modalEl.querySelectorAll('[data-lb-thumbs] button');
  var total = items.length;

  function load(index) {
    [index - 1, index, index + 1].forEach(function (i) {
      var item = items[(i + total) % total];
      var img = item && item.querySelector('img[data-src]');
      var video = item && item.querySelector('video[data-src]');
      if (img) {
        img.src = img.dataset.src;
        img.removeAttribute('data-src');
      }
      if (video) {
        video.src = video.dataset.src;
        video.removeAttribute('data-src');
        video.load();
      }
    });
  }

  function sync(index) {
    load(index);
    counter.textContent = (index + 1) + ' / ' + total;
    thumbs.forEach(function (btn, i) {
      btn.classList.toggle('active', i === index);
      if (i === index) btn.scrollIntoView({ block: 'nearest', inline: 'center', behavior: 'smooth' });
    });
  }

  carouselEl.addEventListener('slide.bs.carousel', function (ev) {
    items.forEach(function (item, index) {
      var video = item.querySelector('video');
      if (video && index !== ev.to) video.pause();
    });
    sync(ev.to);
  });

  modalEl.addEventListener('hidden.bs.modal', function () {
    items.forEach(function (item) {
      var video = item.querySelector('video');
      if (video) video.pause();
    });
  });

  document.querySelectorAll('[data-lightbox]').forEach(function (trigger) {
    trigger.addEventListener('click', function () {
      var index = parseInt(trigger.dataset.lightbox, 10);
      carouselEl.classList.remove('slide');
      carousel.to(index);
      sync(index);
      modal.show();
      setTimeout(function () { carouselEl.classList.add('slide'); }, 50);
    });
  });

  modalEl.addEventListener('keydown', function (ev) {
    if (ev.key === 'ArrowLeft') carousel.prev();
    if (ev.key === 'ArrowRight') carousel.next();
  });
})();
