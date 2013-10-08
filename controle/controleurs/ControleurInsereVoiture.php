<?php
require_once 'ControleurInterface.php';


/**
 * Description of ControleurInserePersonne
 *
 * @author Fabrice Missonnier
 */
class ControleurInsereVoiture { //implements ControleurInterface {
   
    public function dispatch($vue, $modele, $tabParametres) {
        // insereAliment?descFR=Cantal&descAN=Cantal&numGenre=06.6
        try {
            $ok = $modele->getPersonne()->setUneVoiture($tabParametres["NomV"], $tabParametres["MarqueV"]);
            $vue->getPersonne()->afficheInsertVoitureOK();
        }
        catch(ModeleExceptions $ex){
            $vue->getAliment()->afficheInsertVoitureNonOK();
        }
    }
}

?>
