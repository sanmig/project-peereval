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
PRIMARY KEY (id),
UNIQUE KEY username (username),
UNIQUE KEY email (email)
)ENGINE=InnoDB CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS student_main (
id bigint(20) NOT NULL AUTO_INCREMENT,
weltecId bigint(20) NOT NULL,
firstName varchar(20) NOT NULL,
lastName varchar(20) NOT NULL,
expiryAt datetime, 
PRIMARY KEY (id),
UNIQUE KEY weltecId (weltecId)
)ENGINE=InnoDB CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS student_evaluate (
id bigint(20) NOT NULL AUTO_INCREMENT,
student bigint(20) NOT NULL,
form bigint(20) NOT NULL,
registerAt datetime,
PRIMARY KEY (id),
FOREIGN KEY (student) REFERENCES student_main(id),
FOREIGN KEY (form) REFERENCES evaluation_form(id)
)ENGINE=InnoDB CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS evaluation_form (
id bigint(20) NOT NULL AUTO_INCREMENT,
user bigint(20) NOT NULL,
courseName varchar(255) NOT NULL,
courseCode varchar(20) NOT NULL,
description varchar(255) NOT NULL,
createdAt datetime,
expiryAt datetime,
PRIMARY KEY (id),
FOREIGN KEY (user) REFERENCES user_main(id)
)ENGINE=InnoDB CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS evaluation_question (
id bigint(20) NOT NULL AUTO_INCREMENT,
user bigint(20) NOT NULL,
form bigint(20) NOT NULL,
question bigint(20) NOT NULL,
registerAt datetime,
PRIMARY KEY (id),
FOREIGN KEY (user) REFERENCES user_main(id),
FOREIGN KEY (form) REFERENCES evaluation_form(id),
FOREIGN KEY (question) REFERENCES question_main(id)
)ENGINE=InnoDB CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS question_main (
id bigint(20) NOT NULL AUTO_INCREMENT,
question text NOT NULL,
PRIMARY KEY (id)
)ENGINE=InnoDB CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS evaluation_answer (
id bigint(20) NOT NULL AUTO_INCREMENT,
form bigint(20) NOT NULL,
student bigint(20) NOT NULL,
question bigint(20) NOT NULL,
answer bigint(20) NOT NULL,
status smallint(1) NOT NULL DEFAULT 0,
formCode varchar(255) DEFAULT NULL,
feedback text,
attemptAt datetime,
PRIMARY KEY (id),
FOREIGN KEY (form) REFERENCES evaluation_form(id),
FOREIGN KEY (student) REFERENCES student_main (id),
FOREIGN KEY (question) REFERENCES question_main(id),
FOREIGN KEY (answer) REFERENCES answer_main(id)
)ENGINE=InnoDB CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS answer_main (
id bigint(20) NOT NULL AUTO_INCREMENT,
answer smallint(5) NOT NULL,
PRIMARY KEY (id)
)ENGINE=InnoDB CHARSET=utf8mb4;

SET FOREIGN_KEY_CHECKS= 1;
