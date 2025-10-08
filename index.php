<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seattle DUI Attorney | Seattle Law Hawks Defense Team</title>
    <meta name="description" content="Charged with a DUI in Seattle? The Law Hawks bring science, strategy & grit to fight for your license, freedom, and future. Free consultation.">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">

    <style>
body {
    font-family: 'Roboto', sans-serif;
    margin: 0;
    background: #fff;
    padding-top: 60px;
}

        .container { width: 85%; max-width: 1200px; margin: 0 auto; padding: 0 10px; }
/* --- HERO --- */
.hero { 
    background: linear-gradient(120deg, rgba(26,60,110,0.7) 70%, rgba(0,34,68,0.7) 100%), url('city-seattle-with-text.jpg') no-repeat center center/cover; 
    color: #8CBF4B; 
    padding: 100px 0 60px; 
    text-align: center; 
    position: relative;
    box-shadow: 0 8px 32px rgba(0,0,0,0.18);
}
.hero-content { 
    display: inline-block; 
    padding: 40px 30px; 
    border-radius: 18px; 
    box-shadow: 0 4px 24px rgba(0,0,0,0.18);
}
.hero h1 { font-size: 3rem; font-weight: 900; margin-bottom: 20px; letter-spacing: 2px; }
.hero p { font-size: 1.3rem; margin-bottom: 30px; color: #fff; }
.btn { background: #8CBF4B; color: #1a3c6e; font-weight: bold; border-radius: 25px; padding: 12px 32px; font-size: 1.2rem; text-decoration: none; transition: background 0.3s; display: inline-block; margin: 10px 8px; box-shadow: 0 2px 8px rgba(0,0,0,0.08);}
.btn:hover { background: #1a3c6e; color: #fff; }
/* --- SCOTT LAWRENCE --- */
.coach-section { 
    background: linear-gradient(90deg, #8CBF4B 0%, #fff 100%);
    padding: 60px 0 40px;
    text-align: center;
}
.coach-cards { display: flex; flex-wrap: wrap; justify-content: center; gap: 30px; margin-top: 30px; }
.coach-card { background: #fff; border-radius: 16px; box-shadow: 0 4px 16px rgba(26,60,110,0.08); padding: 30px 24px; min-width: 260px; max-width: 320px; transition: transform 0.2s; }
.coach-card:hover { transform: scale(1.05) rotate(-2deg);}
.coach-card i { font-size: 2.5rem; color: #1a3c6e; margin-bottom: 12px; }
.coach-card h3 { color: #002244; margin-bottom: 10px; }
/* --- SCIENCE SECTION --- */
.science-section { 
    background: linear-gradient(120deg, #fff 60%, #8CBF4B 100%);
    padding: 60px 0 40px;
}
.science-grid { display: flex; flex-wrap: wrap; gap: 30px; justify-content: center; }
.science-card { background: #fff; border-radius: 14px; box-shadow: 0 2px 12px rgba(0,0,0,0.07); padding: 28px 22px; min-width: 250px; max-width: 350px; position: relative; }
.science-card:before { content: ""; position: absolute; left: 0; top: 0; width: 8px; height: 100%; background: #1a3c6e; border-radius: 14px 0 0 14px; }
.science-card i { font-size: 2rem; color: #8CBF4B; margin-bottom: 10px; }
.science-card h3 { color: #1a3c6e; }
/* --- GAME STATS --- */
.stats-section { 
    background: linear-gradient(90deg, #1a3c6e 70%, #002244 100%);
    color: #8CBF4B;
    padding: 70px 0 50px;
    position: relative;
}
.stats-title { text-align: center; font-size: 2.2rem; font-weight: 900; margin-bottom: 30px; letter-spacing: 1px;}
.stats-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(260px, 1fr)); gap: 30px; margin-top: 30px; }
.stats-card { background: rgba(255,255,255,0.08); border-radius: 14px; box-shadow: 0 2px 12px rgba(0,0,0,0.12); padding: 28px 22px; color: #fff; position: relative; }
.stats-card i { font-size: 2rem; color: #8CBF4B; margin-bottom: 10px; }
.stats-card h4 { color: #8CBF4B; margin-bottom: 10px; font-size: 1.2rem; }
.stats-card ul { list-style: none; padding: 0; margin: 0; }
.stats-card ul li { margin-bottom: 8px; font-size: 1.05rem; }
/* --- WHY HIRE --- */
.why-section { 
    background: linear-gradient(120deg, #fff 60%, #1a3c6e 100%);
    padding: 60px 0 40px;
}
.why-list { background: #fff; border-radius: 14px; box-shadow: 0 2px 12px rgba(0,0,0,0.07); padding: 28px 22px; max-width: 700px; margin: 0 auto 30px auto; }
.why-list li { font-size: 1.1rem; margin-bottom: 12px; }
.why-list li:before { content: "🏈 "; color: #1a3c6e; font-size: 1.2rem; }
.court-tags { display: flex; flex-wrap: wrap; gap: 10px; justify-content: center; margin-top: 20px;}
.court-tag { background: #1a3c6e; color: #8CBF4B; padding: 8px 18px; border-radius: 18px; font-weight: 700; font-size: 1rem; }
/* --- CTA --- */
.cta { 
    background: linear-gradient(120deg, #8CBF4B 70%, #1a3c6e 100%);
    color: #1a3c6e;
    padding: 70px 0 50px;
    text-align: center;
}
.cta .btn { background: #1a3c6e; color: #8CBF4B; font-weight: bold; }
.cta .btn:hover { background: #8CBF4B; color: #1a3c6e; }

/* --- Fade-in Animation --- */
.fade-in-section { opacity: 0; transform: translateY(40px); transition: opacity 0.8s cubic-bezier(.77,0,.175,1), transform 0.8s cubic-bezier(.77,0,.175,1); will-change: opacity, transform;}
.fade-in-section.is-visible { opacity: 1; transform: none;}
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
@media (max-width: 900px) {
    .coach-cards, .science-grid, .stats-grid { flex-direction: column; display: block;}
      .coach-card,
  .science-card,
  .stats-card {
    margin: 15px auto;
  }
}
    </style>
</head>
<body>
    <!-- Header -->
     <div id="main-content">
<?php
    include_once('navbar.html');
?>
    <!-- Hero Section -->
    <section class="hero fade-in-section">
        <div class="container hero-content">
            <h1><i class="fas fa-football-ball"></i> Bringing Championship Defense to DUI Cases</h1>
            <p>
                For more than 20 years, Seattle Law Hawks have run a playbook built on one thing: defense that wins. Like our city’s great sports teams, we know victories come from fundamentals, discipline, and relentless preparation. When the stakes are high, we step up and deliver.
            </p>
            <a href="#" class="btn" onclick="loadPage('contact', '#main-content'); return false;">
                <i class="fas fa-calendar-check"></i> Schedule Your Free Consultation
            </a>
        </div>
    </section>

    <!-- Intro Paragraph -->
    <section class="fade-in-section" style="background:linear-gradient(90deg, #8CBF4B 0%, #fff 100%);padding:40px 0;">
        <div class="container" style="max-width:800px;">
            <p style="font-size:1.2em;text-align:center;">
                From the opening whistle—the moment police make contact—to the final buzzer—the closure of your case—we’re in your corner. Our team covers every phase of the DUI process: DOL hearings, arraignments, negotiations, suppression motions, expert analysis, and jury trials. Every possession matters, and we don’t waste a step.
            </p>
            <p style="font-size:1.1em;text-align:center;">
                Whether you’ve been arrested, charged, or are under investigation, Seattle Law Hawks are ready to protect your rights, fight for your future, and put you back in the driver’s seat.
            </p>
        </div>
    </section>

    <!-- Meet Scott Preview Block -->
    <section class="coach-section fade-in-section">
        <div class="container">
            <h2 class="section-title"><i class="fas fa-user-tie"></i> Meet Scott: Seattle’s Defensive MVP</h2>
            <div class="coach-cards">
                <div class="coach-card">
                    <i class="fas fa-gavel"></i>
                    <h3>Criminal Law</h3>
                    <p>20+ years of DUI trial defense. Scott knows the courtroom, the judges, and the most effective legal arguments to challenge the State.</p>
                </div>
                <div class="coach-card">
                    <i class="fas fa-flask"></i>
                    <h3>Chemistry</h3>
                    <p>B.S. in Chemistry (UW), Certified Chemist (ACS). He can dissect and challenge the "science" behind your breath and blood tests, exposing errors other lawyers miss.</p>
                </div>
                <div class="coach-card">
                    <i class="fas fa-user-secret"></i>
                    <h3>Investigation</h3>
                    <p>12 years as a licensed Private Investigator. He knows how to "scout the opponent," uncover hidden evidence, and dismantle the State's case.</p>
                </div>
            </div>
            <div style="text-align:center;margin-top:20px;">
                <a href="#" class="btn" onclick="loadPage('about', '#main-content'); return false;">
                    <i class="fas fa-arrow-right"></i> Learn More About Scott
                </a>
            </div>
        </div>
    </section>

    <!-- Running the Latest Playbook in DUI Defense -->
    <section class="science-section fade-in-section">
        <div class="container">
            <h2 class="section-title"><i class="fas fa-microscope"></i> Running the Latest Playbook in DUI Defense</h2>
            <p style="font-size:1.1em;text-align:center;">
                Attorney Scott Lawrence brings two decades of experience as a trial attorney fighting DUIs. He’s trained with the same experts who train police officers in DUI detection and field sobriety tests. At Seattle Law Hawks, we bring in top specialists in breath testing, blood science, and DUI evidence—challenging the government’s star witnesses and staying ahead of every new development in DUI law.
            </p>
        </div>
    </section>

    <!-- Game Stats Section -->
    <section class="stats-section fade-in-section">
        <div class="container">
            <div class="stats-title"><i class="fas fa-chart-bar"></i> Game Stats: Seattle DUI Defense Quick Facts</div>
            <div class="stats-grid">
                <div class="stats-card">
                    <i class="fas fa-map-marker-alt"></i>
                    <h4>🏟️ Home Field</h4>
                    <ul>
                        <li>Seattle, King County, Greater Puget Sound</li>
                    </ul>
                </div>
                <div class="stats-card">
                    <i class="fas fa-stopwatch"></i>
                    <h4>⏱️ Shot Clock (Deadlines)</h4>
                    <ul>
                        <li>7 days: Request DOL hearing</li>
                        <li>15 days: Arraignment after arrest</li>
                        <li>Don't miss the deadlines!</li>
                    </ul>
                </div>
                <div class="stats-card">
                    <i class="fas fa-bullseye"></i>
                    <h4>🎯 Legal BAC Limits</h4>
                    <ul>
                        <li>.08+ Adults (21+)</li>
                        <li>.04+ CDL drivers</li>
                        <li>.02+ Under 21</li>
                        <li>Even below the limit? State can still call you impaired</li>
                    </ul>
                </div>
                <div class="stats-card">
                    <i class="fas fa-gavel"></i>
                    <h4>⚖️ Penalties (First Offense)</h4>
                    <ul>
                        <li>License suspension: 90 days minimum</li>
                        <li>Jail: 1 day mandatory (up to 364 days)</li>
                        <li>Fines & Fees: $990+</li>
                        <li>IID required</li>
                    </ul>
                </div>
                <div class="stats-card">
                    <i class="fas fa-flask"></i>
                    <h4>📊 Science in Play</h4>
                    <ul>
                        <li>Breath Tests: Prone to error</li>
                        <li>Blood Tests: Vulnerable to lab issues</li>
                        <li>Defense Advantage: Scott's chemistry expertise</li>
                    </ul>
                </div>
                <div class="stats-card">
                    <i class="fas fa-user-tie"></i>
                    <h4>🏆 Player Profile</h4>
                    <ul>
                        <li>20+ Years defending DUIs</li>
                        <li>B.S. Chemistry – UW</li>
                        <li>Certified Chemist – ACS</li>
                        <li>12 Years PI</li>
                        <li>Thousands of cases handled</li>
                    </ul>
                </div>
                <div class="stats-card">
                    <i class="fas fa-truck"></i>
                    <h4>🚚 Special Teams</h4>
                    <ul>
                        <li>CDL & Trucking Cases</li>
                        <li>Protecting careers on the line</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- Why Hire Section -->
    <section class="why-section fade-in-section">
        <div class="container">
            <h2 class="section-title"><i class="fas fa-trophy"></i> Why Hire Seattle Law Hawks?</h2>
            <p style="font-size:1.1em;text-align:center;">Dismissals, Favorable Settlements, and Trial Wins</p>
            <ul class="why-list">
                <li>Thousands of cases handled—prosecutors know we prepare, judges know we fight hard.</li>
                <li>Every case is a championship game: aggressive, relentless advocacy.</li>
                <li>Our goal: Dismissals when possible, favorable settlements when practical, trial wins when necessary.</li>
                <li>We represent clients facing First Offense, Repeat Offenses, and CDL-Holder cases across King County and the Greater Seattle Area.</li>
            </ul>
            <div class="court-tags">
                <span class="court-tag">Seattle Municipal Court</span>
                <span class="court-tag">King County District Courts</span>
                <span class="court-tag">Bellevue</span>
                <span class="court-tag">Redmond</span>
                <span class="court-tag">Bothell</span>
                <span class="court-tag">Shoreline</span>
                <span class="court-tag">Kenmore</span>
                <span class="court-tag">Lake Forest Park</span>
            </div>
            <p style="text-align:center; margin-top:30px;">Wherever the whistle blows, we're ready to compete.</p>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="cta fade-in-section">
        <div class="container">
            <h2><i class="fas fa-stopwatch"></i> Game Time: Schedule Your Free Consultation Today</h2>
            <p style="font-size:1.2em;">
                When you’re staring down a DUI charge in Seattle, you don’t get a do-over. The clock is running, and the State is already building its case. This is when you need a proven player in your corner.<br>
                At Seattle Law Hawks, we treat every case like it’s the championship game. We scout the opponent, study the evidence, and bring a full playbook of science, strategy, and courtroom skill to the fight.
            </p>
            <a href="tel:2064531800" class="btn"><i class="fas fa-phone"></i> (206) 453-1800</a>
            <a href="#" class="btn" onclick="loadPage('contact', '#main-content'); return false;"><i class="fas fa-envelope"></i> Contact Us Online</a>
        </div>
    </section>

    <!-- Footer -->
<?php
    include_once('footer.html');
?>    
</div>
    <!-- Sticky CTA Bar Script & Fade-in Script -->
     <script src="script.js"></script>
    <script>
        function initStickyCtaBar() {
            createStickyCtaBar();
        
            function getHeroSection() {
                return document.querySelector('.hero, .about-hero, .contact-hero, .blog-hero, .marijuana-hero, .dui-hero');
            }
        
            function toggleStickyCta() {
                const stickyBar = document.querySelector('.sticky-cta-bar');
                const heroSection = getHeroSection();
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
        
            window.removeEventListener('scroll', toggleStickyCta); // Remove previous
            window.addEventListener('scroll', toggleStickyCta);
        
            // Re-run toggleStickyCta after AJAX loads new content
            const mainContent = document.getElementById('main-content');
            if (mainContent._stickyCtaObserver) {
                mainContent._stickyCtaObserver.disconnect();
            }
            const observer = new MutationObserver(toggleStickyCta);
            observer.observe(mainContent, { childList: true, subtree: true });
            mainContent._stickyCtaObserver = observer;
        
            // Initial check
            toggleStickyCta();
        }

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
                            // Re-initialize navbar dropdown JS
                initNavbarDropdown();
                initStickyCtaBar();
            })
            .catch(err => {
                document.querySelector(targetSelector).innerHTML = '<div style="color:red;">Error loading page.</div>';
            });
    }

document.addEventListener('DOMContentLoaded', function() {
    initNavbarDropdown();
    initStickyCtaBar();
});
    </script>

</body>
</html>