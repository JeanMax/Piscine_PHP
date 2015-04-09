#!/usr/bin/php
<?php
/*
- lire le fichier /var/run/utmpx dans une chaine
- ignorer le header qui doit faire 1256 bytes
- boucler tant qu'on est pas à la fin de la chaine :
- utiliser ce format bien moche pour unpack une structure utmpx : 
       "a256login/a4id/a32line/ipid/itype/C8time/a256host/I16pad"
- dans le champs login et line on a 2 des 3 infos qui nous interessent
- ensuite dans les champs time[1-9] on a les 8 octets qui composent la structure timeval. Les 4 premiers sont ceux des secondes. avec strftime et ces secondes on peut formater la date qui nous interesse.
- stocker l'entree dans un tableau si le login correspond à get_current_user()
- avancer de 628 bytes dans la chaine
- trier le tableau
*/




ou autres clefs :
"a256login/a4id/a32line/ipid/itype/i2time/a256host/i16pad"
"a256user/a4id/a32line/ipid/itype/I2time/a256host/@"
?>