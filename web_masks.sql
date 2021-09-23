CREATE TABLE users (
   user_email VARCHAR(100),
   user_name VARCHAR(15) NOT NULL,
   user_password VARCHAR(300) NOT NULL,
   PRIMARY KEY (user_email),
   UNIQUE (user_name)
);

CREATE TABLE masks (
    ID int(11) AUTO_INCREMENT,
    description text NOT NULL,
    post_date datetime NOT NULL,
    posts VARCHAR(100) NULL,
    username VARCHAR(15) NOT NULL,
    PRIMARY KEY (ID),
    FOREIGN KEY (username) REFERENCES users(user_name)
);