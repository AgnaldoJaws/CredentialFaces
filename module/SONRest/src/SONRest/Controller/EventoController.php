<?php

namespace SONRest\Controller;

use Zend\Mvc\Controller\AbstractRestfulController;
use Zend\View\Model\JsonModel;
class EventoController extends AbstractRestfulController
{

    // get
    public function getList()
    {
        $em = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');

        $data = $em->getRepository('Application\Entity\Event')->findAll();

        return $data;

    }

    // get
    public function get($id)
    {
        $em = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');

        $data = $em->getRepository('Application\Entity\Evento')->find($id);

        return $data;
    }

    // post
    public function create($data)
    {
        $serviceEvento = $this->getServiceLocator()->get('Application\Service\Evento');
        $nome = $data['nome'];

        $Evento = $serviceEvento->insert($nome);
        if($Evento) {
            return $Evento;
        } else {
            return array('success'=>false);
        }

    }

    // put
    public function update($id, $data)
    {
        $serviceEvento = $this->getServiceLocator()->get('Application\Service\Evento');
        $param['id'] = $id;
        $param['nome'] = $data['nome'];

        $Evento = $serviceEvento->update($param);
        if($Evento) {
            return $Evento;
        } else {
            return array('success'=>false);
        }
    }

    // delete
    public function delete($id)
    {
        $serviceEvento = $this->getServiceLocator()->get('Application\Service\Evento');
        $result = $serviceEvento->delete($id);
        if($result) return $result;
    }

} 