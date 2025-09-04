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
        header {
            background-color: #1a3c6e;
            color: white;
            padding: 15px 0;
        }
        .header-top {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .logo {
            font-size: 28px;
            font-weight: bold;
            color: white;
            text-decoration: none;
            display: flex;
            align-items: center;
        }
        .logo img {
            height: 60px;
            margin-right: 10px;
        }
        nav ul {
            display: flex;
            list-style: none;
            margin: 0;
            padding: 0;
        }
        nav ul li {
            margin-left: 25px;
        }
        nav ul li a {
            color: white;
            text-decoration: none;
            font-weight: 500;
            transition: color 0.3s;
        }
        nav ul li a:hover {
            color: #8CBF4B;
        }
        .consult-btn {
            background-color: #8CBF4B;
            color: white !important;
            padding: 8px 20px;
            border-radius: 25px;
            font-weight: bold;
            text-decoration: none;
            transition: background 0.3s;
            border: none;
            display: inline-block;
        }
        .consult-btn:hover {
            background-color: #8CBF4B;
            color: #1a3c6e !important;
        }
        .blog-layout {
            display: flex;
            gap: 40px;
        }
        .main-content {
            flex: 3;
            background: #fff;
            border-radius: 8px;
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
            background: #f8f9fa;
            padding: 20px;
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
        /* Footer styles */
        footer {
            background-color: #0f2447;
            color: white;
            padding: 60px 0 30px;
        }
        .footer-content {
            display: flex;
            flex-wrap: wrap;
            gap: 40px;
            margin-bottom: 40px;
        }
        .footer-column {
            flex: 1;
            min-width: 250px;
        }
        .footer-column h3 {
            margin-bottom: 20px;
            color: #8CBF4B;
        }
        .footer-column ul {
            list-style: none;
            padding: 0;
        }
        .footer-column ul li {
            margin-bottom: 10px;
        }
        .footer-column ul li a {
            color: white;
            text-decoration: none;
            transition: color 0.3s;
        }
        .footer-column ul li a:hover {
            color: #8CBF4B;
        }
        .footer-bottom {
            text-align: center;
            padding-top: 30px;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
        }
    </style>
</head>
<body>
    <!-- Header -->
    <header>
        <div class="container">
            <div class="header-top">
                <a href="index.html" class="logo">
                    <img src="image/logoSM.png" alt="Seattle Law Hawks Logo">
                </a>
                <nav style="flex: 1; display: flex; justify-content: center;">
                    <ul>
                        <li><a href="index.html">Home</a></li>
                        <li><a href="about.html">About</a></li>
                        <li><a href="contact.html">Contact</a></li>
                        <li><a href="blog.php">Blog</a></li>
                        <li><a href="dui.html">DUIs 101</a></li>
                    </ul>
                </nav>
                <a href="contact.html" class="consult-btn" style="margin-left: 10px;">Free Consultation</a>
            </div>
        </div>
    </header>
    <div class="container blog-layout">
        <div class="main-content">
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
    <footer>
        <div class="container">
            <div class="footer-content">
                <div class="footer-column">
                    <img src="image/logoSM.png" alt="Seattle Law Hawks Logo" style="height:75px; width: 110px; margin-bottom:15px;">
                    <h3>Seahawk Law</h3>
                    <p>Dedicated DUI defense serving Seattle and surrounding areas. Trusted experience you can rely on.</p>
                </div>
                <div class="footer-column">
                    <h3>Quick Links</h3>
                    <ul>
                        <li><a href="about.html">About Us</a></li>
                        <li><a href="contact.html">Contact</a></li>
                        <li><a href="blog.php">Blog</a></li>
                        <li><a href="dui.html">DUIs 101</a></li>
                        <li><a href="contact.html">Free Consultation</a></li>
                    </ul>
                </div>
                <div class="footer-column">
                    <h3>Contact Us</h3>
                    <p>123 Legal Avenue, Suite 100<br>Seattle, WA 98101</p>
                    <p>Phone: (206) 555-0123</p>
                    <p>Email: info@seahawklaw.com</p>
                </div>
            </div>
            <div class="footer-bottom">
                <p>&copy; 2023 Seahawk Law. All rights reserved.</p>
                <p><a href="#" style="color: #8CBF4B;">Click Here to See Our Reviews and Ratings on the Definitive Legal Review Site, Avvo</a></p>
            </div>
        </div>
    </footer>
</body>
</html>