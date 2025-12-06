<?php
require_once 'auth.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>DUI 101 - Seattle Law Hawks</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="style.css">
    <style>
        body { color: #333; line-height: 1.6; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background: #f8f9fa; margin: 0; }
        .container { width: 85%; max-width: 1200px; margin: 0 auto; padding: 0 20px; }

        .dui-hero {
            background: linear-gradient(120deg, rgba(26,60,110,0.7) 70%, rgba(0,34,68,0.7) 100%), url('city-seattle-with-text.jpg') no-repeat center center/cover;
            color: #8CBF4B;
            padding: 80px 0 50px 0;
            text-align: center;
            position: relative;
        }
        .dui-hero-content { display: inline-block; padding: 40px 30px; border-radius: 18px; box-shadow: 0 4px 24px rgba(0,0,0,0.18); }
        .dui-hero h1 { font-size: 2.4rem; color: #fff; margin-bottom: 12px; }
        .dui-hero p { font-size: 1.1rem; color: #fff; }

        .section-title { color: #1a3c6e; font-size: 1.8rem; margin: 30px 0 12px; }
        .content-card { background: #fff; border-radius: 8px; box-shadow: 0 5px 15px rgba(0,0,0,0.07); padding: 30px; margin: 20px 0; }
        .stat-list, .bullet-list { padding-left: 18px; }
        .bullet-list li { margin-bottom: 8px; }
        .fade-in-section { opacity: 0; transform: translateY(40px); transition: opacity 0.8s cubic-bezier(.77,0,.175,1), transform 0.8s cubic-bezier(.77,0,.175,1); }
        .fade-in-section.is-visible { opacity: 1; transform: none; }

        .cta-row { text-align: center; margin: 28px 0; }
        .btn { background: #8CBF4B; color: #fff; padding: 10px 22px; border-radius: 25px; border: none; font-weight: bold; text-decoration: none; display: inline-block; }
        .btn:hover { background: #1a3c6e; color: #fff; }
    </style>
</head>
<body>
<?php include_once('navbar.html'); ?>
<div id="main-content">
    <section class="dui-hero fade-in-section">
        <div class="container dui-hero-content">
            <h1>DUI 101: Championship Defense Fundamentals</h1>
            <p>Seattle Law Hawks PLLC — Smart strategy, fundamentals, and relentless preparation.</p>
            <div class="cta-row">
                <a href="#" class="btn" onclick="loadPage('contact', '#main-content'); return false;"><i class="fas fa-calendar-check"></i> Free Consultation</a>
                <a href="tel:2064531800" class="btn"><i class="fas fa-phone"></i> (206) 453-1800</a>
            </div>
        </div>
    </section>

    <section class="fade-in-section">
        <div class="container">
            <div class="content-card">
                <h2 class="section-title">Our Team. Your Defense.</h2>
                <p>We’re a DUI-focused law firm built around one core mission: Protect your rights, protect your record, and protect your future.</p>
                <p>From the opening whistle—the moment an officer flips on the lights—to the final buzzer—the closure of your case—we’re there every step of the way:</p>
                <ul class="bullet-list">
                    <li>Police contact and investigation</li>
                    <li>Washington State Department of Licensing (DOL) hearing</li>
                    <li>Arraignment and conditions of release</li>
                    <li>Negotiations and plea discussions</li>
                    <li>Suppression motions and pre-trial battles</li>
                    <li>Expert analysis of breath, blood, and field testing</li>
                    <li>Jury trials and post-conviction issues</li>
                </ul>
                <p>Every phase is a possession that matters. We don’t waste them.</p>
            </div>
        </div>
    </section>

    <section class="fade-in-section">
        <div class="container">
            <div class="content-card">
                <h2 class="section-title">Scott Lawrence: Your Trial Quarterback</h2>
                <p>Attorney Scott Lawrence isn’t just a lawyer who handles DUIs—he’s a trial attorney who has been fighting DUI cases for two decades.</p>
                <ul class="bullet-list">
                    <li>Law degree and criminal practice certificate from the University of Oregon School of Law</li>
                    <li>Hands-on DUI training through Oregon Law’s DUI defense clinic</li>
                    <li>Graduated with a fully developed DUI strategy playbook</li>
                </ul>
                <p>Scott trained with the same instructors who teach police in the NHTSA DUI Detection Course. He knows the Standardized Field Sobriety Tests like game film—how they’re supposed to be done, how they’re actually done, and where the mistakes show up.</p>
            </div>
        </div>
    </section>

    <section class="fade-in-section">
        <div class="container">
            <div class="content-card">
                <h2 class="section-title">Playing the Long Game: How Washington DUI Cases Work</h2>
                <ul class="bullet-list">
                    <li>The prosecution has up to two years to file most DUI charges.</li>
                    <li>Charges can appear months or nearly two years after the stop.</li>
                    <li>Blood-draw cases often wait 8–16 months for lab results.</li>
                </ul>
                <p>Most DUIs start as gross misdemeanors, but aggravating factors can elevate cases into felony territory where penalties and timelines change.</p>
            </div>
        </div>
    </section>

    <section class="fade-in-section">
        <div class="container">
            <div class="content-card">
                <h2 class="section-title">The First Battle: The DOL Hearing</h2>
                <p>If you blew over the legal limit or refused testing, you have 7 days from the incident to request a hearing. Miss it and your license is suspended by default.</p>
                <p>Smart defense uses the DOL hearing to:</p>
                <ul class="bullet-list">
                    <li>Fight to save your license</li>
                    <li>Lock in early testimony</li>
                    <li>Start testing the government’s evidence</li>
                    <li>Build the foundation for criminal defense</li>
                </ul>
            </div>
        </div>
    </section>

    <section class="fade-in-section">
        <div class="container">
            <div class="content-card">
                <h2 class="section-title">Conditions of Release</h2>
                <p>Once charges are filed, judges set conditions you must follow while the case is pending. These can include:</p>
                <ul class="bullet-list">
                    <li>Bail</li>
                    <li>Travel restrictions</li>
                    <li>No alcohol or non-prescribed drugs</li>
                    <li>Curfew or electronic monitoring</li>
                </ul>
                <p>With priors in the last 10 years, you may face ignition interlock, 24/7 sobriety monitoring, or a promise not to drive. We work to keep restrictions reasonable while we fight your case.</p>
            </div>
        </div>
    </section>

    <section class="fade-in-section">
        <div class="container">
            <div class="content-card">
                <h2 class="section-title">What “DUI” Means in Washington</h2>
                <ul class="bullet-list">
                    <li>Alcohol concentration of 0.08+ within two hours of driving</li>
                    <li>THC level of 5.00+ within two hours of driving</li>
                    <li>Being under the influence or affected by alcohol, any drug, or both</li>
                    <li>Actual physical control of a vehicle while impaired</li>
                </ul>
                <p>“Actual physical control” is broad. Parked or “sleeping it off” cases often turn on this issue—strategy and detail win here.</p>
            </div>
        </div>
    </section>

    <section class="fade-in-section">
        <div class="container">
            <div class="content-card">
                <h2 class="section-title">Penalties & Probation</h2>
                <p>Penalties escalate based on priors, level, refusal, and minors in the vehicle. You may face:</p>
                <ul class="bullet-list">
                    <li>Mandatory jail time</li>
                    <li>License suspensions (90 days to years)</li>
                    <li>Ignition interlock (1–10 years)</li>
                    <li>Habitual Traffic Offender status (7-year revocation)</li>
                    <li>Up to 364 days in jail and 5 years of probation</li>
                </ul>
                <p>Courts impose mandatory probation rules. Our job is to limit the damage, protect your record, and find paths to avoid the harshest outcomes.</p>
            </div>
        </div>
    </section>

    <section class="fade-in-section">
        <div class="container">
            <div class="content-card">
                <h2 class="section-title">The State’s Experts vs. Yours</h2>
                <p>The State brings officers, technicians, phlebotomists, and toxicologists. We build our own roster:</p>
                <ul class="bullet-list">
                    <li>Breath and blood testing science</li>
                    <li>Forensic toxicology</li>
                    <li>Accident reconstruction</li>
                    <li>Human performance and field sobriety testing</li>
                </ul>
                <p>We challenge evidence, expose weaknesses, and stay ahead of suppression and scientific issues.</p>
            </div>
        </div>
    </section>

    <section class="fade-in-section">
        <div class="container">
            <div class="content-card">
                <h2 class="section-title">Special Situations</h2>
                <ul class="bullet-list">
                    <li>Under 21: Lower thresholds, stricter standards</li>
                    <li>Passengers under 16: Enhanced penalties</li>
                    <li>Prior offenses: Can raise stakes into felony territory</li>
                </ul>
            </div>
        </div>
    </section>

    <section class="fade-in-section">
        <div class="container">
            <div class="content-card">
                <h2 class="section-title">Deferred Prosecution</h2>
                <p>For the right client, deferred prosecution involves intensive treatment and strict compliance and can reshape both legal and personal outcomes. We’ll walk you through whether it fits your situation.</p>
            </div>
        </div>
    </section>

    <section class="fade-in-section">
        <div class="container">
            <div class="content-card">
                <h2 class="section-title">Why Seattle Law Hawks?</h2>
                <ul class="bullet-list">
                    <li>Career DUI trial lawyer</li>
                    <li>Trained in DUI defense from day one</li>
                    <li>Member of leading DUI defense associations</li>
                </ul>
                <p>We build defense on current tactics—not yesterday’s game plan.</p>
                <div class="cta-row">
                    <a href="#" class="btn" onclick="loadPage('contact', '#main-content'); return false;"><i class="fas fa-envelope"></i> Contact Us</a>
                    <a href="tel:2064531800" class="btn"><i class="fas fa-phone"></i> Call (206) 453-1800</a>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="fade-in-section" style="background: linear-gradient(120deg, #8CBF4B 70%, #1a3c6e 100%); color:#1a3c6e; padding: 50px 0; text-align:center;">
        <div class="container">
            <h2 style="font-size:2rem; font-weight:900; margin-bottom:15px;">Game Time: Schedule Your Free Consultation Today</h2>
            <p style="font-size:1.1rem; max-width:900px; margin:0 auto 18px auto; color:#fff;">
                When you’re staring down a DUI charge in Seattle, you don’t get a do-over. The clock is running, and the State is already building its case. This is when you need a proven player in your corner. We scout the opponent, study the evidence, and bring a full playbook of science, strategy, and courtroom skill to the fight.
            </p>
            <div class="cta-row" style="margin-top:10px;">
                <a href="tel:2064531800" class="btn"><i class="fas fa-phone"></i> (206) 453-1800</a>
                <a href="#" class="btn" onclick="loadPage('contact', '#main-content'); return false;"><i class="fas fa-envelope"></i> Contact Us Online</a>
            </div>
        </div>
    </section>

</div>

<?php include_once('footer.html'); ?>

<script>
    function initStickyCtaBar() {
        if (typeof createStickyCtaBar === 'function') {
            createStickyCtaBar();
        }
        const stickyBar = document.querySelector('.sticky-cta-bar');
        const heroSection = document.querySelector('.dui-hero');
        function toggleStickyCta() {
            let triggerPoint = 0;
            if (heroSection) {
                triggerPoint = heroSection.getBoundingClientRect().bottom;
            }
            if (stickyBar) {
                if (triggerPoint < 0) {
                    stickyBar.classList.add('visible');
                } else {
                    stickyBar.classList.remove('visible');
                }
            }
        }
        window.addEventListener('scroll', toggleStickyCta);
        toggleStickyCta();
    }
    document.addEventListener('DOMContentLoaded', function() {
        const faders = document.querySelectorAll('.fade-in-section');
        const appearOptions = { threshold: 0.15, rootMargin: "0px 0px -20px 0px" };
        const appearOnScroll = new IntersectionObserver(function(entries, observer) {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('is-visible');
                    observer.unobserve(entry.target);
                }
            });
        }, appearOptions);
        faders.forEach(section => appearOnScroll.observe(section));
        initStickyCtaBar();
    });
</script>
<script src="script.js"></script>
</body>
</html>