<!DOCTYPE html>
<html>
    
    <head>
       
        <Title> Recherche utilisateurs </Title>
        <link rel="stylesheet" type="text/css" href="http://localhost/e-Ecole-v3/assets/css/style.css"> 
        
    </head>
    
    <body>
       
        <h3> Rechercher des utilisateurs </h3>
        
        <p> Tapez un champ ou plus en respectant la casse. </p>   
        <form action="" method="post">
        
            <label for="nom">Nom : </label>
            <input type="text" name="nom" value=""/>
            
            <label for="prenom">Prenom : </label>
            <input type="text" name="prenom" value=""/>
        
            <label for="email">Email : </label>
            <input type="text" name="email" value=""/>
        
        <label for="role"> Role : </label>
        <select name="role">
           
            <option></option>
            <option>ADMIN</option>
            <option>ENSEIGNANT</option>
            <option>ETUDIANT</option>
       
        </select>
    
        <button type="submit">Rechercher</button>
        
        </form> 
    
        <p> 
          
           <a href='http://localhost/e-Ecole-v3/index.php/utilisateur_c/connecterAdministrateur'> Entrer au portail administrateur </a> 
        
        </p>
        
    </body>
   
</html>