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
forms bigint(20) NOT NULL,
students bigint(20) NOT NULL,
registerAt datetime,
PRIMARY KEY (id),
FOREIGN KEY (forms) REFERENCES evaluation_form(id),
FOREIGN KEY (students) REFERENCES student_main(id)
)ENGINE=InnoDB CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS evaluation_form (
id bigint(20) NOT NULL AUTO_INCREMENT,
users bigint(20) NOT NULL,
courseName varchar(255) NOT NULL,
courseCode varchar(20) NOT NULL,
description varchar(255) NOT NULL,
createdAt datetime,
expiryAt datetime,
PRIMARY KEY (id),
FOREIGN KEY (users) REFERENCES user_main(id)
)ENGINE=InnoDB CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS evaluation_question (
id bigint(20) NOT NULL AUTO_INCREMENT,
users bigint(20) NOT NULL,
forms bigint(20) NOT NULL,
questions bigint(20) NOT NULL,
registerAt datetime,
PRIMARY KEY (id),
FOREIGN KEY (users) REFERENCES user_main(id),
FOREIGN KEY (forms) REFERENCES evaluation_form(id),
FOREIGN KEY (questions) REFERENCES question_main(id)
)ENGINE=InnoDB CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS question_main (
id bigint(20) NOT NULL AUTO_INCREMENT,
questionText text NOT NULL,
PRIMARY KEY (id)
)ENGINE=InnoDB CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS evaluation_answer (
id bigint(20) NOT NULL AUTO_INCREMENT,
forms bigint(20) NOT NULL,
students bigint(20) NOT NULL,
questions bigint(20) NOT NULL,
answers bigint(20) NOT NULL,
status smallint(1) NOT NULL DEFAULT 0,
formCode varchar(255) DEFAULT NULL,
feedback text,
attemptAt datetime,
PRIMARY KEY (id),
FOREIGN KEY (forms) REFERENCES evaluation_form(id),
FOREIGN KEY (students) REFERENCES student_main (id),
FOREIGN KEY (questions) REFERENCES question_main(id),
FOREIGN KEY (answers) REFERENCES answer_main(id)
)ENGINE=InnoDB CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS answer_main (
id bigint(20) NOT NULL AUTO_INCREMENT,
answer smallint(5) NOT NULL,
PRIMARY KEY (id)
)ENGINE=InnoDB CHARSET=utf8mb4;

SET FOREIGN_KEY_CHECKS= 1;
