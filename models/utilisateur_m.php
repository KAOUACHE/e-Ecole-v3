<?php


class Utilisateur_m extends CI_Model {

    protected $table = 'utilisateur';
    
    
    public function __construct(){
        
        parent::__construct();
        $this->load->database();    
    }
    
   
    public function insererUtilisateur($nom, $prenom, $datenaissance, $email, $role, $login) {
        
        $this->db->set('uti_nom', $nom);
        $this->db->set('uti_prenom', $prenom);
        $this->db->set('uti_datenaissance', $datenaissance);
        $this->db->set('uti_email', $email);
        $this->db->set('uti_role', $role);
        $this->db->set('uti_login', $login);

        //  Une fois que tous les champs ont bien été définis, on "insert" le tout
        return $this->db->insert($this->table); // La fonction retourne un booleén
    } 
    
    
    public function selectionnerUtilisateurs($utilisateurs){
        
        // Sélection des champs
        $this->db->select('*');
        $this->db->from($this->table);
        
        //la condition
        $this->db->where($utilisateurs);
        
        $get = $this->db->get();
        return $get->result();  //retourne un tableau des objets. 
    }
    
    
    public function selectionnerUtilisateur(){
        
        $this->db->select('uti_nom');
        $this->db->select('uti_prenom');
        
        $this->db->from($this->table);
        
        $get = $this->db->get();
        return $get->result();  //retourne un tableau des objets qui représentent des utilisateurs. 
    }
    
    
    public function selectionnerLoginMotDePasse(){
        
        $this->db->select('uti_login');
        $this->db->select('uti_motdepasse');
        
        $this->db->from($this->table);
        
        $get = $this->db->get();
        return $get->result();   
    }
    
    
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
    
    
    public function supprimerUtilisateur($identite) {
        
        // La condition
        $this->db->where($identite);
        
        // retourne d'un booleen.
        return $this->db->delete($this->table);  
    }
    

}

?>