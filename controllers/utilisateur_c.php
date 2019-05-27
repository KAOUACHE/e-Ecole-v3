<?php

class Utilisateur_c extends CI_Controller {
    
    
    public static function existenceLoginMotDePasse(){ 
        
        if(empty($_POST['login']) || empty($_POST['motdepasse'])){
            
            return false;
           
        }else{
            
            return true;
        }  
    } 

   
    public function verifierLoginMotDePasse(){
        
        if(Utilisateur_c::existenceLoginMotDePasse()){
            
            $this->load->model('utilisateur_m');   
            $utilisateurs = array();
            $utilisateurs = $this->utilisateur_m->selectionnerLoginMotDePasse(); 
            //$loginMotDePasse est un tableau des objets qui représente des utilisateurs où chacun est défini par un login et mot de passe.
            
            $i = 0 ;
            while($i < sizeof($utilisateurs) && ($_POST['login'] != $utilisateurs[$i]-> uti_login || $_POST['motdepasse'] != $utilisateurs[$i]-> uti_motdepasse)){
                
                    $i ++;    
            }
            
            
            if($i >= sizeof($utilisateurs)){
                
                return false;
              
            }else{
                
               return true;
              
            }
              
        }else{
            
            return false;  
        } 
    }
    
    
   
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
    

    
    public function connexionUtilisateur(){
      
        if($this->sessionUtilisateur()){
            
            return true;
            
        }else{
            
            return false;
        }     
    }
    
    
    
    public static function deconnexionUtilisateur(){
        
        unset($_SESSION['utilisateur']);
        
        //return true; 
    }
           
    
    
    public function afficher(){ 
    
        if(!$this->connexionUtilisateur()){
            
            $this->load->view('connexion/connexionFormulaire_v'); 
            
        }else{
            
            $this->load->view('administrateur/administrateur_v'); 
            $this->load->view('deconnexion/deconnexion_v');
            
        }
        
    }
    
    
    public static function afficherAccueil(){
        
        Utilisateur_c::deconnexionUtilisateur();    
        $this->load->view('accueil/bienvenue_v');
       
    }
    
    
    //Une fonction qui va vérifier l'existence d'un utilisateur.
    
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
                
                    //Peupelement de la table 'validation' avec le statut 'non-valide'
                    $this->load->model('validation_m');
                    $code = rand(10000000, 20000000); 
                    $this->validation_m->ajouterValidation($_POST['email'], $code, 'non-valide');
                
                    //Envoi de lien de confirmation qui contient l'email et le code stockés dans le tableau $emailCode. 
                    $emailCode['email'] = $_POST['email']; 
                    $emailCode['code'] = $code ;
                    //$this->load->view('inscription/inscriptionLienDeConfirmation_v', $emailCode);
                    
                    
                    //Envoide mail de confirmation
                    $to = "rael@localhost.com";
                    $subject = "Inscription : demande confirmation ";
                
                    $message = "<html><body><p>Nous venons de vous inscrire sur le site de notre école. Pour valider votre inscription cliquer sur ce <a href='http://localhost/e-ecole-v3/index.php/utilisateur_c/validationInscriptionUtilisateur/". $_POST['email']."/".$code."'>lien.</a></p></body></html>";
                
                    $headers  = 'MIME-Version: 1.0' . "\r\n";
                    $headers .= 'Content-type: text/html; charset=UTF-8' . "\r\n";
                
                    mail($to, $subject, $message, $headers);
    
                }
                    
            }else{
                
                $this->load->view('inscription/inscriptionExistenceUtilisateur_v');
                
            }
            

        }
    }
    
    
    
    public function validationInscriptionUtilisateur($email, $code){
        
        $this->load->model('validation_m');
    
        $emailCode = array();     
        $emailCode = $this->validation_m->chercherEmailCode();  //$emailCode est un tableau qui contient des objets caractérisés par un code.
        
        
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
                    
                     $this->load->view('inscription/inscriptionValide_v', $motDePasseTableau);
                    
                }else{
                    
                    $this->load->view('inscription/inscriptionNonValide_v');
                } 
            }             
        } 
    }
    
    
    /* Cette fonction cherche des informations sur les utilisateurs */
    
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
            $utilisateursInfo['usersInfo'] = $this->utilisateur_m->selectionnerUtilisateurs($utilisateurs); //$usersInfo est un tableau des objets qui représentent des utilisateurs.
            
            $this->load->view('rechercher/rechercherUtilisateurResultat_v', $utilisateursInfo);  //$usersInfo
            
            
            //print_r($utilisateurs);
        }       
    }
    
   
    
    
    
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