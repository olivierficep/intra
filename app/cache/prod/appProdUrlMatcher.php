<?php

use Symfony\Component\Routing\Exception\MethodNotAllowedException;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\RequestContext;

/**
 * appProdUrlMatcher
 *
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class appProdUrlMatcher extends Symfony\Bundle\FrameworkBundle\Routing\RedirectableUrlMatcher
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

        throw 0 < count($allow) ? new MethodNotAllowedException(array_unique($allow)) : new ResourceNotFoundException();
    }
}
