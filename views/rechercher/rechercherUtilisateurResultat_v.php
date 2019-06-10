
<!DOCTYPE html>
<html>
    
    <head>
       
        <Title> Recherche utilisateurs : resultat </Title>
        <link rel="stylesheet" type="text/css" href="http://localhost/e-Ecole-v3/assets/css/style.css"> 
        
    </head>
    
    <body>
       
        <h3> Recherche utilisateurs : resultat </h3>
        
        <p>
            
            <?php
            
                if($usersInfo != null){
                    
                    echo "<table>";
                        echo "<thead>";
                            echo "<tr>";
                                echo "<th width=\"10%\">Identifiant</th><th width=\"10%\">Nom</th><th width=\"10%\">Prenom</th><th width=\"10%\">Login</th><th width=\"10%\">Mot de passe</th><th width=\"10%\">Date de naissance</th><th width=\"10%\">Email</th><th width=\"10%\">Role</th>";
                            echo "</tr>";
                        echo "</thead>";
                    
                        echo "<tbody>";
                    
                            foreach($usersInfo as $utilisateur){
                                
                                 //print_r($utilisateur);
                                
                                 
                                 echo "<tr>";
                                     echo "<td><a href='http://localhost/e-ecole-v3/index.php/utilisateur_c/remplirFormulaireMiseAJourUtilisateur/$utilisateur->uti_nom/$utilisateur->uti_prenom/$utilisateur->uti_login/$utilisateur->uti_motdepasse/$utilisateur->uti_email'>".$utilisateur->uti_id."</a></td><td>".$utilisateur->uti_nom."</td><td>".
                                         $utilisateur->uti_prenom."</td><td>".$utilisateur->uti_login."</td><td>".
                                         $utilisateur->uti_motdepasse."</td><td>".$utilisateur->uti_datenaissance."</td><td><a href='http://localhost/e-ecole-v3/index.php/utilisateur_c/remplirFormulaireSuppressionUtilisateur/$utilisateur->uti_nom/$utilisateur->uti_prenom'>".$utilisateur->uti_email."<a/></td><td>".$utilisateur->uti_role."</td>";
                                
                                 echo "</tr>";
                                
                                
                            }
                    
                    
                    
                    
                    
                        echo "</tbody>";   
                   
                        
                    echo "</table>";
                    
                }else{
                    
                    echo "Le(s) champ(s) choisi(s) n'exite(ent) pas !";
                
                }

            ?>
            
        </p>
        
        <p> Pour mettre à jour un utilisateur cliquer sur son identifiant. </p>
        
        <p> Pour supprimer un utilisateur cliquer sur son email. </p>
        
        <p> <a href='http://localhost/e-ecole-v3/index.php/utilisateur_c/chercherUtilisateurs'> Chercher des utilisateurs </a></p>  
    
        <p> 
           
        <a href='http://localhost/e-Ecole-v3/index.php/utilisateur_c/connecterAdministrateur'> Entrer au portail administrateur </a> 
        
        </p>
        
    </body>
   
</html>
