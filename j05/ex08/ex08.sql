SELECT nom, prenom, DATE_FORMAT(date_naissance, '%d %b %Y') AS date_naissance--TODO
FROM fiche_personne
WHERE EXTRACT(year FROM date_naissance) = 1989
ORDER BY nom;