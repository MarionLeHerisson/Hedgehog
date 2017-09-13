-- Reference tables
CREATE TABLE article_type (
  id INT NOT NULL AUTO_INCREMENT,
  label VARCHAR (50) NOT NULL,
  is_deleted INT NOT NULL DEFAULT 0,

  PRIMARY KEY (id)
);

INSERT INTO article_type(label)
    VALUES ('article'), ('project'), ('post'), ('autobio'), ('static');

CREATE TABLE themes (
  id INT NOT NULL AUTO_INCREMENT,
  label VARCHAR (50) NOT NULL,
  is_deleted INT NOT NULL DEFAULT 0,

  PRIMARY KEY (id)
);

INSERT INTO themes(label)
    VALUES ('programming'), ('electronics'), ('travel'), ('science'), ('social'), ('work');

CREATE TABLE user_type (
  id INT NOT NULL AUTO_INCREMENT,
  label VARCHAR(50) NOT NULL,
  is_deleted INT NOT NULL DEFAULT 0,

  PRIMARY KEY (id)
);

INSERT INTO user_type (label)
VALUES ('admin'), ('user');


CREATE TABLE tech (
  id INT NOT NULL AUTO_INCREMENT,
  label VARCHAR(25) NOT NULL,
  is_deleted INT NOT NULL DEFAULT 0,

  PRIMARY KEY (id)
);

INSERT INTO tech(label)
VALUES ('PHP'), ('JavaScript'), ('Git'), ('Docker'), ('HTML'), ('CSS');

CREATE TABLE status (
  id INT NOT NULL AUTO_INCREMENT,
  label VARCHAR(25) NOT NULL,
  is_deleted INT NOT NULL DEFAULT 0,

  PRIMARY KEY (id)
);

INSERT INTO status(label)
VALUES ('online'), ('offline'), ('removed');

-- Storage tables
CREATE TABLE articles (
  id INT NOT NULL AUTO_INCREMENT,
  article_type_id INT NOT NULL,
  theme_id INT DEFAULT NULL,
  author_id INT NOT NULL DEFAULT 1,
  title VARCHAR (50) NOT NULL,
  intro VARCHAR(100) DEFAULT NULL,
  issue_sum VARCHAR(100) DEFAULT NULL,
  expected VARCHAR(255) DEFAULT NULL,
  current VARCHAR(255) DEFAULT NULL,
  content TEXT NOT NULL,
  url VARCHAR(100) NOT NULL,
  status_id INT NOT NULL DEFAULT 2,
  created_at TIMESTAMP NOT NULL DEFAULT NOW(),
  updated_at TIMESTAMP DEFAULT NULL,
  is_deleted INT NOT NULL DEFAULT 0,

  PRIMARY KEY (id),
  FOREIGN KEY (article_type_id) REFERENCES article_type(id),
  FOREIGN KEY (theme_id) REFERENCES themes(id),
  FOREIGN KEY (status_id) REFERENCES status(id)
);

CREATE TABLE users (
  id INT NOT NULL AUTO_INCREMENT,
  login VARCHAR(50) NOT NULL,
  mail VARCHAR(100) NOT NULL,
  password VARCHAR(50) NOT NULL,
  user_type_id INT NOT NULL DEFAULT 2,
  firstname VARCHAR(50) DEFAULT NULL,
  lastname VARCHAR(50) DEFAULT NULL,
  created_at TIMESTAMP NOT NULL DEFAULT NOW(),
  is_deleted INT NOT NULL DEFAULT 0,

  PRIMARY KEY (id)
);

CREATE TABLE comments (
  id INT NOT NULL AUTO_INCREMENT,
  content TEXT NOT NULL,
  author_id INT NOT NULL,
  article_id INT NOT NULL,
  parent_id INT DEFAULT NULL,
  created_at TIMESTAMP NOT NULL DEFAULT NOW(),
  is_deleted INT NOT NULL DEFAULT 0,

  PRIMARY KEY (id),
  FOREIGN KEY (author_id) REFERENCES users(id),
  FOREIGN KEY (article_id) REFERENCES articles(id),
  FOREIGN KEY (parent_id) REFERENCES comments(id)
);

CREATE TABLE logs (
  id INT NOT NULL AUTO_INCREMENT,
  article_id INT NOT NULL,
  author_id INT NOT NULL,
  updated_at TIMESTAMP NOT NULL DEFAULT NOW(),
  old_status INT NOT NULL,
  new_status INT NOT NULL,
  -- updated_field VARCHAR(25) DEFAULT NULL,

  PRIMARY KEY(id),
  FOREIGN KEY(article_id) REFERENCES articles(id),
  FOREIGN KEY(author_id) REFERENCES users(id),
  FOREIGN KEY(old_status) REFERENCES status(id),
  FOREIGN KEY(new_status) REFERENCES status(id)
);

CREATE TABLE medias (
  id INT NOT NULL AUTO_INCREMENT,
  src VARCHAR(255) NOT NULL,
  article_id INT NOT NULL,
  is_main INT DEFAULT 0,
  is_deleted INT NOT NULL DEFAULT 0,

  PRIMARY KEY (id),
  FOREIGN KEY (article_id) REFERENCES articles(id)
);
