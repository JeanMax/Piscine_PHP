SELECT f.id_genre AS 'id_genre', g.nom AS 'nom genre', f.id_distrib AS 'id_distrib', d.nom AS 'nom distrib', f.titre AS 'titre film'
FROM film AS f
RIGHT JOIN genre AS g
	  ON f.id_genre = g.id_genre
LEFT JOIN distrib AS d
	  ON f.id_distrib = d.id_distrib
WHERE f.id_genre >= 4
AND f.id_genre <= 8;