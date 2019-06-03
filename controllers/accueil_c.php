<?php


class Accueil_c extends CI_Controller {
    
    // La fonction index() affiche par défaut la page d'accueil 'bienvenue_v'.
    public static function index() {
        
        $this->load->view('accueil/bienvenue_v');
        
    }
}

?>