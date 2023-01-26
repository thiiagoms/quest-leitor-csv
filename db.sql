CREATE DATABASE `questcsv`;

USE `questcsv`;

CREATE TABLE `users`(
    `id` int(11) PRIMARY KEY AUTO_INCREMENT,
    `name` varchar(250) NOT NULL,
    `email` varchar(250)
);