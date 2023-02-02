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
    is_admin BOOLEAN default false,
    PRIMARY KEY(id),
    UNIQUE(username),
    UNIQUE(email)
);

CREATE TABLE IF NOT EXISTS RESET_PASSWORD_TOKENS (
	id INT NOT NULL AUTO_INCREMENT,
    token varchar(255) NOT NULL,
    user_id INT NOT NULL,
    expiration_date DATETIME NOT NULL,
    expired BOOLEAN NOT NULL DEFAULT FALSE,
    PRIMARY KEY (id),
    FOREIGN KEY (user_id) REFERENCES USERS(id) ON UPDATE CASCADE ON DELETE CASCADE
);

CREATE TABLE IF NOT EXISTS ACCOMMODATIONS (
	id INT NOT NULL AUTO_INCREMENT,
    name VARCHAR(255) NOT NULL,
    country VARCHAR(255) NOT NULL,
    city VARCHAR(255) NOT NULL,
    address VARCHAR(255) NOT NULL,
    description TEXT NOT NULL,
    price INT(10) NOT NULL,
    PRIMARY KEY(id),
    UNIQUE(name)
);

CREATE TABLE IF NOT EXISTS IMAGES (
	id INT NOT NULL AUTO_INCREMENT,
    accommodation_id INT NOT NULL,
    URL VARCHAR(255) NOT NULL,
    isThumbnail BOOLEAN NOT NULL DEFAULT FALSE,
    PRIMARY KEY(id),
    FOREIGN KEY (accommodation_id) REFERENCES ACCOMMODATIONS(id) ON UPDATE CASCADE ON DELETE CASCADE,
    UNIQUE(URL)
);
    

CREATE TABLE IF NOT EXISTS REVIEWS (
	id INT NOT NULL AUTO_INCREMENT,
    user_id INT NOT NULL,
    accommodation_id INT NOT NULL,
    review TEXT NOT NULL,
    rating INT NOT NULL,
    PRIMARY KEY(id),
    FOREIGN KEY (user_id) REFERENCES USERS(id) ON  UPDATE CASCADE ON DELETE CASCADE,
    FOREIGN KEY (accommodation_id) REFERENCES ACCOMMODATIONS(id) ON UPDATE CASCADE ON DELETE CASCADE
);

CREATE TABLE IF NOT EXISTS BOOKINGS (
	id INT NOT NULL AUTO_INCREMENT,
    user_id INT NOT NULL,
    accommodation_id INT NOT NULL,
    adults INT NOT NULL,
    children INT NOT NULL,
    total_price INT NOT NULL,
    check_in DATE NOT NULL,
    check_out DATE NOT NULL,
    status VARCHAR(255) NOT NULL DEFAULT "NOT_PAID",
	PRIMARY KEY(id),
    FOREIGN KEY (user_id) REFERENCES USERS(id) ON  UPDATE CASCADE ON DELETE CASCADE,
    FOREIGN KEY (accommodation_id) REFERENCES ACCOMMODATIONS(id) ON UPDATE CASCADE ON DELETE CASCADE
);insert into USERS (username, email, password, is_admin) values ('fraison0', 'aroubert0@mediafire.com', 'UqHYRSVbfHS', false);
insert into USERS (username, email, password, is_admin) values ('aattkins1', 'aaldgate1@seesaa.net', 'ZBc8XK5Nus', false);
insert into USERS (username, email, password, is_admin) values ('cfetteplace2', 'tsute2@mayoclinic.com', 'JYCDGhIE9DGs', false);
insert into USERS (username, email, password, is_admin) values ('mzanardii3', 'rhogben3@nature.com', 'PyQbz83aQb', false);
insert into USERS (username, email, password, is_admin) values ('kberdale4', 'wwhiteside4@dion.ne.jp', 'h9yAFBMo', false);
insert into USERS (username, email, password, is_admin) values ('sabramof5', 'flindner5@xing.com', '27ZxJg2v', false);
insert into USERS (username, email, password, is_admin) values ('bdelayglesia6', 'jquaife6@buzzfeed.com', '98aP5SNrLV', false);
insert into USERS (username, email, password, is_admin) values ('esexty7', 'pmccaghan7@webs.com', 'OUc0AgUO0do', false);
insert into USERS (username, email, password, is_admin) values ('sconsterdine8', 'dinker8@ezinearticles.com', 'drixWC', false);
insert into USERS (username, email, password, is_admin) values ('bkabsch9', 'afrangleton9@slate.com', 'H8rwODT07Kl', false);
insert into USERS (username, email, password, is_admin) values ('ravesquea', 'kkuhnerta@nationalgeographic.com', '99Jvpk', false);
insert into USERS (username, email, password, is_admin) values ('nmockesb', 'snoeb@walmart.com', 'r8aYXt', false);
insert into USERS (username, email, password, is_admin) values ('ckeeganc', 'fchillistonec@soundcloud.com', 'GfifWbXZJ34f', false);
insert into USERS (username, email, password, is_admin) values ('ebellfieldd', 'cmeugensd@wsj.com', '71SzRdW', false);
insert into USERS (username, email, password, is_admin) values ('pstatione', 'lpenninie@sbwire.com', 'YXgAzJpa', false);
insert into USERS (username, email, password, is_admin) values ('mnicholesf', 'geubankf@vk.com', 'mNROJq7jcYg1', false);
insert into USERS (username, email, password, is_admin) values ('ebonnetg', 'ckisbeyg@bluehost.com', 'YaGsg0relnO9', false);
insert into USERS (username, email, password, is_admin) values ('tlubomirskih', 'stomeh@friendfeed.com', 'xfSexSOGB4Pa', false);
insert into USERS (username, email, password, is_admin) values ('cchappelli', 'jwallickeri@netvibes.com', 'yRODC6CGY4zF', false);
insert into USERS (username, email, password, is_admin) values ('fsaxonj', 'ctitej@jugem.jp', '9dBuhtyqf', false);
insert into USERS (username, email, password, is_admin) values ('gquarrellk', 'rfellowesk@amazonaws.com', 'jihEIUw7d', false);
insert into USERS (username, email, password, is_admin) values ('briemel', 'fstoylesl@paypal.com', 'BAeCM6V9h1W5', false);
insert into USERS (username, email, password, is_admin) values ('cpondm', 'dkentishm@yale.edu', 'Kg1JjBi', false);
insert into USERS (username, email, password, is_admin) values ('cqueyeiron', 'afiorentinon@privacy.gov.au', '1aeQHr', false);
insert into USERS (username, email, password, is_admin) values ('cevetto', 'csemeredo@e-recht24.de', 'j5PFP9i65CKB', false);
insert into USERS (username, email, password, is_admin) values ('ddudmanp', 'klefevrep@vkontakte.ru', 'HtRM2Ctx', false);
insert into USERS (username, email, password, is_admin) values ('tbrehaultq', 'ekuresq@digg.com', '8t1xnAep', false);
insert into USERS (username, email, password, is_admin) values ('fsherborner', 'tmcbainr@cnn.com', 'w3dUklRJKZ', false);
insert into USERS (username, email, password, is_admin) values ('ogyless', 'ogawlers@msn.com', 'rMisl2fpLB3d', false);
insert into USERS (username, email, password, is_admin) values ('smcbrydet', 'crorket@imageshack.us', 'brjKx80GUC0', false);
insert into USERS (username, email, password, is_admin) values ('renotje6', 'reno.rovers@gmail.com', '$2y$10$dUDNe2WqBc.NtlxUnjAnoedTMVnPMMboxXNS9MzwBs4Mra2FlAEZW', true);insert into ACCOMMODATIONS (name, country, city, address, description, price) values ('Chlamydosaurus kingii', 'Greece', 'Loutrós', '5 7th Court', "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque porta lacus est, vel commodo tortor interdum quis. Vestibulum et justo porta, luctus dolor nec, lobortis urna. Pellentesque dictum, justo vel aliquet hendrerit, eros nisl pharetra diam, sed tempus quam sem nec odio. Praesent a efficitur enim, nec condimentum quam. Maecenas dictum quam a magna pellentesque commodo. Morbi quis suscipit neque. Etiam diam nisi, luctus in leo nec, porta scelerisque sapien. Duis facilisis leo vestibulum fermentum ultricies. Praesent eget molestie sapien. Suspendisse tempor purus eget odio rutrum porttitor. Ut bibendum orci odio, at facilisis arcu aliquet vel. Suspendisse condimentum libero a lobortis tempus. Fusce sed mi augue. Ut placerat efficitur risus. Ut feugiat mattis est vel accumsan. In feugiat nisl vitae mauris maximus vulputate.", 353);
insert into ACCOMMODATIONS (name, country, city, address, description, price) values ('Diomedea irrorata', 'Greece', 'Thessaloníki', '227 Grim Street', "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque porta lacus est, vel commodo tortor interdum quis. Vestibulum et justo porta, luctus dolor nec, lobortis urna. Pellentesque dictum, justo vel aliquet hendrerit, eros nisl pharetra diam, sed tempus quam sem nec odio. Praesent a efficitur enim, nec condimentum quam. Maecenas dictum quam a magna pellentesque commodo. Morbi quis suscipit neque. Etiam diam nisi, luctus in leo nec, porta scelerisque sapien. Duis facilisis leo vestibulum fermentum ultricies. Praesent eget molestie sapien. Suspendisse tempor purus eget odio rutrum porttitor. Ut bibendum orci odio, at facilisis arcu aliquet vel. Suspendisse condimentum libero a lobortis tempus. Fusce sed mi augue. Ut placerat efficitur risus. Ut feugiat mattis est vel accumsan. In feugiat nisl vitae mauris maximus vulputate.", 685);
insert into ACCOMMODATIONS (name, country, city, address, description, price) values ('Haliaeetus leucoryphus', 'France', 'Marne-la-Vallée', '047 Longview Way', "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque porta lacus est, vel commodo tortor interdum quis. Vestibulum et justo porta, luctus dolor nec, lobortis urna. Pellentesque dictum, justo vel aliquet hendrerit, eros nisl pharetra diam, sed tempus quam sem nec odio. Praesent a efficitur enim, nec condimentum quam. Maecenas dictum quam a magna pellentesque commodo. Morbi quis suscipit neque. Etiam diam nisi, luctus in leo nec, porta scelerisque sapien. Duis facilisis leo vestibulum fermentum ultricies. Praesent eget molestie sapien. Suspendisse tempor purus eget odio rutrum porttitor. Ut bibendum orci odio, at facilisis arcu aliquet vel. Suspendisse condimentum libero a lobortis tempus. Fusce sed mi augue. Ut placerat efficitur risus. Ut feugiat mattis est vel accumsan. In feugiat nisl vitae mauris maximus vulputate.", 104);
insert into ACCOMMODATIONS (name, country, city, address, description, price) values ('Nyctereutes procyonoides', 'France', 'Lyon', '9 Service Plaza', "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque porta lacus est, vel commodo tortor interdum quis. Vestibulum et justo porta, luctus dolor nec, lobortis urna. Pellentesque dictum, justo vel aliquet hendrerit, eros nisl pharetra diam, sed tempus quam sem nec odio. Praesent a efficitur enim, nec condimentum quam. Maecenas dictum quam a magna pellentesque commodo. Morbi quis suscipit neque. Etiam diam nisi, luctus in leo nec, porta scelerisque sapien. Duis facilisis leo vestibulum fermentum ultricies. Praesent eget molestie sapien. Suspendisse tempor purus eget odio rutrum porttitor. Ut bibendum orci odio, at facilisis arcu aliquet vel. Suspendisse condimentum libero a lobortis tempus. Fusce sed mi augue. Ut placerat efficitur risus. Ut feugiat mattis est vel accumsan. In feugiat nisl vitae mauris maximus vulputate.", 295);
insert into ACCOMMODATIONS (name, country, city, address, description, price) values ('Bubalornis niger', 'France', 'La Valette-du-Var', '451 Truax Parkway', "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque porta lacus est, vel commodo tortor interdum quis. Vestibulum et justo porta, luctus dolor nec, lobortis urna. Pellentesque dictum, justo vel aliquet hendrerit, eros nisl pharetra diam, sed tempus quam sem nec odio. Praesent a efficitur enim, nec condimentum quam. Maecenas dictum quam a magna pellentesque commodo. Morbi quis suscipit neque. Etiam diam nisi, luctus in leo nec, porta scelerisque sapien. Duis facilisis leo vestibulum fermentum ultricies. Praesent eget molestie sapien. Suspendisse tempor purus eget odio rutrum porttitor. Ut bibendum orci odio, at facilisis arcu aliquet vel. Suspendisse condimentum libero a lobortis tempus. Fusce sed mi augue. Ut placerat efficitur risus. Ut feugiat mattis est vel accumsan. In feugiat nisl vitae mauris maximus vulputate.", 333);
insert into ACCOMMODATIONS (name, country, city, address, description, price) values ('Papio cynocephalus', 'France', 'Montreuil', '81 Muir Avenue', "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque porta lacus est, vel commodo tortor interdum quis. Vestibulum et justo porta, luctus dolor nec, lobortis urna. Pellentesque dictum, justo vel aliquet hendrerit, eros nisl pharetra diam, sed tempus quam sem nec odio. Praesent a efficitur enim, nec condimentum quam. Maecenas dictum quam a magna pellentesque commodo. Morbi quis suscipit neque. Etiam diam nisi, luctus in leo nec, porta scelerisque sapien. Duis facilisis leo vestibulum fermentum ultricies. Praesent eget molestie sapien. Suspendisse tempor purus eget odio rutrum porttitor. Ut bibendum orci odio, at facilisis arcu aliquet vel. Suspendisse condimentum libero a lobortis tempus. Fusce sed mi augue. Ut placerat efficitur risus. Ut feugiat mattis est vel accumsan. In feugiat nisl vitae mauris maximus vulputate.", 624);
insert into ACCOMMODATIONS (name, country, city, address, description, price) values ('Milvago chimachima', 'Netherlands', 'Enschede', '23940 Stone Corner Park', "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque porta lacus est, vel commodo tortor interdum quis. Vestibulum et justo porta, luctus dolor nec, lobortis urna. Pellentesque dictum, justo vel aliquet hendrerit, eros nisl pharetra diam, sed tempus quam sem nec odio. Praesent a efficitur enim, nec condimentum quam. Maecenas dictum quam a magna pellentesque commodo. Morbi quis suscipit neque. Etiam diam nisi, luctus in leo nec, porta scelerisque sapien. Duis facilisis leo vestibulum fermentum ultricies. Praesent eget molestie sapien. Suspendisse tempor purus eget odio rutrum porttitor. Ut bibendum orci odio, at facilisis arcu aliquet vel. Suspendisse condimentum libero a lobortis tempus. Fusce sed mi augue. Ut placerat efficitur risus. Ut feugiat mattis est vel accumsan. In feugiat nisl vitae mauris maximus vulputate.", 664);
insert into ACCOMMODATIONS (name, country, city, address, description, price) values ('Cathartes aura', 'Greece', 'Kokkónion', '77076 Westridge Pass', "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque porta lacus est, vel commodo tortor interdum quis. Vestibulum et justo porta, luctus dolor nec, lobortis urna. Pellentesque dictum, justo vel aliquet hendrerit, eros nisl pharetra diam, sed tempus quam sem nec odio. Praesent a efficitur enim, nec condimentum quam. Maecenas dictum quam a magna pellentesque commodo. Morbi quis suscipit neque. Etiam diam nisi, luctus in leo nec, porta scelerisque sapien. Duis facilisis leo vestibulum fermentum ultricies. Praesent eget molestie sapien. Suspendisse tempor purus eget odio rutrum porttitor. Ut bibendum orci odio, at facilisis arcu aliquet vel. Suspendisse condimentum libero a lobortis tempus. Fusce sed mi augue. Ut placerat efficitur risus. Ut feugiat mattis est vel accumsan. In feugiat nisl vitae mauris maximus vulputate.", 909);
insert into ACCOMMODATIONS (name, country, city, address, description, price) values ('Felis silvestris lybica', 'Greece', 'Mitrópoli', '8667 Ludington Avenue', "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque porta lacus est, vel commodo tortor interdum quis. Vestibulum et justo porta, luctus dolor nec, lobortis urna. Pellentesque dictum, justo vel aliquet hendrerit, eros nisl pharetra diam, sed tempus quam sem nec odio. Praesent a efficitur enim, nec condimentum quam. Maecenas dictum quam a magna pellentesque commodo. Morbi quis suscipit neque. Etiam diam nisi, luctus in leo nec, porta scelerisque sapien. Duis facilisis leo vestibulum fermentum ultricies. Praesent eget molestie sapien. Suspendisse tempor purus eget odio rutrum porttitor. Ut bibendum orci odio, at facilisis arcu aliquet vel. Suspendisse condimentum libero a lobortis tempus. Fusce sed mi augue. Ut placerat efficitur risus. Ut feugiat mattis est vel accumsan. In feugiat nisl vitae mauris maximus vulputate.", 301);
insert into ACCOMMODATIONS (name, country, city, address, description, price) values ('Bettongia penicillata', 'France', 'Saint-Maixent-l''École', '66 Linden Drive', "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque porta lacus est, vel commodo tortor interdum quis. Vestibulum et justo porta, luctus dolor nec, lobortis urna. Pellentesque dictum, justo vel aliquet hendrerit, eros nisl pharetra diam, sed tempus quam sem nec odio. Praesent a efficitur enim, nec condimentum quam. Maecenas dictum quam a magna pellentesque commodo. Morbi quis suscipit neque. Etiam diam nisi, luctus in leo nec, porta scelerisque sapien. Duis facilisis leo vestibulum fermentum ultricies. Praesent eget molestie sapien. Suspendisse tempor purus eget odio rutrum porttitor. Ut bibendum orci odio, at facilisis arcu aliquet vel. Suspendisse condimentum libero a lobortis tempus. Fusce sed mi augue. Ut placerat efficitur risus. Ut feugiat mattis est vel accumsan. In feugiat nisl vitae mauris maximus vulputate.", 469);
insert into ACCOMMODATIONS (name, country, city, address, description, price) values ('Pycnonotus barbatus', 'France', 'Angers', '64078 American Terrace', "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque porta lacus est, vel commodo tortor interdum quis. Vestibulum et justo porta, luctus dolor nec, lobortis urna. Pellentesque dictum, justo vel aliquet hendrerit, eros nisl pharetra diam, sed tempus quam sem nec odio. Praesent a efficitur enim, nec condimentum quam. Maecenas dictum quam a magna pellentesque commodo. Morbi quis suscipit neque. Etiam diam nisi, luctus in leo nec, porta scelerisque sapien. Duis facilisis leo vestibulum fermentum ultricies. Praesent eget molestie sapien. Suspendisse tempor purus eget odio rutrum porttitor. Ut bibendum orci odio, at facilisis arcu aliquet vel. Suspendisse condimentum libero a lobortis tempus. Fusce sed mi augue. Ut placerat efficitur risus. Ut feugiat mattis est vel accumsan. In feugiat nisl vitae mauris maximus vulputate.", 764);
insert into ACCOMMODATIONS (name, country, city, address, description, price) values ('Haematopus barbatus', 'France', 'Le Cannet', '426 Sycamore Trail', "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque porta lacus est, vel commodo tortor interdum quis. Vestibulum et justo porta, luctus dolor nec, lobortis urna. Pellentesque dictum, justo vel aliquet hendrerit, eros nisl pharetra diam, sed tempus quam sem nec odio. Praesent a efficitur enim, nec condimentum quam. Maecenas dictum quam a magna pellentesque commodo. Morbi quis suscipit neque. Etiam diam nisi, luctus in leo nec, porta scelerisque sapien. Duis facilisis leo vestibulum fermentum ultricies. Praesent eget molestie sapien. Suspendisse tempor purus eget odio rutrum porttitor. Ut bibendum orci odio, at facilisis arcu aliquet vel. Suspendisse condimentum libero a lobortis tempus. Fusce sed mi augue. Ut placerat efficitur risus. Ut feugiat mattis est vel accumsan. In feugiat nisl vitae mauris maximus vulputate.", 708);
insert into ACCOMMODATIONS (name, country, city, address, description, price) values ('Haematopus ater', 'Greece', 'Káto Miliá', '15759 Logan Circle', "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque porta lacus est, vel commodo tortor interdum quis. Vestibulum et justo porta, luctus dolor nec, lobortis urna. Pellentesque dictum, justo vel aliquet hendrerit, eros nisl pharetra diam, sed tempus quam sem nec odio. Praesent a efficitur enim, nec condimentum quam. Maecenas dictum quam a magna pellentesque commodo. Morbi quis suscipit neque. Etiam diam nisi, luctus in leo nec, porta scelerisque sapien. Duis facilisis leo vestibulum fermentum ultricies. Praesent eget molestie sapien. Suspendisse tempor purus eget odio rutrum porttitor. Ut bibendum orci odio, at facilisis arcu aliquet vel. Suspendisse condimentum libero a lobortis tempus. Fusce sed mi augue. Ut placerat efficitur risus. Ut feugiat mattis est vel accumsan. In feugiat nisl vitae mauris maximus vulputate.", 210);
insert into ACCOMMODATIONS (name, country, city, address, description, price) values ('Lamprotornis nitens', 'Greece', 'Loutrá', '00 Kim Plaza', "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque porta lacus est, vel commodo tortor interdum quis. Vestibulum et justo porta, luctus dolor nec, lobortis urna. Pellentesque dictum, justo vel aliquet hendrerit, eros nisl pharetra diam, sed tempus quam sem nec odio. Praesent a efficitur enim, nec condimentum quam. Maecenas dictum quam a magna pellentesque commodo. Morbi quis suscipit neque. Etiam diam nisi, luctus in leo nec, porta scelerisque sapien. Duis facilisis leo vestibulum fermentum ultricies. Praesent eget molestie sapien. Suspendisse tempor purus eget odio rutrum porttitor. Ut bibendum orci odio, at facilisis arcu aliquet vel. Suspendisse condimentum libero a lobortis tempus. Fusce sed mi augue. Ut placerat efficitur risus. Ut feugiat mattis est vel accumsan. In feugiat nisl vitae mauris maximus vulputate.", 867);
insert into ACCOMMODATIONS (name, country, city, address, description, price) values ('Sula brachyrhynchos', 'France', 'Châlons-en-Champagne', '3996 Boyd Alley', "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque porta lacus est, vel commodo tortor interdum quis. Vestibulum et justo porta, luctus dolor nec, lobortis urna. Pellentesque dictum, justo vel aliquet hendrerit, eros nisl pharetra diam, sed tempus quam sem nec odio. Praesent a efficitur enim, nec condimentum quam. Maecenas dictum quam a magna pellentesque commodo. Morbi quis suscipit neque. Etiam diam nisi, luctus in leo nec, porta scelerisque sapien. Duis facilisis leo vestibulum fermentum ultricies. Praesent eget molestie sapien. Suspendisse tempor purus eget odio rutrum porttitor. Ut bibendum orci odio, at facilisis arcu aliquet vel. Suspendisse condimentum libero a lobortis tempus. Fusce sed mi augue. Ut placerat efficitur risus. Ut feugiat mattis est vel accumsan. In feugiat nisl vitae mauris maximus vulputate.", 103);
insert into ACCOMMODATIONS (name, country, city, address, description, price) values ('Corvus brachyrhynchos', 'Germany', 'Dillenburg', '9 Bobwhite Avenue', "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque porta lacus est, vel commodo tortor interdum quis. Vestibulum et justo porta, luctus dolor nec, lobortis urna. Pellentesque dictum, justo vel aliquet hendrerit, eros nisl pharetra diam, sed tempus quam sem nec odio. Praesent a efficitur enim, nec condimentum quam. Maecenas dictum quam a magna pellentesque commodo. Morbi quis suscipit neque. Etiam diam nisi, luctus in leo nec, porta scelerisque sapien. Duis facilisis leo vestibulum fermentum ultricies. Praesent eget molestie sapien. Suspendisse tempor purus eget odio rutrum porttitor. Ut bibendum orci odio, at facilisis arcu aliquet vel. Suspendisse condimentum libero a lobortis tempus. Fusce sed mi augue. Ut placerat efficitur risus. Ut feugiat mattis est vel accumsan. In feugiat nisl vitae mauris maximus vulputate.", 786);
insert into ACCOMMODATIONS (name, country, city, address, description, price) values ('Naja chalybaeus', 'Greece', 'Sámi', '6 Acker Road', "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque porta lacus est, vel commodo tortor interdum quis. Vestibulum et justo porta, luctus dolor nec, lobortis urna. Pellentesque dictum, justo vel aliquet hendrerit, eros nisl pharetra diam, sed tempus quam sem nec odio. Praesent a efficitur enim, nec condimentum quam. Maecenas dictum quam a magna pellentesque commodo. Morbi quis suscipit neque. Etiam diam nisi, luctus in leo nec, porta scelerisque sapien. Duis facilisis leo vestibulum fermentum ultricies. Praesent eget molestie sapien. Suspendisse tempor purus eget odio rutrum porttitor. Ut bibendum orci odio, at facilisis arcu aliquet vel. Suspendisse condimentum libero a lobortis tempus. Fusce sed mi augue. Ut placerat efficitur risus. Ut feugiat mattis est vel accumsan. In feugiat nisl vitae mauris maximus vulputate.", 517);
insert into ACCOMMODATIONS (name, country, city, address, description, price) values ('Sula dactylatra', 'Spain', 'Pontevedra', '23 Pine View Crossing', "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque porta lacus est, vel commodo tortor interdum quis. Vestibulum et justo porta, luctus dolor nec, lobortis urna. Pellentesque dictum, justo vel aliquet hendrerit, eros nisl pharetra diam, sed tempus quam sem nec odio. Praesent a efficitur enim, nec condimentum quam. Maecenas dictum quam a magna pellentesque commodo. Morbi quis suscipit neque. Etiam diam nisi, luctus in leo nec, porta scelerisque sapien. Duis facilisis leo vestibulum fermentum ultricies. Praesent eget molestie sapien. Suspendisse tempor purus eget odio rutrum porttitor. Ut bibendum orci odio, at facilisis arcu aliquet vel. Suspendisse condimentum libero a lobortis tempus. Fusce sed mi augue. Ut placerat efficitur risus. Ut feugiat mattis est vel accumsan. In feugiat nisl vitae mauris maximus vulputate.", 515);
insert into ACCOMMODATIONS (name, country, city, address, description, price) values ('Varanus albigularis', 'Netherlands', 'Maastricht', '55 Kensington Plaza', "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque porta lacus est, vel commodo tortor interdum quis. Vestibulum et justo porta, luctus dolor nec, lobortis urna. Pellentesque dictum, justo vel aliquet hendrerit, eros nisl pharetra diam, sed tempus quam sem nec odio. Praesent a efficitur enim, nec condimentum quam. Maecenas dictum quam a magna pellentesque commodo. Morbi quis suscipit neque. Etiam diam nisi, luctus in leo nec, porta scelerisque sapien. Duis facilisis leo vestibulum fermentum ultricies. Praesent eget molestie sapien. Suspendisse tempor purus eget odio rutrum porttitor. Ut bibendum orci odio, at facilisis arcu aliquet vel. Suspendisse condimentum libero a lobortis tempus. Fusce sed mi augue. Ut placerat efficitur risus. Ut feugiat mattis est vel accumsan. In feugiat nisl vitae mauris maximus vulputate.", 789);
insert into ACCOMMODATIONS (name, country, city, address, description, price) values ('Lamprotornis chalybaeus', 'France', 'Meylan', '8 Longview Park', "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque porta lacus est, vel commodo tortor interdum quis. Vestibulum et justo porta, luctus dolor nec, lobortis urna. Pellentesque dictum, justo vel aliquet hendrerit, eros nisl pharetra diam, sed tempus quam sem nec odio. Praesent a efficitur enim, nec condimentum quam. Maecenas dictum quam a magna pellentesque commodo. Morbi quis suscipit neque. Etiam diam nisi, luctus in leo nec, porta scelerisque sapien. Duis facilisis leo vestibulum fermentum ultricies. Praesent eget molestie sapien. Suspendisse tempor purus eget odio rutrum porttitor. Ut bibendum orci odio, at facilisis arcu aliquet vel. Suspendisse condimentum libero a lobortis tempus. Fusce sed mi augue. Ut placerat efficitur risus. Ut feugiat mattis est vel accumsan. In feugiat nisl vitae mauris maximus vulputate.", 202);
insert into ACCOMMODATIONS (name, country, city, address, description, price) values ('Streptopelia senegalensis', 'France', 'Ajaccio', '1 Coolidge Park', "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque porta lacus est, vel commodo tortor interdum quis. Vestibulum et justo porta, luctus dolor nec, lobortis urna. Pellentesque dictum, justo vel aliquet hendrerit, eros nisl pharetra diam, sed tempus quam sem nec odio. Praesent a efficitur enim, nec condimentum quam. Maecenas dictum quam a magna pellentesque commodo. Morbi quis suscipit neque. Etiam diam nisi, luctus in leo nec, porta scelerisque sapien. Duis facilisis leo vestibulum fermentum ultricies. Praesent eget molestie sapien. Suspendisse tempor purus eget odio rutrum porttitor. Ut bibendum orci odio, at facilisis arcu aliquet vel. Suspendisse condimentum libero a lobortis tempus. Fusce sed mi augue. Ut placerat efficitur risus. Ut feugiat mattis est vel accumsan. In feugiat nisl vitae mauris maximus vulputate.", 640);
insert into ACCOMMODATIONS (name, country, city, address, description, price) values ('Coluber constrictor', 'France', 'Annecy', '96 Brown Lane', "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque porta lacus est, vel commodo tortor interdum quis. Vestibulum et justo porta, luctus dolor nec, lobortis urna. Pellentesque dictum, justo vel aliquet hendrerit, eros nisl pharetra diam, sed tempus quam sem nec odio. Praesent a efficitur enim, nec condimentum quam. Maecenas dictum quam a magna pellentesque commodo. Morbi quis suscipit neque. Etiam diam nisi, luctus in leo nec, porta scelerisque sapien. Duis facilisis leo vestibulum fermentum ultricies. Praesent eget molestie sapien. Suspendisse tempor purus eget odio rutrum porttitor. Ut bibendum orci odio, at facilisis arcu aliquet vel. Suspendisse condimentum libero a lobortis tempus. Fusce sed mi augue. Ut placerat efficitur risus. Ut feugiat mattis est vel accumsan. In feugiat nisl vitae mauris maximus vulputate.", 261);
insert into ACCOMMODATIONS (name, country, city, address, description, price) values ('Pelecans onocratalus', 'France', 'Mende', '2194 Scoville Terrace', "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque porta lacus est, vel commodo tortor interdum quis. Vestibulum et justo porta, luctus dolor nec, lobortis urna. Pellentesque dictum, justo vel aliquet hendrerit, eros nisl pharetra diam, sed tempus quam sem nec odio. Praesent a efficitur enim, nec condimentum quam. Maecenas dictum quam a magna pellentesque commodo. Morbi quis suscipit neque. Etiam diam nisi, luctus in leo nec, porta scelerisque sapien. Duis facilisis leo vestibulum fermentum ultricies. Praesent eget molestie sapien. Suspendisse tempor purus eget odio rutrum porttitor. Ut bibendum orci odio, at facilisis arcu aliquet vel. Suspendisse condimentum libero a lobortis tempus. Fusce sed mi augue. Ut placerat efficitur risus. Ut feugiat mattis est vel accumsan. In feugiat nisl vitae mauris maximus vulputate.", 349);
insert into ACCOMMODATIONS (name, country, city, address, description, price) values ('Cacatua tenuirostris', 'France', 'Fosses', '853 Lakewood Hill', "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque porta lacus est, vel commodo tortor interdum quis. Vestibulum et justo porta, luctus dolor nec, lobortis urna. Pellentesque dictum, justo vel aliquet hendrerit, eros nisl pharetra diam, sed tempus quam sem nec odio. Praesent a efficitur enim, nec condimentum quam. Maecenas dictum quam a magna pellentesque commodo. Morbi quis suscipit neque. Etiam diam nisi, luctus in leo nec, porta scelerisque sapien. Duis facilisis leo vestibulum fermentum ultricies. Praesent eget molestie sapien. Suspendisse tempor purus eget odio rutrum porttitor. Ut bibendum orci odio, at facilisis arcu aliquet vel. Suspendisse condimentum libero a lobortis tempus. Fusce sed mi augue. Ut placerat efficitur risus. Ut feugiat mattis est vel accumsan. In feugiat nisl vitae mauris maximus vulputate.", 481);
insert into ACCOMMODATIONS (name, country, city, address, description, price) values ('Conolophus subcristatus', 'France', 'Montpellier', '9 Aberg Hill', "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque porta lacus est, vel commodo tortor interdum quis. Vestibulum et justo porta, luctus dolor nec, lobortis urna. Pellentesque dictum, justo vel aliquet hendrerit, eros nisl pharetra diam, sed tempus quam sem nec odio. Praesent a efficitur enim, nec condimentum quam. Maecenas dictum quam a magna pellentesque commodo. Morbi quis suscipit neque. Etiam diam nisi, luctus in leo nec, porta scelerisque sapien. Duis facilisis leo vestibulum fermentum ultricies. Praesent eget molestie sapien. Suspendisse tempor purus eget odio rutrum porttitor. Ut bibendum orci odio, at facilisis arcu aliquet vel. Suspendisse condimentum libero a lobortis tempus. Fusce sed mi augue. Ut placerat efficitur risus. Ut feugiat mattis est vel accumsan. In feugiat nisl vitae mauris maximus vulputate.", 729);
insert into ACCOMMODATIONS (name, country, city, address, description, price) values ('Lybius torquatus', 'France', 'Perpignan', '7 Toban Street', "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque porta lacus est, vel commodo tortor interdum quis. Vestibulum et justo porta, luctus dolor nec, lobortis urna. Pellentesque dictum, justo vel aliquet hendrerit, eros nisl pharetra diam, sed tempus quam sem nec odio. Praesent a efficitur enim, nec condimentum quam. Maecenas dictum quam a magna pellentesque commodo. Morbi quis suscipit neque. Etiam diam nisi, luctus in leo nec, porta scelerisque sapien. Duis facilisis leo vestibulum fermentum ultricies. Praesent eget molestie sapien. Suspendisse tempor purus eget odio rutrum porttitor. Ut bibendum orci odio, at facilisis arcu aliquet vel. Suspendisse condimentum libero a lobortis tempus. Fusce sed mi augue. Ut placerat efficitur risus. Ut feugiat mattis est vel accumsan. In feugiat nisl vitae mauris maximus vulputate.", 789);
insert into ACCOMMODATIONS (name, country, city, address, description, price) values ('Naja haje', 'Greece', 'Ouranoupolis', '219 Ronald Regan Road', "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque porta lacus est, vel commodo tortor interdum quis. Vestibulum et justo porta, luctus dolor nec, lobortis urna. Pellentesque dictum, justo vel aliquet hendrerit, eros nisl pharetra diam, sed tempus quam sem nec odio. Praesent a efficitur enim, nec condimentum quam. Maecenas dictum quam a magna pellentesque commodo. Morbi quis suscipit neque. Etiam diam nisi, luctus in leo nec, porta scelerisque sapien. Duis facilisis leo vestibulum fermentum ultricies. Praesent eget molestie sapien. Suspendisse tempor purus eget odio rutrum porttitor. Ut bibendum orci odio, at facilisis arcu aliquet vel. Suspendisse condimentum libero a lobortis tempus. Fusce sed mi augue. Ut placerat efficitur risus. Ut feugiat mattis est vel accumsan. In feugiat nisl vitae mauris maximus vulputate.", 686);
insert into ACCOMMODATIONS (name, country, city, address, description, price) values ('Kobus defassa', 'Spain', 'Almeria', '833 Mcguire Hill', "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque porta lacus est, vel commodo tortor interdum quis. Vestibulum et justo porta, luctus dolor nec, lobortis urna. Pellentesque dictum, justo vel aliquet hendrerit, eros nisl pharetra diam, sed tempus quam sem nec odio. Praesent a efficitur enim, nec condimentum quam. Maecenas dictum quam a magna pellentesque commodo. Morbi quis suscipit neque. Etiam diam nisi, luctus in leo nec, porta scelerisque sapien. Duis facilisis leo vestibulum fermentum ultricies. Praesent eget molestie sapien. Suspendisse tempor purus eget odio rutrum porttitor. Ut bibendum orci odio, at facilisis arcu aliquet vel. Suspendisse condimentum libero a lobortis tempus. Fusce sed mi augue. Ut placerat efficitur risus. Ut feugiat mattis est vel accumsan. In feugiat nisl vitae mauris maximus vulputate.", 765);
insert into ACCOMMODATIONS (name, country, city, address, description, price) values ('Ceratotherium simum', 'Greece', 'Galátsi', '0252 Fair Oaks Street', "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque porta lacus est, vel commodo tortor interdum quis. Vestibulum et justo porta, luctus dolor nec, lobortis urna. Pellentesque dictum, justo vel aliquet hendrerit, eros nisl pharetra diam, sed tempus quam sem nec odio. Praesent a efficitur enim, nec condimentum quam. Maecenas dictum quam a magna pellentesque commodo. Morbi quis suscipit neque. Etiam diam nisi, luctus in leo nec, porta scelerisque sapien. Duis facilisis leo vestibulum fermentum ultricies. Praesent eget molestie sapien. Suspendisse tempor purus eget odio rutrum porttitor. Ut bibendum orci odio, at facilisis arcu aliquet vel. Suspendisse condimentum libero a lobortis tempus. Fusce sed mi augue. Ut placerat efficitur risus. Ut feugiat mattis est vel accumsan. In feugiat nisl vitae mauris maximus vulputate.", 825);
insert into ACCOMMODATIONS (name, country, city, address, description, price) values ('Anthropoides paradisea', 'France', 'Martigues', '8806 Village Green Circle', "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque porta lacus est, vel commodo tortor interdum quis. Vestibulum et justo porta, luctus dolor nec, lobortis urna. Pellentesque dictum, justo vel aliquet hendrerit, eros nisl pharetra diam, sed tempus quam sem nec odio. Praesent a efficitur enim, nec condimentum quam. Maecenas dictum quam a magna pellentesque commodo. Morbi quis suscipit neque. Etiam diam nisi, luctus in leo nec, porta scelerisque sapien. Duis facilisis leo vestibulum fermentum ultricies. Praesent eget molestie sapien. Suspendisse tempor purus eget odio rutrum porttitor. Ut bibendum orci odio, at facilisis arcu aliquet vel. Suspendisse condimentum libero a lobortis tempus. Fusce sed mi augue. Ut placerat efficitur risus. Ut feugiat mattis est vel accumsan. In feugiat nisl vitae mauris maximus vulputate.", 233);INSERT INTO IMAGES (accommodation_id, URL, isThumbnail) VALUES (1, '1/picture1.jpg', TRUE);
INSERT INTO IMAGES (accommodation_id, URL, isThumbnail) VALUES (1, '1/picture2.jpg', FALSE);
INSERT INTO IMAGES (accommodation_id, URL, isThumbnail) VALUES (1, '1/picture3.jpg', FALSE);
INSERT INTO IMAGES (accommodation_id, URL, isThumbnail) VALUES (1, '1/picture4.jpg', FALSE);
INSERT INTO IMAGES (accommodation_id, URL, isThumbnail) VALUES (1, '1/picture5.jpg', FALSE);
INSERT INTO IMAGES (accommodation_id, URL, isThumbnail) VALUES (2, '2/picture1.jpg', TRUE);
INSERT INTO IMAGES (accommodation_id, URL, isThumbnail) VALUES (2, '2/picture2.jpg', FALSE);
INSERT INTO IMAGES (accommodation_id, URL, isThumbnail) VALUES (2, '2/picture3.jpg', FALSE);
INSERT INTO IMAGES (accommodation_id, URL, isThumbnail) VALUES (2, '2/picture4.jpg', FALSE);
INSERT INTO IMAGES (accommodation_id, URL, isThumbnail) VALUES (2, '2/picture5.jpg', FALSE);
INSERT INTO IMAGES (accommodation_id, URL, isThumbnail) VALUES (3, '3/picture1.jpg', TRUE);
INSERT INTO IMAGES (accommodation_id, URL, isThumbnail) VALUES (3, '3/picture2.jpg', FALSE);
INSERT INTO IMAGES (accommodation_id, URL, isThumbnail) VALUES (3, '3/picture3.jpg', FALSE);
INSERT INTO IMAGES (accommodation_id, URL, isThumbnail) VALUES (3, '3/picture4.jpg', FALSE);
INSERT INTO IMAGES (accommodation_id, URL, isThumbnail) VALUES (3, '3/picture5.jpg', FALSE);
INSERT INTO IMAGES (accommodation_id, URL, isThumbnail) VALUES (4, '4/picture1.jpg', TRUE);
INSERT INTO IMAGES (accommodation_id, URL, isThumbnail) VALUES (4, '4/picture2.jpg', FALSE);
INSERT INTO IMAGES (accommodation_id, URL, isThumbnail) VALUES (4, '4/picture3.jpg', FALSE);
INSERT INTO IMAGES (accommodation_id, URL, isThumbnail) VALUES (4, '4/picture4.jpg', FALSE);
INSERT INTO IMAGES (accommodation_id, URL, isThumbnail) VALUES (4, '4/picture5.jpg', FALSE);
INSERT INTO IMAGES (accommodation_id, URL, isThumbnail) VALUES (5, '5/picture1.jpg', TRUE);
INSERT INTO IMAGES (accommodation_id, URL, isThumbnail) VALUES (5, '5/picture2.jpg', FALSE);
INSERT INTO IMAGES (accommodation_id, URL, isThumbnail) VALUES (5, '5/picture3.jpg', FALSE);
INSERT INTO IMAGES (accommodation_id, URL, isThumbnail) VALUES (5, '5/picture4.jpg', FALSE);
INSERT INTO IMAGES (accommodation_id, URL, isThumbnail) VALUES (5, '5/picture5.jpg', FALSE);
INSERT INTO IMAGES (accommodation_id, URL, isThumbnail) VALUES (6, '6/picture1.jpg', TRUE);
INSERT INTO IMAGES (accommodation_id, URL, isThumbnail) VALUES (6, '6/picture2.jpg', FALSE);
INSERT INTO IMAGES (accommodation_id, URL, isThumbnail) VALUES (6, '6/picture3.jpg', FALSE);
INSERT INTO IMAGES (accommodation_id, URL, isThumbnail) VALUES (6, '6/picture4.jpg', FALSE);
INSERT INTO IMAGES (accommodation_id, URL, isThumbnail) VALUES (6, '6/picture5.jpg', FALSE);
INSERT INTO IMAGES (accommodation_id, URL, isThumbnail) VALUES (7, '7/picture1.jpg', TRUE);
INSERT INTO IMAGES (accommodation_id, URL, isThumbnail) VALUES (7, '7/picture2.jpg', FALSE);
INSERT INTO IMAGES (accommodation_id, URL, isThumbnail) VALUES (7, '7/picture3.jpg', FALSE);
INSERT INTO IMAGES (accommodation_id, URL, isThumbnail) VALUES (7, '7/picture4.jpg', FALSE);
INSERT INTO IMAGES (accommodation_id, URL, isThumbnail) VALUES (7, '7/picture5.jpg', FALSE);
INSERT INTO IMAGES (accommodation_id, URL, isThumbnail) VALUES (8, '8/picture1.jpg', TRUE);
INSERT INTO IMAGES (accommodation_id, URL, isThumbnail) VALUES (8, '8/picture2.jpg', FALSE);
INSERT INTO IMAGES (accommodation_id, URL, isThumbnail) VALUES (8, '8/picture3.jpg', FALSE);
INSERT INTO IMAGES (accommodation_id, URL, isThumbnail) VALUES (8, '8/picture4.jpg', FALSE);
INSERT INTO IMAGES (accommodation_id, URL, isThumbnail) VALUES (8, '8/picture5.jpg', FALSE);
INSERT INTO IMAGES (accommodation_id, URL, isThumbnail) VALUES (9, '9/picture1.jpg', TRUE);
INSERT INTO IMAGES (accommodation_id, URL, isThumbnail) VALUES (9, '9/picture2.jpg', FALSE);
INSERT INTO IMAGES (accommodation_id, URL, isThumbnail) VALUES (9, '9/picture3.jpg', FALSE);
INSERT INTO IMAGES (accommodation_id, URL, isThumbnail) VALUES (9, '9/picture4.jpg', FALSE);
INSERT INTO IMAGES (accommodation_id, URL, isThumbnail) VALUES (9, '9/picture5.jpg', FALSE);
INSERT INTO IMAGES (accommodation_id, URL, isThumbnail) VALUES (10, '10/picture1.jpg', TRUE);
INSERT INTO IMAGES (accommodation_id, URL, isThumbnail) VALUES (10, '10/picture2.jpg', FALSE);
INSERT INTO IMAGES (accommodation_id, URL, isThumbnail) VALUES (10, '10/picture3.jpg', FALSE);
INSERT INTO IMAGES (accommodation_id, URL, isThumbnail) VALUES (10, '10/picture4.jpg', FALSE);
INSERT INTO IMAGES (accommodation_id, URL, isThumbnail) VALUES (10, '10/picture5.jpg', FALSE);
INSERT INTO IMAGES (accommodation_id, URL, isThumbnail) VALUES (11, '11/picture1.jpg', TRUE);
INSERT INTO IMAGES (accommodation_id, URL, isThumbnail) VALUES (11, '11/picture2.jpg', FALSE);
INSERT INTO IMAGES (accommodation_id, URL, isThumbnail) VALUES (11, '11/picture3.jpg', FALSE);
INSERT INTO IMAGES (accommodation_id, URL, isThumbnail) VALUES (11, '11/picture4.jpg', FALSE);
INSERT INTO IMAGES (accommodation_id, URL, isThumbnail) VALUES (11, '11/picture5.jpg', FALSE);
INSERT INTO IMAGES (accommodation_id, URL, isThumbnail) VALUES (12, '12/picture1.jpg', TRUE);
INSERT INTO IMAGES (accommodation_id, URL, isThumbnail) VALUES (12, '12/picture2.jpg', FALSE);
INSERT INTO IMAGES (accommodation_id, URL, isThumbnail) VALUES (12, '12/picture3.jpg', FALSE);
INSERT INTO IMAGES (accommodation_id, URL, isThumbnail) VALUES (12, '12/picture4.jpg', FALSE);
INSERT INTO IMAGES (accommodation_id, URL, isThumbnail) VALUES (12, '12/picture5.jpg', FALSE);
INSERT INTO IMAGES (accommodation_id, URL, isThumbnail) VALUES (13, '13/picture1.jpg', TRUE);
INSERT INTO IMAGES (accommodation_id, URL, isThumbnail) VALUES (13, '13/picture2.jpg', FALSE);
INSERT INTO IMAGES (accommodation_id, URL, isThumbnail) VALUES (13, '13/picture3.jpg', FALSE);
INSERT INTO IMAGES (accommodation_id, URL, isThumbnail) VALUES (13, '13/picture4.jpg', FALSE);
INSERT INTO IMAGES (accommodation_id, URL, isThumbnail) VALUES (13, '13/picture5.jpg', FALSE);
INSERT INTO IMAGES (accommodation_id, URL, isThumbnail) VALUES (14, '14/picture1.jpg', TRUE);
INSERT INTO IMAGES (accommodation_id, URL, isThumbnail) VALUES (14, '14/picture2.jpg', FALSE);
INSERT INTO IMAGES (accommodation_id, URL, isThumbnail) VALUES (14, '14/picture3.jpg', FALSE);
INSERT INTO IMAGES (accommodation_id, URL, isThumbnail) VALUES (14, '14/picture4.jpg', FALSE);
INSERT INTO IMAGES (accommodation_id, URL, isThumbnail) VALUES (14, '14/picture5.jpg', FALSE);
INSERT INTO IMAGES (accommodation_id, URL, isThumbnail) VALUES (15, '15/picture1.jpg', TRUE);
INSERT INTO IMAGES (accommodation_id, URL, isThumbnail) VALUES (15, '15/picture2.jpg', FALSE);
INSERT INTO IMAGES (accommodation_id, URL, isThumbnail) VALUES (15, '15/picture3.jpg', FALSE);
INSERT INTO IMAGES (accommodation_id, URL, isThumbnail) VALUES (15, '15/picture4.jpg', FALSE);
INSERT INTO IMAGES (accommodation_id, URL, isThumbnail) VALUES (15, '15/picture5.jpg', FALSE);
INSERT INTO IMAGES (accommodation_id, URL, isThumbnail) VALUES (16, '16/picture1.jpg', TRUE);
INSERT INTO IMAGES (accommodation_id, URL, isThumbnail) VALUES (16, '16/picture2.jpg', FALSE);
INSERT INTO IMAGES (accommodation_id, URL, isThumbnail) VALUES (16, '16/picture3.jpg', FALSE);
INSERT INTO IMAGES (accommodation_id, URL, isThumbnail) VALUES (16, '16/picture4.jpg', FALSE);
INSERT INTO IMAGES (accommodation_id, URL, isThumbnail) VALUES (16, '16/picture5.jpg', FALSE);
INSERT INTO IMAGES (accommodation_id, URL, isThumbnail) VALUES (17, '17/picture1.jpg', TRUE);
INSERT INTO IMAGES (accommodation_id, URL, isThumbnail) VALUES (17, '17/picture2.jpg', FALSE);
INSERT INTO IMAGES (accommodation_id, URL, isThumbnail) VALUES (17, '17/picture3.jpg', FALSE);
INSERT INTO IMAGES (accommodation_id, URL, isThumbnail) VALUES (17, '17/picture4.jpg', FALSE);
INSERT INTO IMAGES (accommodation_id, URL, isThumbnail) VALUES (17, '17/picture5.jpg', FALSE);
INSERT INTO IMAGES (accommodation_id, URL, isThumbnail) VALUES (18, '18/picture1.jpg', TRUE);
INSERT INTO IMAGES (accommodation_id, URL, isThumbnail) VALUES (18, '18/picture2.jpg', FALSE);
INSERT INTO IMAGES (accommodation_id, URL, isThumbnail) VALUES (18, '18/picture3.jpg', FALSE);
INSERT INTO IMAGES (accommodation_id, URL, isThumbnail) VALUES (18, '18/picture4.jpg', FALSE);
INSERT INTO IMAGES (accommodation_id, URL, isThumbnail) VALUES (18, '18/picture5.jpg', FALSE);
INSERT INTO IMAGES (accommodation_id, URL, isThumbnail) VALUES (19, '19/picture1.jpg', TRUE);
INSERT INTO IMAGES (accommodation_id, URL, isThumbnail) VALUES (19, '19/picture2.jpg', FALSE);
INSERT INTO IMAGES (accommodation_id, URL, isThumbnail) VALUES (19, '19/picture3.jpg', FALSE);
INSERT INTO IMAGES (accommodation_id, URL, isThumbnail) VALUES (19, '19/picture4.jpg', FALSE);
INSERT INTO IMAGES (accommodation_id, URL, isThumbnail) VALUES (19, '19/picture5.jpg', FALSE);
INSERT INTO IMAGES (accommodation_id, URL, isThumbnail) VALUES (20, '20/picture1.jpg', TRUE);
INSERT INTO IMAGES (accommodation_id, URL, isThumbnail) VALUES (20, '20/picture2.jpg', FALSE);
INSERT INTO IMAGES (accommodation_id, URL, isThumbnail) VALUES (20, '20/picture3.jpg', FALSE);
INSERT INTO IMAGES (accommodation_id, URL, isThumbnail) VALUES (20, '20/picture4.jpg', FALSE);
INSERT INTO IMAGES (accommodation_id, URL, isThumbnail) VALUES (20, '20/picture5.jpg', FALSE);
INSERT INTO IMAGES (accommodation_id, URL, isThumbnail) VALUES (21, '21/picture1.jpg', TRUE);
INSERT INTO IMAGES (accommodation_id, URL, isThumbnail) VALUES (21, '21/picture2.jpg', FALSE);
INSERT INTO IMAGES (accommodation_id, URL, isThumbnail) VALUES (21, '21/picture3.jpg', FALSE);
INSERT INTO IMAGES (accommodation_id, URL, isThumbnail) VALUES (21, '21/picture4.jpg', FALSE);
INSERT INTO IMAGES (accommodation_id, URL, isThumbnail) VALUES (21, '21/picture5.jpg', FALSE);
INSERT INTO IMAGES (accommodation_id, URL, isThumbnail) VALUES (22, '22/picture1.jpg', TRUE);
INSERT INTO IMAGES (accommodation_id, URL, isThumbnail) VALUES (22, '22/picture2.jpg', FALSE);
INSERT INTO IMAGES (accommodation_id, URL, isThumbnail) VALUES (22, '22/picture3.jpg', FALSE);
INSERT INTO IMAGES (accommodation_id, URL, isThumbnail) VALUES (22, '22/picture4.jpg', FALSE);
INSERT INTO IMAGES (accommodation_id, URL, isThumbnail) VALUES (22, '22/picture5.jpg', FALSE);
INSERT INTO IMAGES (accommodation_id, URL, isThumbnail) VALUES (23, '23/picture1.jpg', TRUE);
INSERT INTO IMAGES (accommodation_id, URL, isThumbnail) VALUES (23, '23/picture2.jpg', FALSE);
INSERT INTO IMAGES (accommodation_id, URL, isThumbnail) VALUES (23, '23/picture3.jpg', FALSE);
INSERT INTO IMAGES (accommodation_id, URL, isThumbnail) VALUES (23, '23/picture4.jpg', FALSE);
INSERT INTO IMAGES (accommodation_id, URL, isThumbnail) VALUES (23, '23/picture5.jpg', FALSE);
INSERT INTO IMAGES (accommodation_id, URL, isThumbnail) VALUES (24, '24/picture1.jpg', TRUE);
INSERT INTO IMAGES (accommodation_id, URL, isThumbnail) VALUES (24, '24/picture2.jpg', FALSE);
INSERT INTO IMAGES (accommodation_id, URL, isThumbnail) VALUES (24, '24/picture3.jpg', FALSE);
INSERT INTO IMAGES (accommodation_id, URL, isThumbnail) VALUES (24, '24/picture4.jpg', FALSE);
INSERT INTO IMAGES (accommodation_id, URL, isThumbnail) VALUES (24, '24/picture5.jpg', FALSE);
INSERT INTO IMAGES (accommodation_id, URL, isThumbnail) VALUES (25, '25/picture1.jpg', TRUE);
INSERT INTO IMAGES (accommodation_id, URL, isThumbnail) VALUES (25, '25/picture2.jpg', FALSE);
INSERT INTO IMAGES (accommodation_id, URL, isThumbnail) VALUES (25, '25/picture3.jpg', FALSE);
INSERT INTO IMAGES (accommodation_id, URL, isThumbnail) VALUES (25, '25/picture4.jpg', FALSE);
INSERT INTO IMAGES (accommodation_id, URL, isThumbnail) VALUES (25, '25/picture5.jpg', FALSE);
INSERT INTO IMAGES (accommodation_id, URL, isThumbnail) VALUES (26, '26/picture1.jpg', TRUE);
INSERT INTO IMAGES (accommodation_id, URL, isThumbnail) VALUES (26, '26/picture2.jpg', FALSE);
INSERT INTO IMAGES (accommodation_id, URL, isThumbnail) VALUES (26, '26/picture3.jpg', FALSE);
INSERT INTO IMAGES (accommodation_id, URL, isThumbnail) VALUES (26, '26/picture4.jpg', FALSE);
INSERT INTO IMAGES (accommodation_id, URL, isThumbnail) VALUES (26, '26/picture5.jpg', FALSE);
INSERT INTO IMAGES (accommodation_id, URL, isThumbnail) VALUES (27, '27/picture1.jpg', TRUE);
INSERT INTO IMAGES (accommodation_id, URL, isThumbnail) VALUES (27, '27/picture2.jpg', FALSE);
INSERT INTO IMAGES (accommodation_id, URL, isThumbnail) VALUES (27, '27/picture3.jpg', FALSE);
INSERT INTO IMAGES (accommodation_id, URL, isThumbnail) VALUES (27, '27/picture4.jpg', FALSE);
INSERT INTO IMAGES (accommodation_id, URL, isThumbnail) VALUES (27, '27/picture5.jpg', FALSE);
INSERT INTO IMAGES (accommodation_id, URL, isThumbnail) VALUES (28, '28/picture1.jpg', TRUE);
INSERT INTO IMAGES (accommodation_id, URL, isThumbnail) VALUES (28, '28/picture2.jpg', FALSE);
INSERT INTO IMAGES (accommodation_id, URL, isThumbnail) VALUES (28, '28/picture3.jpg', FALSE);
INSERT INTO IMAGES (accommodation_id, URL, isThumbnail) VALUES (28, '28/picture4.jpg', FALSE);
INSERT INTO IMAGES (accommodation_id, URL, isThumbnail) VALUES (28, '28/picture5.jpg', FALSE);
INSERT INTO IMAGES (accommodation_id, URL, isThumbnail) VALUES (29, '29/picture1.jpg', TRUE);
INSERT INTO IMAGES (accommodation_id, URL, isThumbnail) VALUES (29, '29/picture2.jpg', FALSE);
INSERT INTO IMAGES (accommodation_id, URL, isThumbnail) VALUES (29, '29/picture3.jpg', FALSE);
INSERT INTO IMAGES (accommodation_id, URL, isThumbnail) VALUES (29, '29/picture4.jpg', FALSE);
INSERT INTO IMAGES (accommodation_id, URL, isThumbnail) VALUES (29, '29/picture5.jpg', FALSE);
INSERT INTO IMAGES (accommodation_id, URL, isThumbnail) VALUES (30, '30/picture1.jpg', TRUE);
INSERT INTO IMAGES (accommodation_id, URL, isThumbnail) VALUES (30, '30/picture2.jpg', FALSE);
INSERT INTO IMAGES (accommodation_id, URL, isThumbnail) VALUES (30, '30/picture3.jpg', FALSE);
INSERT INTO IMAGES (accommodation_id, URL, isThumbnail) VALUES (30, '30/picture4.jpg', FALSE);
INSERT INTO IMAGES (accommodation_id, URL, isThumbnail) VALUES (30, '30/picture5.jpg', FALSE);
insert into REVIEWS (user_id, accommodation_id, review, rating) values (14, 30, 'Cras mi pede, malesuada in, imperdiet et, commodo vulputate, justo. In blandit ultrices enim. Lorem ipsum dolor sit amet, consectetuer adipiscing elit.', 3);
insert into REVIEWS (user_id, accommodation_id, review, rating) values (1, 20, 'Morbi porttitor lorem id ligula. Suspendisse ornare consequat lectus. In est risus, auctor sed, tristique in, tempus sit amet, sem.', 2);
insert into REVIEWS (user_id, accommodation_id, review, rating) values (23, 4, 'Curabitur gravida nisi at nibh. In hac habitasse platea dictumst. Aliquam augue quam, sollicitudin vitae, consectetuer eget, rutrum at, lorem.

Integer tincidunt ante vel ipsum. Praesent blandit lacinia erat. Vestibulum sed magna at nunc commodo placerat.', 5);
insert into REVIEWS (user_id, accommodation_id, review, rating) values (15, 20, 'Suspendisse potenti. In eleifend quam a odio. In hac habitasse platea dictumst.

Maecenas ut massa quis augue luctus tincidunt. Nulla mollis molestie lorem. Quisque ut erat.

Curabitur gravida nisi at nibh. In hac habitasse platea dictumst. Aliquam augue quam, sollicitudin vitae, consectetuer eget, rutrum at, lorem.', 4);
insert into REVIEWS (user_id, accommodation_id, review, rating) values (5, 7, 'Maecenas ut massa quis augue luctus tincidunt. Nulla mollis molestie lorem. Quisque ut erat.

Curabitur gravida nisi at nibh. In hac habitasse platea dictumst. Aliquam augue quam, sollicitudin vitae, consectetuer eget, rutrum at, lorem.', 1);
insert into REVIEWS (user_id, accommodation_id, review, rating) values (21, 3, 'Etiam vel augue. Vestibulum rutrum rutrum neque. Aenean auctor gravida sem.

Praesent id massa id nisl venenatis lacinia. Aenean sit amet justo. Morbi ut odio.', 3);
insert into REVIEWS (user_id, accommodation_id, review, rating) values (16, 26, 'In sagittis dui vel nisl. Duis ac nibh. Fusce lacus purus, aliquet at, feugiat non, pretium quis, lectus.

Suspendisse potenti. In eleifend quam a odio. In hac habitasse platea dictumst.

Maecenas ut massa quis augue luctus tincidunt. Nulla mollis molestie lorem. Quisque ut erat.', 3);
insert into REVIEWS (user_id, accommodation_id, review, rating) values (4, 24, 'Donec diam neque, vestibulum eget, vulputate ut, ultrices vel, augue. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec pharetra, magna vestibulum aliquet ultrices, erat tortor sollicitudin mi, sit amet lobortis sapien sapien non mi. Integer ac neque.

Duis bibendum. Morbi non quam nec dui luctus rutrum. Nulla tellus.

In sagittis dui vel nisl. Duis ac nibh. Fusce lacus purus, aliquet at, feugiat non, pretium quis, lectus.', 2);
insert into REVIEWS (user_id, accommodation_id, review, rating) values (16, 13, 'Pellentesque at nulla. Suspendisse potenti. Cras in purus eu magna vulputate luctus.', 4);
insert into REVIEWS (user_id, accommodation_id, review, rating) values (15, 13, 'Aliquam quis turpis eget elit sodales scelerisque. Mauris sit amet eros. Suspendisse accumsan tortor quis turpis.

Sed ante. Vivamus tortor. Duis mattis egestas metus.', 4);
insert into REVIEWS (user_id, accommodation_id, review, rating) values (6, 26, 'Nullam porttitor lacus at turpis. Donec posuere metus vitae ipsum. Aliquam non mauris.

Morbi non lectus. Aliquam sit amet diam in magna bibendum imperdiet. Nullam orci pede, venenatis non, sodales sed, tincidunt eu, felis.

Fusce posuere felis sed lacus. Morbi sem mauris, laoreet ut, rhoncus aliquet, pulvinar sed, nisl. Nunc rhoncus dui vel sem.', 2);
insert into REVIEWS (user_id, accommodation_id, review, rating) values (27, 18, 'Maecenas ut massa quis augue luctus tincidunt. Nulla mollis molestie lorem. Quisque ut erat.', 3);
insert into REVIEWS (user_id, accommodation_id, review, rating) values (7, 30, 'Nam ultrices, libero non mattis pulvinar, nulla pede ullamcorper augue, a suscipit nulla elit ac nulla. Sed vel enim sit amet nunc viverra dapibus. Nulla suscipit ligula in lacus.

Curabitur at ipsum ac tellus semper interdum. Mauris ullamcorper purus sit amet nulla. Quisque arcu libero, rutrum ac, lobortis vel, dapibus at, diam.', 5);
insert into REVIEWS (user_id, accommodation_id, review, rating) values (8, 1, 'Morbi non lectus. Aliquam sit amet diam in magna bibendum imperdiet. Nullam orci pede, venenatis non, sodales sed, tincidunt eu, felis.', 1);
insert into REVIEWS (user_id, accommodation_id, review, rating) values (5, 3, 'Nam ultrices, libero non mattis pulvinar, nulla pede ullamcorper augue, a suscipit nulla elit ac nulla. Sed vel enim sit amet nunc viverra dapibus. Nulla suscipit ligula in lacus.', 5);
insert into REVIEWS (user_id, accommodation_id, review, rating) values (27, 2, 'Curabitur in libero ut massa volutpat convallis. Morbi odio odio, elementum eu, interdum eu, tincidunt in, leo. Maecenas pulvinar lobortis est.

Phasellus sit amet erat. Nulla tempus. Vivamus in felis eu sapien cursus vestibulum.', 5);
insert into REVIEWS (user_id, accommodation_id, review, rating) values (24, 20, 'Curabitur in libero ut massa volutpat convallis. Morbi odio odio, elementum eu, interdum eu, tincidunt in, leo. Maecenas pulvinar lobortis est.', 3);
insert into REVIEWS (user_id, accommodation_id, review, rating) values (25, 29, 'Nulla ut erat id mauris vulputate elementum. Nullam varius. Nulla facilisi.

Cras non velit nec nisi vulputate nonummy. Maecenas tincidunt lacus at velit. Vivamus vel nulla eget eros elementum pellentesque.

Quisque porta volutpat erat. Quisque erat eros, viverra eget, congue eget, semper rutrum, nulla. Nunc purus.', 1);
insert into REVIEWS (user_id, accommodation_id, review, rating) values (30, 1, 'Quisque id justo sit amet sapien dignissim vestibulum. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Nulla dapibus dolor vel est. Donec odio justo, sollicitudin ut, suscipit a, feugiat et, eros.

Vestibulum ac est lacinia nisi venenatis tristique. Fusce congue, diam id ornare imperdiet, sapien urna pretium nisl, ut volutpat sapien arcu sed augue. Aliquam erat volutpat.

In congue. Etiam justo. Etiam pretium iaculis justo.', 1);
insert into REVIEWS (user_id, accommodation_id, review, rating) values (5, 16, 'Pellentesque at nulla. Suspendisse potenti. Cras in purus eu magna vulputate luctus.', 1);
insert into REVIEWS (user_id, accommodation_id, review, rating) values (20, 25, 'Vestibulum ac est lacinia nisi venenatis tristique. Fusce congue, diam id ornare imperdiet, sapien urna pretium nisl, ut volutpat sapien arcu sed augue. Aliquam erat volutpat.', 3);
insert into REVIEWS (user_id, accommodation_id, review, rating) values (13, 14, 'Phasellus sit amet erat. Nulla tempus. Vivamus in felis eu sapien cursus vestibulum.

Proin eu mi. Nulla ac enim. In tempor, turpis nec euismod scelerisque, quam turpis adipiscing lorem, vitae mattis nibh ligula nec sem.', 5);
insert into REVIEWS (user_id, accommodation_id, review, rating) values (2, 19, 'Curabitur in libero ut massa volutpat convallis. Morbi odio odio, elementum eu, interdum eu, tincidunt in, leo. Maecenas pulvinar lobortis est.', 5);
insert into REVIEWS (user_id, accommodation_id, review, rating) values (27, 5, 'Cras non velit nec nisi vulputate nonummy. Maecenas tincidunt lacus at velit. Vivamus vel nulla eget eros elementum pellentesque.

Quisque porta volutpat erat. Quisque erat eros, viverra eget, congue eget, semper rutrum, nulla. Nunc purus.

Phasellus in felis. Donec semper sapien a libero. Nam dui.', 2);
insert into REVIEWS (user_id, accommodation_id, review, rating) values (3, 9, 'In sagittis dui vel nisl. Duis ac nibh. Fusce lacus purus, aliquet at, feugiat non, pretium quis, lectus.

Suspendisse potenti. In eleifend quam a odio. In hac habitasse platea dictumst.

Maecenas ut massa quis augue luctus tincidunt. Nulla mollis molestie lorem. Quisque ut erat.', 4);
insert into REVIEWS (user_id, accommodation_id, review, rating) values (27, 23, 'Suspendisse potenti. In eleifend quam a odio. In hac habitasse platea dictumst.

Maecenas ut massa quis augue luctus tincidunt. Nulla mollis molestie lorem. Quisque ut erat.', 1);
insert into REVIEWS (user_id, accommodation_id, review, rating) values (13, 26, 'Integer ac leo. Pellentesque ultrices mattis odio. Donec vitae nisi.

Nam ultrices, libero non mattis pulvinar, nulla pede ullamcorper augue, a suscipit nulla elit ac nulla. Sed vel enim sit amet nunc viverra dapibus. Nulla suscipit ligula in lacus.', 5);
insert into REVIEWS (user_id, accommodation_id, review, rating) values (4, 16, 'Proin leo odio, porttitor id, consequat in, consequat ut, nulla. Sed accumsan felis. Ut at dolor quis odio consequat varius.

Integer ac leo. Pellentesque ultrices mattis odio. Donec vitae nisi.

Nam ultrices, libero non mattis pulvinar, nulla pede ullamcorper augue, a suscipit nulla elit ac nulla. Sed vel enim sit amet nunc viverra dapibus. Nulla suscipit ligula in lacus.', 5);
insert into REVIEWS (user_id, accommodation_id, review, rating) values (14, 22, 'Morbi non lectus. Aliquam sit amet diam in magna bibendum imperdiet. Nullam orci pede, venenatis non, sodales sed, tincidunt eu, felis.

Fusce posuere felis sed lacus. Morbi sem mauris, laoreet ut, rhoncus aliquet, pulvinar sed, nisl. Nunc rhoncus dui vel sem.', 3);
insert into REVIEWS (user_id, accommodation_id, review, rating) values (6, 4, 'In sagittis dui vel nisl. Duis ac nibh. Fusce lacus purus, aliquet at, feugiat non, pretium quis, lectus.

Suspendisse potenti. In eleifend quam a odio. In hac habitasse platea dictumst.', 4);
insert into REVIEWS (user_id, accommodation_id, review, rating) values (12, 3, 'Quisque porta volutpat erat. Quisque erat eros, viverra eget, congue eget, semper rutrum, nulla. Nunc purus.

Phasellus in felis. Donec semper sapien a libero. Nam dui.', 4);
insert into REVIEWS (user_id, accommodation_id, review, rating) values (3, 15, 'Aenean lectus. Pellentesque eget nunc. Donec quis orci eget orci vehicula condimentum.

Curabitur in libero ut massa volutpat convallis. Morbi odio odio, elementum eu, interdum eu, tincidunt in, leo. Maecenas pulvinar lobortis est.

Phasellus sit amet erat. Nulla tempus. Vivamus in felis eu sapien cursus vestibulum.', 3);
insert into REVIEWS (user_id, accommodation_id, review, rating) values (10, 9, 'Etiam vel augue. Vestibulum rutrum rutrum neque. Aenean auctor gravida sem.', 2);
insert into REVIEWS (user_id, accommodation_id, review, rating) values (30, 28, 'Duis aliquam convallis nunc. Proin at turpis a pede posuere nonummy. Integer non velit.', 1);
insert into REVIEWS (user_id, accommodation_id, review, rating) values (20, 18, 'Phasellus sit amet erat. Nulla tempus. Vivamus in felis eu sapien cursus vestibulum.

Proin eu mi. Nulla ac enim. In tempor, turpis nec euismod scelerisque, quam turpis adipiscing lorem, vitae mattis nibh ligula nec sem.', 2);
insert into REVIEWS (user_id, accommodation_id, review, rating) values (4, 19, 'Praesent blandit. Nam nulla. Integer pede justo, lacinia eget, tincidunt eget, tempus vel, pede.

Morbi porttitor lorem id ligula. Suspendisse ornare consequat lectus. In est risus, auctor sed, tristique in, tempus sit amet, sem.', 4);
insert into REVIEWS (user_id, accommodation_id, review, rating) values (19, 21, 'Aenean lectus. Pellentesque eget nunc. Donec quis orci eget orci vehicula condimentum.', 2);
insert into REVIEWS (user_id, accommodation_id, review, rating) values (4, 1, 'Curabitur gravida nisi at nibh. In hac habitasse platea dictumst. Aliquam augue quam, sollicitudin vitae, consectetuer eget, rutrum at, lorem.

Integer tincidunt ante vel ipsum. Praesent blandit lacinia erat. Vestibulum sed magna at nunc commodo placerat.', 3);
insert into REVIEWS (user_id, accommodation_id, review, rating) values (17, 9, 'Fusce posuere felis sed lacus. Morbi sem mauris, laoreet ut, rhoncus aliquet, pulvinar sed, nisl. Nunc rhoncus dui vel sem.

Sed sagittis. Nam congue, risus semper porta volutpat, quam pede lobortis ligula, sit amet eleifend pede libero quis orci. Nullam molestie nibh in lectus.', 2);
insert into REVIEWS (user_id, accommodation_id, review, rating) values (24, 24, 'Morbi non lectus. Aliquam sit amet diam in magna bibendum imperdiet. Nullam orci pede, venenatis non, sodales sed, tincidunt eu, felis.', 1);
insert into REVIEWS (user_id, accommodation_id, review, rating) values (8, 30, 'In quis justo. Maecenas rhoncus aliquam lacus. Morbi quis tortor id nulla ultrices aliquet.

Maecenas leo odio, condimentum id, luctus nec, molestie sed, justo. Pellentesque viverra pede ac diam. Cras pellentesque volutpat dui.

Maecenas tristique, est et tempus semper, est quam pharetra magna, ac consequat metus sapien ut nunc. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Mauris viverra diam vitae quam. Suspendisse potenti.', 4);
insert into REVIEWS (user_id, accommodation_id, review, rating) values (13, 30, 'Curabitur in libero ut massa volutpat convallis. Morbi odio odio, elementum eu, interdum eu, tincidunt in, leo. Maecenas pulvinar lobortis est.

Phasellus sit amet erat. Nulla tempus. Vivamus in felis eu sapien cursus vestibulum.', 1);
insert into REVIEWS (user_id, accommodation_id, review, rating) values (19, 12, 'Quisque porta volutpat erat. Quisque erat eros, viverra eget, congue eget, semper rutrum, nulla. Nunc purus.

Phasellus in felis. Donec semper sapien a libero. Nam dui.

Proin leo odio, porttitor id, consequat in, consequat ut, nulla. Sed accumsan felis. Ut at dolor quis odio consequat varius.', 3);
insert into REVIEWS (user_id, accommodation_id, review, rating) values (9, 15, 'Sed sagittis. Nam congue, risus semper porta volutpat, quam pede lobortis ligula, sit amet eleifend pede libero quis orci. Nullam molestie nibh in lectus.

Pellentesque at nulla. Suspendisse potenti. Cras in purus eu magna vulputate luctus.

Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Vivamus vestibulum sagittis sapien. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.', 3);
insert into REVIEWS (user_id, accommodation_id, review, rating) values (8, 16, 'Proin leo odio, porttitor id, consequat in, consequat ut, nulla. Sed accumsan felis. Ut at dolor quis odio consequat varius.

Integer ac leo. Pellentesque ultrices mattis odio. Donec vitae nisi.

Nam ultrices, libero non mattis pulvinar, nulla pede ullamcorper augue, a suscipit nulla elit ac nulla. Sed vel enim sit amet nunc viverra dapibus. Nulla suscipit ligula in lacus.', 1);
insert into REVIEWS (user_id, accommodation_id, review, rating) values (9, 3, 'Vestibulum quam sapien, varius ut, blandit non, interdum in, ante. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Duis faucibus accumsan odio. Curabitur convallis.

Duis consequat dui nec nisi volutpat eleifend. Donec ut dolor. Morbi vel lectus in quam fringilla rhoncus.', 5);
insert into REVIEWS (user_id, accommodation_id, review, rating) values (25, 16, 'Vestibulum ac est lacinia nisi venenatis tristique. Fusce congue, diam id ornare imperdiet, sapien urna pretium nisl, ut volutpat sapien arcu sed augue. Aliquam erat volutpat.', 5);
insert into REVIEWS (user_id, accommodation_id, review, rating) values (26, 11, 'Nullam porttitor lacus at turpis. Donec posuere metus vitae ipsum. Aliquam non mauris.

Morbi non lectus. Aliquam sit amet diam in magna bibendum imperdiet. Nullam orci pede, venenatis non, sodales sed, tincidunt eu, felis.

Fusce posuere felis sed lacus. Morbi sem mauris, laoreet ut, rhoncus aliquet, pulvinar sed, nisl. Nunc rhoncus dui vel sem.', 3);
insert into REVIEWS (user_id, accommodation_id, review, rating) values (14, 23, 'Praesent blandit. Nam nulla. Integer pede justo, lacinia eget, tincidunt eget, tempus vel, pede.', 5);
insert into REVIEWS (user_id, accommodation_id, review, rating) values (26, 4, 'Vestibulum quam sapien, varius ut, blandit non, interdum in, ante. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Duis faucibus accumsan odio. Curabitur convallis.

Duis consequat dui nec nisi volutpat eleifend. Donec ut dolor. Morbi vel lectus in quam fringilla rhoncus.

Mauris enim leo, rhoncus sed, vestibulum sit amet, cursus id, turpis. Integer aliquet, massa id lobortis convallis, tortor risus dapibus augue, vel accumsan tellus nisi eu orci. Mauris lacinia sapien quis libero.', 5);
insert into BOOKINGS (user_id, accommodation_id, adults, children, total_price, check_in, check_out, status) values (29, 2, 1, 2, 999, '2022-02-04', '2022-06-10', "NOT_PAID");
insert into BOOKINGS (user_id, accommodation_id, adults, children, total_price, check_in, check_out, status) values (4, 5, 1, 2, 999, '2022-05-07', '2022-07-08', "NOT_PAID");
insert into BOOKINGS (user_id, accommodation_id, adults, children, total_price, check_in, check_out, status) values (17, 28, 2, 2, 999, '2022-02-22', '2022-08-01', "NOT_PAID");
insert into BOOKINGS (user_id, accommodation_id, adults, children, total_price, check_in, check_out, status) values (15, 23, 2, 2, 999, '2022-04-15', '2022-07-18', "NOT_PAID");
insert into BOOKINGS (user_id, accommodation_id, adults, children, total_price, check_in, check_out, status) values (18, 14, 2, 2, 999, '2022-02-11', '2022-06-10', "NOT_PAID");
insert into BOOKINGS (user_id, accommodation_id, adults, children, total_price, check_in, check_out, status) values (11, 12, 2, 2, 999, '2022-01-19', '2022-05-21', "NOT_PAID");
insert into BOOKINGS (user_id, accommodation_id, adults, children, total_price, check_in, check_out, status) values (10, 8, 5, 2, 999, '2022-04-21', '2022-07-18', "NOT_PAID");
insert into BOOKINGS (user_id, accommodation_id, adults, children, total_price, check_in, check_out, status) values (26, 29, 5, 2, 999, '2022-01-31', '2022-07-17', "NOT_PAID");
insert into BOOKINGS (user_id, accommodation_id, adults, children, total_price, check_in, check_out, status) values (2, 11, 2, 2, 999, '2022-04-30', '2022-06-17', "NOT_PAID");
insert into BOOKINGS (user_id, accommodation_id, adults, children, total_price, check_in, check_out, status) values (4, 1, 4, 2, 999, '2022-01-12', '2022-05-30', "NOT_PAID");
insert into BOOKINGS (user_id, accommodation_id, adults, children, total_price, check_in, check_out, status) values (22, 9, 3, 2, 999, '2022-04-20', '2022-05-15', "NOT_PAID");
insert into BOOKINGS (user_id, accommodation_id, adults, children, total_price, check_in, check_out, status) values (20, 3, 4, 2, 999, '2022-05-02', '2022-06-11', "NOT_PAID");
insert into BOOKINGS (user_id, accommodation_id, adults, children, total_price, check_in, check_out, status) values (2, 5, 3, 2, 999, '2022-02-08', '2022-07-19', "NOT_PAID");
insert into BOOKINGS (user_id, accommodation_id, adults, children, total_price, check_in, check_out, status) values (23, 5, 1, 2, 999, '2022-02-25', '2022-07-24', "NOT_PAID");
insert into BOOKINGS (user_id, accommodation_id, adults, children, total_price, check_in, check_out, status) values (29, 13, 4, 2, 999, '2022-01-26', '2022-07-08', "NOT_PAID");
insert into BOOKINGS (user_id, accommodation_id, adults, children, total_price, check_in, check_out, status) values (9, 16, 5, 2, 999, '2022-02-19', '2022-07-30', "NOT_PAID");
insert into BOOKINGS (user_id, accommodation_id, adults, children, total_price, check_in, check_out, status) values (7, 13, 3, 2, 999, '2022-01-18', '2022-06-19', "NOT_PAID");
insert into BOOKINGS (user_id, accommodation_id, adults, children, total_price, check_in, check_out, status) values (19, 13, 2, 2, 999, '2022-04-18', '2022-08-07', "NOT_PAID");
insert into BOOKINGS (user_id, accommodation_id, adults, children, total_price, check_in, check_out, status) values (4, 27, 3, 2, 999, '2022-04-12', '2022-07-05', "NOT_PAID");
insert into BOOKINGS (user_id, accommodation_id, adults, children, total_price, check_in, check_out, status) values (12, 20, 4, 2, 999, '2022-02-15', '2022-08-07', "NOT_PAID");
insert into BOOKINGS (user_id, accommodation_id, adults, children, total_price, check_in, check_out, status) values (26, 27, 5, 2, 999, '2022-05-06', '2022-06-02', "NOT_PAID");
insert into BOOKINGS (user_id, accommodation_id, adults, children, total_price, check_in, check_out, status) values (7, 22, 1, 2, 999, '2022-03-26', '2022-05-10', "NOT_PAID");
insert into BOOKINGS (user_id, accommodation_id, adults, children, total_price, check_in, check_out, status) values (6, 5, 3, 2, 999, '2022-03-30', '2022-05-15', "NOT_PAID");
insert into BOOKINGS (user_id, accommodation_id, adults, children, total_price, check_in, check_out, status) values (5, 30, 1, 2, 999, '2022-03-13', '2022-05-19', "NOT_PAID");
insert into BOOKINGS (user_id, accommodation_id, adults, children, total_price, check_in, check_out, status) values (18, 11, 2, 2, 999, '2022-01-30', '2022-06-09', "NOT_PAID");