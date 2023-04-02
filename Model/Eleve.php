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
}