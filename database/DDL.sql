-- Creates a database named mwdw2
CREATE DATABASE miniprojectsocial;

-- Selects the database
USE miniprojectsocial;

-- Create users table
CREATE TABLE users (
user_id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
user_name VARCHAR(20) NOT NULL,
user_username VARCHAR(20),
user_email VARCHAR(255) NOT NULL,
user_password VARCHAR(255) NOT NULL,
user_gender CHAR(1) NOT NULL,
user_birthdate DATE NOT NULL,
user_about TEXT
);

-- Create friendship table
CREATE TABLE friendship (
user1_id INT NOT NULL,
user2_id INT NOT NULL,
friendship_status INT NOT NULL,
FOREIGN KEY (user1_id) REFERENCES users(user_id),
FOREIGN KEY (user2_id) REFERENCES users(user_id)
);

-- Create posts table
CREATE TABLE posts (
post_id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
post_caption TEXT NOT NULL,
post_time TIMESTAMP NOT NULL, 
post_public CHAR(1) NOT NULL,
post_by INT NOT NULL,
FOREIGN KEY (post_by) REFERENCES users(user_id)
);