CREATE DATABASE peereval CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

use peereval;

SET FOREIGN_KEY_CHECKS= 0;

CREATE TABLE IF NOT EXISTS user (
id bigint(20) NOT NULL AUTO_INCREMENT,
username varchar(20) NOT NULL,
password varchar(60) NOT NULL,
email varchar(255) NOT NULL,
firstName varchar(20) NOT NULL,
lastName varchar(20) NOT NULL,
role enum( 'ROLE_USER' , 'ROLE_ADMIN' ) NOT NULL,
isVerified smallint(1) NOT NULL DEFAULT 0,
verifyCode varchar(255) DEFAULT NULL,
registerAt datetime,
PRIMARY KEY (id),
UNIQUE KEY username (username),
UNIQUE KEY email (email)
)ENGINE=InnoDB CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS student (
id bigint(20) NOT NULL AUTO_INCREMENT,
weltecId bigint(20) NOT NULL,
fullName varchar(255) NOT NULL,
registerAt datetime,
expiryAt datetime,
PRIMARY KEY (id)
)ENGINE=InnoDB CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS form (
id bigint(20) NOT NULL AUTO_INCREMENT,
user bigint(20) NOT NULL,
formName varchar(255) NOT NULL,
courseCode varchar(25) NOT NULL,
uniqueCode varchar(255) DEFAULT NULL,
token varchar(255) DEFAULT NULL,
addedAt datetime,
expiryAt datetime,
PRIMARY KEY (id),
FOREIGN KEY (user) REFERENCES user(id)
)ENGINE=InnoDB CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS question (
id bigint(20) NOT NULL AUTO_INCREMENT,
form bigint(20) NOT NULL,
questionText text NOT NULL,
PRIMARY KEY (id),
FOREIGN KEY (form) REFERENCES form(id)
)ENGINE=InnoDB CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS evaluation_form (
id bigint(20) NOT NULL AUTO_INCREMENT,
form bigint(20) NOT NULL,
student bigint(20) NOT NULL,
status smallint(1) NOT NULL DEFAULT 0,
attemptAt datetime,
PRIMARY KEY (id),
FOREIGN KEY (form) REFERENCES form(id),
FOREIGN KEY (student) REFERENCES student(id)
)ENGINE=InnoDB CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS answer (
id bigint(20) NOT NULL AUTO_INCREMENT,
form bigint(20) NOT NULL,
answer smallint(5) NOT NULL,
PRIMARY KEY (id),
FOREIGN KEY (form) REFERENCES evaluation_form(id)
)ENGINE=InnoDB CHARSET=utf8mb4;

SET FOREIGN_KEY_CHECKS= 1;
