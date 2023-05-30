<?php

class Payer
{

    private $idProf;
    private $idEleve;
    private $numSeance;
    private $libelle;
    private $dateInscription;
    private $paye;

    
    

	
	
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
	 * @param mixed $idEleve 
	 * @return self
	 */
	public function setIdEleve($idEleve): self {
		$this->idEleve = $idEleve;
		return $this;
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
	public function getIdEleve() {
		return $this->idEleve;
	}

	/**
	 * @return mixed
	 */
	public function getNumSeance() {
		return $this->numSeance;
	}

	/**
	 * @return mixed
	 */
	public function getLibelle() {
		return $this->libelle;
	}

	/**
	 * @param mixed $libelle 
	 * @return self
	 */
	public function setLibelle($libelle): self {
		$this->libelle = $libelle;
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

	/**
	 * @return mixed
	 */
	public function getPaye() {
		return $this->paye;
	}

	/**
	 * @param mixed $paye 
	 * @return self
	 */
	public function setPaye($paye): self {
		$this->paye = $paye;
		return $this;
	}


}
