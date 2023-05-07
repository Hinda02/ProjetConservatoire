<?php

class Prof extends Personne
{

    private $idProf;
    private $instrument;
    private $salaire;
    

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

    public static function getAll(){

        $req = MonPdo::getInstance()->prepare("select * from personne inner join prof on personne.ID = prof.IDPROF ;");
        $req->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'prof');
       
        $req->execute();
        $lesResultats = $req->fetchAll();

        return $lesResultats;
    }

	public static function getById($id){

        $req = MonPdo::getInstance()->prepare("select * from personne inner join prof on personne.ID = prof.IDPROF where IDPROF = :id ;");
        $req->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'prof');
        $req->bindParam('id', $id);
        $req->execute();
        $leResultat = $req->fetch();
        return $leResultat;
    }

	public static function getIdPers($mail){

        $req = MonPdo::getInstance()->prepare("select * from personne where MAIL = :mail ;");
        $req->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'prof');
        $req->bindParam('mail', $mail);
        $req->execute();
        $leResultat = $req->fetch();
        return $leResultat[0];
    }

	public static function verifMdp($login, $mdp){

        $req = MonPdo::getInstance()->prepare("select * from prof where login = :login and mdp = :mdp");
        $req->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'prof');
        $req->bindParam('login', $login);
        $req->bindParam('mdp', $mdp);
        $req->execute();
        $leResultat = $req->fetch();
		return $leResultat;

        //$nb_lignes = count($lesResultats);

        /*if($nb_lignes==0){
            $rep = false;
        }else{
            $rep = true;
        }

        return $rep;*/
    }
	
}
?>
