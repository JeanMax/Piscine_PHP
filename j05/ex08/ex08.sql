SELECT nom, prenom, DATE_FORMAT(date_de_naissance, '%Y-%m-%d') AS date_de_naissance
FROM fiche_personne
WHERE EXTRACT(year FROM date_de_naissance) = 1989
ORDER BY nom;