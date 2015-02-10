<?php

namespace Ficep\PlanningBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Ficep\PlanningBundle\Entity\Machine;
use Symfony\Component\HttpFoundation\Request;
use Ficep\PlanningBundle\Form\MachineType;

class MachineController extends Controller
{
	public function addAction(Request $request)
	{
		$machine = new Machine();
		
		// le service form factory permet de créer notre formulaire
		$form = $this->get('form.factory')->create(new MachineType, $machine);

		$form->handleRequest($request);
		
		if ($form->isValid())
		{
			$em = $this->getDoctrine()->getManager();
			$em->persist($machine);
			$em->flush();
			
			//message pour confirmer que l'opération c est bien passé puis redirection vers le forulaire pour crééer un nouveau technicien
			
			$session = $this->container->get('session');
			$session->getFlashBag()->add('notice', 'Machine bien enregistré.');
			return $this->redirect($this->generateUrl('ficep_planning_addMachine'));
		}
		 return $this->render('FicepPlanningBundle:Machine:add.html.twig', array('form' => $form->createView()));
	}
	
	public function listAction($id, $page)
	{
		$repository = $this->getDoctrine()->getManager()->getRepository('FicepPlanningBundle:Machine');
		if ( $id == 'all' )
		{
			if ( $page < 1 )
			{
				throw $this->createNotFoundException('Cette page n existe pas');
			}
			$nbPerPage = 3;
			$machines = $repository->getMachines($page, $nbPerPage);
			
			if( count($machines) == 0 )
			{
				throw $this->createNotFoundException('pas de machine');
			}
			
			$nbPages = ceil(count($machines)/$nbPerPage);
			
			if ( $page > $nbPages )
			{
				return $this->redirect($this->generateUrl('ficep_planning_listMachine', array('id' => 'all')));
			}
		}
		else {
			$machines[0] = $repository->find($id) ;
			$nbPages = 0; // definition a 0 pour envoyer la vue
			$page = 0; // definition a 0 poour envoyer la vue
			if (!$machines[0])
			{
				throw $this->createNotFoundException('Cette machine n\'existe pas');
			}
		}
		return $this->render('FicepPlanningBundle:Machine:list.html.twig', array('machines' => $machines,
																					'nbPages' => $nbPages,
																					'page' => $page ));
	}

	public function deleteAction($id)
	{
		$repository = $this->getDoctrine()->getManager()->getRepository('FicepPlanningBundle:Machine');
		$em = $this->getDoctrine()->getManager();
		$machine = $repository->find($id);
		if ( !$machine )
		{
			throw $this->createNotFoundException('Ce technicien n\'existe pas');
		}
		
		$em->remove($machine);
		$em->flush();
		$session = $this->container->get('session');
		$session->getFlashBag()->add('notice', 'Technicien bien supprimé.');
		$referer = $this->getRequest()->headers->get('referer');
		return $this->redirect($referer);
		//return $this->redirect($this->generateUrl('ficep_planning_listTechnician', array('id' => 'all')));
	}
	
	public function editAction($id, Request $request)
	{
		
		$repository = $this->getDoctrine()->getManager()->getRepository('FicepPlanningBundle:Machine');
		$machine = $repository->find($id);
		
		if (!$machine)
		{
			throw $this->createNotFoundException('Cette machine n\'existe pas');
		}
		
		$form = $this->get('form.factory')->create(new MachineType, $machine);
		// ajout d un champs caché pour revenir sur la page précedente
		$form->add('redirect_url', 'hidden', array('mapped' => false, 'data'=>$this->getRequest()->server->get('HTTP_REFERER')));
		
		$form->handleRequest($request);
		
		if ($form->isValid())
		{
			$referer= $form->get('redirect_url')->getData();
			$em = $this->getDoctrine()->getManager();
			$em->persist($machine);
			$em->flush();
			
			//message pour confirmer que l'opération c est bien passé puis redirection vers le forulaire pour crééer un nouveau technicien
			
			$session = $this->container->get('session');
			$session->getFlashBag()->add('notice', 'Machine bien modifiée.');

			return $this->redirect($referer);
			//return $this->redirect($this->generateUrl('ficep_planning_listTechnician', array('id' => 'all')));
		}
		
		 return $this->render('FicepPlanningBundle:Machine:add.html.twig', array('form' => $form->createView()));
	}
}
