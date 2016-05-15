<?php

namespace AppBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class RecordController extends Controller{
	

	/**
	* @Route("/displayRecords/{id}")
	*/
	public function displayRecordsAction($id){
				
		$em = $this->getDoctrine()->getManager();
		$q = $em->createQuery("SELECT rec FROM AppBundle:Record rec LEFT JOIN rec.myUser muser LEFT JOIN rec.room rr WHERE muser.id=:uid ");
		$q->setParameter(":uid",$id);	
		$records = $q->getResult();		
	
		return $this->render('records/displayrecords.html.twig',array("records"=>$records));	
	}
}