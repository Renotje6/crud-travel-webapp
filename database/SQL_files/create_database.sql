DROP DATABASE IF EXISTS crud_travel_webapp;

CREATE DATABASE IF NOT EXISTS crud_travel_webapp;
USE crud_travel_webapp;

DROP USER 'crud_app'@'localhost';
CREATE USER 'crud_app'@'localhost' IDENTIFIED BY 'crud_application';
GRANT INSERT, SELECT, UPDATE, DELETE ON crud_travel_webapp.* TO 'crud_app'@'localhost';

CREATE TABLE IF NOT EXISTS USERS (
	ID INT NOT NULL AUTO_INCREMENT,
    username VARCHAR(30) NOT NULL,
    email VARCHAR(35) NOT NULL,
    password VARCHAR(35) NOT NULL,
    isAdmin BOOLEAN default false,
    PRIMARY KEY(ID),
    UNIQUE(username),
    UNIQUE(email)
);

CREATE TABLE IF NOT EXISTS SESSIONS (
	ID INT NOT NULL AUTO_INCREMENT,
    userID INT NOT NULL,
    token VARCHAR(255) NOT NULL,
    expireAt TIMESTAMP NOT NULL,
    PRIMARY KEY(ID),
    UNIQUE(token),
    FOREIGN KEY (userID) REFERENCES USERS(ID)
);

CREATE TABLE IF NOT EXISTS ACCOMMODATIONS (
	ID INT NOT NULL AUTO_INCREMENT,
    name VARCHAR(255) NOT NULL,
    country VARCHAR(255) NOT NULL,
    city VARCHAR(255) NOT NULL,
    address VARCHAR(255) NOT NULL,
    description TEXT NOT NULL,
    price INT(10) NOT NULL,
    airport VARCHAR(255) NOT NULL,
    PRIMARY KEY(ID),
    UNIQUE(name)
);

CREATE TABLE IF NOT EXISTS IMAGES (
	ID INT NOT NULL AUTO_INCREMENT,
    accommodationID INT NOT NULL,
    URL VARCHAR(255) NOT NULL,
    isThumbnail BOOLEAN NOT NULL DEFAULT FALSE,
    PRIMARY KEY(ID),
    FOREIGN KEY (accommodationID) REFERENCES ACCOMMODATIONS(ID) ON UPDATE CASCADE,
    UNIQUE(URL)
);
    

CREATE TABLE IF NOT EXISTS REVIEWS (
	ID INT NOT NULL AUTO_INCREMENT,
    userID INT NOT NULL,
    accommodationID INT NOT NULL,
    review TEXT NOT NULL,
    rating INT NOT NULL,
    PRIMARY KEY(ID),
    FOREIGN KEY (userID) REFERENCES USERS(ID) ON  UPDATE CASCADE,
    FOREIGN KEY (accommodationID) REFERENCES ACCOMMODATIONS(ID) ON UPDATE CASCADE
);

CREATE TABLE IF NOT EXISTS BOOKINGS (
	ID INT NOT NULL AUTO_INCREMENT,
    userID INT NOT NULL,
    accommodationID INT NOT NULL,
    numberOfPeople INT NOT NULL,
    startDate DATE NOT NULL,
    endDate DATE NOT NULL,
    isPaid BOOLEAN NOT NULL DEFAULT FALSE,
	PRIMARY KEY(ID),
    FOREIGN KEY (userID) REFERENCES USERS(ID) ON  UPDATE CASCADE,
    FOREIGN KEY (accommodationID) REFERENCES ACCOMMODATIONS(ID) ON UPDATE CASCADE
);