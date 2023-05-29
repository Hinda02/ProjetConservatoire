<?php
 class Instrument {

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


        public static function rechercheSeance($instrument) {

        $req = MonPdo::getInstance()->prepare("select * from instrument 
                                               inner join prof on instrument.LIBELLE = prof.INSTRUMENT
                                               inner join seance on prof.IDPROF = seance.IDPROF
                                               where lower(instrument.LIBELLE) like (:instrument%)");
                                               
                                                     
        $req->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'seance');
        $req->bindParam('instrument', $instrument);
        $req->execute();
        $leResultat = $req->fetchAll();
        return $leResultat;
        }    



 }

?>