CREATE DATABASE autocompletion CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE autocompletion;


CREATE TABLE animaux (
id INT AUTO_INCREMENT PRIMARY KEY,
nom VARCHAR(255) NOT NULL,
description TEXT NOT NULL
);



INSERT INTO animaux (nom, description) VALUES
('Lion', 'Le lion est un grand félin d’Afrique.'),
('Tigre', 'Le tigre est le plus grand félin sauvage.'),
('Éléphant', 'L’éléphant est le plus gros mammifère terrestre.'),
('Girafe', 'La girafe est l’animal le plus grand du monde.'),
('Zèbre', 'Le zèbre est connu pour ses rayures noires et blanches.'),
('Loup', 'Le loup vit en meute et est très social.'),
('Renard', 'Le renard est un animal rusé et agile.'),
('Panda', 'Le panda mange principalement du bambou.'),
('Koala', 'Le koala vit en Australie et dort beaucoup.'),
('Kangourou', 'Le kangourou est célèbre pour sa poche ventrale.'),
('Hippopotame', 'L’hippopotame est très agressif malgré son apparence.'),
('Rhinocéros', 'Animal massif avec une ou deux cornes.'),
('Ours brun', 'L’ours brun est puissant et omnivore.'),
('Dauphin', 'Le dauphin est très intelligent et sociable.'),
('Requin blanc', 'Un des prédateurs marins les plus connus.'),
('Aigle', 'Oiseau de proie aux capacités visuelles impressionnantes.'),
('Pingouin', 'Oiseau incapable de voler mais excellent nageur.'),
('Tortue', 'La tortue possède une carapace solide.'),
('Serpent', 'Animal reptile sans pattes.'),
('Crocodile', 'Reptile semi-aquatique très puissant.');