<?php 

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use AppBundle\Entity\MyUser;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RedirectResponse;

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
	
	/**
	 * @Route("/addUserForm",name="addUserForm")
	 */
	public function addUserForm(){
		return $this->render('users/addUserForm.html.twig',array());
	}
	
	/**
	 * @Route("/addUser",name="addUser")
	 */
	public function addUser(Request $req){
		
		$userName = $req->request->get("userName");
		$password = $req->request->get("password");
		$rePassword = $req->request->get("rePassword");
		$lastName = $req->request->get("lastName");
		$firstName =$req->request->get("firstName");
		$mail = $req->request->get("mail");
		$county = $req->request->get("county");
		$city = $req->request->get("city");
		$sector = $req->request->get("sector");
		$buildingNo = $req->request->get("buildingNo");
		$entrance = $req->request->get("entrance");
		$floor = $req->request->get("floor");
		$flatNo = $req->request->get("flatNo");
		
		
		if ($password!=$rePassword){
			die("Password is different than rePassword");
		}
		
				
		$myUser = new MyUser($userName,$password);
		$myUser->setLastName($lastName);
		$myUser->setFirstName($firstName);
		$myUser->setMail($mail);
		$myUser->setCounty($county);
		$myUser->setCity($city);
		$myUser->setSector($sector);
		$myUser->setBuildingNo($buildingNo);
		$myUser->setEntrance($entrance);
		$myUser->setFloor($floor);
		$myUser->setFlatNo($flatNo);
		
		
		$em = $this->getDoctrine()->getManager();
		$em->persist($myUser);
		$em->flush();
		
		return $this->redirectToRoute("displayUsers");
	}
	
}





















?>