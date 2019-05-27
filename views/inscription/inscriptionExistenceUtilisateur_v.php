<!DOCTYPE html>
<html>
    
    <head>
       
        <Title> Insctiption : Existence utilisateur </Title>
        <link rel="stylesheet" type="text/css" href="http://localhost/e-Ecole-v3/assets/css/style.css"> 
        
    </head>
    
    
    <body>
       
        <h3> Insctiption : Existence utilisateur </h3>
        
        <p> L'utilisateur(e) <?php echo $_POST['nom']." ".$_POST['prenom'] ?> exite déja !</p>
        
        
        <p> <a href='http://localhost/e-ecole-v3/index.php/utilisateur_c/inscriptionTempUtilisateur'>Inscription utilisateur</a> </p>
        <p> <a href='http://localhost/e-Ecole-v3/index.php/utilisateur_c/afficher'> Portail administrateur </a> </p>
        
    </body>
   
</html>