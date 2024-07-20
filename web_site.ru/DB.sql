DROP DATABASE IF EXISTS WEB_LAB;
CREATE DATABASE WEB_LAB;
USE WEB_LAB;

CREATE TABLE users (
  id INT PRIMARY KEY AUTO_INCREMENT, 
  username VARCHAR(255) NOT NULL UNIQUE, 
  password VARCHAR(255) NOT NULL, 
  is_admin BOOLEAN NOT NULL
);

CREATE TABLE items (
  id INT PRIMARY KEY AUTO_INCREMENT, 
  name VARCHAR(255) NOT NULL, 
  description TEXT, 
  price DECIMAL(10,2) NOT NULL, 
  image_link VARCHAR(255) 
);

CREATE TABLE cart (
  id INT PRIMARY KEY AUTO_INCREMENT,
  user_id INT NOT NULL,
  item_id INT NOT NULL,
  FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,
  FOREIGN KEY (item_id) REFERENCES items(id) ON DELETE CASCADE
);

INSERT INTO users (username, password, is_admin) VALUES
('admin','d948b7778b17d6683fd61b17d61d9b7b99b9e0fd70a110f3d8c421eaec23ee2c',1);

INSERT INTO items (name, description, price, image_link) VALUES 
('Хоба','Котенок с пушистым хвостом и большими глазами',100.00,'https://tlgrm.ru/_/stickers/e80/caf/e80caf10-3990-4254-bda6-1f5c09851618/1.webp'),
('Закотил','Милый котенок с мягкой шерстью.',200.00,'https://tlgrm.ru/_/stickers/e80/caf/e80caf10-3990-4254-bda6-1f5c09851618/2.webp'),
('Ну привет','Нежный котенок с пятнистой шерстью и любопытным взглядом.',350.00,'https://tlgrm.ru/_/stickers/e80/caf/e80caf10-3990-4254-bda6-1f5c09851618/4.webp'),
('Проснувся','Пушистый котенок, который всегда ищет теплое местечко для сна.',210.00,'https://tlgrm.ru/_/stickers/e80/caf/e80caf10-3990-4254-bda6-1f5c09851618/5.webp'),
('Здравствуйте','Котенок с милыми усиками и мягкими лапками.',180.00,'https://tlgrm.ru/_/stickers/e80/caf/e80caf10-3990-4254-bda6-1f5c09851618/6.webp'),
('Мда трэш...','Маленький котенок, который любит прятаться в тенистых уголках.',400.00,'https://tlgrm.ru/_/stickers/e80/caf/e80caf10-3990-4254-bda6-1f5c09851618/7.webp'),
('Ты собрался','Маленький котенок с круглыми глазами.',100.00,'https://tlgrm.ru/_/stickers/e80/caf/e80caf10-3990-4254-bda6-1f5c09851618/9.webp'),
('Тоска','Игривый котенок с озорными глазами.',240.00,'https://tlgrm.ru/_/stickers/e80/caf/e80caf10-3990-4254-bda6-1f5c09851618/12.webp'),
('Пошли кушац!','Пушистый котенок с элегантной походкой.',130.00,'https://tlgrm.ru/_/stickers/e80/caf/e80caf10-3990-4254-bda6-1f5c09851618/11.webp'),
('Ну да, ну да','Смелый котенок, который не боится ничего, кроме громких звуков.',450.00,'https://tlgrm.ru/_/stickers/e80/caf/e80caf10-3990-4254-bda6-1f5c09851618/8.webp');