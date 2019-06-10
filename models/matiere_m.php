<?php


class Matiere_m extends CI_Model {

    protected $table = 'matiere';
    
    
    public function __construct(){
        
        parent::__construct();
        $this->load->database();    
    }
    
   
    public function insererMatiere($nomMatiere) {
        
        $this->db->set('mat_nom', $nomMatiere);
        
        return $this->db->insert($this->table); // La fonction retourne un booleén
    }
    
    
    // La fonction ...
    public function selectionnerMatieres(){
        
        // Sélection des champs
        $this->db->select('*');
        $this->db->from($this->table);
        
        $get = $this->db->get();
        return $get->result();  //retourne un tableau des objets qui représentent des matières.
    }
    
    
     // La fonction selectionnerUtilisateur() retourne un tableau des objets depuis la table 'utilisateur' où chaque objet correspond à un nom et un prenom.
    public function selectionnerMatiere(){
        
        $this->db->select('mat_nom');
        
        $this->db->from($this->table);
        
        $get = $this->db->get();
        return $get->result();  //retourne un tableau des objets qui représentent des matières. 
    }
    
    
   
    /*
    public function miseAJourUtilisateur($identite, $email, $login, $motdepasse) {
        
        if($email != null){
            $this->db->set('uti_email', $email);
        }
        
        if($login != null){
            $this->db->set('uti_login', $login);
        }
        
        if($motdepasse != null){
            $this->db->set('uti_motdepasse', $motdepasse);
        }
        
        // La condition
        $this->db->where($identite);
        
        // retourne un booleen.
        return $this->db->update($this->table);
    }
    
    */
    
    public function supprimerMatiere($matiereNom){
        
        // La condition
        $this->db->where('mat_nom', $matiereNom);
        
        // retourne d'un booleen.
        return $this->db->delete($this->table);  
    }


}

?>