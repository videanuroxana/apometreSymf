<?php

namespace AppBundle\Dtos;

use AppBundle\Utils\CnpValidator;

abstract class Person{
	
	private $firstName;
	private $lastName;
	private $pin;
	private $gender;
	
	public function getFirstName() {
		return $this->firstName;
	}
	
	public function setFirstName($firstName) {
		$this->firstName = $firstName;
		return $this;
	}
	
	public function getLastName() {
		return $this->lastName;
	}
	
	public function setLastName($lastName) {
		$this->lastName = $lastName;
		return $this;
	}
	
	public function getPin() {
		return $this->pin;
	}
	
	public function setPin($pin) {
		
		$cnpValidator = new CnpValidator($pin);
		
		if ($cnpValidator == false){
			die("Invalid cnp");
		}
				
		$sexArray = $cnpValidator->getGenre();
		$this->setGender($sexArray[1]);		
		$this->pin = $pin;
	}
	
	public function getGender() {
		return $this->gender;
	}
	
	public function setGender($gender) {
		
		if ($gender != "m" && $gender != "f"){
			die("genderu e invalid");
		}
		
		$this->gender = $gender;
		
	}
	
	
	
	
}

