CREATE TABLE `author` (
  `id` varchar(255) PRIMARY KEY,
  `username` varchar(255),
  `password` varchar(255),
  `email` varchar(255)
);

CREATE TABLE `blog` (
  `id` varchar(255) PRIMARY KEY,
  `title` varchar(255),
  `content` text,
  `id_author` varchar(255),
  `created_at` timestamp,
  `updated_at` timestamp
);

CREATE TABLE `likes` (
  `id` varchar(255) PRIMARY KEY,
  `id_blog` varhchar(255),
  `id_author` varchar(255)
);

ALTER TABLE `blog` MODIFY COLUMN `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP;

ALTER TABLE `blog` ADD FOREIGN KEY (`id_author`) REFERENCES `author` (`id`);

ALTER TABLE `likes` ADD FOREIGN KEY (`id_blog`) REFERENCES `blog` (`id`);
