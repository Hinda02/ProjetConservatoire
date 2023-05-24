<?php
 class Insctrument {

    private $libelle 

    
    /** 
    * @return mixed
    */
      public function getLibelle() {
          return $this->libelle;
        }
      
    
    /** 
    *@param mixed $libelle 
    *@return self
    **/

    public function setLibelle($libelle): self {$this->libelle = $libelle;
        return $this;}
    
    
        public static function rechercheInstrument($instrument) {
    
        $req = MonPdo::getInstance()->prepare("select * from instrument where lower(libelle) like ('%".$instrument."%')");
        $req->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'instrument');
        $req->bindParam('instrument', $instrument);
        $req->execute();
        $leResultat = $req->fetch();
        return $leResultat;
        }    

     

 }

?>