CREATE DATABASE IF NOT EXISTS php_news;

ALTER DATABASE php_news
  DEFAULT CHARACTER SET utf8
  DEFAULT COLLATE utf8_general_ci;

USE php_news;

CREATE TABLE  news ( id INT NOT NULL AUTO_INCREMENT , title VARCHAR(250) NOT NULL , content TEXT NOT NULL , PRIMARY KEY (id)) ENGINE = InnoDB;

INSERT INTO news (id, title, content) VALUES ('1', 'Hello World', 'This is the first article.'), ('2', 'Try it on GitHub', 'You can download this source code from GitHub: <a href="https://github.com/madigabor/php-sample-news">Download</a>');