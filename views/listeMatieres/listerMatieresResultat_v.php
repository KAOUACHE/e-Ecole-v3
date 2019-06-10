
<!DOCTYPE html>
<html>
    
    <head>
       
        <Title> Liste des matières : resultat </Title>
        <!--<link rel="stylesheet" type="text/css" href="http://localhost/e-Ecole-v3/assets/css/style.css"> -->
        
    </head>
    
    <body>
       
        <h3> Liste des matières : resultat </h3>
        
        <p>
            
            <?php
                    
                echo "<table>";
            
                    echo "<thead>";
            
                        echo "<tr>";
                            echo "<th>Identifiant</th><th>Nom</th>";
                        echo "</tr>";
            
                    echo "</thead>";
            
                    
                    echo "<tbody>";
                    
                        foreach($listeMatieres as $matiere){
                            
                            echo "<tr>";
                                echo "<td>".$matiere->mat_id."</td><td>".$matiere->mat_nom."</td><td><a href='http://localhost/e-Ecole-v3/index.php/matiere_c/suppressionMatiere/$matiere->mat_nom'>supprimer</a></td>";
                            echo "</tr>";       
                                
                        }
                    
                    echo "</tbody>";   
                        
                echo "</table>";
            
                

            ?>
            
        </p>
    
        <p> <a href='http://localhost/e-Ecole-v3/index.php/utilisateur_c/connecterAdministrateur'> Entrer au portail administrateur </a> </p>
        
    </body>
   
</html>
