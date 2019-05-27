<?php


class Accueil_c extends CI_Controller {
    
    public static function index() {
        
        $this->load->view('accueil/bienvenue_v');
        
    }
}

?>