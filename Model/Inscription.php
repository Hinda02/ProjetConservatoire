<?php

class Inscription 
{

    private $idProf;
    private $idEleve;
    private $numSeance;
    private $dateInscription;
    


	/**
	 * @return mixed
	 */
	public function getIdProf() {
		return $this->idProf;
	}

	/**
	 * @param mixed $idProf 
	 * @return self
	 */
	public function setIdProf($idProf): self {
		$this->idProf = $idProf;
		return $this;
	}

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
	public function getNumSeance() {
		return $this->numSeance;
	}

	/**
	 * @param mixed $numSeance 
	 * @return self
	 */
	public function setNumSeance($numSeance): self {
		$this->numSeance = $numSeance;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getDateInscription() {
		return $this->dateInscription;
	}

	/**
	 * @param mixed $dateInscription 
	 * @return self
	 */
	public function setDateInscription($dateInscription): self {
		$this->dateInscription = $dateInscription;
		return $this;
	}

    public static function getAll(){

        $req = MonPdo::getInstance()->prepare("select * from inscription "); //select IDPROF/IDELEVE from inscription 
        $req->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'inscription');
       
        $req->execute();
        $lesResultats = $req->fetchAll();
  

        return $lesResultats;
    }

	public static function getBySeance(Seance $seance){

		$idProf = $seance->IDPROF;
		$numSeance = $seance->NUMSEANCE;
        $req = MonPdo::getInstance()->prepare("select * from inscription where IDPROF = :idProf and numSeance = :numSeance;");
        $req->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'inscription');
       
		$req->bindParam('idProf', $idProf);
        $req->bindParam('numSeance', $numSeance);

        $req->execute();
        $lesResultats = $req->fetchAll();
  

        return $lesResultats;
    }

	public static function inscrire($idprof, $ideleve, $numseance) {

		$date = date("Y-m-d");
		$req = MonPdo::getInstance()->prepare("insert into inscription values(:idprof, :ideleve, :numseance, :date)");
        
        $req->bindParam('idprof', $idprof);
		$req->bindParam('ideleve', $ideleve);
		$req->bindParam('numseance', $numseance);
        $req->bindParam('date', $date);
        
        $nb = $req->execute();
        return $nb;
    }

}
