<?php
namespace AppBundle\Dtos;


class Contract{
	
	private $startDate;
	private $workingDays;
	private $route;
	private $seller;
	private $buyer;
	
	public function __construct($startDate,Array $workingDays,$route,Company $seller, Company $buyer){
		
		$this->startDate = $startDate;
		$this->workingDays = $workingDays;
		$this->route = $route;
		$this->seller = $seller;
		$this->buyer = $buyer;
		
	}
	
	public function getStartDate() {
		return $this->startDate;
	}
	public function setStartDate($startDate) {
		$this->startDate = $startDate;
		return $this;
	}
	public function getWorkingDays() {
		return $this->workingDays;
	}
	public function setWorkingDays(Array $workingDays) {
		$this->workingDays = $workingDays;
		return $this;
	}
	public function getRoute() {
		return $this->route;
	}
	public function setRoute($route) {
		$this->route = $route;
		return $this;
	}
	public function getSeller() {
		return $this->seller;
	}
	public function setSeller(Company $seller) {
		$this->seller = $seller;
		return $this;
	}
	public function getBuyer() {
		return $this->buyer;
	}
	public function setBuyer(Company $buyer) {
		$this->buyer = $buyer;
		return $this;
	}
	
	
	
}