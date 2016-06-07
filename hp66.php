<?php

/*

Plugin Name: Carte HP66
Plugin URI: http://www.philippe-poisse.eu
Description: Un plugin pour la carte de HP66
Version: 0.1
Author: PHPO
Author URI: http://www.philippe-poisse.eu
License: GPL3

*/

class WP_hp66{

  // Constructor
    function __construct() {

        add_action( 'admin_menu', array( $this, 'wpa_add_menu' ));
        register_activation_hook( __FILE__, array( $this, 'wpa_install' ) );
        register_deactivation_hook( __FILE__, array( $this, 'wpa_uninstall' ) );
    }

    
    /*
      * Actions perform at loading of admin menu
      */
    function wpa_add_menu() {

        //Menu principal
        add_menu_page( 'Carte HP66', 'Carte', 'manage_options', 'carte', array(
                          __CLASS__,
                         //'wpa_page_file_path'
                        'carte_html'
                        ));
        
        //Affichage de la carte
        add_submenu_page( 'carte', 'Carte', ' Adhérents', 'manage_options', 'carte-adherent', array(
                              __CLASS__,
                             'carte_html'
                            ));

    }

    
    /*
     * Fonction pour chaque page
     */
    
    //Cette méthode sert à afficher la carte dans le menu "carte"
    public function carte_html()
        {

            $code = file_get_contents("../wp-content/plugins/hp66/templates/carte.inc");

            echo $code; 
        }
    
    //Cette méthode sert pour la gestion des adhérents
    public function carte_adherent() {
        echo "gestion adherent";
    }
        
    /*
     * Actions perform on loading of menu pages
     */
    function wpa_page_file_path() {
echo "test";

    }

    /*
     * Actions perform on activation of plugin
     */
    function wpa_install() {

        

    }

    /*
     * Actions perform on de-activation of plugin
     */
    function wpa_uninstall() {



    }

}

new WP_hp66();