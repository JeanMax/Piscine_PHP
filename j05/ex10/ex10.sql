SELECT titre AS 'Titre', resum AS 'Resume', annee_prod
FROM film
WHERE id_genre = 25
ORDER BY annee_prod DESC;