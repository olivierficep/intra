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
		return new Response("Hello World");
	}	
	
	public function viewAction($id)
	{
		return $this->render('OCPlatformBundle:Advert:view.html.twig', array('id' => $id ));
	}
};