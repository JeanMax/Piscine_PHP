SELECT titre, resum
FROM TODO
WHERE resum
LIKE '%42%'
AND titre
LIKE '%42%'
ORDER BY TODO;