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
<<<<<<< HEAD
	}    
    /**
     * AfficherTrim
     *
     * @return void
     */
    public static function AfficherTrim(){

        $req = MonPdo::getInstance()->prepare("select * from trim ");
        $req->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'trim');
       
        $req->execute();
        $lesResultats = $req->fetchAll();
        

    

        return $lesResultats;
    }
=======
	}
	
>>>>>>> a3b124687cc02d97fc6396b60ce6464abe7b89eb
}
