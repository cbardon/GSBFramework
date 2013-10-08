<?php
require_once 'ControleurInterface.php';
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ControleurModifierPersonne
 *
 * @author eleve
 */
class ControleurModifierPersonne {
     
    public function dispatch($vue, $modele, $tabParametres) {
        // insereAliment?descFR=Cantal&descAN=Cantal&numGenre=06.6
        try {
            $ok = $modele->getPersonne()->setUnePersonne($tabParametres["numP"],$tabParametres["nomP"], $tabParametres["prenomP"], $tabParametres["sexeP"]);
            $vue->getPersonne()->afficheInsertPersonneOK();
        }
        catch(ModeleExceptions $ex){
            $vue->getAliment()->afficheInsertPersonneNonOK();
        }
    }
}

?>

