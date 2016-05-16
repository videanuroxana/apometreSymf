<?php 

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use AppBundle\Entity\MyUser;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class UserController extends Controller{
	
	
	
	/**
	 * @Route("/createUser")
	 */
	public function createUserAction(){
		
		
		
		$user = new MyUser();
		$user->setFirstName("Lolica");
		$user->setLastName("Voievod");
		$user->setUsername("laur.voievodalatap");
		$user->setPassword("bobarlan");
		$user->setMail("lv@yahoo.com");
		$user->setCounty("Dolj");
		$user->setCity("Craiova");
		$user->setSector("0");
		$user->setBuildingNo("6");
		$user->setEntrance("B");
		$user->setFloor("3");
		$user->setFlatNo("11");
		
		$entityManager = $this->getDoctrine()->getManager();
		$entityManager->persist($user);
		$entityManager->flush();		
		
		return $this->render('users/createuser.html.twig',array ("user"=>$user));
	}
	
	/**
	 * @Route("/displayUser/{id}")
	 */
	public function displayUserAction($id){
		
		
		$user = $this->getDoctrine()->getRepository("AppBundle:MyUser")->find($id);	
		
		
		return $this->render('users/displayuser.html.twig',array ("user"=>$user));
		
	}
	
	/**
	 * @Route("/displayUsers", name="displayUsers")
	 */
	public function displayAllUsersAction(){
		
		//$users  = $this->getDoctrine()->getRepository("AppBundle:MyUser")->findAll();
		
		$entityManager = $this->getDoctrine()->getManager();
		
		$q = $entityManager->createQuery();
	
		 $q->setDQL("SELECT mu FROM AppBundle:MyUser mu ");
		
		// $q->setMaxResults(1);
		 
		$users  = $q->getResult();
		
		return $this->render('users/displayusers.html.twig',array("myUsers"=>$users));
	
		
		
	}
	
}





















?>