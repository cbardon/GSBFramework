<?php
require_once 'ControleurInterface.php';
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ControleurAffichePrenomsFeminin
 *
 * @author eleve
 */
class ControleurAffichePrenomsFeminin {
  
    public function dispatch($vue, $modele, $tabParametres) {
        try {
            //on va chercher les infos dans le modèle
            $result = $modele->getPersonne()->getLesPrenomsFeminin();
            //on les affiche à la vue
            $vue->getPersonne()->afficheLesPrenomsFeminin($result);
        }
        catch(ModeleExceptions $ex){
            $vue->getGeneral()->afficheException($ex->getMessageErreur());
        }       
    }
}

?>