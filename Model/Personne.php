<?php

class Personne
{

    private $id;
    private $nom;
    private $prenom;
    private $tel;
    private $mail;
    private $adresse;


    
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
	public function getNom() {
		return $this->nom;
	}
	/**
	 * @param mixed $nom 
	 * @return self
	 */
	public function setNom($nom): self {
		$this->nom = $nom;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getPrenom() {
		return $this->prenom;
	}

	/**
	 * @param mixed $prenom 
	 * @return self
	 */
	public function setPrenom($prenom): self {
		$this->prenom = $prenom;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getTel() {
		return $this->tel;
	}

	/**
	 * @param mixed $tel 
	 * @return self
	 */
	public function setTel($tel): self {
		$this->tel = $tel;
		return $this;
	}

	

	/**
	 * @return mixed
	 */
	public function getMail() {
		return $this->mail;
	}

	/**
	 * @param mixed $mail 
	 * @return self
	 */
	public function setMail($mail): self {
		$this->mail = $mail;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getAdresse() {
		return $this->adresse;
	}

	/**
	 * @param mixed $adresse 
	 * @return self
	 */
	public function setAdresse($adresse): self {
		$this->adresse = $adresse;
		return $this;
	}

	public static function AfficherPersonne(){

        $req = MonPdo::getInstance()->prepare("select * from personne "); // select ID from personne 
        $req->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'personne');
       
        $req->execute();
        $lesResultats = $req->fetchAll();
        $nb_lignes = count($lesResultats);

    

        return $lesResultats;
    }

	
}
