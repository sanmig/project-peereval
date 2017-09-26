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
form_id int(10) NOT NULL,
weltecId bigint(20) NOT NULL,
fullName varchar(255) NOT NULL,
registerAt datetime,
expiryAt datetime,
PRIMARY KEY (id),
UNIQUE KEY weltecId (weltecId),
FOREIGN KEY (form_id) REFERENCES form_answer(id)
)ENGINE=InnoDB CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS evaluation_form (
id bigint(20) NOT NULL AUTO_INCREMENT,
user_id int(10) NOT NULL,
courseName varchar(255) NOT NULL,
code varchar(255) DEFAULT NULL,
addedAt datetime,
expiryAt datetime,
PRIMARY KEY (id),
FOREIGN KEY (user_id) REFERENCES user(id)
)ENGINE=InnoDB CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS question (
id bigint(20) NOT NULL AUTO_INCREMENT,
form_id int(10) NOT NULL,
questionText text NOT NULL,
PRIMARY KEY (id),
FOREIGN KEY (form_id) REFERENCES evaluation_form(id)
)ENGINE=InnoDB CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS form_answer (
id bigint(20) NOT NULL AUTO_INCREMENT,
form_id int(10) NOT NULL,
PRIMARY KEY (id),
FOREIGN KEY (form_id) REFERENCES evaluation_form(id)
)ENGINE=InnoDB CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS answer (
id bigint(20) NOT NULL AUTO_INCREMENT,
form_id int(10) NOT NULL,
answer smallint(5) NOT NULL,
PRIMARY KEY (id),
FOREIGN KEY (form_id) REFERENCES form_answer(id)
)ENGINE=InnoDB CHARSET=utf8mb4;

SET FOREIGN_KEY_CHECKS= 1;
