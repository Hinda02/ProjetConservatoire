<?php

class Trim
{

    private $libelle;
    private $dateFin;
   


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
	public function getDateFin() {
		return $this->dateFin;
	}

	/**
	 * @param mixed $dateFin 
	 * @return self
	 */
	public function setDateFin($dateFin): self {
		$this->dateFin = $dateFin;
		return $this;
	}
	
}
