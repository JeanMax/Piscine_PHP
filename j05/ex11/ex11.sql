SELECT UCASE(fp.nom) AS 'NOM', fp.prenom, ab.prix
FROM membre AS me
INNER JOIN abonnement AS ab
	 ON ab.id_abo = me.id_abo
INNER JOIN fiche_personne AS fp 
	 ON fp.id_perso = me.id_fiche_perso
WHERE ab.prix > 42
ORDER BY fp.nom, fp.prenom;
