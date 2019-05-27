
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
                    
                    foreach($usersInfo as $utilisateur){
                        print_r($utilisateur);
                        
                        echo "</br>";
                        echo "</br>";
                    }
                    
                }else{
                    
                    echo "Le(s) champ(s) choisi(s) n'exite(ent) pas !";
                
                }

            ?>
            
        </p>
        
        <p> <a href='http://localhost/e-ecole-v3/index.php/utilisateur_c/chercherUtilisateurs'> Chercher des utilisateurs </a></p>  
    
        <p> <a href='http://localhost/e-Ecole-v3/index.php/utilisateur_c/afficher'> Portail administrateur </a> </p>
        
    </body>
   
</html>
