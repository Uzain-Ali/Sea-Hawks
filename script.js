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

