<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2013 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Application\Entity\Evento;
//use Application\Entity\Produto;

class IndexController extends AbstractActionController
{
    public function indexAction()
    {

        $em = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');
        $repo = $em->getRepository("Application\Entity\Evento");

//        $evento = new Evento();
//        $evento->setCurso("Sintec");

//       $em->persist($evento); // preparar para gravar
//       $em->flush(); // grava no banco
//

 //      $categoriaService = $this->getServiceLocator()->get('Application\Service\Categoria');
 //      $categoriaService->delete(4);

        $evento = $repo->findAll();

//        $categoria = $repo->find(1);
//
//        $produto = new Produto();
//        $produto->setNome("Game A")
//                ->setDescricao("O game A é muito legal!")
//                ->setCategoria($categoria);
//
//        $em->persist($produto);
//        $em->flush();

        //$produtoService = $this->getServiceLocator()->get('Application\Service\Produto');
        //$produtoService->insert(array('nome'=>'Game B','categoriaId'=>1));
        //$produtoService->delete(2);


        return new ViewModel(array('evento'=>$evento));
    }

}
