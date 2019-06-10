<?php


class Cours_m extends CI_Model {

    protected $table = 'cours';
    
    
    public function __construct(){
        
        parent::__construct();
        $this->load->database();    
    }
    
   
    public function insererCours($titre, $dateCours, $duree, $description) {
        
        $this->db->set('cou_titre', $titre);
        $this->db->set('cou_date', $dateCours);
        $this->db->set('cou_dureeEnMinutes', $duree);
        $this->db->set('cou_description', $description);

        //  Une fois que tous les champs ont bien été définis, on "insert" le tout
        return $this->db->insert($this->table); // La fonction retourne un booleén
    } 
    
    
    // La fonction ...
    public function selectionnerCours(){
        
        // Sélection des champs
        $this->db->select('*');
        $this->db->from($this->table);
        
        $get = $this->db->get();
        return $get->result();  //retourne un tableau des objets. 
    }
    

    // La fonction...
    public function miseAJourCours($titre, $date, $duree, $description) {
        
        if($titre != null){
            $this->db->set('cou_titre', $titre);
        }
        
        if($date != null){
            $this->db->set('cou_date', $date);
        }
        
        if($duree != null){
            $this->db->set('cou_dureeEnMinutes', $duree);
        }
        
        if($description != null){
            $this->db->set('cou_dureeEnMinutes', $duree);
        }
        
        // retourne un booleen.
        return $this->db->update($this->table);
    }
    
    // La fonction...
    public function supprimerCours($titre) {
        
        // La condition
        $this->db->where('cou_titre', $titre);
        
        // retourne d'un booleen.
        return $this->db->delete($this->table);  
    }
    
}

?>