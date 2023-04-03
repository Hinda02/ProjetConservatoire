<?php


class Heure {

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
	}
    public static function selectHeure(){

        $req = MonPdo::getInstance()->prepare("select * from heure"); 
        $req->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'heure');
       
        $req->execute();
        $lesResultats = $req->fetchAll();
        

    

        return $lesResultats;
    }
}