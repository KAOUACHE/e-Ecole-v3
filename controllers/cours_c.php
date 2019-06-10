<?php

class Cours_c extends CI_Controller {
    
    public function __construct(){
        
        parent::__construct();
        $this->load->database();    
    }
    
    
    //La fonction verifierCours() vérifier l'existence d'un cours.
    public function verifierCours(){
        
         $this->load->model('cours_m');   
         $cours = array();
         $cours = $this->cours_m->selectionnerCours(); 
        
    
         $i = 0 ;
         while($i < sizeof($cours) && $_POST['titre'] != $cours[$i]-> cou_titre){
                
             $i ++; 
             
         }
            
         
         if($i >= sizeof($cours)){
             
             return false;
              
         }else{
            
             return true;
     
        }
    }
    
    
    // La fonction ...
    public function rajouterCours(){
        
        if(empty($_POST['titre']) || empty($_POST['dateCours']) || empty($_POST['duree']) || empty($_POST['description'])){
            
            $this->load->view('accueil/accueil_v');
            $this->load->view('rajoutCours/rajoutCoursFormulaire_v'); 
            
        }else{
            
            if(!$this->verifierCours()){
                
                $this->load->model('cours_m');
                $rajout = $this->cours_m->insererCours($_POST['titre'], $_POST['dateCours'], $_POST['duree'], $_POST['description']);
            
                if($rajout){
                
                    //Confirmation de rajout d'un cours
                    $cours = array('titre' => $_POST['titre']);
                    $this->load->view('accueil/accueil_v');
                    $this->load->view('rajoutCours/rajoutCoursConfirmation_v', $cours);
    
                }
                    
            }else{
                
                $this->load->view('accueil/accueil_v');
                $this->load->view('rajoutCours/rajoutExistenceCours_v');
                
            }
            

        }
    }
    
    
    // La fonction ...
    public function listerCours(){
        
        $this->load->model('cours_m');
        
            $cours = array();
        
            $cours['listeCours'] = $this->cours_m->selectionnerCours(); 
            
            $this->load->view('accueil/accueil_v');
            $this->load->view('listeCours/listerCoursResultat_v', $cours);
        
    }
    

    //La fonction ...
    public function remplirFormulaireMiseAJourCours($titre, $date, $duree, string $description){
         
        $cours = array('titre' => $titre, 'date' => $date, 'duree' => $duree, 'description' => $description);
        
        $this->load->view('accueil/accueil_v');
        $this->load->view('miseAJourCours/miseAJourCoursFormulaire_v', $cours);
        
    }
    

    // La fonction ...
    public function miseAJourCours(){
        
        $this->load->model('cours_m');
        
        //$cours = array('uti_nom' => $_POST['titre'], 'uti_prenom' => $_POST['prenom']);            
        $miseajour = $this->cours_m->miseAJourCours($_POST['titre'], $_POST['dateCours'], $_POST['duree'], $_POST['description']);
                                
        if($miseajour){
            
            $this->load->view('accueil/accueil_v');
            $this->load->view('miseAJourCours/miseAJourCoursResultat_v');
        
        }   
    }
    
   
    //...
    public function suppressionCours($titre){
        
        $this->load->model('cours_m');
        
        $cours = array('titre' => $titre);
        $suppression = $this->cours_m->supprimerCours($titre);
        
        if($suppression){
            
            $this->load->view('accueil/accueil_v');
            $this->load->view('suppressionCours/suppressionCoursResultat_v', $cours);
        
        }
              
    }
    
    
    // La fonction ...
    public function consulterCours(){
        
        $this->load->model('cours_m');
        
            $cours = array();
        
            $cours['listeCours'] = $this->cours_m->selectionnerCours(); 
            
            $this->load->view('accueil/accueil_v');
            $this->load->view('consulterCours/consulterCoursResultat_v', $cours);
        
    }
  
}
    
?>