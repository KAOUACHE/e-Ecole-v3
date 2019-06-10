<?php

class Matiere_c extends CI_Controller {
    
    public function __construct(){
        
        parent::__construct();
        $this->load->database();    
    }
    
    
    //La fonction verifierMatiere() vérifier l'existence d'une matière.
    public function verifierMatiere(){
        
         $this->load->model('matiere_m');   
         $matiere = array();
         $matiere = $this->matiere_m->selectionnerMatiere(); 
        
    
         $i = 0 ;
         while($i < sizeof($matiere) && $_POST['nomMatiere'] != $matiere[$i]-> mat_nom){
                
             $i ++; 
             
         }
            
         
         if($i >= sizeof($matiere)){
             
             return false;
              
         }else{
            
             return true;
     
        }
    }
    
 
    // La fonction ...
    public function rajouterMatiere(){
        
        if(empty($_POST['nomMatiere'])){
            
            $this->load->view('accueil/accueil_v');
            $this->load->view('rajoutMatiere/rajoutMatiereFormulaire_v'); 
            
        }else{
            
            if(!$this->verifierMatiere()){
                
                $this->load->model('matiere_m');
                $rajout = $this->matiere_m->insererMatiere($_POST['nomMatiere']);
            
                if($rajout){
                
                    //Confirmation de rajout d'une matière
                    $matiere = array('nomMatiere' => $_POST['nomMatiere']);
                    
                    $this->load->view('accueil/accueil_v');
                    $this->load->view('rajoutMatiere/rajoutMatiereConfirmation_v', $matiere);
    
                }
                    
            }else{
                
                $this->load->view('accueil/accueil_v');
                $this->load->view('rajoutMatiere/rajoutExistenceMatiere_v');
                
            }
            

        }
    }
    
    
    
    // La fonction ...
    public function listerMatieres(){
        
        $this->load->model('matiere_m');
        
            $matieres = array();
            $matieres['listeMatieres'] = $this->matiere_m->selectionnerMatieres(); 
            
            $this->load->view('accueil/accueil_v');
            $this->load->view('listeMatieres/listerMatieresResultat_v', $matieres);
        
    }
    
   
    // La fonction ...
    public function suppressionMatiere($matiereNom){
        
        $this->load->model('matiere_m');
        $suppression = $this->matiere_m->supprimerMatiere($matiereNom);
            
        if($suppression){
            
            $matiere = array('mat_nom' => $matiereNom); 
            
            $this->load->view('accueil/accueil_v');
            $this->load->view('suppressionMatiere/suppressionMatiereResultat_v', $matiere);
                
        }
    }
    
}
    
?>