<!DOCTYPE html>
<html>
   
    <head>
       
        <Title> Authentification </Title>
        <link rel="stylesheet" type="text/css" href="http://localhost/e-Ecole-v3/assets/css/style.css"> 
        
    </head>
    
    
    <body>
       
        <h1> Authentification </h1>
        
        <?php echo "<p> Vous devez spécifier correctement votre login et votre mot de passe !</p>"; ?>
        <?php echo "<p> Votre login est votre nom en majuscule.</p>"; ?>
       
       
        <form action="" method="post">
           
            <label for="login">Login : </label>
            <input type="text" name="login" value=""/>
            
            <br/>
            <br/>
    
            <label for="motdepasse">Mot de passe : </label>
            <input type="password" name="motdepasse" value=""/>
            
            <br/>
            <br/>
    
            <button type="submit">Connexion</button>
        
        </form>
        
        <p> <a href="http://localhost/e-ecole-v3/">Page d'accueil</a></p>
        
    </body>

</html>