SELECT UCASE(nom) AS 'NOM', prenom, prix
FROM TODO
WHERE TODO > 42
ORDER BY nom, prenom;