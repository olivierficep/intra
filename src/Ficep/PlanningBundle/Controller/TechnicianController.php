<?php

namespace Ficep\PlanningBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Ficep\PlanningBundle\Entity\Technician;
use Symfony\Component\HttpFoundation\Request;
use Ficep\PlanningBundle\Form\TechnicianType;

class TechnicianController extends Controller
{
	public function addAction(Request $request)
	{
		$technician = new Technician();
		
		// le service form factory permet de créer notre formulaire
		$form = $this->get('form.factory')->create(new TechnicianType, $technician);

		$form->handleRequest($request);
		
		if ($form->isValid())
		{
			$em = $this->getDoctrine()->getManager();
			$em->persist($technician);
			$em->flush();
			
			//message pour confirmer que l'opération c est bien passé puis redirection vers le forulaire pour crééer un nouveau technicien
			
			$session = $this->container->get('session');
			$session->getFlashBag()->add('notice', 'Technicien bien enregistré.');
			return $this->redirect($this->generateUrl('ficep_planning_addTechnician'));
		}
		 return $this->render('FicepPlanningBundle:Technician:add.html.twig', array('form' => $form->createView()));
	}
	
	public function listAction()
	{
		
	}
	
}
