<?php
require_once 'db.php';
require_once 'auth.php';

// Fetch categories
$categories = [];
$catResult = mysqli_query($conn, "SELECT * FROM categories");
while ($row = mysqli_fetch_assoc($catResult)) {
    $categories[] = $row;
}

// Fetch latest blog post
$latestBlog = null;
$latestResult = mysqli_query($conn, "SELECT * FROM blogs ORDER BY created_at DESC LIMIT 1");
if ($latestResult && mysqli_num_rows($latestResult) > 0) {
    $latestBlog = mysqli_fetch_assoc($latestResult);
}

// Fetch all blogs
$blogs = [];
$blogResult = mysqli_query($conn, "SELECT b.*, c.name as category FROM blogs b LEFT JOIN categories c ON b.category_id = c.id ORDER BY b.created_at DESC");
while ($row = mysqli_fetch_assoc($blogResult)) {
    $blogs[] = $row;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Scott's Website - Blog</title>
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
        .contact-hero {
            background: linear-gradient(rgba(26, 60, 110, 0.8), rgba(26, 60, 110, 0.8)), url('/city-seattle-with-text.jpg') no-repeat center center/cover;
            color: white;
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
            background: #f8f9fa;
            padding: 60px 0;
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
    </style>
    <style>
        /* ...existing styles... */
        .main-content { flex: 3; }
        .sidebar { flex: 1; margin: 40px 0; }
        .blog-image { max-width: 100%; border-radius: 8px; margin-bottom: 15px; }
        .blog-list {
            margin: 40px 0;
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 30px;
        }
        @media (max-width: 900px) {
            .blog-list {
                grid-template-columns: 1fr;
            }
        }
        .blog-post {
            background: linear-gradient(120deg, #fff 60%, #1a3c6e 100%);
            border-radius: 8px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.07);
            margin-bottom: 0;
            padding: 18px 18px 16px 18px;
            display: flex;
            flex-direction: column;
            /* height: 100%;  Remove this line */
            min-height: 0;
        }
        .blog-title { font-size: 1.15rem; color: #1a3c6e; margin-bottom: 7px; }
        .blog-meta { font-size: 0.93rem; color: #888; margin-bottom: 10px; }
        .blog-content { margin-bottom: 8px; font-size: 0.98rem; line-height: 1.5; }
        .blog-hero {
    background: linear-gradient(120deg, rgba(26,60,110,0.7) 70%, rgba(0,34,68,0.7) 100%), url('city-seattle-with-text.jpg') no-repeat center center/cover;
    color: #8CBF4B;
    padding: 80px 0 50px 0;
    text-align: center;
    position: relative;
}
.blog-hero-content {
    display: inline-block;
    padding: 40px 30px;
    border-radius: 18px;
    box-shadow: 0 4px 24px rgba(0,0,0,0.18);
}
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
        .category-list { margin-bottom: 30px; }
        .category-item { display: inline-block; background: #8CBF4B; color: #fff; padding: 6px 18px; border-radius: 25px; margin-right: 10px; margin-bottom: 8px; text-decoration: none; }
        .latest-widget { background: linear-gradient(90deg, #8CBF4B 0%, #fff 100%); padding: 20px; border-radius: 8px; margin-bottom: 30px; box-shadow: 0 5px 15px rgba(0,0,0,0.07);}
        .latest-widget .blog-title { font-size: 1.1rem; margin-bottom: 8px; }
        .btn { background: #8CBF4B; color: #fff; padding: 8px 18px; border-radius: 25px; text-decoration: none; font-weight: bold; display: inline-block; margin-top: 10px;}
        .btn:hover { background: #1a3c6e; color: #fff; }
        .blog-layout { display: flex; gap: 40px; }
        @media (max-width: 900px) {
            .blog-layout { flex-direction: column; gap: 0; }
            .main-content, .sidebar { margin: 20px 0; padding: 0; }
        }
    </style>
</head>
<body>

<?php
    include_once('navbar.html');
?>
     <div id="main-content">

    <section class="blog-hero fade-in-section">
    <div class="container blog-hero-content">
        <h1><i class="fas fa-newspaper"></i> Seattle Law Hawks Blog</h1>
        <p style="font-size:1.25rem; color:#fff; margin-bottom:18px;">
            Insights, strategies, and updates from Seattle’s leading DUI defense team.<br>
            Stay informed. Stay prepared. Play to win.
        </p>
        <p style="font-size:1.1rem; color:#8CBF4B;">
            <i class="fa fa-phone"></i> <strong>(206) 453-1800</strong> &nbsp; | &nbsp; 
            <i class="fa fa-envelope"></i> info@seahawklaw.com
        </p>
    </div>
</section>
<div class="container blog-layout fade-in-section">
    <div class="main-content">
        <h1 style="margin-top:40px; color:#1a3c6e;">Scott's Blog</h1>
        <!-- Categories -->
        <div class="category-list">
            <?php foreach ($categories as $cat): ?>
                <a href="?category=<?= $cat['id'] ?>" class="category-item"><?= htmlspecialchars($cat['name']) ?></a>
            <?php endforeach; ?>
        </div>
        <!-- Blog List -->
        <div class="blog-list">
            <?php foreach ($blogs as $blog): ?>
                <div class="blog-post">
                    <?php if (!empty($blog['image_path'])): ?>
                        <img src="<?= htmlspecialchars($blog['image_path']) ?>" class="blog-image" alt="Blog Image">
                    <?php endif; ?>
                    <div class="blog-title"><?= htmlspecialchars($blog['title']) ?></div>
                    <div class="blog-meta">
                        Category: <?= htmlspecialchars($blog['category']) ?> |
                        <?= date('F j, Y', strtotime($blog['created_at'])) ?>
                    </div>
                    <div class="blog-content"><?= nl2br(htmlspecialchars(substr($blog['content'],0,100))) ?>...</div>
                    <a href="view-blog.php?id=<?= $blog['id'] ?>" class="btn">Read More</a>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
    <div class="sidebar fade-in-section">
        <?php if ($latestBlog): ?>
        <div class="latest-widget">
            <h3>Latest Blog Post</h3>
            <div class="blog-title"><?= htmlspecialchars($latestBlog['title']) ?></div>
            <div class="blog-meta">
                <?= date('F j, Y', strtotime($latestBlog['created_at'])) ?>
            </div>
            <div class="blog-content"><?= nl2br(htmlspecialchars(substr($latestBlog['content'],0,120))) ?>...</div>
            <a href="view-blog.php?id=<?= $latestBlog['id'] ?>" class="btn">Read More</a>
        </div>
        <?php endif; ?>
    </div>
</div>

<!-- Footer (copy from index.html) -->
<?php
    include_once('footer.html');
?>   
        </div>
</body>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Sticky CTA Bar
            const stickyBar = document.createElement('div');
            stickyBar.className = 'sticky-cta-bar';
            stickyBar.innerHTML = `<a href="tel:2064531800" class="btn"><i class="fas fa-phone"></i> Call (206) 453-1800 Now</a>`;
            document.body.appendChild(stickyBar);

            const heroSection = document.querySelector('.hero, .about-hero, .contact-hero, .blog-hero');
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
    // loadPage('blog', '#main-content');
    </script>
</html>