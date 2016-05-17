<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="rooms")
 */

class Room{
	
	/**
	 * @ORM\Column(type="integer")
	 * @ORM\Id
	 * @ORM\GeneratedValue(strategy="AUTO")
	 */
	private $id;
	
	
	/**
	 * @ORM\Column(type="string")
	 */
	private $name;
	
	/**
	 * @ORM\Column(type="integer")
	 */
	private $deleted;
	
	/**
	 * @ORM\ManyToOne(targetEntity="MyUser",inversedBy="rooms")
	 * @ORM\JoinColumn(name="user_id",referencedColumnName="id")
	 */
	private $myUser;
	
	
	
	public function getName() {
		return $this->name;
	}
	public function setName($name) {
		$this->name = $name;
	}
	public function getDeleted() {
		return $this->deleted;
	}
	public function setDeleted($deleted) {
		$this->deleted = $deleted;
	}
	public function getMyUser() {
		return $this->myUser;
	}
	public function setMyUser($myUser) {
		$this->myUser = $myUser;
	}
	public function getId() {
		return $this->id;
	}
	public function setId($id) {
		$this->id = $id;
		return $this;
	}
	
	
	
	

	
	
	
	
}