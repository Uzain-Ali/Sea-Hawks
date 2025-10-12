<?php
require_once 'db.php';
require_once 'auth.php';

$id = isset($_GET['id']) ? intval($_GET['id']) : 0;
$blog = null;
if ($id) {
    $stmt = $conn->prepare("SELECT b.*, u.name as author, c.name as category FROM blogs b 
        LEFT JOIN users u ON b.user_id = u.id 
        LEFT JOIN categories c ON b.category_id = c.id 
        WHERE b.id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $blog = $result->fetch_assoc();
}

// Latest blog widget
$latestBlog = null;
$latestResult = mysqli_query($conn, "SELECT * FROM blogs ORDER BY created_at DESC LIMIT 1");
if ($latestResult && mysqli_num_rows($latestResult) > 0) {
    $latestBlog = mysqli_fetch_assoc($latestResult);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?= $blog ? htmlspecialchars($blog['title']) : 'Blog Not Found' ?> - Scott's Website</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
            <link rel="stylesheet" href="style.css">

    <style>
        body {
            color: #333;
            line-height: 1.6;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            background: #f8f9fa;
        }
        .container {
            width: 100%;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }
        .blog-layout {
            display: flex;
            gap: 40px;
        }
        .main-content {
            flex: 3;
            background: linear-gradient(120deg, #fff 60%, #1a3c6e 100%);            border-radius: 8px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.07);
            padding: 40px;
            margin: 40px 0;
        }
        .sidebar {
            flex: 1;
            margin: 40px 0;
        }
        .blog-title {
            font-size: 2rem;
            color: #1a3c6e;
            margin-bottom: 10px;
        }
        .blog-meta {
            font-size: 1rem;
            color: #888;
            margin-bottom: 15px;
        }
        .blog-image {
            max-width: 100%;
            max-height: 320px;
            border-radius: 8px;
            margin-bottom: 20px;
            object-fit: cover;
        }
        .latest-widget {
            background: linear-gradient(90deg, #8CBF4B 0%, #fff 100%);            padding: 20px;
            border-radius: 8px;
            margin-bottom: 30px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.07);
        }
        .latest-widget .blog-title {
            font-size: 1.1rem;
            margin-bottom: 8px;
        }
        .btn {
            background: #8CBF4B;
            color: #fff;
            padding: 8px 18px;
            border-radius: 25px;
            text-decoration: none;
            font-weight: bold;
            display: inline-block;
            margin-top: 10px;
        }
        .btn:hover {
            background: #1a3c6e;
            color: #fff;
        }
        @media (max-width: 900px) {
            .blog-layout, .container {
                flex-direction: column;
                gap: 0;
            }
            .main-content, .sidebar {
                margin: 20px 0;
                padding: 20px;
            }
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
    </style>
</head>
<body>

<header style="background: linear-gradient(90deg, #FFC72C -50%, #1a3c6e 100%);">
  <div class="container header-top">
    <a href="index.php" class="logo">
      <img src="image/logo.png" alt="Seattle Law Hawks Logo" style="height:60px;">
    </a>
    <nav id="main-nav">
      <ul>
        <li><a href="index.php">Home</a></li>
        <li><a href="seattle-dui-lawyer.php">DUI Defense</a></li>
        <li class="dropdown">
          <a href="#">Services</a>
          <ul class="dropdown-menu" style="background: linear-gradient(90deg, #FFC72C -50%, #1a3c6e 100%);">
            <li><a href="marijuana-dui.php">Marijuana DUIs</a></li>
          </ul>
        </li>
        <li><a href="about.php">About</a></li>
        <li><a href="contact.php">Contact</a></li>
        <li><a href="blog.php">Blog</a></li>
      </ul>
    </nav>
    <a href="contact.php" class="consult-btn btn">Free Consultation</a>
    <button class="nav-toggle" id="nav-toggle" aria-label="Open menu">
      <i class="fas fa-bars"></i>
    </button>
  </div>
</header>
<!-- Navbar End -->
    <div class="container blog-layout fade-in-section" style="margin-top:50px;">
        <div id="main-content" class="main-content">
            <?php if ($blog): ?>
                <div class="blog-title"><?= htmlspecialchars($blog['title']) ?></div>
                <div class="blog-meta">
                    Category: <?= htmlspecialchars($blog['category']) ?> |
                    By <?= htmlspecialchars($blog['author']) ?> |
                    <?= date('F j, Y', strtotime($blog['created_at'])) ?>
                </div>
                <?php if (!empty($blog['image_path'])): ?>
                    <img src="<?= htmlspecialchars($blog['image_path']) ?>" class="blog-image" alt="Blog Image">
                <?php endif; ?>
                <div class="blog-content"><?= nl2br(htmlspecialchars($blog['content'])) ?></div>
            <?php else: ?>
                <p>Blog post not found.</p>
            <?php endif; ?>
        </div>
        <div class="sidebar">
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
<!-- Footer Start -->
<footer style="background: linear-gradient(90deg, #FFC72C -50%, #1a3c6e 100%);">
  <div class="container footer-content">
    <div class="footer-column">
      <img src="image/logo.png" alt="Seattle Law Hawks Logo" style="height:75px; width: 110px; margin-bottom:15px;">
      <h3>Seattle Law Hawks</h3>
      <p>Dedicated DUI defense serving Seattle and surrounding areas. Trusted experience you can rely on.</p>
    </div>
    <div class="footer-column quick-links-column">
      <h2 style="margin-bottom: 18px;">Quick Links</h2>
      <ul class="quick-links-list">
        <li><a href="about.php">About Us</a></li>
        <li><a href="contact.php">Contact</a></li>
        <li><a href="blog.php">Blog</a></li>
        <li><a href="contact.php">Free Consultation</a></li>
      </ul>
    </div>
    <div class="footer-column">
      <h2>Contact Us</h2>   
      <p>123 Legal Avenue, Suite 100<br>Seattle, WA 98101</p>
      <p>Phone: (206) 453-1800</p>
      <p>Email: info@seahawklaw.com</p>
    </div>
  </div>
  <div class="footer-bottom">
    <p>&copy; 2023 Seattle Law Hawks. All rights reserved.</p>
  </div>
</footer>
<!-- Footer End -->
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