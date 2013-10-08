<?php

require_once 'ControleurInterface.php'; 
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ControleurAfficheFormModifierPersonne
 *
 * @author eleve
 */
class ControleurAfficheFormModifierPersonne {
   public function dispatch($vue, $modele, $tabParametres) {
        //On n'affiche ici que le formulaire (on ne va rien chercher 
        //dans le modèle
        $vue->getPersonne()->afficheModificationPersonne();
    }

}

?>
