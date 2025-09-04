<?php
require_once 'db.php';
require_once 'auth.php';

$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $password = $_POST['password'];
    $confirm = $_POST['confirm'];

    if ($password !== $confirm) {
        $error = 'Passwords do not match.';
    } else {
        $exists = mysqli_query($conn, "SELECT id FROM users WHERE email='$email' LIMIT 1");
        if ($exists && mysqli_num_rows($exists) > 0) {
            $error = 'Email already registered.';
        } else {
            $hash = password_hash($password, PASSWORD_DEFAULT);
            $sql = "INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$hash')";
            if (mysqli_query($conn, $sql)) {
                header('Location: login.php');
                exit;
            } else {
                $error = 'Registration failed. Please try again.';
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register - Scott's Website</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
        <style>
        body {
            color: #333;
            line-height: 1.6;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
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
        /* Footer styles (reuse from index) */
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
    <style>
        body { background: #f8f9fa; }
        .form-container { max-width: 400px; margin: 60px auto; background: #fff; padding: 40px; border-radius: 8px; box-shadow: 0 5px 15px rgba(0,0,0,0.07);}
        .form-group { margin-bottom: 20px; }
        label { display: block; margin-bottom: 8px; color: #1a3c6e; }
        input { width: 100%; padding: 10px; border-radius: 5px; border: 1px solid #ccc; }
        .btn { background: #8CBF4B; color: #fff; padding: 10px 22px; border-radius: 25px; border: none; font-weight: bold; width: 100%; }
        .btn:hover { background: #1a3c6e; color: #fff; }
        .error { color: #d00; margin-bottom: 15px; }
        .link { display: block; margin-top: 18px; text-align: center; color: #1a3c6e; }
    </style>
</head>
<body>
<header>
    <div class="container">
        <div class="header-top">
            <a href="/" class="logo">
                <img src="image/logoSM.png" alt="Seattle Law Hawks Logo" style="height:60px; margin-right:10px;">
            </a>
            <a href="/contact.html" class="consult-btn" style="margin-left: 10px;">Free Consultation</a>
        </div>
    </div>
</header>
<div class="form-container">
    <h2 style="color:#1a3c6e; margin-bottom:25px;">Register</h2>
    <?php if ($error): ?><div class="error"><?= htmlspecialchars($error) ?></div><?php endif; ?>
    <form method="post">
        <div class="form-group">
            <label for="name">Full Name</label>
            <input type="text" name="name" id="name" required autofocus>
        </div>
        <div class="form-group">
            <label for="email">Email address</label>
            <input type="email" name="email" id="email" required>
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" id="password" required>
        </div>
        <div class="form-group">
            <label for="confirm">Confirm Password</label>
            <input type="password" name="confirm" id="confirm" required>
        </div>
        <button class="btn" type="submit">Register</button>
    </form>
    <a href="login.php" class="link">Already have an account? Login</a>
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
                    <li><a href="/about.html">About Us</a></li>
                    <li><a href="/contact.html">Contact</a></li>
                    <li><a href="/blog.php">Blog</a></li>
                    <li><a href="/dui.html">DUIs 101</a></li>
                    <li><a href="/contact.html">Free Consultation</a></li>
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