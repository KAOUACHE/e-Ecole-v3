<?php

class Utilisateur_c extends CI_Controller {
    
    public function __construct(){
        
        parent::__construct();
        $this->load->database();    
    }
    
    //La fonction existenceLoginMotDePasse() vérifie si le login et le mot de passe sont saisis dans le formulaire de connexion.
    public static function existenceLoginMotDePasse(){ 
        
        if(empty($_POST['login']) || empty($_POST['motdepasse'])){
            
            return false;
           
        }else{
            
            return true;
        }  
    } 

   
    //La fonction verifierLoginMotDePasse() vérifie si le login et le mot de passe saisis sont corrects.
    //La fonction selectionnerLoginMotDePasse() retourne un tableau des objets $logInfo depuis la table 'utilisateur' où chaque objet correspond à un login et un mot de passe.
    public function verifierLoginMotDePasse(){
        
        if(Utilisateur_c::existenceLoginMotDePasse()){
            
            $this->load->model('utilisateur_m');   
            $logInfo = array();
            $logInfo = $this->utilisateur_m->selectionnerLoginMotDePasse(); 
           
            
            $i = 0 ; // ou plutôt le rang de l'objet.
            while($i < sizeof($logInfo) && ($_POST['login'] != $logInfo[$i]-> uti_login || $_POST['motdepasse'] != $logInfo[$i]-> uti_motdepasse)){
                
                    $i ++;    
            }
            
            
            if($i >= sizeof($logInfo)){
                
                return false;
              
            }else{
                
               return true;
              
            }
              
        }else{
            
            return false;  
        } 
    }
    
    
   
    // La fonction sessionUtilisateur(), préalablement, démarre une session si elle n'existe pas.
    // Dans une deuxième étape, après avoir vérifié le login et le mot de passe, elle remplit le tableau $_SESSION['utilisateur'] avec [$_POST['login'], $_POST['motdepasse']] s'ils sont correctement renseignés et renvoie la valeur booléenne "true", sinon, elle renvoie "false". 
    public function sessionUtilisateur(){
        
        if(!isset($_SESSION)){
            
            session_start();    
        }
        
        
        if(!isset($_SESSION['utilisateur'])){
            
            if($this->verifierLoginMotDePasse()){
                
                $_SESSION['utilisateur'] = [$_POST['login'], $_POST['motdepasse']];
                return true;
                
            }else{
                
                return false;
            }
            
            
        }else{
            
            return true;
        }
    }
    

    // La fonction connexionUtilisateur() renvoie une valeur booléenne pour indiquer le statut de connexion de l'utilisateur. Ce statut dépend de la fonction sessionUtilisateur(). Ainsi, elle relie clairement la connexion à la gestion de la session.
    public function connexionUtilisateur(){
      
        if($this->sessionUtilisateur()){
            
            return true;
            
        }else{
            
            return false;
        }     
    }
    
    
    // La fonction deconnexionUtilisateur() permet d'assurer la déconnexion de l'utilisateur en supprimant l'élément $_SESSION['utilisateur'] du tableau $_SESSION. 
    public static function deconnexionUtilisateur(){
        
        unset($_SESSION['utilisateur']);
        
        //return true; 
    }
           
    
    // La fonction afficher() affiche la page de connexion si l'utilisateur n'est pas connecté, sinon, elle affiche les portails administrateur, enseignant, étudiant et le volet qui permet la déconnexion. 
    public function afficher(){ 
    
        if(!$this->connexionUtilisateur()){
            
            $this->load->view('connexion/connexionFormulaire_v'); 
            
        }else{
            
            $this->load->view('administrateur/administrateur_v');
            $this->load->view('enseignant/enseignant_v');
            $this->load->view('etudiant/etudiant_v'); 
            
            $this->load->view('deconnexion/deconnexion_v');
            
        }
        
    }
    
    // La fonction afficherAccueil() affiche la page d'accueil 'bienvenue_v' dans le cas d'une déconnexion de l'utilisateur. 
    public static function afficherAccueil(){
        
        Utilisateur_c::deconnexionUtilisateur();    
        $this->load->view('accueil/bienvenue_v');
       
    }
    
    
    //La fonction verifierUtilisateur() vérifier l'existence d'un utilisateur.
    public function verifierUtilisateur(){
        
         $this->load->model('utilisateur_m');   
         $utilisateur = array();
         $utilisateur = $this->utilisateur_m->selectionnerUtilisateur(); 
        
    
         $i = 0 ;
         while($i < sizeof($utilisateur) && ($_POST['nom'] != $utilisateur[$i]-> uti_nom || $_POST['prenom'] != $utilisateur[$i]-> uti_prenom)){
                
             $i ++; 
             
         }
            
         
         if($i >= sizeof($utilisateur)){
             
             return false;
              
         }else{
            
             return true;
     
        }
    }
    
   // La fonction inscriptionTempUtilisateur() préalablement vérifie que les informations nécessaires à l'inscription de l'utilisateur sont toutes remplies, sinon, elle va renvoyer le formulaire d'inscription.
   // Dans une deuxième étape, la fonction vérifie une éventuelle existence de l'utilisateur en utilisant la fonction verifierUtilisateur(). Elle renvoie une notification. Si l'utilisateur existe,
   // Dans une troisième étape, si l'utilisateur n'existe pas, elle va procéder à l'insertion de l'utilisateur dans la table 'utilisateur' à l'aide de la fonction insererUtilisateur(...) du modèle 'utilisateur_m'. 
   // Ensuite, si l'insertion s'est bien déroulée, elle effectue successivement les tâches suivantes : renvoi d'un Notification d'inscription temporaire, peuplement de la table 'validation' avec un enregistrement défini par les champs email de la personne, un code crée par la fonction rand() et le statut 'non-valide' et finalement elle renvoie un message à l'adresse email correspondante pour demander à l'utilisateur de confirmer son inscription en cliquant sur le lien associé au message reçu.
    
    public function inscriptionTempUtilisateur(){
        
        if(empty($_POST['nom']) || empty($_POST['prenom']) || empty($_POST['datenaissance']) || empty($_POST['email']) || empty($_POST['role']) || empty($_POST['login'])){
            
            $this->load->view('inscription/inscriptionFormulaire_v'); 
            
        }else{
            
            if(!$this->verifierUtilisateur()){
                
                $this->load->model('utilisateur_m');
                $inscriptionTemp = $this->utilisateur_m->insererUtilisateur($_POST['nom'],$_POST['prenom'], $_POST['datenaissance'], $_POST['email'], $_POST['role'], $_POST['login']);
            
                if($inscriptionTemp){
                
                    //Notification d'inscription temporaire 
                    $identiteUtilisateur = array('nom' => $_POST['nom'], 'prenom' => $_POST['prenom']);
                    $this->load->view('inscription/inscriptionTemporaire_v', $identiteUtilisateur);
                
                    //Peuplement de la table 'validation' avec le statut 'non-valide'
                    $this->load->model('validation_m');
                    $code = rand(10000000, 20000000); 
                    $this->validation_m->ajouterValidation($_POST['email'], $code, 'non-valide');
                
                    //Envoi de lien de confirmation qui contient l'email et le code stockés dans le tableau $emailCode. 
                    $emailCode['email'] = $_POST['email']; 
                    $emailCode['code'] = $code;
                    
                    //Utilisation d'une vue pour confirmer l'inscription(un test)
                    //$this->load->view('inscription/inscriptionLienDeConfirmation_v', $emailCode);
                    
                    
                    //Envoi de mail de confirmation 
                    $to = $_POST['email'];
                    $subject = "Inscription : demande confirmation ";
                
                    $message = "<html><body><p>Nous venons de vous inscrire sur le site de notre école. Pour valider votre inscription cliquer sur l'URL http://localhost/e-ecole-v3/index.php/utilisateur_c/validationInscriptionUtilisateur/". $_POST['email']."/".$code."</p></body></html>";
                
                    $headers  = 'MIME-Version: 1.0' . "\r\n";
                    $headers .= 'Content-type: text/html; charset=UTF-8' . "\r\n";
                
                    mail($to, $subject, $message, $headers);
    
                }
                    
            }else{
                
                $this->load->view('inscription/inscriptionExistenceUtilisateur_v');
                
            }
            

        }
    }
    
    
    //La fonction validationInscriptionUtilisateur($email, $code) préalablement cherche l'adresse email et le code associé dans la table 'validation' grâce à la fonction chercherEmailCode() du modèle validation_m. 
    //Dans une deuxième étape, si la fonction vérfie leur exitence, elle met à jour la table de validation en utilisant la fonction miseAjourValidation($email) du modèle validation_m.
    //Dans la troisième étape, si la mise à jour s'est bien déroulée, elle crée un mot de passe et l'envoie à l'adresse mail de l'utilisateur. 
    public function validationInscriptionUtilisateur($email, $code){
        
        $this->load->model('validation_m');
    
        $emailCode = array();     
        $emailCode = $this->validation_m->chercherEmailCode();  //$emailCode est un tableau qui contient des objets caractérisés par une adresse email et un code.
        
        
        $i = 0 ;
        while($i < sizeof($emailCode) && $email != $emailCode[$i]->val_email && $code != $emailCode[$i]->val_code){
            
            $i ++;    
        }
        
        
        if($i >= sizeof($emailCode)){
            
            $this->load->view('inscription/inscriptionNonValide_v'); 
        
        }else{
       
            $this->load->model('validation_m');
            $miseAjour = $this->validation_m->miseAjourValidation($email);
            
            if($miseAjour){
                
                $this->load->model('loginInfo_m');
                $motDePasse = strval(rand(10000000, 20000000));
                
                $ajoutMotDePasse = $this->loginInfo_m->miseAjourMotDePasse($email, $motDePasse);
                $motDePasseTableau = array('uti_motdepasse' => $motDePasse);
                
                if($ajoutMotDePasse){
                    
                     //$this->load->view('inscription/inscriptionValide_v', $motDePasseTableau);
                    
                     //Envoi de mail de validation de l'inscription contenant le mot de passe.
                     $to = $email;
                     $subject = "Inscription : validation ";
        
                     $message = "<html><body><p>Votre inscription est validée. Votre login est votre nom en miniscule et votre mot de passe est ".$motDePasse."</p></body></html>";
                    
                     $headers  = 'MIME-Version: 1.0' . "\r\n";
                     $headers .= 'Content-type: text/html; charset=UTF-8' . "\r\n";
                     mail($to, $subject, $message, $headers);
                    
                }else{
                    
                    $this->load->view('inscription/inscriptionNonValide_v');
                } 
            }             
        } 
    }
    
    
    // La fonction chercherUtilisateurs() cherche des informations sur les utilisateurs par nom et/ou par prenom et/ou par email et/ou par role.
    // La fonction selectionnerUtilisateurs($utilisateurs) sélectionne des informations sur les utilisateurs depuis la table 'utilisateur' en fonction des options de recherche.
    //$usersInfo est un tableau des objets qui porte des informations sur des utilisateurs.
    public function chercherUtilisateurs(){
        
        if(empty($_POST['nom']) && empty($_POST['prenom']) && empty($_POST['email']) && empty($_POST['role'])){
            
            $this->load->view('rechercher/rechercherUtilisateurFormulaire_v'); 
            
        }else{
            
            $utilisateurs = array();
            if(!empty($_POST['nom'])){
                
                $utilisateurs += array("uti_nom" => $_POST['nom']);
                
            }
            
            if(!empty($_POST['prenom'])){
                
                $utilisateurs += array("uti_prenom" => $_POST['prenom']);
                
            }
            
            
            if(!empty($_POST['email'])){
                
                $utilisateurs += array("uti_email" => $_POST['email']);
                
            }
            
            
            if(!empty($_POST['role'])){
                
                $utilisateurs += array("uti_role" => $_POST['role']);
                
            } 
            
             
            $this->load->model('utilisateur_m');
            $utilisateursInfo = array();
            $utilisateursInfo['usersInfo'] = $this->utilisateur_m->selectionnerUtilisateurs($utilisateurs); 
            
            $this->load->view('rechercher/rechercherUtilisateurResultat_v', $utilisateursInfo);  
            
           
        }       
    }
    
    
    //La fonction remplirFormulaireMiseAJourUtilisateur(...) permet de remplir le formulaire de la mise à jour d'un utilisateur. 
    public function remplirFormulaireMiseAJourUtilisateur($nom, $prenom, $login, $motdepasse, $email){
         
        $utilisateur = array('login' => $login, 'motdepasse' => $motdepasse, 'email' => $email, 'nom' =>$nom, 'prenom' => $prenom);
        $this->load->view('MiseAJour/MiseAJourUtilisateurFormulaire_v', $utilisateur);
        
    }
    
    
    // La fonction miseAJourUtilisateur() met à jour l'utilisateur s'il esxiste, dnns le cas contraire, elle renvoie une notification. 
    public function miseAJourUtilisateur(){
        
        if(empty($_POST['nom']) || empty($_POST['prenom'])){
            
            $this->load->view('MiseAJour/MiseAJourUtilisateurFormulaire_v');
            
        }else{
            
            if($this->verifierUtilisateur()){
                
                if(empty($_POST['email']) && empty($_POST['login']) && empty($_POST['motdepasse'])){ 
                    
                    $this->load->view('MiseAJour/miseAJourUtilisateurFormulaire_v');
                
                }else{
                
                    $this->load->model('utilisateur_m');
                    $identite = array('uti_nom' => $_POST['nom'], 'uti_prenom' => $_POST['prenom']);
                    
                    $miseajour = $this->utilisateur_m->miseAJourUtilisateur($identite, $_POST['email'], $_POST['login'], $_POST['motdepasse']);
                    
                    
                    if($miseajour){
                    
                        $this->load->view('miseAJour/miseAJourUtilisateurResultat_v');
                    }
                    
                }
                       
            }else{
                
                $this->load->view('miseAJour/miseAJourNonExistenceUtilisateur_v');
            }
            
        }   
    }
   
    //La fonction remplirFormulaireSuppressionUtilisateur(...) permet de remplir le formulaire de la suppression d'un utilisateur
    public function remplirFormulaireSuppressionUtilisateur($nom, $prenom){
        
        $utilisateur = array('nom' => $nom, 'prenom' => $prenom);
        $this->load->view('suppression/suppressionUtilisateurFormulaire_v', $utilisateur);
        
    }
    
    public function supprimerUtilisateur(){
        
        if(empty($_POST['nom']) || empty($_POST['prenom'])){
            
            $this->load->view('suppression/suppressionUtilisateurFormulaire_v');
            
        }else{
            
            if($this->verifierUtilisateur()){
                
                $this->load->model('utilisateur_m');
                $identite = array('uti_nom' => $_POST['nom'], 'uti_prenom' => $_POST['prenom']);
                $suppression = $this->utilisateur_m->supprimerUtilisateur($identite);
            
                if($suppression){
                    
                    $this->load->view('suppression/suppressionUtilisateurResultat_v');
                
                }
                
            }else{
                
                $this->load->view('suppression/suppressionNonExistenceUtilisateur_v');
                
            }
        
        }
        
    }
   
    /*
     public static function test(){
        
        if(Utilisateur_c::connexionUtilisateur()){
            
            echo 1;
        }else{
            
            echo 0;
        }
    } 
    
    */
    
}
    
?>