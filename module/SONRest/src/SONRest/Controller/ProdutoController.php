<?php

namespace SONRest\Controller;

use Zend\Mvc\Controller\AbstractRestfulController;
use Zend\View\Model\JsonModel;
class ProdutoController extends AbstractRestfulController
{

    // get
    public function getList()
    {
        $em = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');

        $data = $em->getRepository('Application\Entity\Produto')->findAll();

        return $data;

    }

    // get
    public function get($id)
    {
        $em = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');

        $data = $em->getRepository('Application\Entity\Produto')->find($id);

        return $data;
    }

    // post
    public function create($data)
    {
        $serviceProduto = $this->getServiceLocator()->get('Application\Service\Produto');

        $produto = $serviceProduto->insert($data);
        if($produto) {
            return $produto;
        } else {
            return array('success'=>false);
        }

    }

    // put
    public function update($id, $data)
    {
        $serviceProduto = $this->getServiceLocator()->get('Application\Service\Produto');
        $data['id']=$id;
        $produto = $serviceProduto->update($data);
        if($produto) {
            return $produto;
        } else {
            return array('success'=>false);
        }
    }

    // delete
    public function delete($id)
    {
        $serviceProduto = $this->getServiceLocator()->get('Application\Service\Produto');
        $result = $serviceProduto->delete($id);
        if($result) return $result;
    }

} 