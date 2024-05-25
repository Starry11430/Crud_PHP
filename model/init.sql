DROP DATABASE IF EXISTS Crud;
CREATE DATABASE Crud;
USE Crud;
GRANT ALL PRIVILEGES ON test.* TO 'root'@'localhost';

CREATE TABLE tache (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    titre VARCHAR(120),
    description LONGTEXT,
    date_creation DATETIME,
    date_echeance DATE,
    statut BOOLEAN
);


