<?php

// src/OC/PlatformBundle/Controller/AdvertController.php

namespace OC\PlatformBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

class AdvertController extends Controller
{
	public function indexAction()
	{
		return new Response("Hello My World");
	}	
	
	public function viewAction($id, Request $request)
	{
		$session = $request->getSession();
		
		$userId = $session->get('user_id');
		
		$session->set('user_id', 91);
		
		return $this->render('OCPlatformBundle:Advert:view.html.twig', array('id' => $id));
	}
	
	public function addAction(Request $request)
	{
		$session = $request->getSession();
		
		$session->getFlashBag()->add('info', 'annonce bien enregistrée');
		
		$session->getFlashBag()->add('info', 'Oui c est bien enregistré');
		
		return $this->redirect($this->generateUrl('oc_platform_view', array('id' => 5))) ;
	}
};