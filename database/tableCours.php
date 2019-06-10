<?php

// Configuration de la base de données
define("BD_HOST", "localhost");
define("BD_BASE", "BD_ecole");
define("BD_USER", "root"); 
define("BD_PASSWORD", "");


// Création de la table `utilisateur` en utilisant la méthode query.
$BD = new PDO("mysql:host=".BD_HOST.";dbname=".BD_BASE.";charset=UTF8", BD_USER, BD_PASSWORD);

$SQL = "CREATE TABLE `cours` (
    `cou_id` int(8) UNSIGNED NOT NULL AUTO_INCREMENT,
    `cou_titre` varchar(50) NOT NULL,
    `cou_date` date NOT NULL,
    `cou_dureeEnMinutes` varchar(50) NOT NULL,
    `cou_description` varchar(200) NOT NULL,
    
    PRIMARY KEY (`cou_id`)
)
ENGINE=INNODB DEFAULT CHARSET=utf8;";

if($BD->query($SQL)){
    echo "<p>Création de la table `cours` réussie.</p>";
}else{
    echo "<p>Problème lors de la création de la table `cours`.</p>";
    exit();
}

?>