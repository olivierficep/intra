<?php

use Symfony\Component\Routing\Exception\MethodNotAllowedException;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\RequestContext;

/**
 * appDevUrlMatcher
 *
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class appDevUrlMatcher extends Symfony\Bundle\FrameworkBundle\Routing\RedirectableUrlMatcher
{
    /**
     * Constructor.
     */
    public function __construct(RequestContext $context)
    {
        $this->context = $context;
    }

    public function match($pathinfo)
    {
        $allow = array();
        $pathinfo = rawurldecode($pathinfo);
        $context = $this->context;
        $request = $this->request;

        if (0 === strpos($pathinfo, '/_')) {
            // _wdt
            if (0 === strpos($pathinfo, '/_wdt') && preg_match('#^/_wdt/(?P<token>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => '_wdt')), array (  '_controller' => 'web_profiler.controller.profiler:toolbarAction',));
            }

            if (0 === strpos($pathinfo, '/_profiler')) {
                // _profiler_home
                if (rtrim($pathinfo, '/') === '/_profiler') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', '_profiler_home');
                    }

                    return array (  '_controller' => 'web_profiler.controller.profiler:homeAction',  '_route' => '_profiler_home',);
                }

                if (0 === strpos($pathinfo, '/_profiler/search')) {
                    // _profiler_search
                    if ($pathinfo === '/_profiler/search') {
                        return array (  '_controller' => 'web_profiler.controller.profiler:searchAction',  '_route' => '_profiler_search',);
                    }

                    // _profiler_search_bar
                    if ($pathinfo === '/_profiler/search_bar') {
                        return array (  '_controller' => 'web_profiler.controller.profiler:searchBarAction',  '_route' => '_profiler_search_bar',);
                    }

                }

                // _profiler_purge
                if ($pathinfo === '/_profiler/purge') {
                    return array (  '_controller' => 'web_profiler.controller.profiler:purgeAction',  '_route' => '_profiler_purge',);
                }

                // _profiler_info
                if (0 === strpos($pathinfo, '/_profiler/info') && preg_match('#^/_profiler/info/(?P<about>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_info')), array (  '_controller' => 'web_profiler.controller.profiler:infoAction',));
                }

                // _profiler_phpinfo
                if ($pathinfo === '/_profiler/phpinfo') {
                    return array (  '_controller' => 'web_profiler.controller.profiler:phpinfoAction',  '_route' => '_profiler_phpinfo',);
                }

                // _profiler_search_results
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/search/results$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_search_results')), array (  '_controller' => 'web_profiler.controller.profiler:searchResultsAction',));
                }

                // _profiler
                if (preg_match('#^/_profiler/(?P<token>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler')), array (  '_controller' => 'web_profiler.controller.profiler:panelAction',));
                }

                // _profiler_router
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/router$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_router')), array (  '_controller' => 'web_profiler.controller.router:panelAction',));
                }

                // _profiler_exception
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/exception$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_exception')), array (  '_controller' => 'web_profiler.controller.exception:showAction',));
                }

                // _profiler_exception_css
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/exception\\.css$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_exception_css')), array (  '_controller' => 'web_profiler.controller.exception:cssAction',));
                }

            }

            if (0 === strpos($pathinfo, '/_configurator')) {
                // _configurator_home
                if (rtrim($pathinfo, '/') === '/_configurator') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', '_configurator_home');
                    }

                    return array (  '_controller' => 'Sensio\\Bundle\\DistributionBundle\\Controller\\ConfiguratorController::checkAction',  '_route' => '_configurator_home',);
                }

                // _configurator_step
                if (0 === strpos($pathinfo, '/_configurator/step') && preg_match('#^/_configurator/step/(?P<index>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_configurator_step')), array (  '_controller' => 'Sensio\\Bundle\\DistributionBundle\\Controller\\ConfiguratorController::stepAction',));
                }

                // _configurator_final
                if ($pathinfo === '/_configurator/final') {
                    return array (  '_controller' => 'Sensio\\Bundle\\DistributionBundle\\Controller\\ConfiguratorController::finalAction',  '_route' => '_configurator_final',);
                }

            }

        }

        // ficep_planning_homepage
        if (0 === strpos($pathinfo, '/planning') && preg_match('#^/planning/(?P<week>[^/]++)/(?P<year>[^/]++)$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ficep_planning_homepage')), array (  '_controller' => 'Ficep\\PlanningBundle\\Controller\\DefaultController::indexAction',));
        }

        if (0 === strpos($pathinfo, '/technician')) {
            // ficep_planning_addTechnician
            if ($pathinfo === '/technician/add') {
                return array (  '_controller' => 'Ficep\\PlanningBundle\\Controller\\TechnicianController::addAction',  '_route' => 'ficep_planning_addTechnician',);
            }

            // ficep_planning_listTechnician
            if (0 === strpos($pathinfo, '/technician/list') && preg_match('#^/technician/list(?:/(?P<id>[^/]++)(?:/(?P<page>[^/]++))?)?$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'ficep_planning_listTechnician')), array (  '_controller' => 'Ficep\\PlanningBundle\\Controller\\TechnicianController::listAction',  'id' => 'all',  'page' => 1,));
            }

            // ficep_planning_deleteTechnician
            if (0 === strpos($pathinfo, '/technician/delete') && preg_match('#^/technician/delete/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'ficep_planning_deleteTechnician')), array (  '_controller' => 'Ficep\\PlanningBundle\\Controller\\TechnicianController::deleteAction',));
            }

            // ficep_plannning_editTechnician
            if (0 === strpos($pathinfo, '/technician/edit') && preg_match('#^/technician/edit/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'ficep_plannning_editTechnician')), array (  '_controller' => 'Ficep\\PlanningBundle\\Controller\\TechnicianController::editAction',));
            }

        }

        if (0 === strpos($pathinfo, '/cu')) {
            if (0 === strpos($pathinfo, '/custommer')) {
                // ficep_planning_addCustommer
                if ($pathinfo === '/custommer/add') {
                    return array (  '_controller' => 'Ficep\\PlanningBundle\\Controller\\CustommerController::addAction',  '_route' => 'ficep_planning_addCustommer',);
                }

                // ficep_planning_listCustommer
                if (0 === strpos($pathinfo, '/custommer/list') && preg_match('#^/custommer/list(?:/(?P<id>[^/]++)(?:/(?P<page>[^/]++))?)?$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'ficep_planning_listCustommer')), array (  '_controller' => 'Ficep\\PlanningBundle\\Controller\\CustommerController::listAction',  'id' => 'all',  'page' => 1,));
                }

            }

            // ficep_planning_deleteCustommer
            if (0 === strpos($pathinfo, '/cutommer/delete') && preg_match('#^/cutommer/delete/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'ficep_planning_deleteCustommer')), array (  '_controller' => 'Ficep\\PlanningBundle\\Controller\\CustommerController::deleteAction',));
            }

            // ficep_planning_editCustommer
            if (0 === strpos($pathinfo, '/custommer/edit') && preg_match('#^/custommer/edit/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'ficep_planning_editCustommer')), array (  '_controller' => 'Ficep\\PlanningBundle\\Controller\\CustommerController::editAction',));
            }

        }

        if (0 === strpos($pathinfo, '/machine')) {
            // ficep_planning_addMachine
            if ($pathinfo === '/machine/add') {
                return array (  '_controller' => 'Ficep\\PlanningBundle\\Controller\\MachineController::addAction',  '_route' => 'ficep_planning_addMachine',);
            }

            // ficep_planning_listMachine
            if (0 === strpos($pathinfo, '/machine/list') && preg_match('#^/machine/list(?:/(?P<id>[^/]++)(?:/(?P<page>[^/]++))?)?$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'ficep_planning_listMachine')), array (  '_controller' => 'Ficep\\PlanningBundle\\Controller\\MachineController::listAction',  'id' => 'all',  'page' => 1,));
            }

            // ficep_planning_deleteMachine
            if (0 === strpos($pathinfo, '/machine/delete') && preg_match('#^/machine/delete/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'ficep_planning_deleteMachine')), array (  '_controller' => 'Ficep\\PlanningBundle\\Controller\\MachineController::deleteAction',));
            }

            // ficep_planning_editMachine
            if (0 === strpos($pathinfo, '/machine/edit') && preg_match('#^/machine/edit/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'ficep_planning_editMachine')), array (  '_controller' => 'Ficep\\PlanningBundle\\Controller\\MachineController::editAction',));
            }

        }

        // oc_platform_home
        if (preg_match('#^/(?P<page>\\d*)?$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'oc_platform_home')), array (  '_controller' => 'OC\\PlatformBundle\\Controller\\AdvertController::indexAction',  'page' => 1,));
        }

        if (0 === strpos($pathinfo, '/ad')) {
            // oc_platform_view
            if (0 === strpos($pathinfo, '/advert') && preg_match('#^/advert/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'oc_platform_view')), array (  '_controller' => 'OC\\PlatformBundle\\Controller\\AdvertController::viewAction',));
            }

            // oc_platform_add
            if ($pathinfo === '/add') {
                return array (  '_controller' => 'OC\\PlatformBundle\\Controller\\AdvertController::addAction',  '_route' => 'oc_platform_add',);
            }

        }

        // oc_platform_edit
        if (0 === strpos($pathinfo, '/edit') && preg_match('#^/edit/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'oc_platform_edit')), array (  '_controller' => 'OC\\PlatformBundle\\Controller\\AdvertController::editAction',));
        }

        // oc_platform_delete
        if ($pathinfo === '/delete') {
            return array (  '_controller' => 'OC\\PlatformBundle\\Controller\\AdvertController::deleteAction',  '_route' => 'oc_platform_delete',);
        }

        // _welcome
        if (rtrim($pathinfo, '/') === '') {
            if (substr($pathinfo, -1) !== '/') {
                return $this->redirect($pathinfo.'/', '_welcome');
            }

            return array (  '_controller' => 'Acme\\DemoBundle\\Controller\\WelcomeController::indexAction',  '_route' => '_welcome',);
        }

        if (0 === strpos($pathinfo, '/demo')) {
            if (0 === strpos($pathinfo, '/demo/secured')) {
                if (0 === strpos($pathinfo, '/demo/secured/log')) {
                    if (0 === strpos($pathinfo, '/demo/secured/login')) {
                        // _demo_login
                        if ($pathinfo === '/demo/secured/login') {
                            return array (  '_controller' => 'Acme\\DemoBundle\\Controller\\SecuredController::loginAction',  '_route' => '_demo_login',);
                        }

                        // _demo_security_check
                        if ($pathinfo === '/demo/secured/login_check') {
                            return array (  '_controller' => 'Acme\\DemoBundle\\Controller\\SecuredController::securityCheckAction',  '_route' => '_demo_security_check',);
                        }

                    }

                    // _demo_logout
                    if ($pathinfo === '/demo/secured/logout') {
                        return array (  '_controller' => 'Acme\\DemoBundle\\Controller\\SecuredController::logoutAction',  '_route' => '_demo_logout',);
                    }

                }

                if (0 === strpos($pathinfo, '/demo/secured/hello')) {
                    // acme_demo_secured_hello
                    if ($pathinfo === '/demo/secured/hello') {
                        return array (  'name' => 'World',  '_controller' => 'Acme\\DemoBundle\\Controller\\SecuredController::helloAction',  '_route' => 'acme_demo_secured_hello',);
                    }

                    // _demo_secured_hello
                    if (preg_match('#^/demo/secured/hello/(?P<name>[^/]++)$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => '_demo_secured_hello')), array (  '_controller' => 'Acme\\DemoBundle\\Controller\\SecuredController::helloAction',));
                    }

                    // _demo_secured_hello_admin
                    if (0 === strpos($pathinfo, '/demo/secured/hello/admin') && preg_match('#^/demo/secured/hello/admin/(?P<name>[^/]++)$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => '_demo_secured_hello_admin')), array (  '_controller' => 'Acme\\DemoBundle\\Controller\\SecuredController::helloadminAction',));
                    }

                }

            }

            // _demo
            if (rtrim($pathinfo, '/') === '/demo') {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', '_demo');
                }

                return array (  '_controller' => 'Acme\\DemoBundle\\Controller\\DemoController::indexAction',  '_route' => '_demo',);
            }

            // _demo_hello
            if (0 === strpos($pathinfo, '/demo/hello') && preg_match('#^/demo/hello/(?P<name>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => '_demo_hello')), array (  '_controller' => 'Acme\\DemoBundle\\Controller\\DemoController::helloAction',));
            }

            // _demo_contact
            if ($pathinfo === '/demo/contact') {
                return array (  '_controller' => 'Acme\\DemoBundle\\Controller\\DemoController::contactAction',  '_route' => '_demo_contact',);
            }

        }

        throw 0 < count($allow) ? new MethodNotAllowedException(array_unique($allow)) : new ResourceNotFoundException();
    }
}
