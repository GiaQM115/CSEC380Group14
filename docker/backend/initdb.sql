DROP DATABASE IF EXISTS brickflix;
CREATE DATABASE brickflix;
USE brickflix;

CREATE TABLE account (
    login_id varchar(16) NOT NULL,
    pass_hash  char(64) NOT NULL,
    email varchar(64),
    CONSTRAINT pk_id PRIMARY KEY (login_id)
) DEFAULT CHARSET=utf8;

CREATE TABLE video (
    login_id varchar(16) NOT NULL,
    uploader_id varchar(16) NOT NULL,
    upload_date DATE NOT NULL DEFAULT '1970-01-01',
    CONSTRAINT pk_id PRIMARY KEY (login_id),
    CONSTRAINT fk_uploader_id FOREIGN KEY (uploader_id) REFERENCES account(login_id)
) DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

GRANT ALL PRIVILEGES ON brickflix TO 'php'@'localhost' IDENTIFIED BY 'SuperSecretPassword';
