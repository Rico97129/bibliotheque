DELIMITER $$

CREATE PROCEDURE reset_data()
BEGIN
  -- Désactiver contraintes de clé étrangère
  SET FOREIGN_KEY_CHECKS = 0;
  -- Vider les tableaux en repositionnant à 1 leur auto-incrément
  TRUNCATE TABLE auteur;
  TRUNCATE TABLE ouvrage_auteur;
  TRUNCATE TABLE bibliotheque;
  TRUNCATE TABLE exemplaire;
  TRUNCATE TABLE ouvrage;
  TRUNCATE TABLE personne;
  -- Réasactiver contraintes de clé étrangère
  SET FOREIGN_KEY_CHECKS = 1;

  BEGIN
    -- Recuperation en cas d'exception
    DECLARE EXIT HANDLER FOR SQLEXCEPTION
    BEGIN
	    -- Afficher la cause de l'échec
      SHOW ERRORS;
      -- Annuler la transaction
      ROLLBACK;
    END;  
    START TRANSACTION;

    INSERT INTO auteur (id, nom, prenom) VALUES
    (1, 'King', 'Stephen'),
    (2, 'Tolkien', 'J.R.R.'),
    (3, 'Rowling', 'J.K.'),
    (4, 'Dickens', 'Charles'),
    (5, 'Shakespeare', 'William'),
    (6, 'Woolf', 'Virginia');


    INSERT INTO ouvrage (id, titre) VALUES
    (1, 'The Shining'),
    (2, 'The Lord of the Rings'),
    (3, "Harry Potter and the Philosopher's Stone"),
    (4, 'Great Expectations'),
    (5, 'Hamlet'),
    (6, 'To the Lighthouse'),
    (7, 'Carrie'),
    (8, 'The Hobbit'),
    (9, 'Harry Potter and the Chamber of Secrets'),
    (10, 'Oliver Twist'),
    (11, 'Romeo and Juliet'),
    (12, 'Mrs Dalloway'),
    (13, 'The Stand'),
    (14, 'The Silmarillion'),
    (15, 'Harry Potter and the Prisoner of Azkaban'),
    (16, 'David Copperfield'),
    (17, 'Macbeth'),
    (18, 'Orlando'),
    (19, 'Pet Sematary'),
    (20, 'The Fellowship of the Ring'),
    (21, 'Harry Potter and the Goblet of Fire'),
    (22, 'A Tale of Two Cities'),
    (23, 'Othello'),
    (24, 'To Kill a Mockingbird');

    INSERT INTO ouvrage_auteur (ouvrage_id, auteur_id) VALUES
    (1, 1),
    (2, 2),
    (3, 3),
    (4, 4),
    (5, 5),
    (6, 6),
    (7, 1),
    (8, 2),
    (9, 3),
    (10, 4),
    (11, 5),
    (12, 6),
    (13, 1),
    (14, 2),
    (15, 3),
    (16, 4),
    (17, 5),
    (18, 6),
    (19, 1),
    (20, 2),
    (21, 3),
    (22, 4),
    (23, 5),
    (24, 6);

    INSERT INTO exemplaire(id, ouvrage_id, bibliotheque_id) VALUES
    (1, 1, 1),
    (2, 1, 2),
    (3, 2, 1),
    (4, 3, 1);
    COMMIT;
  END;
END$$

CALL reset_data()$$