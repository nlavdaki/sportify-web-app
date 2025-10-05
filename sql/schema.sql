-- make sure we're in the right DB
CREATE DATABASE IF NOT EXISTS sports_shop
  DEFAULT CHARACTER SET utf8mb4
  COLLATE utf8mb4_0900_ai_ci;
USE sports_shop;

-- create in the right order
SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- 1) users
CREATE TABLE IF NOT EXISTS users (
  id INT AUTO_INCREMENT PRIMARY KEY,
  fullname VARCHAR(120) NOT NULL,
  email VARCHAR(160) NOT NULL UNIQUE,
  password_hash VARCHAR(255) NOT NULL,
  fav_sport VARCHAR(60),
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- 2) products
CREATE TABLE IF NOT EXISTS products (
  id INT AUTO_INCREMENT PRIMARY KEY,
  slug VARCHAR(80) NOT NULL UNIQUE,
  name VARCHAR(160) NOT NULL,
  price DECIMAL(10,2) NOT NULL,
  img VARCHAR(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- 3) favorites (FKs to users, products)
DROP TABLE IF EXISTS favorites;  -- in case a failed/partial attempt exists
CREATE TABLE favorites (
  user_id INT NOT NULL,
  product_id INT NOT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (user_id, product_id),
  CONSTRAINT fk_fav_user FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,
  CONSTRAINT fk_fav_prod FOREIGN KEY (product_id) REFERENCES products(id) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

SET FOREIGN_KEY_CHECKS = 1;

-- Seed with your actual image filenames in /public/img/
INSERT INTO products(slug,name,price,img) VALUES
('running-shoes-x','Running Shoes X',79.90,'assets/img/demo_shoes.jpg'),
('basketball-pro','Basketball Pro',29.90,'assets/img/demo_ball.jpg'),
('tennis-racket-s','Tennis Racket S',119.00,'assets/img/demo_racket.jpg'),
('sports-watch','Sports Watch',149.00,'assets/img/demo_watch.jpg')
ON DUPLICATE KEY UPDATE name=VALUES(name), price=VALUES(price), img=VALUES(img);

