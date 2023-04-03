<?php

class Eleve extends Personne
{

    private $idEleve;
    private $bourse;
    
    
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
	public function getBourse() {
		return $this->bourse;
	}

	/**
	 * @param mixed $bourse 
	 * @return self
	 */
	public function setBourse($bourse): self {
		$this->bourse = $bourse;
		return $this;
	}

    public static function getAll(){

        $req = MonPdo::getInstance()->prepare("select idEleve, bourse from eleve inner join personne Eleve.idEleve = Personne.idEleve;"); //select IDELEVE from eleve 
        $req->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'eleve');
       
        $req->execute();
        $lesResultats = $req->fetchAll();

        return $lesResultats;
    }
    
    public  static function deleteEleve (string $idEleve ) {

        $req = MonPdo::getInstance()->prepare("delete from eleve where idEleve = :idEleve;"); 
      
        $req->execute();

    }
   
    public static function addEleve(Eleve $eleve) {
        
		parent::addPersonne($eleve);
		$id = self::getIdPers($eleve->getMail());

		$req = MonPdo::getInstance()->prepare("insert into eleve(idEleve, bourse) values(:idEleve, :bourse)");
        $bourse = $eleve->getBourse();
        
        $req->bindParam('idEleve', $id);
        $req->bindParam('bourse', $bourse);
        
        $nb = $req->execute();
        return $nb;
    }

	public static function getIdPers($mail){

        $req = MonPdo::getInstance()->prepare("select * from personne where MAIL = :mail ;");
        $req->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'prof');
        $req->bindParam('mail', $mail);
        $req->execute();
        $leResultat = $req->fetch();
        return $leResultat[0];
    }

	
}