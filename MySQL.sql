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

CREATE TABLE IF NOT EXISTS question_main (
id bigint(20) NOT NULL AUTO_INCREMENT,
text text NOT NULL,
PRIMARY KEY (id)
)ENGINE=InnoDB CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS evaluation_form (
id bigint(20) NOT NULL AUTO_INCREMENT,
evalQuestion bigint(20) NOT NULL,
PRIMARY KEY (id),
FOREIGN KEY (evalQuestion) REFERENCES evaluation_question(id)
)ENGINE=InnoDB CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS evaluation_question (
id bigint(20) NOT NULL AUTO_INCREMENT,
tutorId bigint(20) NOT NULL,
questId bigint(20) NOT NULL,
PRIMARY KEY (id),
FOREIGN KEY (tutorId) REFERENCES user_main(id),
FOREIGN KEY (questId) REFERENCES question_main(id)
)ENGINE=InnoDB CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS evaluation_answer (
id bigint(20) NOT NULL AUTO_INCREMENT,
weltecId bigint(20) NOT NULL,
evalId bigint(20) NOT NULL,
answer smallint(5) NOT NULL,
PRIMARY KEY (id),
FOREIGN KEY (weltecId) REFERENCES student_main(id),
FOREIGN KEY (evalId) REFERENCES evaluation_form(id)
)ENGINE=InnoDB CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS evaluation_review (
id bigint(20) NOT NULL AUTO_INCREMENT,
evalForm bigint(20) NOT NULL,
evalQuestion bigint(20) NOT NULL,
evalAnswer bigint(20) NOT NULL,
PRIMARY KEY (id),
FOREIGN KEY (evalForm) REFERENCES evaluation_form(id),
FOREIGN KEY (evalQuestion) REFERENCES evaluation_question(id),
FOREIGN KEY (evalAnswer) REFERENCES evaluation_answer (id)
)ENGINE=InnoDB CHARSET=utf8mb4;

SET FOREIGN_KEY_CHECKS= 1;
