<?php
require_once 'GeneralHTML.php';

/**
 * Description of PersonneHTML
 *
 * @author Fabrice Missonnier
 */
 class PersonneHTML {
    private $general;
    
    function __construct() {
       $this->general = new GeneralHTML();
    }

    
    public function afficheLesPersonnes ($tabElements){
        $this->general->getDebutPage("Affichage des personnes");
        
        $nb = count ($tabElements);
        
        for($i=0;$i<$nb;$i++ ){
            echo($tabElements[$i]["NumP"]." ". $tabElements[$i]["NomP"]." "
                 .$tabElements[$i]["PrenomP"]." ");
            if ($tabElements[$i]["SexeP"] == "M")
                 echo ("Masculin <BR/>");
            else
                 echo ("Feminin <BR/>");
        }
        $this->general->getRetourAccueil();
        $this->general->getFinPage();
    }
    
    
    public function afficheFormInsertionPersonne(){
        $this->general->getDebutPage("Insertion d'une personne");
        //attention : dans le formulaire, l'action envoyée est 
        //de la forme do.php?action=inserePersonne&nomP=MyTaylorIsRich&Prenom=Very&sexeP="M"
        //pour envoyer le paramètre inserePersonne, il faut le placer dans un input caché
        
        ?>
            <form action="do.php " method="GET">
                    Nom 
                    <input type="text" name="nomP" size="20" ><BR/><BR/>
                    Prenom
                    <input type="text" name="prenomP" size="20" ><BR/><BR/>
                    Sexe <BR/>
                    <INPUT type='radio' name='sexeP' value='M'> Masculin <BR/>
                    <INPUT type='radio' name='sexeP' value='F'> Feminin <BR/>
                    <br/><br/>
                    <input type="hidden" name="action" value="insereVoiture">
                    <input type="submit" value="Envoyer" >
                    <input type="reset" value="Annuler" >
                </form>
        <?php
        
        $this->general->getFinPage();
    }
    
    public function afficheLesPrenoms($tabElements){
        $this -> general->getDebutPage("Visualisation des prénoms");
     $nombre =count ($tabElements);
     for($i=0;$i<$nombre;$i++){
         echo($tabElements[$i]["PrenomP"]);
        echo("<br />");
     }
        $this->general->getRetourAccueil();
        $this->general->getFinPage();
    }

     
    public function afficheLesPrenomsFeminin($tabElements){
        $this -> general->getDebutPage("Visualisation des prénoms");
     $nombre =count ($tabElements);
     for($i=0;$i<$nombre;$i++){
         echo($tabElements[$i]["PrenomP"]);
        echo("<br />");
     }
        $this->general->getRetourAccueil();
        $this->general->getFinPage();
    }


    public function afficheInsertPersonneOK(){
        $this->general->getDebutPage("Insertion OK");
        ?>
        La personne est bien insérée dans la base
        <?php
        $this->general->getRetourAccueil();
        $this->general->getFinPage();
    }
     
    public function afficheInsertPersonneNonOK(){
        $this->general->getDebutPage("Insertion pas bien déroulée");
        ?>
        La personne n'a pas été insérée dans la base
        <?php
        $this->general->getRetourAccueil();
        $this->general->getFinPage();
    }
    
    
      

    
    
    public function afficheFormInsertionVoiture(){
        $this->general->getDebutPage("Insertion d'une personne");
        //attention : dans le formulaire, l'action envoyée est 
        //de la forme do.php?action=inserePersonne&nomP=MyTaylorIsRich&Prenom=Very&sexeP="M"
        //pour envoyer le paramètre inserePersonne, il faut le placer dans un input caché
        
        ?>
            <form action="do.php " method="GET">
                    Nom 
                    <input type="text" name="NomV" size="20" ><BR/><BR/>
                    Marque
                    <input type="text" name="MarqueV" size="20" ><BR/><BR/>
                    <input type="hidden" name="action" value="insereVoiture">
                    <input type="submit" value="Envoyer" >
                    <input type="reset" value="Annuler" >
                </form>
        <?php
        
        $this->general->getFinPage();
    }
    
    
    public function afficheInsertVoitureOK(){
        $this->general->getDebutPage("Insertion OK");
        ?>
        La voiture est bien insérée dans la base
        <?php
        $this->general->getRetourAccueil();
        $this->general->getFinPage();
    }
     
    public function afficheInsertVoitureNonOK(){
        $this->general->getDebutPage("Insertion pas bien déroulée");
        ?>
        La voiture n'a pas été insérée dans la base
        <?php
        $this->general->getRetourAccueil();
        $this->general->getFinPage();
    }
    
    
    public function  afficheSuppressionPersonne(){
        
        
		$dns = 'mysql:host=localhost;dbname=GSB_Test';
			$utilisateur = 'root';
			$motDePasse = 'root';

		$connexion = new PDO( $dns, $utilisateur, $motDePasse);

		$select = $connexion->query("Select NomP From Personne");

		$select->setFetchMode(PDO::FETCH_OBJ);
               //$i = 0;
						//echo'<FORM action="NbAlimentParGenre.php" method="POST">';
                                                echo'<FORM>';
    						echo'<SELECT name="Test" size="1">';
						while($enregistrement = $select->fetch() )
						{
							echo "<option>".$enregistrement->NomP."</option>";
						}
						
                                                echo'</SELECT>';
                                                echo'<INPUT type="submit" value="Envoyer">';
                                                echo'</FROM>';
                                                
                                                 $this->general->getRetourAccueil();
        $this->general->getFinPage();
    }
    
    public function afficheModificationPersonne(){
  
        ?>
        
            <form action="do.php " method="GET">
                Num
                <input type ="text" name='numP' size='20'><BR/><BR/>
                    Nom 
                    <input type="text" name="nomP" size="20" ><BR/><BR/>
                    Prenom
                    <input type="text" name="prenomP" size="20" ><BR/><BR/>
                    Sexe <BR/>
                    <INPUT type='radio' name='sexeP' value='M'> Masculin <BR/>
                    <INPUT type='radio' name='sexeP' value='F'> Feminin <BR/>
                    <br/><br/>
                    <input type="hidden" name="action" value="setModif">
                    <input type="submit" value="Envoyer" >
                    <input type="reset" value="Annuler" >
                </form>
        <?php
        
        $this->general->getFinPage();
    }
        
        
    }
 
?>
