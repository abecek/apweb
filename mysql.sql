CREATE TABLE `users` (
	  `id_user` smallint(6) NOT NULL AUTO_INCREMENT PRIMARY KEY,
	  `login` varchar(25) NOT NULL,
	  `email` varchar(30) NOT NULL,
	  `password` char(40) NOT NULL,
	  `name` varchar(25) NOT NULL,
	  `surname` varchar(35) NOT NULL,
	  `rank` tinyint(1) DEFAULT '0',
	  `data` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE `users`
  ADD UNIQUE KEY `login_UNIQUE` (`login`),
  ADD UNIQUE KEY `email_UNIQUE` (`email`);

CREATE TABLE `articles` (
	  `id_article` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
	  `title` varchar(150) NOT NULL,
	  `content` varchar(2000) NOT NULL,
	  `id_category` tinyint(2) NOT NULL,
	  `data` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE `articles`
  ADD UNIQUE KEY `title_UNIQUE` (`title`);
  
CREATE TABLE `comments` (
	  `id_comment` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
	  `content` varchar(300) NOT NULL,
	  `data` date NOT NULL,
	  `id_user` smallint(6) NOT NULL,
	  `id_article` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE CASCADE,
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`id_article`) REFERENCES `articles` (`id_article`) ON DELETE CASCADE;
*/
  
ALTER TABLE comments
ADD FOREIGN KEY user_fk(id_user)
REFERENCES users(id_user)
ON DELETE CASCADE
ON UPDATE NO ACTION;

ALTER TABLE comments
ADD FOREIGN KEY article_fk(id_article)
REFERENCES articles(id_article)
ON DELETE CASCADE
ON UPDATE NO ACTION;


CREATE TABLE `categories` (
	  `id_category` tinyint(3) NOT NULL AUTO_INCREMENT PRIMARY KEY,
	  `name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE articles
ADD FOREIGN KEY cat_fk(id_category)
REFERENCES categories(id_category)
ON DELETE NO ACTION
ON UPDATE NO ACTION;