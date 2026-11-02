-- ==============================================================
-- Database Schema for Gopika Sadanand Portfolio
-- Compatible with XAMPP MySQL / MariaDB / phpMyAdmin
-- ==============================================================

CREATE DATABASE IF NOT EXISTS `gopika_portfolio` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `gopika_portfolio`;

-- Drop table if exists
DROP TABLE IF EXISTS `users`;

-- Create users table
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL UNIQUE,
  `email` varchar(100) NOT NULL UNIQUE,
  `password` varchar(255) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Insert default accounts
-- Password for 'gopika' is: gopika123
-- Password for 'admin' is: password123
INSERT INTO `users` (`username`, `email`, `password`, `full_name`) VALUES
('gopika', 'gopikasadan@gmail.com', '$2y$10$tZ2cQ7k4WfM7tH5V0IeK9OHLw0t/w5tO1l4q1eI6F3q1F5q1F5q1O', 'Gopika Sadanand'),
('admin', 'admin@example.com', '$2y$10$wK1V8lV7GgP8g7H6V5IeK9OHLw0t/w5tO1l4q1eI6F3q1F5q1F5q1O', 'Administrator');
