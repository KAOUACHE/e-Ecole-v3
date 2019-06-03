<!DOCTYPE html>
<html>
    
    <head>
       
        <Title> Mise à jour des utilisateurs </Title>
        <link rel="stylesheet" type="text/css" href="http://localhost/e-Ecole-v3/assets/css/style.css"> 
        
    </head>
    
    <body>
       
        <h3> Mettre à jour des utilisateurs </h3>
        
        <p> Le nom et le prénom de l'utilisateur à mettre à jour sont pré-remplis.</p>
        <p> Vous pouvez mettre à jour l'email, le login et le mot de passe.</p>
       
        <form action="http://localhost/e-ecole-v3/index.php/utilisateur_c/miseAJourUtilisateur" method="post">
        
            <label for="nom">Nom : </label>
            <input type="text" name="nom" value="<?php echo $nom ?>"/>
        
            <label for="prenom">Prenom : </label>
            <input type="text" name="prenom" value="<?php echo $prenom ?>"/>
            
            <br/>
            <br/>
        
            <label for="login">Login : </label>
            <input type="text" name="login" value="<?php echo $login ?>" />
    
            <label for="motdepasse">Mot de passe : </label>
            <input type="password" name="motdepasse" value="<?php echo $motdepasse ?>"/>
        
            <label for="email">Email : </label>
            <input type="text" name="email" value="<?php echo $email ?>"/>
    
            <button type="submit">Mise à jour</button>
        
         </form> 
    
         <p> <a href='http://localhost/e-Ecole-v3/index.php/utilisateur_c/afficher'> Portail administrateur </a> </p>
  
    </body>
   
</html>