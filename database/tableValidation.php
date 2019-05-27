<?php

// Configuration de la base de données
define("BD_HOST", "localhost");
define("BD_BASE", "BD_ecole");
define("BD_USER", "root"); 
define("BD_PASSWORD", "");


// Création de la table `utilisateur` en utilisant la méthode query.
$BD = new PDO("mysql:host=".BD_HOST.";dbname=".BD_BASE.";charset=UTF8", BD_USER, BD_PASSWORD);

$SQL = "CREATE TABLE `validation` (
    `val_id`                   int(8)          UNSIGNED NOT NULL AUTO_INCREMENT,
    `val_email`                varchar(50)     NOT NULL,
    `val_code`                 int(50)         NOT NULL,
    `val_statut`               varchar(50)     NOT NULL,
    `val_dateInsciptionTemp`   DATETIME        NOT NULL,
    `val_dateValidation`       DATETIME        NOT NULL,
    
   
    PRIMARY KEY (`val_id`)
)
ENGINE=INNODB DEFAULT CHARSET=utf8;";

if($BD->query($SQL)){
    echo "<p>Création de la table `validation` réussie.</p>";
}else{
    echo "<p>Problème lors de la création de la table `validation`.</p>";
    exit();
}

?>