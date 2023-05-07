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

    public static function getAll(){

        $req = MonPdo::getInstance()->prepare("select * from eleve inner join personne on eleve.IDELEVE = personne.ID order by nom asc;");  
        $req->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'eleve');
       
        $req->execute();
        $lesResultats = $req->fetchAll();

        return $lesResultats;
    }

	public static function getNotInSeance($idprof, $numseance){

        $req = MonPdo::getInstance()->prepare("select * from eleve inner join personne on eleve.IDELEVE = personne.ID
		where eleve.IDELEVE not in( select ideleve from inscription where idprof = :idProf and numseance = :numSeance);");  
        $req->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'eleve');
		$req->bindParam('idProf', $idprof);
        $req->bindParam('numSeance', $numseance);
       
        $req->execute();
        $lesResultats = $req->fetchAll();

        return $lesResultats;
    }

	public static function getInSeance($idprof, $numseance){

        $req = MonPdo::getInstance()->prepare("select * from eleve inner join personne on eleve.IDELEVE = personne.ID
		where eleve.IDELEVE in( select ideleve from inscription where idprof = :idProf and numseance = :numSeance);");  
        $req->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'eleve');
		$req->bindParam('idProf', $idprof);
        $req->bindParam('numSeance', $numseance);
       
        $req->execute();
        $lesResultats = $req->fetchAll();

        return $lesResultats;
    }
   
    public static function addEleve(Eleve $eleve) {
		parent::addPersonne($eleve);
		$email = $eleve->getMail();
		$id = self::getIdPers($email);

		$req = MonPdo::getInstance()->prepare("insert into eleve(idEleve, bourse) values(:idEleve, :bourse)");
        $bourse = $eleve->getBourse();
        
        $req->bindParam('idEleve', $id);
        $req->bindParam('bourse', $bourse);
        
        $nb = $req->execute();
        return $nb;
    }

	public static function getIdPers($mail){

        $req = MonPdo::getInstance()->prepare("select * from personne where MAIL = :mail ;");
        $req->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'personne');
        $req->bindParam('mail', $mail);
        $req->execute();
        $leResultat = $req->fetch();
        return $leResultat->ID;
    }

	
}
?>