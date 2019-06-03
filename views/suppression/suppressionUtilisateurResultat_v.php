<!DOCTYPE html>
<html>
    
    <head>
       
        <Title> Suppression des utilisateurs : resultat </Title>
        <link rel="stylesheet" type="text/css" href="http://localhost/e-Ecole-v3/assets/css/style.css"> 
        
    </head>
    
    <body>
       
        <h3> Suppression des utilisateurs : resultat </h3>
        
        <p>L'utilisateur(e) <?php echo $_POST['nom']." ".$_POST['prenom'] ?> a été supprimé(e) de la base de données avec succès.</p> 
    
        <p> <a href='http://localhost/e-ecole-v3/index.php/utilisateur_c/chercherUtilisateurs'> Chercher des utilisateurs </a></p> 
        <p> <a href='http://localhost/e-Ecole-v3/index.php/utilisateur_c/afficher'> Portail administrateur </a> </p>
  
    </body>
   
</html>