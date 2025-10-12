function initNavbarDropdown() {
  const navToggle = document.getElementById('nav-toggle');
  const navUl = document.querySelector('nav ul');
  const dropdowns = document.querySelectorAll('.dropdown > a');

  if (navToggle && navUl) {
    navToggle.addEventListener('click', function() {
      navUl.classList.toggle('open');
    });

    navUl.querySelectorAll('a').forEach(link => {
      link.addEventListener('click', () => {
        if (navUl.classList.contains('open')) {
          navUl.classList.remove('open');
        }
      });
    });
  }

  dropdowns.forEach(dropdownLink => {
    dropdownLink.addEventListener('click', function(e) {
      if (window.innerWidth > 900) {
        e.preventDefault();
        const parentLi = this.closest('.dropdown');
        const isExpanded = this.getAttribute('aria-expanded') === 'true';
        document.querySelectorAll('.dropdown > a[aria-expanded="true"]').forEach(otherLink => {
          if (otherLink !== this) {
            otherLink.setAttribute('aria-expanded', 'false');
          }
        });
        this.setAttribute('aria-expanded', !isExpanded);
      }
    });
  });
}

function createStickyCtaBar() {
    if (!document.querySelector('.sticky-cta-bar')) {
        const stickyBar = document.createElement('div');
        stickyBar.className = 'sticky-cta-bar';
        stickyBar.innerHTML = `<a href="tel:2064531800" class="btn"><i class="fas fa-phone"></i> Call (206) 453-1800 Now</a>`;
        document.body.appendChild(stickyBar);
    }
}

function loadPage(page, targetSelector, params = {}) {
    let url = '/Scott\'s Website/route.php?page=' + encodeURIComponent(page);
    let slug = '/Scott\'s Website/' + page;
    for (const key in params) {
        url += '&' + encodeURIComponent(key) + '=' + encodeURIComponent(params[key]);
        slug += (slug.indexOf('?') === -1 ? '?' : '&') + encodeURIComponent(key) + '=' + encodeURIComponent(params[key]);
    }
    fetch(url)
        .then(response => {
            if (!response.ok) throw new Error('Page not found');
            return response.text();
        })
        .then(html => {
            const target = document.querySelector(targetSelector);
            target.innerHTML = html;

            // Update browser URL with correct slug
            window.history.pushState({page: page, params: params}, '', slug);

            // Re-run fade-in animation for new content
            const faders = target.querySelectorAll('.fade-in-section');
            const appearOptions = {
                threshold: 0.15,
                rootMargin: "0px 0px -20px 0px"
            };
            const appearOnScroll = new IntersectionObserver(function(entries, observer) {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('is-visible');
                        observer.unobserve(entry.target);
                    }
                });
            }, appearOptions);

            faders.forEach(section => {
                appearOnScroll.observe(section);
            });

            // Re-initialize navbar and sticky CTA
            if (typeof initNavbarDropdown === 'function') initNavbarDropdown();
            if (typeof initStickyCtaBar === 'function') initStickyCtaBar();
        })
        .catch(err => {
            document.querySelector(targetSelector).innerHTML = '<div style="color:red;">Error loading page.</div>';
        });
}

window.addEventListener('popstate', function(event) {
    let page = location.pathname.replace('/Scott\'s Website/', '') || 'home';
    let params = {};
    if (location.search) {
        location.search.substring(1).split('&').forEach(function(pair) {
            const [key, value] = pair.split('=');
            params[decodeURIComponent(key)] = decodeURIComponent(value || '');
        });
    }
    loadPage(page, '#main-content', params);
});


document.addEventListener('DOMContentLoaded', function() {
    initNavbarDropdown();
    initStickyCtaBar();

    // Fade-in Animation for Sections
    const faders = document.querySelectorAll('.fade-in-section');
    const appearOptions = {
        threshold: 0.15,
        rootMargin: "0px 0px -20px 0px"
    };
    const appearOnScroll = new IntersectionObserver(function(entries, observer) {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('is-visible');
                observer.unobserve(entry.target);
            }
        });
    }, appearOptions);

    faders.forEach(section => {
        appearOnScroll.observe(section);
    });
});