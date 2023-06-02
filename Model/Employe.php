<?php

class Employe
{

    private $id;
    private $nom;
    private $prenom;
    private $login;
    private $pw;

    /**
     * Summary of getId
     * @return mixed
     */
    public function getId(){
        return $this->id;
    }

    /**
	 * @return mixed
	 */
	public function getNom() {
		return $this->nom;
	}

    /**
	 * @return mixed
	 */
	public function getPrenom() {
		return $this->prenom;
	}

    /**
     * Summary of getLogin
     * @return mixed
     */
    public function getLogin(){
        return $this->login;
    }

    /**
     * Summary of getMdp
     * @return mixed
     */
    public function getPw(){
        return $this->pw;
    }

    /**
     * Summary of setId
     * @param mixed $id
     * @return Admin
     */
    public function setId($id): self{
        $this->id = $id;
        return $this;
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
	 * @param mixed $prenom 
	 * @return self
	 */
	public function setPrenom($prenom): self {
		$this->prenom = $prenom;
		return $this;
	}

    /**
     * Summary of setLogin
     * @param mixed $login
     * @return Admin
     */
    public function setLogin($login): self{
        $this->login = $login;
        return $this;
    }

    /**
     * Summary of setMdp
     * @param mixed $pw
     * @return Admin
     */
    public function setPw($pw): self{
        $this->pw = $pw;
        return $this;
    }
    
    /**
     * Fonction static qui permet de récuperer le login et le mots de passe d'un employe 
     * 
     * @param  mixed $login
     * @param  mixed $pw
     * @return void
     */
    public static function verifier($login, $pw){

        $req = MonPdo::getInstance()->prepare("select * from employe where login = :login and pw = :pw");
        $req->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'employe');
        $req->bindParam('login', $login);
        $req->bindParam('pw', $pw);
        $req->execute();
        $lesResultats = $req->fetchAll();
        $nb_lignes = count($lesResultats);

        if($nb_lignes==0){
            $rep = false;
        }else{
            $rep = true;
        }

        return $rep;
    }
    
    /**
     * Fonction permettant à l'utilisateur de se déconnecter 
     *
     * @return void
     */
    public static function deconnexion(){
        unset($_SESSION['user']);
        unset($_SESSION['autorisation']);
        header("Location: index.php");
    }

}