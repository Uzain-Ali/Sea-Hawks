<?php
require_once 'db.php';
require_once 'auth.php';

if (!is_logged_in()) {
    header('Location: login.php');
    exit;
}

$user_id = $_SESSION['user_id'];
$user_name = $_SESSION['user_name'] ?? 'User';

// Handle delete
if (isset($_GET['delete']) && is_numeric($_GET['delete'])) {
    $blog_id = intval($_GET['delete']);
    $check = $conn->prepare("SELECT id FROM blogs WHERE id=? AND user_id=?");
    $check->bind_param("ii", $blog_id, $user_id);
    $check->execute();
    $result = $check->get_result();
    if ($result->num_rows === 1) {
        $conn->query("DELETE FROM blogs WHERE id=$blog_id");
        header('Location: my-blogs.php');
        exit;
    }
}

// Fetch user's blogs
$stmt = $conn->prepare("SELECT b.*, c.name AS category FROM blogs b LEFT JOIN categories c ON b.category_id = c.id WHERE b.user_id=? ORDER BY b.id DESC");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$blogs = $stmt->get_result();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>My Blogs - Scott's Website</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body { color: #333; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background: #f8f9fa; margin: 0; }
        .container { max-width: 1000px; margin: 40px auto; background: #fff; padding: 40px; border-radius: 8px; box-shadow: 0 5px 15px rgba(0,0,0,0.07);}
        h2 { color: #1a3c6e; margin-bottom: 25px; }
        .blog-list { margin-top: 20px; }
        .blog-item { border-bottom: 1px solid #eee; padding: 18px 0; display: flex; align-items: flex-start; gap: 20px;}
        .blog-img { width: 120px; height: 90px; object-fit: cover; border-radius: 8px; background: #eee; }
        .blog-details { flex: 1; }
        .blog-title { font-size: 1.2rem; font-weight: bold; color: #1a3c6e; margin-bottom: 6px;}
        .blog-category { color: #8CBF4B; font-size: 0.95rem; margin-bottom: 8px;}
        .blog-actions a, .blog-actions form { display: inline-block; margin-right: 12px;}
        .edit-btn { background: #1a3c6e; color: #fff; padding: 6px 16px; border-radius: 18px; text-decoration: none; font-weight: bold; }
        .edit-btn:hover { background: #8CBF4B; color: #1a3c6e; }
        .delete-btn { background: #d9534f; color: #fff; border: none; border-radius: 18px; padding: 6px 16px; font-weight: bold; cursor: pointer;}
        .delete-btn:hover { background: #b52a24; }
        .no-blogs { color: #888; margin-top: 30px; text-align: center;}
        .user-nav { display: flex; align-items: center; gap: 18px; margin-bottom: 30px;}
        .user-nav .user { color: #fff; font-weight: bold; }
        .user-nav .fa-user { margin-right: 6px; }
        .logout-btn { background: #d9534f; color: #fff; border: none; border-radius: 20px; padding: 7px 18px; font-weight: bold; cursor: pointer; }
        .logout-btn:hover { background: #b52a24; }
        header { background-color: #1a3c6e; color: white; padding: 1px 0; }

        .header-top { display: flex; justify-content: space-between; align-items: center; }
        .logo { font-size: 28px; font-weight: bold; color: white; text-decoration: none; display: flex; align-items: center; }
        .logo img { height: 40px; margin-right: 10px; }
        .action-btns { display: flex; gap: 16px; margin-bottom: 30px; }
        .action-btn { background: #8CBF4B; color: #fff; padding: 8px 20px; border-radius: 25px; border: none; font-weight: bold; text-decoration: none; transition: background 0.3s; display: inline-block;}
        .action-btn:hover { background: #1a3c6e; color: #fff; }
        footer { background: #1a3c6e; color: #fff; padding: 30px 0 10px 0; margin-top: 60px;}
        .footer-bottom { text-align: center; font-size: 0.95rem; color: #fff; }
        .footer-bottom a { color: #8CBF4B; text-decoration: underline; }
    </style>
</head>
<body>
<header>
    <div class="container" style="background:none; box-shadow:none; padding:0;">
        <div class="header-top">
            <a href="index.html" class="logo">
                <img src="image/logoSM.png" alt="Seattle Law Hawks Logo">
            </a>
            <nav>
                <ul style="display:flex;list-style:none;margin:0;padding:0;gap:18px;">
                    <li><a href="my-blogs.php" style="color:white;text-decoration:none;">My Blogs</a></li>
                    <li><a href="create-blog.php" style="color:white;text-decoration:none;">Create Blog</a></li>
                    <li><a href="categories.php" style="color:white;text-decoration:none;">Create Category</a></li>
                </ul>
            </nav>
            <div class="user-nav">
                <span class="user"><i class="fa fa-user"></i><?= htmlspecialchars($user_name) ?></span>
                <form action="logout.php" method="post" style="display:inline;">
                    <button type="submit" class="logout-btn">Logout</button>
                </form>
            </div>
        </div>
    </div>
</header>
<div class="container">
    <div class="action-btns">
        <a href="create-blog.php" class="action-btn"><i class="fa fa-plus"></i> Create Blog</a>
        <a href="categories.php" class="action-btn"><i class="fa fa-folder-plus"></i> Create Category</a>
    </div>
    <h2>My Blog Posts</h2>
    <div class="blog-list">
        <?php if ($blogs->num_rows === 0): ?>
            <div class="no-blogs">You have not created any blogs yet.</div>
        <?php else: ?>
            <?php while ($blog = $blogs->fetch_assoc()): ?>
                <div class="blog-item">
                    <?php if ($blog['image_path']): ?>
                        <img src="<?= htmlspecialchars($blog['image_path']) ?>" class="blog-img" alt="Blog Image">
                    <?php else: ?>
                        <div class="blog-img"></div>
                    <?php endif; ?>
                    <div class="blog-details">
                        <div class="blog-title"><?= htmlspecialchars($blog['title']) ?></div>
                        <div class="blog-category"><?= htmlspecialchars($blog['category']) ?></div>
                        <div><?= nl2br(htmlspecialchars(substr($blog['content'], 0, 120))) ?>...</div>
                        <div class="blog-actions" style="margin-top:10px;">
                            <a href="create-blog.php?id=<?= $blog['id'] ?>" class="edit-btn"><i class="fa fa-edit"></i> Edit</a>
                            <form method="get" action="my-blogs.php" onsubmit="return confirm('Delete this blog?');" style="display:inline;">
                                <input type="hidden" name="delete" value="<?= $blog['id'] ?>">
                                <button type="submit" class="delete-btn"><i class="fa fa-trash"></i> Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        <?php endif; ?>
    </div>
</div>
<footer>
    <div class="footer-bottom">
        <p>&copy; 2023 Seahawk Law. All rights reserved.</p>
        <p><a href="#">Click Here to See Our Reviews and Ratings on the Definitive Legal Review Site, Avvo</a></p>
    </div>
</footer>
</body>