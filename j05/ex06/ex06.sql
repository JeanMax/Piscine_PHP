SELECT titre, resum
FROM TODO
WHERE resum
LIKE BINARY '%vincent%'
ORDER BY id;