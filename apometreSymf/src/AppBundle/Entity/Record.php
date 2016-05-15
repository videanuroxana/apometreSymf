<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table (name="records")
 */

class Record{
	
	/**
	 * @ORM\Column(type="integer")
	 * @ORM\Id
	 * @ORM\GeneratedValue(strategy="AUTO")
	 */
	private $id;
	
	/**
	 * @ORM\Column(type="integer")
	 */
	private $year;
	
	/**
	 * @ORM\Column(type="integer")
	 */
	private $month;
	
	/**
	 * @ORM\Column(type="float",name="cold_water")
	 */
	private $coldWater;
	
	/**
	 * @ORM\Column(type="float",name="hot_water")
	 */
	private $hotWater;
	
	
	/**
	 * @ORM\ManyToOne(targetEntity="MyUser",inversedBy="records")
	 * @ORM\JoinColumn(name="user_id",referencedColumnName="id")
	 */
	private $myUser;
	
	
	/**
	 * @ORM\ManyToOne(targetEntity="Room",inversedBy="records")
	 * @ORM\JoinColumn(name="room_id",referencedColumnName="id")
	 */
	private $room;
	
	
	
	public function getYear() {
		return $this->year;
	}
	public function setYear($year) {
		$this->year = $year;
	}
	public function getMonth() {
		return $this->month;
	}
	public function setMonth($month) {
		$this->month = $month;
	}
	public function getColdWater() {
		return $this->coldWater;
	}
	public function setColdWater($coldWater) {
		$this->coldWater = $coldWater;
	}
	public function getHotWater() {
		return $this->hotWater;
	}
	public function setHotWater($hotWater) {
		$this->hotWater = $hotWater;
	}
	public function getMyUser() {
		return $this->myUser;
	}
	public function setMyUser($myUser) {
		$this->myUser = $myUser;
	}
	public function getRoom() {
		return $this->room;
	}
	public function setRoom($room) {
		$this->room = $room;
	}
	
	
	
	
	
	
	
	
	

	
	
}