<?php

namespace Application;

use Zend\Mvc\ModuleRouteListener;
use Zend\Mvc\MvcEvent;
use Application\Auth\DoctrineAdapter as DoctrineAdap;

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
              'Application\Service\Aluno' => function($sm) {
                      $em = $sm->get('Doctrine\ORM\EntityManager');
                      $categoriaService = new \Application\Service\Aluno($em);
                      return $categoriaService;
                  },
              'Application\Service\Evento' => function($sm) {
                      $em = $sm->get('Doctrine\ORM\EntityManager');
                      $produtoService = new \Application\Service\Evento($em);
                      return $produtoService;
                  },
              'Application\Service\AlunoEvento' => function($sm) {
                      $em = $sm->get('Doctrine\ORM\EntityManager');
                      $AlunoEventoService = new \Application\Service\AlunoEvento($em);
                      return $AlunoEventoService;
                  },
                  'Application\Auth\DoctrineAdapter' => function($sm) {
                  return new DoctrineAdap($sm->get('Doctrine\ORM\EntityManager'));
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