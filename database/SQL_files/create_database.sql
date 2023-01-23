DROP DATABASE IF EXISTS crud_travel_webapp;

CREATE DATABASE IF NOT EXISTS crud_travel_webapp;
USE crud_travel_webapp;

DROP USER 'crud_app'@'localhost';
CREATE USER 'crud_app'@'localhost' IDENTIFIED BY 'crud_application';
GRANT INSERT, SELECT, UPDATE, DELETE ON crud_travel_webapp.* TO 'crud_app'@'localhost';

CREATE TABLE IF NOT EXISTS USERS (
	id INT NOT NULL AUTO_INCREMENT,
    username VARCHAR(30) NOT NULL,
    email VARCHAR(35) NOT NULL,
    password VARCHAR(100) NOT NULL,
    isAdmin BOOLEAN default false,
    PRIMARY KEY(id),
    UNIQUE(username),
    UNIQUE(email)
);

CREATE TABLE IF NOT EXISTS RESET_PASSWORD_TOKENS (
	id INT NOT NULL AUTO_INCREMENT,
    token varchar(255) NOT NULL,
    user_id INT NOT NULL,
    experation_date DATE NOT NULL,
    PRIMARY KEY (id),
    FOREIGN KEY (user_id) REFERENCES USERS(id) ON UPDATE CASCADE
);

CREATE TABLE IF NOT EXISTS ACCOMMODATIONS (
	id INT NOT NULL AUTO_INCREMENT,
    name VARCHAR(255) NOT NULL,
    country VARCHAR(255) NOT NULL,
    city VARCHAR(255) NOT NULL,
    address VARCHAR(255) NOT NULL,
    description TEXT NOT NULL,
    price INT(10) NOT NULL,
    airport VARCHAR(255) NOT NULL,
    PRIMARY KEY(id),
    UNIQUE(name)
);

CREATE TABLE IF NOT EXISTS IMAGES (
	id INT NOT NULL AUTO_INCREMENT,
    accommodation_id INT NOT NULL,
    URL VARCHAR(255) NOT NULL,
    isThumbnail BOOLEAN NOT NULL DEFAULT FALSE,
    PRIMARY KEY(id),
    FOREIGN KEY (accommodation_id) REFERENCES ACCOMMODATIONS(id) ON UPDATE CASCADE,
    UNIQUE(URL)
);
    

CREATE TABLE IF NOT EXISTS REVIEWS (
	id INT NOT NULL AUTO_INCREMENT,
    user_id INT NOT NULL,
    accommodation_id INT NOT NULL,
    review TEXT NOT NULL,
    rating INT NOT NULL,
    PRIMARY KEY(id),
    FOREIGN KEY (user_id) REFERENCES USERS(id) ON  UPDATE CASCADE,
    FOREIGN KEY (accommodation_id) REFERENCES ACCOMMODATIONS(id) ON UPDATE CASCADE
);

CREATE TABLE IF NOT EXISTS BOOKINGS (
	id INT NOT NULL AUTO_INCREMENT,
    user_id INT NOT NULL,
    accommodation_id INT NOT NULL,
    numberOfPeople INT NOT NULL,
    startDate DATE NOT NULL,
    endDate DATE NOT NULL,
    isPaid BOOLEAN NOT NULL DEFAULT FALSE,
	PRIMARY KEY(id),
    FOREIGN KEY (user_id) REFERENCES USERS(id) ON  UPDATE CASCADE,
    FOREIGN KEY (accommodation_id) REFERENCES ACCOMMODATIONS(id) ON UPDATE CASCADE
);