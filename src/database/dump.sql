CREATE TABLE `users`(
    `user_id` INT UNSIGNED PRIMARY KEY NOT NULL AUTO_INCREMENT,
    `password` TEXT NOT NULL,
    `identifiant` TEXT NOT NULL
    `admin` TINYINT(1) NOT NULL DEFAULT '0'
);
ALTER TABLE
    `users` ADD PRIMARY KEY `users_user_id_primary`(`user_id`);
    
CREATE TABLE `articles`(
    `articles_id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
    `title` TEXT NOT NULL,
    `body` TEXT NOT NULL,
    `user_id` INT NOT NULL
);

ALTER TABLE
    `posts` ADD CONSTRAINT `posts_user_id_foreign` FOREIGN KEY(`user_id`) REFERENCES `users`(`user_id`);
