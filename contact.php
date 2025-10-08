<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact - Seahawk Law</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="style.css">

    <style>
        body {
            color: #333;
            line-height: 1.6;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            padding-top: 60px; 

        }
        .container {
            width: 85%;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }
        .btn { background: #8CBF4B; color: #1a3c6e; font-weight: bold; border-radius: 25px; padding: 12px 32px; font-size: 1.2rem; text-decoration: none; transition: background 0.3s; display: inline-block; margin: 10px 8px; box-shadow: 0 2px 8px rgba(0,0,0,0.08);}

        .contact-hero {
            background: linear-gradient(120deg, rgba(26,60,110,0.7) 70%, rgba(0,34,68,0.7) 100%), url('city-seattle-with-text.jpg') no-repeat center center/cover;
            color: #8CBF4B;
            padding: 60px 0 40px 0;
            text-align: center;
        }
        .contact-hero h1 {
            font-size: 2.5rem;
            margin-bottom: 15px;
        }
        .contact-hero p {
            font-size: 1.2rem;
            margin-bottom: 10px;
        }
        .contact-main {
            background: linear-gradient(90deg, #8CBF4B 0%, #fff 100%);
            padding: 60px 0;
        }
        .contact-hero-content {
            display: inline-block;
            padding: 40px 30px;
            border-radius: 18px;
            box-shadow: 0 4px 24px rgba(0,0,0,0.18);
        }
        .contact-flex {
            display: flex;
            gap: 40px;
            align-items: flex-start;
            flex-wrap: wrap;
        }
        .contact-info {
            flex: 1;
            background: white;
            border-radius: 8px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.07);
            padding: 40px 30px;
            min-width: 280px;
        }
        .contact-info h2 {
            color: #1a3c6e;
            margin-bottom: 15px;
        }
        .contact-info p, .contact-info a {
            font-size: 1.1rem;
            margin-bottom: 10px;
            color: #333;
            text-decoration: none;
        }
        .contact-info .fa {
            color: #8CBF4B;
            margin-right: 10px;
        }
        .contact-form-container {
            flex: 2;
            background: white;
            border-radius: 8px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.07);
            padding: 40px 30px;
            min-width: 320px;
        }
        .contact-form-container h2 {
            color: #1a3c6e;
            margin-bottom: 15px;
        }
        .form-group {
            margin-bottom: 20px;
        }
        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: 500;
        }
        .form-group input,
        .form-group textarea {
            width: 100%;
            padding: 12px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 1rem;
        }
        .form-group textarea {
            height: 120px;
        }
        .contact-form-container .btn[type="submit"] {
            width: 100%;
            display: block;
            text-align: center;
            background-color: #8CBF4B;
            color: white;
            padding: 10px 0;
            border-radius: 25px;
            font-weight: bold;
            font-size: 1.1rem;
            border: none;
            transition: background 0.3s;
        }
        .contact-form-container .btn[type="submit"]:hover {
            background-color: #6fdc6f;
            color: #1a3c6e;
        }
        .contact-map {
            margin-top: 30px;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0,0,0,0.07);
        }
        @media (max-width: 900px) {
            .contact-flex {
                flex-direction: column;
                gap: 30px;
            }
            .contact-info, .contact-form-container {
                width: 100%;
                min-width: 0;
                padding: 20px;
                box-sizing: border-box;
            }
            .contact-map iframe {
                width: 100%;
                height: 220px;
            }
        }
        /* Associations slider styles (reuse from index) */
        .associations {
            background: linear-gradient(120deg, #fff 60%, #1a3c6e 100%);
            padding: 50px 0;
            text-align: center;
        }
        .association-slider {
            width: 100%;
            overflow: hidden;
            position: relative;
            margin-top: 30px;
            height: 170px;
            background: #f8f9fa;
            border-radius: 12px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.07);
            display: flex;
            align-items: center;
        }
        .slider-track {
            display: flex;
            width: calc(170px * 14); /* 7 images * 2 for seamless loop */
            animation: slide-assoc 18s linear infinite;
        }
        .slider-img {
            width: 150px;
            height: 150px;
            margin: 0 10px;
            object-fit: contain;
            border-radius: 50%;
            background: white;
            box-shadow: 0 5px 15px rgba(0,0,0,0.07);
        }
        @keyframes slide-assoc {
            0% { transform: translateX(0); }
            100% { transform: translateX(-1190px); } /* 7 images * 170px */
        }
        @media (max-width: 900px) {
            .association-slider {
                height: 110px;
            }
            .slider-img {
                width: 90px;
                height: 90px;
            }
            .slider-track {
                width: calc(110px * 14);
            }
            @keyframes slide-assoc {
                0% { transform: translateX(0); }
                100% { transform: translateX(-770px); }
            }
        }
        /* --- Sticky CTA Bar --- */
.sticky-cta-bar {
    position: fixed;
    bottom: 0;
    left: 0;
    width: 100%;
    padding: 10px 0;
    text-align: center;
    z-index: 1000;
    transform: translateY(100%);
    transition: transform 0.3s ease-in-out;
}
.sticky-cta-bar.visible { transform: translateY(0);}
.sticky-cta-bar .btn { margin: 0 auto; max-width: 300px; padding: 10px 20px; font-size: 1.1em; background: #8CBF4B; color: #1a3c6e; font-weight: bold;}
.sticky-cta-bar .btn:hover { background: #002244; color: #8CBF4B;}
    </style>
</head>
<body>
    <!-- Header -->
<?php
    include_once('navbar.html');
?>
    <div id="main-content">

    <!-- Contact Hero Section -->
    <section class="contact-hero fade-in-section">
        <div class="container contact-hero-content">
            <h1><i class="fas fa-envelope-open-text"></i> Contact Seattle Law Hawks</h1>
            <p style="font-size:1.25rem; color:#fff; margin-bottom:18px;">
                Ready for your free, confidential consultation? <br>
                Reach out and put a proven competitor in your corner.
            </p>
            <p style="font-size:1.1rem; color:#8CBF4B;">
                <i class="fa fa-phone"></i> <strong>(206) 453-1800</strong> &nbsp; | &nbsp; 
                <i class="fa fa-envelope"></i> info@seahawklaw.com
            </p>
            <p style="font-size:1.05rem; color:#fff;">
                We respond quickly and treat your case with care—because when your future’s on the line, you need a team that plays to win.
            </p>
            <a href="tel:2064531800" class="btn" style="margin-top:18px;"><i class="fas fa-phone"></i> Call Now</a>
            <a href="#contactForm" class="btn" style="margin-top:18px;"><i class="fas fa-paper-plane"></i> Send a Message</a>
        </div>
    </section>

    <!-- Contact Main Section -->
    <section class="contact-main fade-in-section">
        <div class="container">
            <div class="contact-flex">
                <div class="contact-info">
                    <h2>Our Office</h2>
                    <p><i class="fa fa-map-marker-alt"></i> 123 Legal Avenue, Suite 100<br>Seattle, WA 98101</p>
                    <p><i class="fa fa-phone"></i> <a href="tel:2065550123">(206) 555-0123</a></p>
                    <p><i class="fa fa-envelope"></i> <a href="mailto:info@seahawklaw.com">info@seahawklaw.com</a></p>
                    <p><i class="fa fa-clock"></i> Mon-Fri: 8:30am - 5:30pm</p>
                    <div class="contact-map">
                        <iframe src="https://maps.google.com/maps?q=Seattle%20WA&t=&z=13&ie=UTF8&iwloc=&output=embed" width="100%" height="180" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                    </div>
                </div>
                <div class="contact-form-container">
                    <h2>Send Us a Message</h2>
                    <form action="send-contact.php" method="post" id="contactForm">
                        <div class="form-group">
                            <label for="name">Name*</label>
                            <input type="text" id="name" name="name" required>
                        </div>
                        <div class="form-group">
                            <label for="phone">Phone*</label>
                            <input type="tel" id="phone" name="phone" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email*</label>
                            <input type="email" id="email" name="email" required>
                        </div>
                        <div class="form-group">
                            <label for="court-date">Court Date</label>
                            <input type="date" id="court-date" name="court-date">
                        </div>
                        <div class="form-group">
                            <label for="message">Message*</label>
                            <textarea id="message" name="message" required></textarea>
                        </div>
                        <div class="form-group" style="margin-bottom: 25px;">
                            <!-- Google reCAPTCHA widget -->
                            <div class="g-recaptcha" data-sitekey="6LdnrNwrAAAAAGYnGZq8KmAwQzL4Cz8kPQA7HzH5"></div>
                        </div>
                        <button type="submit" class="btn" id="submitBtn">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- Associations Section (same as index) -->
    <section class="associations fade-in-section">
        <div class="container">
            <div class="section-title">
                <h2>Professional Associations</h2>
                <p>Recognized by leading legal organizations</p>
            </div>
            <div class="association-slider">
                <div class="slider-track">
                    <a href="https://www.avvo.com/attorneys/98201-wa-scott-lawrence-37152.html">
                    <img src="image/top.PNG" alt="Top Contributor Award 2021" class="slider-img"></a>
                    <a href="https://www.nacdl.org/">
                    <img src="image/national-association-of-criminal-defense-lawyers-sm.jpg" alt="Association 2" class="slider-img">
                    </a>
                    <a href="https://www.ncdd.com/">
                    <img src="image/ncdd-member.png" alt="Association 3" class="slider-img">
                    </a>
                    <a href="https://www.mywsba.org/PersonifyEbusiness/LegalDirectory/LegalProfile.aspx?Usr_ID=000000037734">
                    <img src="image/wsba-logo-sm.jpg" alt="Association 4" class="slider-img">
                    </a>
                    <a href="https://defensenet.org/about">
                    <img src="image/washington-defenders-association-sm.jpg" alt="Association 5" class="slider-img">
                    </a>
                    <a href="https://www.wacdl.org/about">
                    <img src="image/wacdl-sm.jpg" alt="Association 6" class="slider-img">
                    </a>
                    <a href="https://www.washingtonjustice.org/index.cfm?pg=FindAnAttorney&dirAction=SearchResults&fs_match=s&m_firstname=scott&m_lastname=lawrence&seed=453206">
                    <img src="image/association-for-justice-sm.jpg" alt="Association 7" class="slider-img">
                    </a>
                    <!-- Duplicate images for seamless loop -->
                    <a href="https://www.avvo.com/attorneys/98201-wa-scott-lawrence-37152.html">
                    <img src="image/top.PNG" alt="Top Contributor Award 2021" class="slider-img">
                    </a>
                    <a href="https://www.nacdl.org/">
                    <img src="image/national-association-of-criminal-defense-lawyers-sm.jpg" alt="Association 2" class="slider-img">
                    </a>
                    <a href="https://www.ncdd.com/">
                    <img src="image/ncdd-member.png" alt="Association 3" class="slider-img">
                    </a>
                    <a href="https://www.mywsba.org/PersonifyEbusiness/LegalDirectory/LegalProfile.aspx?Usr_ID=000000037734">
                    <img src="image/wsba-logo-sm.jpg" alt="Association 4" class="slider-img">
                    </a>
                    <a href="https://defensenet.org/about">
                    <img src="image/washington-defenders-association-sm.jpg" alt="Association 5" class="slider-img">
                    </a>
                    <a href="https://www.wacdl.org/about">
                    <img src="image/wacdl-sm.jpg" alt="Association 6" class="slider-img">
                    </a>
                    <a href="https://www.washingtonjustice.org/index.cfm?pg=FindAnAttorney&dirAction=SearchResults&fs_match=s&m_firstname=scott&m_lastname=lawrence&seed=453206">
                    <img src="image/association-for-justice-sm.jpg" alt="Association 7" class="slider-img">
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
<?php
    include_once('footer.html');
?>   
</div>
    <!-- Google reCAPTCHA script -->
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <script>
        // Enable submit only if checkbox is checked
        document.addEventListener('DOMContentLoaded', function() {
            const robotCheck = document.getElementById('robot-check');
            const submitBtn = document.getElementById('submitBtn');
            if(robotCheck && submitBtn) {
                robotCheck.addEventListener('change', function() {
                    submitBtn.disabled = !robotCheck.checked;
                });
            }
        });
    </script>
        <!-- Sticky CTA Bar Script & Fade-in Script -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Sticky CTA Bar
            const stickyBar = document.createElement('div');
            stickyBar.className = 'sticky-cta-bar';
            stickyBar.innerHTML = `<a href="tel:2064531800" class="btn"><i class="fas fa-phone"></i> Call (206) 453-1800 Now</a>`;
            document.body.appendChild(stickyBar);

            const heroSection = document.querySelector('.hero, .about-hero, .contact-hero');
            function toggleStickyCta() {
                let triggerPoint = 0;
                if (heroSection) {
                    triggerPoint = heroSection.getBoundingClientRect().bottom;
                }
                if (triggerPoint < 0) {
                    stickyBar.classList.add('visible');
                } else {
                    stickyBar.classList.remove('visible');
                }
            }
            window.addEventListener('scroll', toggleStickyCta);
            toggleStickyCta();
        });

        // Fade-in Animation for Sections
        document.addEventListener('DOMContentLoaded', function() {
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
    </script>
                <script>
    function loadPage(page, targetSelector) {
        fetch('route.php?page=' + encodeURIComponent(page))
            .then(response => {
                if (!response.ok) throw new Error('Page not found');
                return response.text();
            })
            .then(html => {
                const target = document.querySelector(targetSelector);
                target.innerHTML = html;
    
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
            })
            .catch(err => {
                document.querySelector(targetSelector).innerHTML = '<div style="color:red;">Error loading page.</div>';
            });
    }



    document.addEventListener('DOMContentLoaded', function() {
  const navToggle = document.getElementById('nav-toggle');
  const navUl = document.querySelector('nav ul');
  const dropdowns = document.querySelectorAll('.dropdown > a');

  // Toggle mobile menu
  navToggle.addEventListener('click', function() {
    navUl.classList.toggle('open');
  });

  // Close menu on link click (mobile)
  // This will now also close the *main* mobile menu when a dropdown item is clicked.
  navUl.querySelectorAll('a').forEach(link => {
    link.addEventListener('click', () => {
      // Only close if it's the mobile menu (ul.open class is present)
      if (navUl.classList.contains('open')) {
        navUl.classList.remove('open');
      }
    });
  });

  // Optional: ARIA toggle for the desktop dropdown (improves accessibility)
  dropdowns.forEach(dropdownLink => {
    dropdownLink.addEventListener('click', function(e) {
        // Prevent default only if the menu is NOT in mobile view (i.e., navUl is NOT open)
        if (window.innerWidth > 900) {
            e.preventDefault();
            const parentLi = this.closest('.dropdown');
            const dropdownMenu = parentLi.querySelector('.dropdown-menu');
            const isExpanded = this.getAttribute('aria-expanded') === 'true';

            // Close all other open dropdowns
            document.querySelectorAll('.dropdown > a[aria-expanded="true"]').forEach(otherLink => {
                if (otherLink !== this) {
                    otherLink.setAttribute('aria-expanded', 'false');
                }
            });

            // Toggle current dropdown
            this.setAttribute('aria-expanded', !isExpanded);
            // We use CSS for display toggling (via :hover and :focus-within), 
            // but setting aria-expanded is crucial for screen readers.
        }
        // Mobile menu functionality is handled by the mobile media query and the nav-toggle
    });
  });
});

    </script>
</body>
</html>