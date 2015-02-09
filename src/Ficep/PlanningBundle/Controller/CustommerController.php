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
			$nbPerPage = 3 ;
			$custommers = $repository->getCustommers($page, $nbPerPage);
			if  ( count($custommers) == 0)
			{
				throw $this->createNotFoundException('pas de client');
			}
			$nbPages = ceil(count($custommers)/$nbPerPage);
			
			if ( $page > $nbPages )
			{
				return $this->redirect($this->generateUrl('ficep_planning_listCustommer', array('id' => 'all')));
			}
		}
		else {
			$custommers[0] = $repository->find($id) ;
			$nbPages = 0; // definition a 0 pour envoyer la vue
			$page = 0; // definition a 0 poour envoyer la vue
			if (!$custommers[0])
			{
				throw $this->createNotFoundException('Ce technicien n\'existe pas');
			}
		}
		return $this->render('FicepPlanningBundle:Custommer:list.html.twig', array('custommers' => $custommers,
																					'nbPages' => $nbPages,
																					'page' => $page ));
	}

	public function deleteAction($id)
	{
		$repository = $this->getDoctrine()->getManager()->getRepository('FicepPlanningBundle:Custommer');
		$em = $this->getDoctrine()->getManager();
		$custommer = $repository->find($id);
		if ( !$custommer )
		{
			throw $this->createNotFoundException('Ce client n\'existe pas');
		}
		
		$em->remove($custommer);
		$em->flush();
		$session = $this->container->get('session');
		$session->getFlashBag()->add('notice', 'Client bien supprimé.');
		$referer = $this->getRequest()->headers->get('referer');
		return $this->redirect($referer);
	}

	public function editAction($id, Request $request)
	{
		$repository = $this->getDoctrine()->getManager()->getRepository('FicepPlanningBundle:Custommer');
		$custommer = $repository->find($id);
		
		if (!$custommer)
		{
			throw $this->createNotFoundException('Ce client n\'existe pas');
		}
		
		$form = $this->get('form.factory')->create(new CustommerType, $custommer);
		// ajout d un champs caché pour revenir sur la page précedente
		$form->add('redirect_url', 'hidden', array('mapped' => false, 'data'=>$this->getRequest()->server->get('HTTP_REFERER')));
		
		$form->handleRequest($request);
		
		if ($form->isValid())
		{
			$referer= $form->get('redirect_url')->getData();
			$em = $this->getDoctrine()->getManager();
			$em->persist($custommer);
			$em->flush();
			
			//message pour confirmer que l'opération c est bien passé puis redirection vers le forulaire pour crééer un nouveau technicien
			
			$session = $this->container->get('session');
			$session->getFlashBag()->add('notice', 'Client bien modifié.');

			return $this->redirect($referer);
			//return $this->redirect($this->generateUrl('ficep_planning_listTechnician', array('id' => 'all')));
		}
		
		 return $this->render('FicepPlanningBundle:Custommer:add.html.twig', array('form' => $form->createView()));
	}
}
