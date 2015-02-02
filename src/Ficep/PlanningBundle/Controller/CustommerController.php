<?php

namespace Ficep\PlanningBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Ficep\PlanningBundle\Entity\Custommer;
use Symfony\Component\HttpFoundation\Request;
use Ficep\PlanningBundle\Form\CustommerType;

Class CustommerController extends Controller
{
	public function addAction (Request $request)
	{
		$custommer = new custommer();
		
		$form = $this->get('form.factory')->create(new CustommerType, $custommer);
		
		$form->handleRequest($request);
		
		if( $form->isValid() )
		{
			$em = $this->getDoctrine()->getManager();
			$em->persist($custommer);
			$em->flush();
			
			// message de cofirmation de création
			
			$session = $this->container->get('session');
			$session->getFlashBag()->add('notice', 'Client bien ajouté') ;
			return $this->redirect($this->generateUrl('ficep_planning_addCustommer'));
		}
		return $this->render('FicepPlanningBundle:Custommer:add.html.twig', array('form' => $form->createView()));
	}
	
	public function listAction ($id, $page)
	{
		$repository = $this->getDoctrine()->getManager()->getRepository('FicepPlanningBundle:Custommer');
		if ( $id == 'all')
		{
			if ( $page < 1 )
			{
				throw $this->createNotFoundException('Cette page n existe pas');
			}
			
		}
	}
}
