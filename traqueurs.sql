CREATE TABLE IF NOT EXISTS utilisateur (
    id SMALLINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    mpd VARCHAR(40) NOT NULL,
    nom VARCHAR(20) NOT NULL,
    email VARCHAR(255) NOT NULL,
    statut VARCHAR(20)    
) ENGINE=INNODB;

CREATE TABLE IF NOT EXISTS caracteristique (
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
    mana SMALLINT(3) NOT NULL
) ENGINE=INNODB;

CREATE TABLE IF NOT EXISTS identite (
    id SMALLINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    race VARCHAR(40) NOT NULL,
    poids DECIMAL(5,2),
    taille DECIMAL(3,2) NOT NULL,
    genre VARCHAR(1) NOT NULL,
    age INT(4)
) ENGINE=INNODB;

CREATE TABLE IF NOT EXISTS bijoux (
    id SMALLINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    carac1 VARCHAR(50),
    bonus1 SMALLINT(3),
    carac2 VARCHAR(50),
    bonus2 SMALLINT(3), 
    carac3 VARCHAR(50),
    bonus3 SMALLINT(3)
) ENGINE=INNODB;

CREATE TABLE IF NOT EXISTS sort (
    id SMALLINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(250) NOT NULL,
    valeur SMALLINT(3) NOT NULL,
    dot SMALLINT(3) NOT NULL,
    mana SMALLINT(3) NOT NULL,
    basesort VARCHAR(50) NOT NULL,
    typesort VARCHAR(50) NOT NULL
) ENGINE=INNODB;

CREATE TABLE IF NOT EXISTS personnage (
    id SMALLINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    id_utilisateur SMALLINT UNSIGNED,
    id_identite SMALLINT UNSIGNED,
    id_xp SMALLINT UNSIGNED,
    id_particularite SMALLINT UNSIGNED,
    id_equipement SMALLINT UNSIGNED,
    id_sort SMALLINT UNSIGNED,
    id_inventaire SMALLINT UNSIGNED,   
    id_partie SMALLINT UNSIGNED, 
    CONSTRAINT id_utilisateur_fk    
        FOREIGN KEY (id_utilisateur)          
        REFERENCES utilisateur(id),
    CONSTRAINT id_partie_fk
        FOREIGN KEY (id_partie)
        REFERENCES partie(id),
    CONSTRAINT id_identite_fk     
        FOREIGN KEY (id_identite)          
        REFERENCES identite(id),
    CONSTRAINT id_xp_fk     
        FOREIGN KEY (id_xp)          
        REFERENCES xp(id),
    CONSTRAINT id_particularite_fk     
        FOREIGN KEY (id_particularite)          
        REFERENCES particularite(id),
    CONSTRAINT id_equipement_fk     
        FOREIGN KEY (id_equipement)          
        REFERENCES equipement(id),
    CONSTRAINT id_sort_fk     
        FOREIGN KEY (id_sort)          
        REFERENCES sort(id),
    CONSTRAINT id_inventaire_fk     
        FOREIGN KEY (id_inventaire)          
        REFERENCES inventaire(id)
) ENGINE=INNODB;

CREATE TABLE IF NOT EXISTS inventaire_col (
    id SMALLINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    essence INT(6) NOT NULL,
    gold INT(6) NOT NULL,
    objet VARCHAR(250) NOT NULL
) ENGINE=INNODB;

CREATE TABLE IF NOT EXISTS particularite (
    id SMALLINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    vertus VARCHAR(30) NOT NULL,
    corruption VARCHAR(30) NOT NULL
) ENGINE=INNODB;

CREATE TABLE IF NOT EXISTS arme (
    id SMALLINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    classification VARCHAR(30) NOT NULL,
    valeur_ph INT(3) NOT NULL,
    valeur_mg INT(3) NOT NULL,
    portee INT(3),
    dot INT(3) NOT NULL,
    special TEXT
) ENGINE=INNODB;

CREATE TABLE IF NOT EXISTS armure (
    id SMALLINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    classe VARCHAR(30) NOT NULL,
    classification VARCHAR(30) NOT NULL,
    valeur_ph INT(3) NOT NULL,
    valeur_mg INT(3) NOT NULL,
    poids DECIMAL(4,2) NOT NULL
) ENGINE=INNODB;

CREATE TABLE IF NOT EXISTS equipement (
    id SMALLINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    id_arme SMALLINT UNSIGNED,
    id_armure SMALLINT UNSIGNED,
    id_bouclier SMALLINT UNSIGNED,
    id_bijoux SMALLINT UNSIGNED,
    CONSTRAINT id_arme
        FOREIGN KEY (id_arme)
        REFERENCES arme(id),
    CONSTRAINT id_armure
        FOREIGN KEY (id_armure)
        REFERENCES armure(id),
    CONSTRAINT id_bouclier
        FOREIGN KEY (id_bouclier)
        REFERENCES bouclier(id),
    CONSTRAINT id_bijoux
        FOREIGN KEY (id_bijoux)
        REFERENCES bijoux(id)
) ENGINE = INNODB;

CREATE TABLE IF NOT EXISTS xp (
    id SMALLINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    courbe INT(10) NOT NULL
) ENGINE = INNODB;

CREATE TABLE IF NOT EXISTS bouclier (
    id SMALLINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    abs_ph INT(3) NOT NULL,
    abs_mg INT(3) NOT NULL,
    valeur_ph INT(3) NOT NULL,
    valeur_mg INT(3) NOT NULL,
    poids DECIMAL(5,2) NOT NULL,
    dot INT(2) NOT NULL
) ENGINE_INNODB;

CREATE TABLE IF NOT EXISTS partie (
    id SMALLINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR (255) NOT NULL
) ENGINE=INNODB;

CREATE TABLE IF NOT EXISTS inventaire (
    id SMALLINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    essence INT(6) NOT NULL,
    gold INT(6) NOT NULL,
    object VARCHAR(250) NOT NULL
) ENGINE_INNODB;