SELECT nom, prenom, DATE_FORMAT(date_naissance, '%Y-%m-%d') AS date_naissance
FROM fiche_personne
WHERE EXTRACT(year FROM date_naissance) = 1989
ORDER BY nom;
