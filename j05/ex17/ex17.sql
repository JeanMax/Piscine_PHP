SELECT abonnement AS 'nb_abo', ROUNDDOWN(AVG(prix)) AS 'moy_abo', MOD(SUM(duree), 42) AS 'sum'
FROM TODO;