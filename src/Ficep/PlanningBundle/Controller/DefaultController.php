<?php

namespace Ficep\PlanningBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($week=30,$year=2014)
    {
    	//$year=2007;
		$last="";
		// détermination si le er janvier est un lundi
		if(date('N', strtotime('01/01/'.$year)) == 1){
			$last="";
		}
		else
		{
			$last="Last ";
		}
		$date = array(
						'monday' => strtotime("Monday".($week-1)."week", strtotime($last.'Monday 1/1/'.$year)),
						'tuesday' => strtotime("tuesday".($week-1)."week", strtotime($last.'Monday 1/1/'.$year)),
						'wednesday' => strtotime("wednesday".($week-1)."week", strtotime($last.'Monday 1/1/'.$year)),
						'thursday' => strtotime("thursday".($week-1)."week", strtotime($last.'Monday 1/1/'.$year)),
						'friday' => strtotime("friday".($week-1)."week", strtotime($last.'Monday 1/1/'.$year)));
						
        return $this->render('FicepPlanningBundle:Default:index.html.twig', array('week' => $week, 'date' => $date, 'year' => $year));
    }
}
