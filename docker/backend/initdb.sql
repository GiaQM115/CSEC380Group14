DROP DATABASE IF EXISTS brickflix;
CREATE DATABASE brickflix;
USE brickflix;

CREATE TABLE account (
    id INT(8) UNSIGNED NOT NULL AUTO_INCREMENT,
    login varchar(16) NOT NULL,
    password varchar(32) NOT NULL,
    email varchar(64),
    CONSTRAINT pk_id PRIMARY KEY (id)
) DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

CREATE TABLE account (
    id INT(8) UNSIGNED NOT NULL AUTO_INCREMENT,
    uploader_id INT(8) UNSIGNED NOT NULL,
    upload_date INT(8) NOT NULL DEFAULT '1970-01-01',
    CONSTRAINT pk_id PRIMARY KEY (id),
    CONSTRAINT fk_uploader_id FOREIGN KEY (uploader_id) REFERENCES account(id)
) DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;
