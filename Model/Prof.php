<?php

class Prof
{

    private $id;
    private $instrument;
    private $salaire;
    

	/**
	 * @return mixed
	 */
	public function getId() {
		return $this->id;
	}

	/**
	 * @param mixed $id 
	 * @return self
	 */
	public function setId($id): self {
		$this->id = $id;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getInstrument() {
		return $this->instrument;
	}

	/**
	 * @param mixed $instrument 
	 * @return self
	 */
	public function setInstrument($instrument): self {
		$this->instrument = $instrument;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getSalaire() {
		return $this->salaire;
	}

	/**
	 * @param mixed $salaire 
	 * @return self
	 */
	public function setSalaire($salaire): self {
		$this->salaire = $salaire;
		return $this;
	}
    public static function Afficherprof(){

        $req = MonPdo::getInstance()->prepare("select * from prof ");
        $req->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'prof');
       
        $req->execute();
        $lesResultats = $req->fetchAll();
        $nb_lignes = count($lesResultats);

    

        return $lesResultats;
    }

    
    }
