<?php

namespace AppBundle\Dtos;

class Address {
	
	private $city;
	private $street;
	private $streetNo;
	private $county;
	private $country;
	
	public function __construct($city,$street,$streetNo,$county,$country){
		
		$this->city = $city;
		$this->street = $street;
		$this->streetNo = $streetNo;
		$this->county = $county;
		$this->country = $country;		
	}
	
	
	public function getCity() {
		return $this->city;
	}
	
	public function setCity($city) {
		$this->city = $city;
		return $this;
	}
	
	public function getStreet() {
		return $this->street;
	}
	
	public function setStreet($street) {
		$this->street = $street;
		return $this;
	}
	
	public function getStreetNo() {
		return $this->streetNo;
	}
	
	public function setStreetNo($streetNo) {
		$this->streetNo = $streetNo;
		return $this;
	}
	
	public function getCounty() {
		return $this->county;
	}
	
	public function setCounty($county) {
		$this->county = $county;
		return $this;
	}
	
	public function getCountry() {
		return $this->country;
	}
	
	public function setCountry($country) {
		$this->country = $country;
		return $this;
	}
	
}