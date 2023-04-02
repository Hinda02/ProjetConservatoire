<?php

class Eleve
{

    private $id;
    private $bourse;
    
    

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

        $req = MonPdo::getInstance()->prepare("select * from eleve;"); //select IDELEVE from eleve 
        $req->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'eleve');
       
        $req->execute();
        $lesResultats = $req->fetchAll();

        return $lesResultats;
    }
    
    public  static function supprimerEleve (string $id ) {

        $req = MonPdo::getInstance()->prepare("delete from IDELEVE where id = $id"); 
        $req->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'eleve');
       
        $req->execute();
        $lesResultats = $req->fetchAll();
        $nb_lignes = count($lesResultats);

    

        return $lesResultats;

    }
   
    public static function addEleve() {

        $req = MonPdo::getInstance()->prepare("insert into eleve values (IDELEVE,BOURSE) "); 
        $req->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'eleve');
       
        $req->execute();
        $lesResultats = $req->fetchAll();
        

    

        return $lesResultats;

    }
}