DROP DATABASE IF EXISTS persistent;

DROP USER IF EXISTS 'sess_admin'@'localhost';

CREATE DATABASE IF NOT EXISTS persistent COLLATE utf8_general_ci;

CREATE USER 'sess_admin'@'localhost' IDENTIFIED BY 'secret';

GRANT SELECT, INSERT, UPDATE, DELETE ON persistent.* TO 'sess_admin'@'localhost';

CREATE TABLE IF NOT EXISTS users (
    user_key char(8) NOT NULL,
    username varchar(30) NOT NULL UNIQUE,
    pwd varchar(255) NOT NULL,
    PRIMARY KEY (user_key)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS sessions (
    sid varchar(40) NOT NULL,
    expiry int(10) unsigned NOT NULL,
    data text NOT NULL,
    PRIMARY KEY (sid)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS autologin (
    user_key char(8) NOT NULL,
    token char(32) NOT NULL,
    created timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
    data text,
    used tinyint(1) NOT NULL DEFAULT '0',
    PRIMARY KEY (user_key, token)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;