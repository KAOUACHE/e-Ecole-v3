
<!DOCTYPE html>
<html>
    
    <head>
       
        <Title> Consultation des cours </Title>
        <meta charset="UTF-8"/>
        <!--<link rel="stylesheet" type="text/css" href="http://localhost/e-Ecole-v3/assets/css/style.css"> -->
        
    </head>
    
    <body>
       
        <h3> Consultation des cours </h3>
        
        <p>
            
            <?php
                    
                echo "<table>";
            
                    echo "<thead>";
            
                        echo "<tr>";
                            echo "<th>Titre</th><th>Date</th><th>Durée</th><th>Description</th>";
                        echo "</tr>";
            
                    echo "</thead>";
            
                    
                    echo "<tbody>";
                    
                        foreach($listeCours as $cours){
                            
                            echo "<tr>";
                                echo "<td>".$cours->cou_titre."</td><td>".$cours->cou_date."</td><td>".$cours->cou_dureeEnMinutes."</td><td>".$cours->cou_description."</td>";
                            echo "</tr>";   
                                 
                        }
                    
                    echo "</tbody>";   
                        
                echo "</table>"; 

            ?>
            
        </p>
    
        <p> <a href='http://localhost/e-Ecole-v3/index.php/utilisateur_c/connecterEtudiant'> Entrer au portail étudiant </a> </p>
        
    </body>
   
</html>
