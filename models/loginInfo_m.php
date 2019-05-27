<?php  if (! defined('BASEPATH')) exit('No direct script access allowed');


class LoginInfo_m extends CI_Model {

    protected $table = 'utilisateur';
    
    public function __construct(){
        parent::__construct();
        $this->load->database();    
    }
    
    
    public function miseAjourMotDePasse($email, $motDePasse){
         
        $this->db->set('uti_motdepasse', $motDePasse);
         
        
        // La condition
        $this->db->where('uti_email', $email);
        
        // La fonction retourne un booleen.
        return $this->db->update($this->table);
    }
    
}

?>