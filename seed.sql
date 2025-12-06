USE `scott_blog`;

-- Seed categories
INSERT INTO `categories` (`name`) VALUES
  ('DUI'),
  ('Marijuana'),
  ('Seattle DUI Lawyer')
ON DUPLICATE KEY UPDATE `name`=VALUES(`name`);

-- Seed admin user (replace hash as needed)
INSERT INTO `users` (`name`, `email`, `password_hash`, `role`)
VALUES ('Admin', 'admin@example.com', '$2y$10$abcdefghijklmnopqrstuv/1234567890abcdefghiJK', 'admin')
ON DUPLICATE KEY UPDATE `name`=VALUES(`name`), `role`=VALUES(`role`);

-- Sample blog linked to admin and a category
SET @user_id = (SELECT id FROM users WHERE email='admin@example.com' LIMIT 1);
SET @cat_id = (SELECT id FROM categories WHERE name='DUI' LIMIT 1);
INSERT INTO `blogs` (`user_id`, `category_id`, `title`, `content`, `image_path`)
VALUES (@user_id, @cat_id, 'Welcome Post', 'Hello world!', NULL);
