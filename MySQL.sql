CREATE DATABASE peereval CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

use peereval;

SET FOREIGN_KEY_CHECKS= 0;

CREATE TABLE IF NOT EXISTS user_main (
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
forms int(10) NOT NULL,
PRIMARY KEY (id),
UNIQUE KEY username (username),
UNIQUE KEY email (email),
FOREIGN KEY (forms) REFERENCES evaluation_form(id)
)ENGINE=InnoDB CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS student_main (
id bigint(20) NOT NULL AUTO_INCREMENT,
weltecId bigint(20) NOT NULL,
firstName varchar(20) NOT NULL,
lastName varchar(20) NOT NULL,
expiryAt datetime,
forms int(10) NOT NULL,
PRIMARY KEY (id),
UNIQUE KEY weltecId (weltecId),
FOREIGN KEY (forms) REFERENCES evaluation_form(id)
)ENGINE=InnoDB CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS student_evaluate (
id bigint(20) NOT NULL AUTO_INCREMENT,
form int(10) NOT NULL,
student int(10) NOT NULL,
registerAt datetime,
PRIMARY KEY (id)
)ENGINE=InnoDB CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS evaluation_form (
id bigint(20) NOT NULL AUTO_INCREMENT,
user int(10) NOT NULL,
courseName varchar(255) NOT NULL,
courseCode varchar(20) NOT NULL,
description varchar(255) NOT NULL,
createdAt datetime,
expiryAt datetime,
PRIMARY KEY (id),
)ENGINE=InnoDB CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS evaluation_question (
id bigint(20) NOT NULL AUTO_INCREMENT,
user int(10) NOT NULL,
form int(10) NOT NULL,
questions int(10) NOT NULL,
registerAt datetime,
PRIMARY KEY (id)
)ENGINE=InnoDB CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS question_main (
id bigint(20) NOT NULL AUTO_INCREMENT,
questionText text NOT NULL,
form int(10) NOT NULL,
PRIMARY KEY (id),
FOREIGN KEY (form) REFERENCES evaluation_form(id)
)ENGINE=InnoDB CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS evaluation_answer (
id bigint(20) NOT NULL AUTO_INCREMENT,
form int(10) NOT NULL,
students int(10) NOT NULL,
questions int(10) NOT NULL,
answers int(10) NOT NULL,
status smallint(1) NOT NULL DEFAULT 0,
formCode varchar(255) DEFAULT NULL,
feedback text,
attemptAt datetime,
PRIMARY KEY (id)
)ENGINE=InnoDB CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS answer_main (
id bigint(20) NOT NULL AUTO_INCREMENT,
answer smallint(5) NOT NULL,
form int(10) NOT NULL,
PRIMARY KEY (id),
FOREIGN KEY (form) REFERENCES evaluation_form(id)
)ENGINE=InnoDB CHARSET=utf8mb4;

SET FOREIGN_KEY_CHECKS= 1;
