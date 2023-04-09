<?php

/**
 * Summary of Seance
 */
class Seance
{
    private $idProf;
    private $numSeance;
    private $tranche;
    private $jour;
    private $niveau;
    private $capacite;

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
	public function getTranche() {
		return $this->tranche;
	}

	/**
	 * @param mixed $tranche 
	 * @return self
	 */
	public function setTranche($tranche): self {
		$this->tranche = $tranche;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getJour() {
		return $this->jour;
	}

	/**
	 * @param mixed $jour 
	 * @return self
	 */
	public function setJour($jour): self {
		$this->jour = $jour;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getNiveau() {
		return $this->niveau;
	}

	/**
	 * @param mixed $niveau 
	 * @return self
	 */
	public function setNiveau($niveau): self {
		$this->niveau = $niveau;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getCapacite() {
		return $this->capacite;
	}

	/**
	 * @param mixed $capacite 
	 * @return self
	 */
	public function setCapacite($capacite): self {
		$this->capacite = $capacite;
		return $this;
	}


    /**
     * Summary of getAll
     * @return array
     */
    public static function getAll(){
        $req = MonPdo::getInstance()->prepare("select * from seance;");
        $req->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'seance');
        $req->execute();
        $lesResultats = $req->fetchAll();
        return $lesResultats;
    }

	public static function getById_NumSeance($idprof, $nums){
        $req = MonPdo::getInstance()->prepare("select * from seance where IDPROF = :idprof and NUMSEANCE = :nums;");
        $req->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'seance');

		$req->bindParam('idprof', $idprof);
        $req->bindParam('nums', $nums);

        $req->execute();
        $leResultat = $req->fetch();

        return $leResultat;
    }

}