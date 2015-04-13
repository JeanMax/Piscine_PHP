SELECT id_genre AS 'id_genre', nom_genre AS 'nom genre', id AS 'id_distrib', nom AS 'nom distrib', titre AS 'titre film'
FROM TODO
WHERE id_genre >= 4
AND id_genre <= 8;