<!DOCTYPE html>
<html>
    
    <head>
       
        <Title> Inscription utilisateur </Title>
        <meta charset="UTF-8"/>
         
        <link rel="stylesheet" type="text/css" href="http://localhost/e-Ecole-v3/assets/css/style.css"> 
        
    </head>
    
    <body>
       
        <h3>Inscription utilisateur </h3>
        
        <p> Vous devez renseigner tous les champs ! Le champ Nom doit être rempli en majuscule. Lors de l'inscription d'un administrateur ou un enseignant, remplissez la case correspondante à la date de naissance par la chaine de caractères "XXXXXXXX". Le login est le nom de l'utilsateur en miniscule.</p>

        <form action="" method="post">
       
        <label for="nom">Nom : </label>
        <input type="text" name="nom" value=""/>
        
        <label for="prenom">Prenom : </label>
        <input type="text" name="prenom" value=""/>
        
        <label for="datenaissance">Date de naissance : </label>
        <input type="text" name="datenaissance" value=""/>
        
        <label for="email">Email : </label>
        <input type="text" name="email" value=""/>
        
        <br/>
        <br/>
    
        <label for="login"> Login : </label>
        <input type="text" name="login" value=""/>
        
        
        <label for="role"> Role : </label>
        <select name="role">
           
            <option>ADMIN</option>
            <option>ENSEIGNANT</option>
            <option>ETUDIANT</option>
        
        </select>
        
        <br/>
        <br/>
    
        <button type="submit">Inscrire</button>
        
    </form> 
    
    <p> <a href='http://localhost/e-Ecole-v3/index.php/utilisateur_c/afficher'> Portail administrateur </a> </p>
        
    </body>
   
</html>