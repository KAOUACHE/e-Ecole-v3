<?php


class Accueil_c extends CI_Controller {
    
    // La fonction index() affiche par défaut la page d'accueil 'bienvenue_v' et le volet pour la connexion.
    public static function index() {
        
        $this->load->view('accueil/accueil_v');
        $this->load->view('connexion/connexion_v');
        
    }
}

?>