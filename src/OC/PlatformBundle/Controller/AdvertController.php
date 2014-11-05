<?php

// src/OC/PlatformBundle/Controller/AdvertController.php

namespace OC\PlatformBundle\Controller ;

use Symfony\Bundle\FrameworkBundle\Controller\Controller ;
use Symfony\Component\HttpFoundation\Request ;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException ;
use Symfony\Component\HttpFoundation\Response;

class AdvertController extends Controller
{
	public function indexAction($page)
	{
		// On ne connait pas le nombre de page il y a
		// Mais on sait qu'on aura au moins une page
		
		if ($page < 1){
			// On déclenche une exception NotFoundHttpException
			throw new NotFoundHttpException('Page "'.$page.'" inexistante.') ;
		}
		
		//Ici on récupère la liste des annonces puis on l envoie au template
		
		// Appel du template
		//return $this->render('OCPlatformBundle:Advert:index.html.twig') ;
		$week = 45;
		$year = 2014;
		//return new Response(date('D d M Y', strtotime("last monday", strtotime(($week-1)." week", strtotime('1/1/'.$year)))));
		return new Response(date('d/m/y', strtotime("friday ".($week-1)."week", strtotime('1/1/'.$year))));
	}
	
	public function viewAction($id)
	{
		// ici on récupère l'annonce correspondante à l'id
		
		return $this->render('OCPlatformBundle:Advert:view.html.twig', array('id' => $id)) ;
	}
	
	public function addAction(Request $request)
	{
		// Gestion du formulaire
		
		// Si la requete est en POST, c'est que le visiteur a soumis e formulaire
		if ($request->isMethod('POST')){
			// Création et gestion formulaire
			
			$request->getSession()->getFlashBag()->add('notice', 'Annonce bien enregostrée.') ;
			
			// Puis on redirige vers la page de visualisation de cette annonce
			return $this->redirect($this->generateUrl('oc_platform_view', array('id' => 5))) ;
		}
		
		return $this->render('OCPlatformBundle:Advert:edit.html.twig') ;
	}
	
	public function editAction($id, Request $request)
	{
		// récupération annonce
		
		// meme type de formulaire que la création
		if($request->isMethod('POST')){
			$request->getSession()->getFlashBag()->add('notice', 'Annonce bien modifiée.') ;
			return $this->render($this->generateUrl('oc_platform_view', array('id' => 5))) ;
		}
		
		return $this->render('OCPlatformBundle:Advert:edit.html.twig') ;		
	}
	
	public function deleteAction($id)
	{
		// récupération annonce
		
		
		//Ici, suppression de l annonce en question
		
		
		return $this->render('OCPlatformBundle:Advert:delete.html.twig') ;
	}
	
};