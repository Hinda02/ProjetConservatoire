<?php

class Jour {
    
    private $tranche;
    

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
<<<<<<< HEAD
	}    
    /**
     * Fonction qui permet de récupere les jours de la semaine 
     *
     * @return void
     */
    public static function selectJour(){

        $req = MonPdo::getInstance()->prepare("select * from jour ");
        $req->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'jour');
        $req->execute();
        $lesResultats = $req->fetchAll();
        $nb_lignes = count($lesResultats);

    

        return $lesResultats;
    }

=======
	}
>>>>>>> a3b124687cc02d97fc6396b60ce6464abe7b89eb
	
}