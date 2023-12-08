/* Tables */
CREATE TABLE UTILSATEUR (
    id_utilisateur INTEGER NOT NULL,
    fonctionalite INTEGER NOT NULL,
    nom INTEGER NOT NULL,
    prenom INTEGER NOT NULL,
    email INTEGER NOT NULL,
    PRIMARY KEY (id_utilisateur)
);
CREATE TABLE DEMANDE_EVENEMENT (
    id_demande INTEGER NOT NULL,
    titre_propose INTEGER NOT NULL,
    description_propose INTEGER NOT NULL,
    UTILSATEUR_id_utilisateur INTEGER NOT NULL,
    PRIMARY KEY (id_demande),
    FOREIGN KEY (UTILSATEUR_id_utilisateur) REFERENCES UTILSATEUR(id_utilisateur)
);
CREATE TABLE EVENEMENT (
    id_evenement INTEGER NOT NULL,
    date_debut INTEGER NOT NULL,
    lieu INTEGER NOT NULL,
    date_fin INTEGER NOT NULL,
    Attribute16 INTEGER NOT NULL,
    description INTEGER NOT NULL,
    PRIMARY KEY (id_evenement)
);
CREATE TABLE INSCRIPTION (
    UTILSATEUR_id_utilisateur INTEGER NOT NULL,
    EVENEMENT_id_evenement INTEGER NOT NULL,
    PRIMARY KEY (UTILSATEUR_id_utilisateur, EVENEMENT_id_evenement),
    FOREIGN KEY (UTILSATEUR_id_utilisateur) REFERENCES UTILSATEUR(id_utilisateur),
    FOREIGN KEY (EVENEMENT_id_evenement) REFERENCES EVENEMENT(id_evenement)
);
CREATE TABLE COMMENTAIRE (
    UTILSATEUR_id_utilisateur INTEGER NOT NULL,
    EVENEMENT_id_evenement INTEGER NOT NULL,
    contenue INTEGER NOT NULL,
    date INTEGER NOT NULL,
    PRIMARY KEY (UTILSATEUR_id_utilisateur, EVENEMENT_id_evenement),
    FOREIGN KEY (UTILSATEUR_id_utilisateur) REFERENCES UTILSATEUR(id_utilisateur),
    FOREIGN KEY (EVENEMENT_id_evenement) REFERENCES EVENEMENT(id_evenement)
);