<?php


/**
 * Description of PersonnePDO
 *
 * @author Fabrice Missonnier
 */

 class PersonnePDO {
    
    public function getLesPersonnes(){
        $maConnexion = new ConnexionBD();
        
        $select = $maConnexion->getConnexion()->query("SELECT * FROM Personne");

        //mode de récupération par défaut
        $select->setFetchMode(PDO::FETCH_OBJ);
        $i=0;
        //traite les résultats en boucle
        $enregistrement = $select->fetch();
        
        $tabElem = NULL;
        while( $enregistrement )
        { 
            $tabElem[$i]["NumP"] = $enregistrement->NumP;
            $tabElem[$i]["NomP"] = $enregistrement->NomP;
            $tabElem[$i]["PrenomP"] = $enregistrement->PrenomP ;
            $tabElem[$i]["SexeP"] = $enregistrement->SexeP ;
            $enregistrement = $select->fetch();
            $i++;
        }
       
        if ($tabElem == NULL){
            throw new ModeleExceptions (0);
        }
        else{     
            return $tabElem;
        }
    }
    
     public function getLesPrenoms(){
        $maConnexion = new ConnexionBD();
        
        $select = $maConnexion->getConnexion()->query("SELECT PrenomP FROM Personne");

        //mode de récupération par défaut
        $select->setFetchMode(PDO::FETCH_OBJ);
        $i=0;
        //traite les résultats en boucle
        $enregistrement = $select->fetch();
        $tabElem = NULL;
        while( $enregistrement )
        { 
            $tabElem[$i]["PrenomP"] = $enregistrement->PrenomP;
            $enregistrement = $select->fetch();
            $i++;
        }
       
        if ($tabElem == NULL){
            throw new ModeleExceptions (0);
        }
        else{     
            return $tabElem;
        }
    }
    
       
     public function getLesPrenomsFeminin(){
        $maConnexion = new ConnexionBD();
        
        $select = $maConnexion->getConnexion()->query("SELECT PrenomP FROM Personne WHERE SexeP ='F'");

        //mode de récupération par défaut
        $select->setFetchMode(PDO::FETCH_OBJ);
        $i=0;
        //traite les résultats en boucle
        $enregistrement = $select->fetch();
        $tabElem = NULL;
        while( $enregistrement )
        { 
            $tabElem[$i]["PrenomP"] = $enregistrement->PrenomP;
            $enregistrement = $select->fetch();
            $i++;
        }
       
        if ($tabElem == NULL){
            throw new ModeleExceptions (0);
        }
        else{     
            return $tabElem;
        }
    }
    
    
   
    public function setUnePersonne($nomP, $prenomP, $sexeP){
        $maConnexion = new ConnexionBD();

        //applique la méthode query sur l’objet $connection
        $req2 = "INSERT INTO Personne (NomP, PrenomP, SexeP) VALUES
            ('".$nomP."', '".$prenomP."', '".$sexeP."');";
        
        $res = $maConnexion->getConnexion()->exec($req2);

        if (!$res){
            throw new ModeleExceptions (1);
        }
    }
      public function setUneVoiture($NomV, $MarqueV){
        $maConnexion = new ConnexionBD();

        //applique la méthode query sur l’objet $connection
        $req2 = "INSERT INTO Voiture (NomV, MarqueV) VALUES
            ('".$NomV."', '".$MarqueV."');";
        
        $res = $maConnexion->getConnexion()->exec($req2);

        if (!$res){
            throw new ModeleExceptions (1);
        }
    }
    
    public function deleteUnePersonne($NomP){
        $maConnexion = new ConnexionBD();
        $req2 = "DELETE FROM Personne WHERE NomP = '".$NomP."';";
        $res = $maConnexion ->getConnexion()->exec($req2);
        if(!$res){
            throw  new ModeleExceptions(1);
        }
    }
    
    public function getNumP(){
        $maConnexion = new ConnexionBD();
        
        $select = $maConnexion->getConnexion()->query("SELECT NumP, NomP FROM Personne");

        //mode de récupération par défaut
        $select->setFetchMode(PDO::FETCH_OBJ);
        $i=0;
        //traite les résultats en boucle
        $enregistrement = $select->fetch();
        $tabElem = NULL;
        while( $enregistrement )
        { 
            $tabElem[$i]["NumP"] = $enregistrement->NumP;
             $tabElem[$i]["NomP"] = $enregistrement->NomP;
            $enregistrement = $select->fetch();
            $i++;
        }
       
        if ($tabElem == NULL){
            throw new ModeleExceptions (0);
        }
        else{     
            return $tabElem;
        }
    }
    
    public function  setModif(){
          $maConnexion = new ConnexionBD($numP,$nomP,$prenomP,$sexeP);
        $req2 = "UPDATE Personne
                SET NumP='".$numP."', NomP='".$nomP."', PrenomP='".$prenomP."', SexeP='".$sexeP."'";
        $res = $maConnexion ->getConnexion()->exec($req2);
        if(!$res){
            throw  new ModeleExceptions(1);
    }
}
 }
?>
