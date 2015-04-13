SELECT COUNT(date) AS 'films'
FROM historique_membre
WHERE (DATEDIFF(date, '2006-10-30') > 0 
AND DATEDIFF(date, '2007-07-27') < 0)
OR (EXTRACT(MONTH FROM date) = 12
AND EXTRACT(DAY FROM date) = 25);