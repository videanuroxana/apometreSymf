<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity
 * @ORM\Table(name="my_users")
 */

class MyUser{
	
	/**
	 * @ORM\Column(type="integer")
	 * @ORM\Id
	 * @ORM\GeneratedValue(strategy="AUTO")
	 */
	private $id;
	
	
	/**
	 * @ORM\Column(type="string")
	 */
	private $username;
	
	
	/**
	 * @ORM\Column(type="string")
	 */
	private $password;
	
		
	/**
	 * @ORM\Column(type="string",name="last_name")
	 */
	private $lastName;
	
	
	/**
	 * @ORM\Column(type="string",name="first_name")
	 */
	private $firstName;
	
	
	/**
	 * @ORM\Column(type="string")
	 */
	private $mail;
	
	/**
	 * @ORM\Column(type="string")
	 */
	private $county;
	
	/**
	 * @ORM\Column(type="string")
	 */
	private $city;
	
	/**
	 * @ORM\Column(type="integer")
	 */
	private $sector;
	
	/**
	 * @ORM\Column(type="string",name="building_no")
	 */
	private $buildingNo;
	
	/**
	 * @ORM\Column(type="string")
	 */
	private $entrance;
	
	/**
	 * @ORM\Column(type="integer")
	 */
	private $floor;
	
	/**
	 * @ORM\Column(type="integer",name="flat_no")
	 */
	private $flatNo;
		
	/**
	 * @ORM\OneToMany(targetEntity="Record",mappedBy="myUser")
	 */
	private $records;
	
	/**
	 * @ORM\OneToMany(targetEntity="Room",mappedBy="myUser")
	 */
	private $rooms;

	
	public function __construct($username,$password) {
				
		$this->rooms = new ArrayCollection();
		$this->records = new ArrayCollection();
		
		$this->setUsername($username);
		$this->setPassword($password);	
	}
	
	
	
	public function getUsername() {
		return $this->username;
	}
	public function setUsername($username) {
		$this->username = $username;
	}
	public function getPassword() {
		return $this->password;
	}
	public function setPassword($password) {
		$this->password = $password;
	}
	public function getLastName() {
		return $this->lastName;
	}
	public function setLastName($lastName) {
		$this->lastName = $lastName;
	}
	public function getFirstName() {
		return $this->firstName;
	}
	public function setFirstName($firstName) {
		$this->firstName = $firstName;
	}
	public function getMail() {
		return $this->mail;
	}
	public function setMail($mail) {
		$this->mail = $mail;
	}
	public function getCounty() {
		return $this->county;
	}
	public function setCounty($county) {
		$this->county = $county;
	}
	public function getCity() {
		return $this->city;
	}
	public function setCity($city) {
		$this->city = $city;
	}
	public function getSector() {
		return $this->sector;
	}
	public function setSector($sector) {
		$this->sector = $sector;
	}
	public function getBuildingNo() {
		return $this->buildingNo;
	}
	public function setBuildingNo($buildingNo) {
		$this->buildingNo = $buildingNo;
	}
	public function getEntrance() {
		return $this->entrance;
	}
	public function setEntrance($entrance) {
		$this->entrance = $entrance;
	}
	public function getFloor() {
		return $this->floor;
	}
	public function setFloor($floor) {
		$this->floor = $floor;
	}
	public function getFlatNo() {
		return $this->flatNo;
	}
	public function setFlatNo($flatNo) {
		$this->flatNo = $flatNo;
	}
	public function getRecords() {
		return $this->records;
	}
	public function setRecords($records) {
		$this->records = $records;
	}
	public function getRooms() {
		return $this->rooms;
	}
	public function setRooms($rooms) {
		$this->rooms = $rooms;
	}
	
	public function __toString(){
		return "User[lastName:$this->lastName,fistName:$this->firstName]";
	}
	
	
}