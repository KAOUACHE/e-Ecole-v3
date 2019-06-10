<!DOCTYPE html>
<html>
    
    <head>
       
        <Title> Mise à jour des cours </Title>
        <meta charset="UTF-8"/>
        <!--<link rel="stylesheet" type="text/css" href="http://localhost/e-Ecole-v3/assets/css/style.css"> -->
        
    </head>
    
    <body>
       
        <h3> Mettre à jour des cours</h3>
        
        <p>Les champs à mettre à jour sont pré-remplis.</p>
       

        <form action="http://localhost/e-ecole-v3/index.php/cours_c/miseAJourCours" method="post">
       
            <label for="titre">Titre : </label>
            <input type="text" name="titre" value="<?php echo $titre ?>"/>
        
            <label for="dateCours">Date : </label>
            <input type="text" name="dateCours" value="<?php echo $date ?>"/>
        
            <label for="duree">Durée : </label>
            <input type="text" name="duree" value="<?php echo $duree ?>"/> <span> minutes </span>
        
            <br/>
            <br/>
         
             
            <label for="description">Description : </label>
            <textarea rows="3" cols="50" name="description"> <?php echo $description ?></textarea>
        
        
            <br/>
            <br/>
    
            <button type="submit">Mise à jour</button>
        
         </form> 
    
         <p> <a href='http://localhost/e-Ecole-v3/index.php/utilisateur_c/connecterEnseignant'> Entrer au portail enseignant </a> </p>
  
    </body>
   
</html>