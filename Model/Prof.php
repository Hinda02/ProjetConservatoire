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

    
	
	/**
	 * Fonction permettant la récuperation d'un professeur via son id 
	 *
	 * @param  mixed $id
	 * @return void
	 */
	public static function getById($id){

        $req = MonPdo::getInstance()->prepare("select * from personne inner join prof on personne.ID = prof.IDPROF where IDPROF = :id ;");
        $req->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'prof');
        $req->bindParam('id', $id);
        $req->execute();
        $leResultat = $req->fetch();
        return $leResultat;
    }
	
	/**
	 * Fonction qui permet de récuperer les mails
	 *
	 * @param  mixed $mail
	 * @return void
	 */
	public static function getIdPers($mail){

        $req = MonPdo::getInstance()->prepare("select * from personne where MAIL = :mail ;");
        $req->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'prof');
        $req->bindParam('mail', $mail);
        $req->execute();
        $leResultat = $req->fetch();
        return $leResultat[0];
    }
	
	/**
	 * 
	 *Fonction qui vérifie le mots de passe d'un professeur
	 * @param  mixed $login
	 * @param  mixed $mdp
	 * @return void
	 */
	public static function verifMdp($login, $mdp){

        $req = MonPdo::getInstance()->prepare("select * from prof where login = :login and mdp = :mdp");
        $req->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'prof');
        $req->bindParam('login', $login);
        $req->bindParam('mdp', $mdp);
        $req->execute();
        $leResultat = $req->fetch();
		return $leResultat;

    }

	
	
	/** 
	 *Fonction qui permet à l'utilisateur de se déconnecter
	 *
	 * @return void
	 */
	public static function deconnexion(){
        unset($_SESSION['user']);
		unset($_SESSION['autorisation']);
        header("Location: index.php");
    }


	
	
}
?>
