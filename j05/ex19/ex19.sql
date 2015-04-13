SELECT TIMESTAMPDIFF(DAY, MIN(date), MAX(date))
AS 'uptime'
FROM historique_membre;