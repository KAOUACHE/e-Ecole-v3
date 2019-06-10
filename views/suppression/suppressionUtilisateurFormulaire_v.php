<!DOCTYPE html>
<html>
    
    <head>
       
        <Title> Suppression des utilisateurs </Title>
        <link rel="stylesheet" type="text/css" href="http://localhost/e-Ecole-v3/assets/css/style.css"> 
        
    </head>
    
    <body>
       
        <h3> Suppression des utilisateurs </h3>
        
        <p> Le nom et le prénom de l'utilisateur à supprimer sont pré-remplis.</p>
       
        <form action="http://localhost/e-ecole-v3/index.php/utilisateur_c/supprimerUtilisateur" method="post">
        
            <label for="nom">Nom : </label>
            <input type="text" name="nom" value="<?php echo $nom ?>"/>
        
            <label for="prenom">Prenom : </label>
            <input type="text" name="prenom" value="<?php echo $prenom ?>"/>
    
            <button type="submit">Supprimer utilisateur</button>
        
        </form>
        
        <p> <a href='http://localhost/e-ecole-v3/index.php/utilisateur_c/chercherUtilisateurs'> Chercher des utilisateurs </a></p>  
    
        <p> 
        
        <a href='http://localhost/e-Ecole-v3/index.php/utilisateur_c/connecterAdministrateur'> Entrer au portail administrateur </a> 
        
        </p>
  
    </body>
   
</html>