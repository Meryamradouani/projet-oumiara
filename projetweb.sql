/* Tables */
CREATE TABLE UTILISATEUR (
    id_utilisateur INTEGER NOT NULL AUTO_INCREMENT,
    fonctionalite VARCHAR(100) NOT NULL,
    nom VARCHAR(100) NOT NULL,
    prenom VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    PRIMARY KEY (id_utilisateur)
);

CREATE TABLE DEMANDE_EVENEMENT (
    id_demande INTEGER NOT NULL AUTO_INCREMENT,
    titre_propose VARCHAR(100) NOT NULL,
    description_propose VARCHAR(1000) NOT NULL,
    UTILISATEUR_id_utilisateur INTEGER NOT NULL,
    PRIMARY KEY (id_demande),
    FOREIGN KEY (UTILISATEUR_id_utilisateur) REFERENCES UTILISATEUR(id_utilisateur)
);

CREATE TABLE EVENEMENT (
    id_evenement INTEGER NOT NULL AUTO_INCREMENT,
    date_debut DATE NOT NULL,
    lieu VARCHAR(100) NOT NULL,
    date_fin DATE NOT NULL,
    description VARCHAR(1000) NOT NULL,
    PRIMARY KEY (id_evenement)
);

CREATE TABLE INSCRIPTION (
    UTILISATEUR_id_utilisateur INTEGER NOT NULL,
    EVENEMENT_id_evenement INTEGER NOT NULL,
    PRIMARY KEY (UTILISATEUR_id_utilisateur, EVENEMENT_id_evenement),
    FOREIGN KEY (UTILISATEUR_id_utilisateur) REFERENCES UTILISATEUR(id_utilisateur),
    FOREIGN KEY (EVENEMENT_id_evenement) REFERENCES EVENEMENT(id_evenement)
);

CREATE TABLE COMMENTAIRE (
    UTILISATEUR_id_utilisateur INTEGER NOT NULL,
    EVENEMENT_id_evenement INTEGER NOT NULL,
    contenu VARCHAR(1000) NOT NULL,
    date DATE NOT NULL,
    PRIMARY KEY (UTILISATEUR_id_utilisateur, EVENEMENT_id_evenement),
    FOREIGN KEY (UTILISATEUR_id_utilisateur) REFERENCES UTILISATEUR(id_utilisateur),
    FOREIGN KEY (EVENEMENT_id_evenement) REFERENCES EVENEMENT(id_evenement)
);
