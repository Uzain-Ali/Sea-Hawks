<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us - Seattle Law Hawks</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">

    <style>
        body {
            color: #333;
            line-height: 1.6;
            font-family: 'Roboto', 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            background: #f8f8f8;
                        padding-top: 60px; 

        }
        .container {
            width: 85%;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        .btn { background: #8CBF4B; color: #1a3c6e; font-weight: bold; border-radius: 25px; padding: 12px 32px; font-size: 1.2rem; text-decoration: none; transition: background 0.3s; display: inline-block; margin: 10px 8px; box-shadow: 0 2px 8px rgba(0,0,0,0.08);}

        /* --- HERO --- */
        .about-hero {
            background: linear-gradient(120deg, rgba(26,60,110,0.7) 70%, rgba(0,34,68,0.7) 100%), url('city-seattle-with-text.jpg') no-repeat center center/cover;
            color: #8CBF4B;
            padding: 80px 0 50px 0;
            text-align: center;
            position: relative;
        }
        .about-hero-content {
            display: inline-block;
            padding: 40px 30px;
            border-radius: 18px;
            box-shadow: 0 4px 24px rgba(0,0,0,0.18);
        }
        .about-hero h1 {
            font-size: 2.5rem;
            font-weight: 900;
            margin-bottom: 15px;
            letter-spacing: 2px;
        }
        .about-hero p {
            font-size: 1.3rem;
            margin-bottom: 10px;
            color: #fff;
        }
        /* --- MAIN --- */
        .about-main {
            background: linear-gradient(90deg, #8CBF4B 0%, #fff 100%);
            padding: 60px 0;
        }
        .about-flex {
            display: flex;
            gap: 40px;
            align-items: flex-start;
            flex-wrap: wrap;
        }
        .about-profile-container {
            flex: 2;
            background: white;
            border-radius: 8px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.07);
            padding: 40px 30px;
            min-width: 320px;
        }
        .about-profile-header {
            display: flex;
            align-items: flex-start;
            gap: 30px;
            margin-bottom: 20px;
        }
        .about-profile-img {
            width: 140px;
            height: 140px;
            border-radius: 50%;
            object-fit: cover;
            box-shadow: 0 5px 15px rgba(0,0,0,0.07);
            background: white;
        }
        .about-profile-content h2 {
            color: #1a3c6e;
            margin-bottom: 10px;
            font-size: 2rem;
            font-weight: 900;
        }
        .about-profile-content p {
            margin-bottom: 10px;
            font-size: 1.1rem;
        }
        .about-profile-content .profile-links a {
            display: inline-block;
            margin-right: 15px;
            color: #8CBF4B;
            text-decoration: underline;
            font-weight: 500;
        }
        .about-profile-content .profile-links a:hover {
            color: #1a3c6e;
        }
        .about-experience {
            margin-top: 30px;
        }
        .about-experience h3 {
            color: #1a3c6e;
            margin-bottom: 10px;
        }
        .about-experience ul {
            list-style: disc;
            margin-left: 20px;
        }
        .about-experience ul li {
            margin-bottom: 8px;
        }
        .about-side {
            flex: 1;
            background: white;
            border-radius: 8px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.07);
            padding: 40px 30px;
            min-width: 280px;
        }
        .about-side h3 {
            color: #1a3c6e;
            margin-bottom: 15px;
        }
        .about-side ul {
            list-style: none;
            padding: 0;
        }
        .about-side ul li {
            margin-bottom: 12px;
            font-size: 1.05rem;
        }
        .about-side ul li i {
            color: #8CBF4B;
            margin-right: 8px;
        }
        .about-side .court-list {
            margin-top: 18px;
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
        }
        .about-side .court-tag {
            background: #1a3c6e;
            color: #8CBF4B;
            padding: 6px 14px;
            border-radius: 16px;
            font-weight: 700;
            font-size: 0.98rem;
        }
        @media (max-width: 900px) {
            .about-flex {
                flex-direction: column;
                gap: 30px;
            }
            .about-profile-container, .about-side {
                width: 100%;
                min-width: 0;
                padding: 20px;
                box-sizing: border-box;
            }
            .about-profile-header {
                flex-direction: column;
                align-items: center;
                gap: 15px;
            }
            .about-profile-img {
                width: 100px;
                height: 100px;
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
            width: calc(170px * 14);
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
            100% { transform: translateX(-1190px); }
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
.fade-in-section {
    opacity: 0;
    transform: translateY(40px);
    transition: opacity 0.8s cubic-bezier(.77,0,.175,1), transform 0.8s cubic-bezier(.77,0,.175,1);
    will-change: opacity, transform;
}
.fade-in-section.is-visible {
    opacity: 1;
    transform: none;
}
    </style>
</head>
<body>
    <!-- Header -->
<?php
    include_once('navbar.html');
?>
     <div id="main-content">

    <!-- About Hero Section -->
    <section class="about-hero fade-in-section">
        <div class="container about-hero-content">
            <h1><i class="fas fa-football-ball"></i> Seattle DUI Attorney, Chemist, and Private Investigator</h1>
            <p>Scott Lawrence: Seattle’s Veteran Defender on the DUI Field</p>
            <p style="font-size:1.1rem;color:#8CBF4B;">20+ Years of Science, Strategy, and Grit</p>
        </div>
    </section>

    <!-- About Main Section -->
    <section class="about-main fade-in-section">
        <div class="container">
            <div class="about-flex">
                <div class="about-profile-container">
                    <div class="about-profile-header">
                        <div class="about-profile-content">
                            <h2>Scott Weymouth Lawrence</h2>
                            <p>
                                <strong>Seattle native. 20-year starter in the DUI defense game.</strong> Scott Lawrence brings a full playbook to every case: law, science, and investigation. With a B.S. in Chemistry from UW and certification from the American Chemistry Society, Scott brings the science to the field like few others can. Add in 12 years as a licensed private investigator, and you’ve got a defender who knows how to scout the other side’s playbook, uncover hidden weaknesses, and challenge every move.
                            </p>
                            <p>
                                This isn’t just lawyering — it’s a full-court press for DUI defense. Scott knows the science behind breath and blood testing, runs the research and writing drills to perfection, and has the persuasive skills to take the fight to judges, juries, and prosecutors.
                            </p>
                            <p>
                                A DUI charge is one of the most stressful, high-pressure situations a person can face. It feels like the championship is on the line, with your future hanging in the balance. That’s why the Seattle Law Hawks play with heart. We work to take the stress out of the process, keep you in the fight, and deliver the best possible defense.
                            </p>
                            <div class="profile-links">
                                <a href="https://www.avvo.com/attorneys/98201-wa-scott-lawrence-37152.html" target="_blank"><i class="fa fa-star"></i> Avvo Profile</a>
                                <a href="mailto:info@seahawklaw.com"><i class="fa fa-envelope"></i> Email</a>
                            </div>
                        </div>
                    </div>
                    <div class="about-experience">
                        <h3><i class="fas fa-basketball-ball"></i> A Full-Court Press for DUI Defense</h3>
                        <ul>
                            <li>Winning a DUI case takes a coach, a strategist, and a competitor all rolled into one</li>
                            <li>Scott Lawrence knows the science behind breath and blood testing</li>
                            <li>Runs research and writing drills to perfection</li>
                            <li>Persuasive skills to take the fight to judges, juries, and prosecutors</li>
                            <li>Seattle Law Hawks play with heart—taking the stress out of the process</li>
                        </ul>
                    </div>
                    <div class="about-experience">
                        <h3><i class="fas fa-map-marker-alt"></i> The Seattle Law Hawks’ Home Field Advantage</h3>
                        <ul>
                            <li>Seattle Municipal Court</li>
                            <li>King County District Courts</li>
                            <li>Shoreline, Kenmore, and Lake Forest Park Municipal Courts</li>
                            <li>Redmond and Bellevue Municipal Courts</li>
                            <li>Bothell Municipal Court</li>
                            <li>...and more</li>
                        </ul>
                        <p style="margin-top:10px;font-weight:bold;color:#1a3c6e;">Wherever the game is played, the Seattle Law Hawks show up ready to compete.</p>
                    </div>
                </div>
                <div class="about-side">
                    <h3><i class="fas fa-id-badge"></i> Credentials & Memberships</h3>
                    <ul>
                        <li><i class="fa fa-university"></i> University of Oregon, Knight School of Law (Criminal Defense Certificate)</li>
                        <li><i class="fa fa-flask"></i> B.S. Chemistry, University of Washington</li>
                        <li><i class="fa fa-vial"></i> Certified Laboratory Chemist, American Chemistry Society</li>
                        <li><i class="fa fa-user-secret"></i> Licensed Private Investigator (12 years)</li>
                        <li><i class="fa fa-users"></i> National College of DUI Defense (NCDD)</li>
                        <li><i class="fa fa-users"></i> National Association of Criminal Defense Lawyers (NACDL)</li>
                        <li><i class="fa fa-users"></i> Washington Association of Criminal Defense Lawyers (WACDL)</li>
                        <li><i class="fa fa-certificate"></i> Certified by International Order of Police & NHTSA for field sobriety tests</li>
                    </ul>
                    <h3 style="margin-top:30px;"><i class="fas fa-phone"></i> Contact & Consultation</h3>
                    <p>Ready to discuss your case?<br>
                        <a href="mailto:info@seahawklaw.com" style="color:#8CBF4B;">Email us</a> or call <a href="tel:2064531800" style="color:#8CBF4B;">(206) 453-1800</a> for a free, confidential consultation.
                    </p>
                    <h3 style="margin-top:30px;"><i class="fas fa-trophy"></i> Courts We Cover</h3>
                    <div class="court-list">
                        <span class="court-tag">Seattle Municipal Court</span>
                        <span class="court-tag">King County District Courts</span>
                        <span class="court-tag">Bellevue</span>
                        <span class="court-tag">Redmond</span>
                        <span class="court-tag">Bothell</span>
                        <span class="court-tag">Shoreline</span>
                        <span class="court-tag">Kenmore</span>
                        <span class="court-tag">Lake Forest Park</span>
                    </div>
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
        <!-- Sticky CTA Bar Script & Fade-in Script -->
</div>
</body>
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

    // Example usage:
    // loadPage('about', '#main-content');
    </script>
</html>