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
	
	public function listAction($id, $page)
	{
		$repository = $this->getDoctrine()->getManager()->getRepository('FicepPlanningBundle:Technician');
		if ( $id == 'all' )
		{
			if ( $page < 1 )
			{
				throw $this->createNotFoundException('Cette page n existe pas');
			}
			$nbPerPage = 3;
			$technicians = $repository->getTechnicians($page, $nbPerPage);
			
			if( count($technicians) == 0 )
			{
				throw $this->createNotFoundException('pas de tech');
			}
			
			$nbPages = ceil(count($technicians)/$nbPerPage);
			
			if ( $page > $nbPages )
			{
				return $this->redirect($this->generateUrl('ficep_planning_listTechnician', array('id' => 'all')));
			}
		}
		else {
			$technicians[0] = $repository->find($id) ;
			$nbPages = 0; // definition a 0 pour envoyer la vue
			$page = 0; // definition a 0 poour envoyer la vue
			if (!$technicians[0])
			{
				throw $this->createNotFoundException('Ce technicien n\'existe pas');
			}
		}
		return $this->render('FicepPlanningBundle:Technician:list.html.twig', array('technicians' => $technicians,
																					'nbPages' => $nbPages,
																					'page' => $page ));
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
		$referer = $this->getRequest()->headers->get('referer');
		return $this->redirect($referer);
		//return $this->redirect($this->generateUrl('ficep_planning_listTechnician', array('id' => 'all')));
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
		// ajout d un champs caché pour revenir sur la page précedente
		$form->add('redirect_url', 'hidden', array('mapped' => false, 'data'=>$this->getRequest()->server->get('HTTP_REFERER')));
		
		$form->handleRequest($request);
		
		if ($form->isValid())
		{
			$referer= $form->get('redirect_url')->getData();
			$em = $this->getDoctrine()->getManager();
			$em->persist($technician);
			$em->flush();
			
			//message pour confirmer que l'opération c est bien passé puis redirection vers le forulaire pour crééer un nouveau technicien
			
			$session = $this->container->get('session');
			$session->getFlashBag()->add('notice', 'Technicien bien modifié.');

			return $this->redirect($referer);
			//return $this->redirect($this->generateUrl('ficep_planning_listTechnician', array('id' => 'all')));
		}
		
		 return $this->render('FicepPlanningBundle:Technician:add.html.twig', array('form' => $form->createView()));
	}
}

