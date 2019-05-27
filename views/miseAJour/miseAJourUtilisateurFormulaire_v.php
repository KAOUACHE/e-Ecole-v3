<!DOCTYPE html>
<html>
    
    <head>
       
        <Title> Mise à jour des utilisateurs </Title>
        <link rel="stylesheet" type="text/css" href="http://localhost/e-Ecole-v3/assets/css/style.css"> 
        
    </head>
    
    <body>
       
        <h3> Mettre à jour des utilisateurs </h3>
        
        <p> Vous devez spécifier le nom et le prénom de l'utilisateur à mettre à jour en respectant la casse.</p>
        <p> Vous pouvez mettre à jour l'email, le login et le mot de passe.</p>
       
        <form action="" method="post">
        
            <label for="nom">Nom : </label>
            <input type="text" name="nom" value=""/>
        
            <label for="prenom">Prenom : </label>
            <input type="text" name="prenom" value=""/>
            
            <br/>
            <br/>
        
            <label for="login">Login : </label>
            <input type="text" name="login" value=""/>
    
            <label for="motdepasse">Mot de passe : </label>
            <input type="password" name="motdepasse" value=""/>
        
            <label for="email">Email : </label>
            <input type="text" name="email" value=""/>
    
            <button type="submit">Mise à jour</button>
        
         </form> 
    
         <p> <a href='http://localhost/e-Ecole-v3/index.php/utilisateur_c/afficher'> Portail administrateur </a> </p>
  
    </body>
   
</html>