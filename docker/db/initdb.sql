CREATE TABLE account
(
    login_id  VARCHAR(16)  NOT NULL,
    pass_hash VARCHAR(256) NOT NULL,
    CONSTRAINT pk_id PRIMARY KEY (login_id)
) DEFAULT CHARSET = utf8;

CREATE TABLE video
(
    video_id    INT         NOT NULL AUTO_INCREMENT,
    uploader_id VARCHAR(16) NOT NULL,
    upload_date DATE        NOT NULL DEFAULT '1970-01-01',
    CONSTRAINT pk_id PRIMARY KEY (video_id),
    CONSTRAINT fk_uploader_id FOREIGN KEY (uploader_id) REFERENCES account (login_id)
) DEFAULT CHARSET = utf8
  AUTO_INCREMENT = 1;
