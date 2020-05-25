CREATE TABLE utilisateur(
    id SERIAL PRIMARY KEY,
    utilisateur VARCHAR(30),
    password VARCHAR(255),
    nom VARCHAR(25),
    prenom VARCHAR(25)
);

CREATE TABLE conges(
    id SERIAL PRIMARY KEY,
    nbConges INTEGER,
    date DATE,
    hour TIME,
    user_id INTEGER
);


