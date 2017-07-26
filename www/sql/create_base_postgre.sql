CREATE TABLE article_type (
  id SERIAL NOT NULL,
  label VARCHAR (50) NOT NULL,
  is_deleted INT NOT NULL DEFAULT 0,

  PRIMARY KEY (id)
);

INSERT INTO article_type(label)
    VALUES ('article'), ('project'), ('post'), ('autobio');

CREATE TABLE article_theme (
  id SERIAL NOT NULL,
  label VARCHAR (50) NOT NULL,
  is_deleted INT NOT NULL DEFAULT 0,

  PRIMARY KEY (id)
);

INSERT INTO article_theme(label)
    VALUES ('programming'), ('electronics'), ('travel'), ('science'), ('social'), ('work');

CREATE TABLE user_type (
  id SERIAL NOT NULL,
  label VARCHAR(50) NOT NULL,
  is_deleted INT NOT NULL DEFAULT 0,

  PRIMARY KEY (id)
);

INSERT INTO user_type (label)
VALUES ('admin'), ('user');


CREATE TABLE tech (
  id SERIAL NOT NULL,
  label VARCHAR(25) NOT NULL,
  is_deleted INT NOT NULL DEFAULT 0,

  PRIMARY KEY (id)
);

INSERT INTO tech(label)
VALUES ('PHP'), ('JavaScript'), ('Git'), ('Docker'), ('HTML'), ('CSS');

CREATE TABLE status (
  id SERIAL NOT NULL,
  label VARCHAR(25) NOT NULL,
  is_deleted INT NOT NULL DEFAULT 0,

  PRIMARY KEY (id)
);

INSERT INTO status(label)
VALUES ('online'), ('offline'), ('removed');

-- Storage tables
CREATE TABLE articles (
  id SERIAL NOT NULL,
  article_type_id INT NOT NULL,
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
  is_deleted INT NOT NULL DEFAULT 0,

  PRIMARY KEY (id),
  FOREIGN KEY (article_type_id) REFERENCES article_type(id),
  FOREIGN KEY (status_id) REFERENCES status(id)
);

CREATE TABLE users (
  id SERIAL NOT NULL,
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
  id SERIAL NOT NULL,
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
  id SERIAL NOT NULL,
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

-- inserted : 23/07/17