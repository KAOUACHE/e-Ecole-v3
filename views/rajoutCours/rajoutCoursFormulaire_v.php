<!DOCTYPE html>
<html>
    
    <head>
       
        <Title> Rajout cours </Title>
        <meta charset="UTF-8"/>
         
        <!--<link rel="stylesheet" type="text/css" href="http://localhost/e-Ecole-v3/assets/css/style.css"> -->
        
    </head>
    
    <body>
       
        <h3> Rajout cours </h3>
        
        <p> Vous devez renseigner tous les champs. Veuillez à ne pas terminer la description par un point !</p>

        <form action="" method="post">
       
        <label for="titre">Titre : </label>
        <input type="text" name="titre" value=""/>
        
        <label for="dateCours">Date : </label>
        <input type="text" name="dateCours" value="<?php echo date("y-m-d") ?>"/>
        
        <label for="duree">Durée : </label>
        <input type="text" name="duree" value=""/> <span> minutes </span>
        
        <br/>
        <br/>
        
        <label for="description">Description : </label>
        <textarea rows="3" cols="50" name="description">Entrez votre description du cours</textarea>
        
        
        <br/>
        <br/>
    
        <button type="submit">Rajouter</button>
        
    </form> 
    
    <p> <a href='http://localhost/e-Ecole-v3/index.php/utilisateur_c/connecterEnseignant'> Entrer au portail enseignant </a> </p>
        
    </body>
   
</html>