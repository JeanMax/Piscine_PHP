SELECT nom
FROM TODO
WHERE id = 42
OR (id >= 62
AND id <= 69)
OR id = 71
OR id = 88
OR id = 89
OR id = 90
OR LIKE '%y%y%'
OR LIKE '%yy%'
LIMIT 5 OFFSET 3;