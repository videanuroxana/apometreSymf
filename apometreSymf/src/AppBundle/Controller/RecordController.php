<?php

namespace AppBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Record;

class RecordController extends Controller{
	

	/**
	* @Route("/displayRecords/{id}",name="displayRecords")
	*/
	public function displayRecordsAction($id){
				
		$em = $this->getDoctrine()->getManager();
		$q = $em->createQuery("SELECT rec FROM AppBundle:Record rec LEFT JOIN rec.myUser muser LEFT JOIN rec.room rr WHERE muser.id=:uid ");
		$q->setParameter(":uid",$id);	
		$records = $q->getResult();		
	
		return $this->render('records/displayrecords.html.twig',array("records"=>$records));	
	}
	
	/**
	 * @Route("/addRecordForm",name="addRecordForm")
	 */
	public function addRecordForm(){
		
		//TODO - replace with user id from session after login is implemented
		$loggedInUserId  = 1;
		
		$em = $this->getDoctrine()->getManager();
		$q = $em->createQuery("SELECT r FROM AppBundle:Room r LEFT JOIN r.myUser u WHERE u.id=:uid ");
		$q->setParameter(":uid",$loggedInUserId);
		$rooms = $q->getResult();
		
		$currentMonth = date("m");
		$currentYear = date("Y");
		
		return $this->render('records/addRecordForm.html.twig',array("rooms"=>$rooms,"currentMonth"=>$currentMonth,"currentYear"=>$currentYear));
	}
	
	/**
	 * @Route ("/addRecord",name="addRecord")
	 */
	
	public function addRecord(Request $req){
		
		//TODO - replace with user id from session after login is implemented
		$loggedInUserId = 1; 
		
		$year = $req->request->get("year");
		$month = $req->request->get("month");
		$roomId = $req->request->get("roomId");
		$coldWater = $req->request->get("coldWater");
		$hotWater = $req->request->get("hotWater");
		
		$record = new Record();
		$record->setYear($year);
		$record->setMonth($month);
		$record->setColdWater($coldWater);
		$record->setHotWater($hotWater);
		
		$em = $this->getDoctrine()->getManager();
		$roomQuery = $em->createQuery("SELECT r FROM AppBundle:Room r WHERE r.id=:rid");
		$roomQuery->setParameter(":rid",$roomId);
		$rooms = $roomQuery->getResult();
		$room = $rooms[0];
		
		$record->setRoom($room);
		
		$userQuery  = $em->createQuery("SELECT u FROM AppBundle:MyUser u WHERE u.id=:uid");
		$userQuery->setParameter(":uid",$loggedInUserId);
		$users = $userQuery->getResult();
		$user =$users[0];
		
		$record->setMyUser($user);
		
		$em->persist($record);
		$em->flush();
		
		return $this->redirectToRoute("displayRecords",array("id"=>$loggedInUserId));
		
		
	}
}