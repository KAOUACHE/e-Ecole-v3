<?php  if (! defined('BASEPATH')) exit('No direct script access allowed');


class Validation_m extends CI_Model {

    protected $table = 'validation';
    
    public function __construct(){
        parent::__construct();
        $this->load->database();    
    }
    
   
    public function ajouterValidation($email, $code, $statut) {
        
        $this->db->set('val_email', $email);
        $this->db->set('val_code', $code);
        $this->db->set('val_statut', $statut);
        
        $this->db->set('val_dateInsciptionTemp', 'NOW()',false);
       
        // Une fois que tous les champs ont bien été définis, on "insert" le tout
        return $this->db->insert($this->table);
    }
    
    
    public function chercherEmailCode(){
        
        $this->db->select('val_code');
        $this->db->select('val_email');
        
        $this->db->from($this->table);
        
        $get = $this->db->get();
        return $get->result(); 
    } 
    
    
    public function miseAjourValidation($email){
         
        $this->db->set('val_statut', 'valide');
        $this->db->set('val_dateValidation', 'NOW()',false);
        
        // La condition
        $this->db->where('val_email', $email);
        
        // retourne d'un booleen.
        return $this->db->update($this->table);
    }
    
 
}

?>