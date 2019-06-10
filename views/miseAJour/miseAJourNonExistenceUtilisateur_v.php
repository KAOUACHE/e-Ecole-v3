<!DOCTYPE html>
<html>
    
    <head>
       
        <Title> Mise à jour des utilisateurs : resultat </Title>
        <link rel="stylesheet" type="text/css" href="http://localhost/e-Ecole-v3/assets/css/style.css"> 
        
    </head>
    
    
    <body>
       
        <h3> Mise à jour des utilisateurs : resultat </h3>
        
        <p> L'utilisateur(e) <?php echo $_POST['nom']." ".$_POST['prenom'] ?> n'exite pas !</p>
        
        
        <p> 
          
           <a href='http://localhost/e-ecole-v3/index.php/utilisateur_c/chercherUtilisateurs'>Recherche un (ou des) utilisateur(s)</a>
           
        </p>
        
        
        <p> 
        
        <a href='http://localhost/e-Ecole-v3/index.php/utilisateur_c/connecterAdministrateur'> Entrer au portail administrateur </a> 
        
        </p>
        
    </body>
   
</html>