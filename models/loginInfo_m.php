<?php  if (! defined('BASEPATH')) exit('No direct script access allowed');


class LoginInfo_m extends CI_Model {

    protected $table = 'utilisateur';
    
    public function __construct(){
        parent::__construct();
        $this->load->database();    
    }
    
    // La fonction miseAjourMotDePasse($email, $motDePasse) permet de mettre à jour le mot de passe qui correspond à l'émail $email. 
    public function miseAjourMotDePasse($email, $motDePasse){
         
        $this->db->set('uti_motdepasse', $motDePasse);
         
        
        // La condition
        $this->db->where('uti_email', $email);
        
        // La fonction retourne un booleen.
        return $this->db->update($this->table);
    }
    
}

?>