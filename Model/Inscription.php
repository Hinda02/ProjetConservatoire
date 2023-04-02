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
    public static function getByAfficherInscription(){

        $req = MonPdo::getInstance()->prepare("select * from inscription "); //select IDPROF/IDELEVE from inscription 
        $req->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'inscription');
       
        $req->execute();
        $lesResultats = $req->fetchAll();
        $nb_lignes = count($lesResultats);

    

        return $lesResultats;
    }
    public static function supprimerInscription( string $idProf ) {

        $req = MonPdo::getInstance()->prepare(" delete from inscription where IDPROF = $idProf "); 
        $req->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'eleve');
       
        $req->execute();
        $lesResultats = $req->fetchAll();
        $nb_lignes = count($lesResultats);


    

        return $lesResultats;

    }

    public static function addInscription(  ) { // A FAIREEEEE

        $req = MonPdo::getInstance()->prepare(" insert into inscription values ("""" "); 
        $req->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'eleve');
       
        $req->execute();
        $lesResultats = $req->fetchAll();
        $nb_lignes = count($lesResultats);
        

    

        return $lesResultats;

    }
}
