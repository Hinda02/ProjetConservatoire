<?php

class Jour {
    
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
	
}