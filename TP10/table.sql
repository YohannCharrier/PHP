CREATE TABLE utilisateur (
    id SERIAL PRIMARY KEY,
    login VARCHAR(15),
    password VARCHAR(255),
    mail VARCHAR(50),
    nom VARCHAR(20),
    prenom VARCHAR(20)
);

CREATE TABLE etudiant (
    id SERIAL PRIMARY KEY,
    user_id INTEGER,
    nom VARCHAR(20),
    prenom VARCHAR(20),
    note INTEGER
);