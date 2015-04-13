SELECT nom, prenom
FROM TODO
WHERE nom
LIKE '%-%'
OR prenom
LIKE '%-%'
ORDER BY nom, prenom;