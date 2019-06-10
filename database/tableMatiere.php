<?php

// Configuration de la base de données
define("BD_HOST", "localhost");
define("BD_BASE", "BD_ecole");
define("BD_USER", "root"); 
define("BD_PASSWORD", "");


// Création de la table `matiere` en utilisant la méthode query.
$BD = new PDO("mysql:host=".BD_HOST.";dbname=".BD_BASE.";charset=UTF8", BD_USER, BD_PASSWORD);

$SQL = "CREATE TABLE `matiere` (
    `mat_id` int(8) UNSIGNED NOT NULL AUTO_INCREMENT,
    `mat_nom` varchar(50) NOT NULL,
    
    PRIMARY KEY (`mat_id`)
)
ENGINE=INNODB DEFAULT CHARSET=utf8;";

if($BD->query($SQL)){
    echo "<p>Création de la table `matiere` réussie.</p>";
}else{
    echo "<p>Problème lors de la création de la table `matiere`.</p>";
    exit();
}

?>