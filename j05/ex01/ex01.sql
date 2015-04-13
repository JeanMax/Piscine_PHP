CREATE TABLE IF NOT EXISTS ft_table (
       id SMALLINT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
       login VARCHAR(8) NOT NULL DEFAULT 'toto',
       groupe ENUM('staff','student','other') NOT NULL,
       date_de_creation DATE NOT NULL,
       PRIMARY KEY (id)
) 
ENGINE=INNODB
CHARSET=utf8;
