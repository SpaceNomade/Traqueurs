CREATE TABLE user (
    id SMALLINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    mpd VARCHAR(40) NOT NULL,
    nom VARCHAR(20) NOT NULL,
    email VARCHAR(255) NOT NULL,
    role VARCHAR(20),
) ENGINE=INNODB;

CREATE TABLE identite (
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

CREATE TABLE caracteristique (
    id SMALLINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    pv SMALLINT(4) NOT NULL,
    pm SMALLINT(4) NOT NULL,
    endurance SMALLINT(3) NOT NULL,
    intelligence SMALLINT(3) NOT NULL,
    constitution SMALLINT(3) NOT NULL,
    initiative SMALLINT(3) NOT NULL,
    sagesse SMALLINT(3) NOT NULL,
    chance SMALLINT(3) NOT NULL,
    strengh SMALLINT(3) NOT NULL,
    dexterite SMALLINT(3) NOT NULL,
    potentiel SMALLINT(3) NOT NULL,
    foi SMALLINT(3) NOT NULL,
    bpv SMALLINT(3) NOT NULL,
    bpm SMALLINT(3) NOT NULL,
    physique SMALLINT(3) NOT NULL,
    magique SMALLINT(3) NOT NULL,
    dot SMALLINT(3) NOT NULL,
    absp SMALLINT(3) NOT NULL,
    absm SMALLINT(3) NOT NULL,
    mana SMALLINT(3) NOT NULL,
) ENGINE=INNODB;

CREATE TABLE bijoux (
    id SMALLINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    carac1 VARCHAR(50),
    bonus1 SMALLINT(3),
    carac2 VARCHAR(50),
    bonus2 SMALLINT(3), 
    carac3 VARCHAR(50),
    bonus3 SMALLINT(3),
) ENGINE=INNODB;

CREATE TABLE sort (
    id SMALLINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(250) NOT NULL,
    valeur SMALLINT(3) NOT NULL,
    dot SMALLINT(3) NOT NULL,
    mana SMALLINT(3) NOT NULL,
    basesort VARCHAR(50) NOT NULL,
    typesort VARCHAR(50) NOT NULL,
) ENGINE=INNODB;

CREATE TABLE personnage (
    id SMALLINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    CONSTRAINT id_user     
        FOREIGN KEY (user)          
        REFERENCES user(id),
    CONSTRAINT id_partie
        FOREIGN KEY (partie)
        REFERENCES partie(id),
    CONSTRAINT id_race     
        FOREIGN KEY (race)          
        REFERENCES race(id),
    CONSTRAINT id_xp     
        FOREIGN KEY (xp)          
        REFERENCES xp(id),
    CONSTRAINT id_partcularite     
        FOREIGN KEY (particularite)          
        REFERENCES particularite(id),
    CONSTRAINT id_equipement     
        FOREIGN KEY (equipement)          
        REFERENCES equipement(id),
    CONSTRAINT id_sort     
        FOREIGN KEY (sort)          
        REFERENCES sort(id),
    CONSTRAINT id_inventaire     
        FOREIGN KEY (inventaire)          
        REFERENCES inventaire(id),
) ENGINE=INNODB;

CREATE TABLE inventaire_col (
    id SMALLINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    essence INT(6),
    gold INT(6),
    objet VARCHAR(250),
) ENGINE=INNODB;

CREATE TABLE particularite (
    id SMALLINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    vertus VARCHAR(30),
    corruption VARCHAR(30),
) ENGINE_INNODB;

CREATE TABLE arme (
    id SMALLINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    classification VARCHAR(30),
    valeur_ph INT(3),
    valeur_mg INT(3),
    portee INT(3),
    dot INT(3),
    special TEXT,
) ENGINE_INNODB;

CREATE TABLE armure (
    id SMALLINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    classe VARCHAR(30),
    classification VARCHAR(30),
    valeur ph INT(3),
    valeur_mg INT(3),
    poids DECIMAL(4,2),
) ENGINE_INNODB;