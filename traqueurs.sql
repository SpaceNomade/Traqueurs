CREATE TABLE user (
    id SMALLINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    mpd VARCHAR(40) NOT NULL,
    nom VARCHAR(20) NOT NULL,
    email VARCHAR(255) NOT NULL,
    role VARCHAR(20),
) ENGINE=INNODB;

CREATE TABLE Identite (
    id SMALLINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    race VARCHAR(40) NOT NULL,
    poids DECIMAL(5,2),
    taille DECIMAL(3,2) NOT NULL,
    genre VARCHAR(1) NOT NULL,
    age INT(4),
    CONSTRAINT id_caracteristique     
        FOREIGN KEY (caracteristique)          
        REFERENCES caracteristique(id)
) ENGINE=INNODB;


