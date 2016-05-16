<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Room;
use Symfony\Component\HttpFoundation\RedirectResponse;

class RoomController extends Controller{
	
	/**
	 * @Route("/displayRooms/{id}",name="displayRooms")
	 */
	public function displayRoomsAction($id){
		
		$em = $this->getDoctrine()->getManager();
		$query = $em->createQuery("SELECT room FROM AppBundle:Room room LEFT JOIN room.myUser mu WHERE mu.id=:uid");
		$query->setParameter(":uid",$id);
		$rooms = $query->getResult();		
		return $this->render("rooms/displayRooms.html.twig", array("rooms"=>$rooms));	
	}
	
	
	
		
	/**
	 * @Route("/addRoomForm",name="addRoomForm")
	 */
	public function addRoomForm(){		
		return $this->render("rooms/addRoomForm.html.twig",array());		
	}
	
	
	
	
	
	/**
	 * @Route("/addRoom",name="addRoom")
	 */
	public function addRoom(Request $req){
		
		
		$roomName = $req->request->get("roomName");
		//$roomName = $_POST['roomName'];
		
		$room = new Room();
		$room->setName($roomName);
		$room->setDeleted(0);
		
		
		$loggedinUserId = 1;		
		$em = $this->getDoctrine()->getManager();
		//$q = $em->createQuery("SELECT mu FROM AppBundle:MyUser mu WHERE mu.id=:muid");
		//$q->setParameter(":muid",$loggedinUserId);
		//$myUser = $q->getResult();
		
		$repository = $this->getDoctrine()->getRepository("AppBundle:MyUser");
		$myUser = $repository->find($loggedinUserId);
			
		
		$room->setMyUser($myUser);		
		$em->persist($room);
		$em->flush();
		
		
		$response = new RedirectResponse($this->generateUrl("displayRooms",array("id"=>1)));
		
		return $response;
	}
	
	
	
}