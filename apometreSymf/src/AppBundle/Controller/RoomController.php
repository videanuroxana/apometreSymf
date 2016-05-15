<?php

namespace AppBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class RoomController extends Controller{
	
	/**
	 * @Route("/displayRooms/{id}")
	 */
	public function displayRoomsAction($id){
		
		$em = $this->getDoctrine()->getManager();
		$query = $em->createQuery("SELECT room FROM AppBundle:Room room LEFT JOIN room.myUser mu WHERE mu.id=:uid");
		$query->setParameter(":uid",$id);
		$rooms = $query->getResult();
		
		return $this->render("rooms/displayRooms.html.twig", array("rooms"=>$rooms));	
	}
		
}
