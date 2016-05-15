<?php
namespace AppBundle\Dtos;

class Company{
	
	private $name;
	private $j;
	private $cui;
	private $address;
	private $representant;
	
	public function __construct($name,$j,$cui,Address $address,Representant $representant){
		
		$this->name = $name;
		$this->j = $j;
		$this->cui = $cui;
		$this->address = $address;
		$this->representant =$representant;
		
	}
	
	public function getName() {
		return $this->name;
	}
	
	public function setName($name) {
		$this->name = $name;
		return $this;
	}
	
	public function getJ() {
		return $this->j;
	}
	
	public function setJ($j) {
		$this->j = $j;
		return $this;
	}
	
	public function getCui() {
		return $this->cui;
	}
	
	public function setCui($cui) {
		$this->cui = $cui;
		return $this;
	}
	
	public function getAddress() {
		return $this->address;
	}
	
	public function setAddress(Address $address) {
		$this->address = $address;
		return $this;
	}
	
	public function getRepresentant() {
		return $this->representant;
	}
	
	public function setRepresentant(Representant $representant) {
		$this->representant = $representant;
		return $this;
	}
	
}