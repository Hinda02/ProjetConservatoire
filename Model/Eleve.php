<?php

class Eleve extends Personne
{

    private $idEleve;
    private $bourse;
    
    
    /**
	 * @return mixed
	 */
	public function getIdEleve() {
		return $this->idEleve;
	}


	/**
	 * @param mixed $idEleve 
	 * @return self
	 */
	public function setIdEleve($idEleve): self {
		$this->idEleve = $idEleve;
		return $this;
	}
	

	/**
	 * @return mixed
	 */
	public function getBourse() {
		return $this->bourse;
	}

	/**
	 * @param mixed $bourse 
	 * @return self
	 */
	public function setBourse($bourse): self {
		$this->bourse = $bourse;
		return $this;
	}
    
    /**
     * Fonction qui permet de récuperer et regrouper les informations des élèves 
     * 
     *
     * @return void
     */
    public static function getAll(){

        try {
            $req = MonPdo::getInstance()->prepare("select * from eleve inner join personne on eleve.IDELEVE = personne.ID order by nom asc;");  
            $req->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'eleve');
        
            $req->execute();
            $lesResultats = $req->fetchAll();

        } catch (Throwable $th) {
            throw $th;
        }   
        
        return $lesResultats;
    }
	
	/**
	 * fonction qui permet la recherche des séances,  
	 * 
	 * @param  mixed $idprof
	 * @param  mixed $numseance
	 * @param  mixed $jour
	 * @param  mixed $tranche
	 * @return void
	 */
	public static function getNotInSeance($idprof, $numseance, $jour, $tranche){

        $lesSeances = Seance::getByJour_Tranche($jour, $tranche);
        $arrayEleves = array();
        foreach($lesSeances as $laSeance){
            $inscriptions = Inscription::getBySeance($laSeance);
            foreach($inscriptions as $inscription){
                array_push($arrayEleves, $inscription->IDELEVE);
            }
        }

        $string = "";
        foreach($arrayEleves as $id){
            $string = $string . $id . ", ";
        }
        $string = $string . "-1";

        try {
            $req = MonPdo::getInstance()->prepare("select * from eleve inner join personne on eleve.IDELEVE = personne.ID
            where eleve.IDELEVE not in( select ideleve from inscription where idprof = :idProf and numseance = :numSeance)
            AND eleve.IDELEVE not in( ". $string .");");  
            $req->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'eleve');
            $req->bindParam('idProf', $idprof);
            $req->bindParam('numSeance', $numseance);
            $req->execute();

            $lesResultats = $req->fetchAll();

        } catch (Throwable $th) {
            throw $th;
        }
        

        return $lesResultats;
    }
	
	/**
	 * Fonction l'affichage des élèves dans une séance d'un prof donné 
	 *
	 * @param  mixed $idprof
	 * @param  mixed $numseance
	 * @return void
	 */
	public static function getInSeance($idprof, $numseance){
        try {
            $req = MonPdo::getInstance()->prepare("select * from eleve inner join personne on eleve.IDELEVE = personne.ID
            where eleve.IDELEVE in( select ideleve from inscription where idprof = :idProf and numseance = :numSeance);");  
            $req->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'eleve');
            $req->bindParam('idProf', $idprof);
            $req->bindParam('numSeance', $numseance);
        
            $req->execute();
            $lesResultats = $req->fetchAll();
        } catch (Throwable $th) {
            throw $th;
        }
        

        return $lesResultats;
    }
       
    /**
     * Fonction permettant d'ajouter un élève 
     *
     * @param  mixed $eleve
     * @return void
     */
    public static function addEleve(Eleve $eleve) {
		parent::addPersonne($eleve);
		$email = $eleve->getMail();
		$id = self::getIdPers($email);

		try {
            $req = MonPdo::getInstance()->prepare("insert into eleve(idEleve, bourse) values(:idEleve, :bourse)");
            $bourse = $eleve->getBourse();
            
            $req->bindParam('idEleve', $id);
            $req->bindParam('bourse', $bourse);
            
            $nb = $req->execute();
        } catch (Throwable $th) {
            throw $th;
        }
        return $nb;
    }
	
	/**
	 * Fonction permet de recupérer les emails des personnes 
	 *
	 * @param  mixed $mail
	 * @return void
	 */
	public static function getIdPers($mail){

        try {
            $req = MonPdo::getInstance()->prepare("select * from personne where MAIL = :mail ;");
            $req->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'personne');
            $req->bindParam('mail', $mail);
            $req->execute();
            $leResultat = $req->fetch();
        } catch (Throwable $th) {
            throw $th;
        }
        
        return $leResultat->ID;
    }
    
    /**
     * Fonction permettant de chercher un élève avec son nom 
     *
     * @param  mixed $eleve
     * @return void
     */
    public static function rechercheEleve($eleve) {

		$eleve = "%" . $eleve . "%";

        $req = MonPdo::getInstance()->prepare("select * from eleve 
                                               inner join personne on eleve.IDELEVE = personne.ID
                                               where lower(personne.NOM) like (:eleve)");   
                                               
                                                     
        $req->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'eleve');
        $req->bindParam('eleve', $eleve, PDO::PARAM_STR);
        $req->execute();
        $lesResultats = $req->fetchAll();
		return $lesResultats;
        
    }
    
    /**
     * fonction permettant de récuperer les élèves
     * 
     * @param  mixed $id
     * @return void
     */
    public static function getById($id){

        $req = MonPdo::getInstance()->prepare("select * from personne inner join eleve on personne.ID = eleve.IDELEVE where IDELEVE = :id ;");
        $req->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'eleve');
        $req->bindParam('id', $id);
        $req->execute();
        $leResultat = $req->fetch();
        return $leResultat;
    }
    
    
    




	
}
?>