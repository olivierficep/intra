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
	
	public function listAction($id)
	{
		$repository = $this->getDoctrine()->getManager()->getRepository('FicepPlanningBundle:Technician');
		if ( $id == 'all' )
		{
			$technicians = $repository->findAll();
		}
		else {
			$technicians[0] = $repository->find($id) ;
			if (!$technicians[0])
			{
				throw $this->createNotFoundException('Ce technicien n\'existe pas');
			}
		}
		return $this->render('FicepPlanningBundle:Technician:list.html.twig', array('technicians' => $technicians ));
	}
	
	public function deleteAction($id)
	{
		$repository = $this->getDoctrine()->getManager()->getRepository('FicepPlanningBundle:Technician');
		$em = $this->getDoctrine()->getManager();
		$technician = $repository->find($id);
		if ( !$technician )
		{
			throw $this->createNotFoundException('Ce technicien n\'existe pas');
		}
		
		$em->remove($technician);
		$em->flush();
		$session = $this->container->get('session');
		$session->getFlashBag()->add('notice', 'Technicien bien supprimé.');
		return $this->redirect($this->generateUrl('ficep_planning_listTechnician', array('id' => 'all')));
	}
	
	public function editAction($id, Request $request)
	{
		$repository = $this->getDoctrine()->getManager()->getRepository('FicepPlanningBundle:Technician');
		$technician = $repository->find($id);
		
		
		if (!$technician)
		{
			throw $this->createNotFoundException('Ce technicien n\'existe pas');
		}
		
		$form = $this->get('form.factory')->create(new TechnicianType, $technician);

		$form->handleRequest($request);
		
		if ($form->isValid())
		{
			$em = $this->getDoctrine()->getManager();
			$em->persist($technician);
			$em->flush();
			
			//message pour confirmer que l'opération c est bien passé puis redirection vers le forulaire pour crééer un nouveau technicien
			
			$session = $this->container->get('session');
			$session->getFlashBag()->add('notice', 'Technicien bien modifié.');
			return $this->redirect($this->generateUrl('ficep_planning_listTechnician', array('id' => 'all')));
		}
		
		 return $this->render('FicepPlanningBundle:Technician:add.html.twig', array('form' => $form->createView()));
	}
}

