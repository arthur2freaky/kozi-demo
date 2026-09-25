/* =========================================================
   KOZI Coffee Bekasi — Front-end interactivity
   ========================================================= */
document.addEventListener('DOMContentLoaded', function () {

  /* ---------- Navbar scroll shadow ---------- */
  var navbar = document.querySelector('.navbar');
  var scrollTopBtn = document.querySelector('.scroll-top');

  function onScroll() {
    var y = window.scrollY || window.pageYOffset;
    if (navbar) navbar.classList.toggle('scrolled', y > 10);
    if (scrollTopBtn) scrollTopBtn.classList.toggle('show', y > 500);
  }
  document.addEventListener('scroll', onScroll, { passive: true });
  onScroll();

  if (scrollTopBtn) {
    scrollTopBtn.addEventListener('click', function () {
      window.scrollTo({ top: 0, behavior: 'smooth' });
    });
  }

  /* ---------- Mobile nav toggle ---------- */
  var navToggle = document.querySelector('.nav-toggle');
  var navLinks = document.querySelector('.nav-links');
  if (navToggle && navLinks) {
    navToggle.addEventListener('click', function () {
      navLinks.classList.toggle('open');
    });
    navLinks.querySelectorAll('a').forEach(function (a) {
      a.addEventListener('click', function () { navLinks.classList.remove('open'); });
    });
  }

  /* ---------- Homepage highlight tabs (filters .dish-card by data-group) ---------- */
  var tabBtns = document.querySelectorAll('.tab-btn');
  var dishCards = document.querySelectorAll('.dish-card');
  if (tabBtns.length) {
    tabBtns.forEach(function (btn) {
      btn.addEventListener('click', function () {
        tabBtns.forEach(function (b) { b.classList.remove('active'); });
        btn.classList.add('active');
        var filter = btn.getAttribute('data-filter');
        dishCards.forEach(function (card) {
          var match = filter === 'all' || card.getAttribute('data-category') === filter;
          card.style.display = match ? '' : 'none';
        });
      });
    });
  }

  /* ---------- Full menu page: search + group toggle + category chips ---------- */
  var searchInput = document.getElementById('menuSearch');
  var groupBtns = document.querySelectorAll('.group-toggle button');
  var catChips = document.querySelectorAll('.cat-chip');
  var categoryBlocks = document.querySelectorAll('.menu-category');
  var menuItems = document.querySelectorAll('.menu-item');
  var noResults = document.querySelector('.no-results');

  function currentGroup() {
    var active = document.querySelector('.group-toggle button.active');
    return active ? active.getAttribute('data-group') : 'all';
  }

  function applyFilters() {
    var term = (searchInput ? searchInput.value : '').trim().toLowerCase();
    var group = currentGroup();
    var visibleCategoryCount = 0;

    categoryBlocks.forEach(function (block) {
      var blockGroup = block.getAttribute('data-group');
      var groupMatches = group === 'all' || group === blockGroup;
      var anyItemVisible = false;

      block.querySelectorAll('.menu-item').forEach(function (item) {
        var name = item.getAttribute('data-name') || '';
        var textMatches = term === '' || name.indexOf(term) !== -1;
        var show = groupMatches && textMatches;
        item.style.display = show ? '' : 'none';
        if (show) anyItemVisible = true;
      });

      block.style.display = anyItemVisible ? '' : 'none';
      if (anyItemVisible) visibleCategoryCount++;
    });

    if (noResults) noResults.classList.toggle('show', visibleCategoryCount === 0);
  }

  if (searchInput) {
    searchInput.addEventListener('input', applyFilters);
  }

  if (groupBtns.length) {
    groupBtns.forEach(function (btn) {
      btn.addEventListener('click', function () {
        groupBtns.forEach(function (b) { b.classList.remove('active'); });
        btn.classList.add('active');

        var group = btn.getAttribute('data-group');
        catChips.forEach(function (chip) {
          var chipGroup = chip.getAttribute('data-group');
          chip.style.display = (group === 'all' || group === chipGroup) ? '' : 'none';
        });
        applyFilters();
      });
    });
  }

  if (catChips.length) {
    catChips.forEach(function (chip) {
      chip.addEventListener('click', function () {
        catChips.forEach(function (c) { c.classList.remove('active'); });
        chip.classList.add('active');
        var target = document.getElementById(chip.getAttribute('data-target'));
        if (target) {
          var offset = 180;
          var top = target.getBoundingClientRect().top + window.pageYOffset - offset;
          window.scrollTo({ top: top, behavior: 'smooth' });
        }
      });
    });
  }

  if (menuItems.length) applyFilters();

  /* ---------- Gallery lightbox (simple) ---------- */
  var lightbox = document.getElementById('lightbox');
  var lightboxImg = document.getElementById('lightboxImg');
  document.querySelectorAll('[data-lightbox]').forEach(function (el) {
    el.addEventListener('click', function (e) {
      e.preventDefault();
      if (!lightbox || !lightboxImg) return;
      lightboxImg.src = el.getAttribute('href') || el.getAttribute('data-src');
      lightbox.classList.add('open');
    });
  });
  if (lightbox) {
    lightbox.addEventListener('click', function () { lightbox.classList.remove('open'); });
  }

  /* ---------- Video reel banner: arrow scroll + mute toggle ---------- */
  var reelTrack = document.getElementById('reelCarousel');
  if (reelTrack) {
    var prevBtn = document.querySelector('.reel-nav-prev');
    var nextBtn = document.querySelector('.reel-nav-next');
    var scrollAmount = function () {
      var card = reelTrack.querySelector('.reel-card');
      return card ? card.getBoundingClientRect().width + 20 : 250;
    };
    if (prevBtn) prevBtn.addEventListener('click', function () {
      reelTrack.scrollBy({ left: -scrollAmount(), behavior: 'smooth' });
    });
    if (nextBtn) nextBtn.addEventListener('click', function () {
      reelTrack.scrollBy({ left: scrollAmount(), behavior: 'smooth' });
    });

    document.querySelectorAll('.reel-mute').forEach(function (btn) {
      var video = btn.parentElement.querySelector('.reel-video');
      btn.addEventListener('click', function () {
        video.muted = !video.muted;
        btn.textContent = video.muted ? '🔇' : '🔊';
        if (!video.muted) {
          document.querySelectorAll('.reel-video').forEach(function (v) {
            if (v !== video) v.muted = true;
          });
          document.querySelectorAll('.reel-mute').forEach(function (b) {
            if (b !== btn) b.textContent = '🔇';
          });
        }
      });
    });

    /* Pause off-screen videos to save resources */
    if ('IntersectionObserver' in window) {
      var reelIo = new IntersectionObserver(function (entries) {
        entries.forEach(function (entry) {
          var vid = entry.target.querySelector('.reel-video');
          if (!vid) return;
          if (entry.isIntersecting) vid.play().catch(function () {});
          else vid.pause();
        });
      }, { threshold: 0.3 });
      reelTrack.querySelectorAll('.reel-card').forEach(function (card) { reelIo.observe(card); });
    }
  }

  /* ---------- Reveal-on-scroll animation ---------- */
  var revealEls = document.querySelectorAll('.reveal');
  if ('IntersectionObserver' in window && revealEls.length) {
    var io = new IntersectionObserver(function (entries) {
      entries.forEach(function (entry) {
        if (entry.isIntersecting) {
          entry.target.classList.add('in-view');
          io.unobserve(entry.target);
        }
      });
    }, { threshold: 0.15 });
    revealEls.forEach(function (el) { io.observe(el); });
  } else {
    revealEls.forEach(function (el) { el.classList.add('in-view'); });
  }

  /* ---------- Contact form (AJAX) ---------- */
  var contactForm = document.getElementById('contactForm');
  if (contactForm) {
    contactForm.addEventListener('submit', function (e) {
      e.preventDefault();
      var alertBox = document.getElementById('formAlert');
      var submitBtn = contactForm.querySelector('button[type="submit"]');
      var originalText = submitBtn.innerHTML;
      submitBtn.disabled = true;
      submitBtn.innerHTML = 'Sending...';

      fetch('send_message.php', {
        method: 'POST',
        body: new FormData(contactForm)
      })
        .then(function (res) { return res.json(); })
        .then(function (data) {
          alertBox.style.display = 'block';
          alertBox.className = 'form-alert ' + (data.success ? 'success' : 'error');
          alertBox.textContent = data.message;
          if (data.success) contactForm.reset();
        })
        .catch(function () {
          alertBox.style.display = 'block';
          alertBox.className = 'form-alert error';
          alertBox.textContent = 'Something went wrong. Please try again or call us directly.';
        })
        .finally(function () {
          submitBtn.disabled = false;
          submitBtn.innerHTML = originalText;
        });
    });
  }
});
