<?php

namespace AppBundle\Dtos;

class Representant extends Person{
	
	private $position;
	
	public function getPosition() {
		return $this->position;
	}
	public function setPosition($position) {
		$this->position = $position;
		return $this;
	}
	
	
	
}