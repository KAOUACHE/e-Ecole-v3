
<!DOCTYPE html>
<html>
    
    <head>
       
        <Title> Liste des cours : resultat </Title>
        <meta charset="UTF-8"/>
        <!--<link rel="stylesheet" type="text/css" href="http://localhost/e-Ecole-v3/assets/css/style.css"> -->
        
    </head>
    
    <body>
       
        <h3> Liste des cours : resultat </h3>
        
        <p>
            
            <?php
                    
                echo "<table>";
            
                    echo "<thead>";
            
                        echo "<tr>";
                            echo "<th>Identifiant</th><th>Titre</th><th>Date</th><th>Durée</th><th>Description</th>";
                        echo "</tr>";
            
                    echo "</thead>";
            
                    
                    echo "<tbody>";
                    
                        foreach($listeCours as $cours){
                            
                            echo "<tr>";
                                echo "<td><a href='http://localhost/e-ecole-v3/index.php/cours_c/remplirFormulaireMiseAJourCours/$cours->cou_titre/$cours->cou_date/$cours->cou_dureeEnMinutes/$cours->cou_description'>".$cours->cou_id."</a></td><td><a href='http://localhost/e-Ecole-v3/index.php/cours_c/suppressionCours/$cours->cou_titre'>".$cours->cou_titre."</a></td><td>".$cours->cou_date."</td><td>".$cours->cou_dureeEnMinutes."</td><td>".$cours->cou_description."</td>";
                            echo "</tr>";   
                            
                                
                        }
                    
                    echo "</tbody>";   
                        
                echo "</table>";
            
                

            ?>
             
        </p>
        
        <p> Pour mettre à jour un cours cliquer sur son identifiant. </p>
        <p> Pour supprimer un cours cliquer sur son titre. </p>
    
        <p> <a href='http://localhost/e-Ecole-v3/index.php/utilisateur_c/connecterEnseignant'> Entrer au portail enseignant </a> </p>
        
    </body>
   
</html>
