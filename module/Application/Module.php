<?php

namespace Application;

use Zend\Mvc\ModuleRouteListener;
use Zend\Mvc\MvcEvent;

class Module
{
    public function onBootstrap(MvcEvent $e)
    {
        $eventManager        = $e->getApplication()->getEventManager();
        $moduleRouteListener = new ModuleRouteListener();
        $moduleRouteListener->attach($eventManager);
    }

    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }

    public function getServiceConfig()
    {
        return array(
          'factories' => array(
              'Application\Service\Categoria' => function($sm) {
                      $em = $sm->get('Doctrine\ORM\EntityManager');
                      $categoriaService = new \Application\Service\Categoria($em);
                      return $categoriaService;
                  },
              'Application\Service\Produto' => function($sm) {
                      $em = $sm->get('Doctrine\ORM\EntityManager');
                      $produtoService = new \Application\Service\Produto($em);
                      return $produtoService;
                  }
          )
        );
    }

    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                ),
            ),
        );
    }
}
