<?php

namespace Application\Service;

use Doctrine\ORM\EntityManager;
use Application\Entity\Evento as EventoEntity;
use Application\Entity\Configurator;


class Evento {
	private $em;
	public function __construct(EntityManager $em) {
		$this->em = $em;
	}
public function insert($nome)
    {
        $EventoEntity = new EventoEntity();
        $EventoEntity->setNomeEvento($nome);

        $this->em->persist($EventoEntity);
        $this->em->flush();

        return $EventoEntity;
    }
	public function update(array $data) {
		$eventoEntity = $this->em->getReference ( 'Application\Entity\Evento', $data ['cod_evento'] );
		$eventoEntity = Configurator::configure ( $eventoEntity, $data );
		
		$this->em->persist ( $eventoEntity );
		$this->em->flush ();
		
		return $eventoEntity;
	}
	public function delete($id) {
		$eventoEntity = $this->em->getReference ( 'Application\Entity\Evento', $id );
		
		$this->em->remove ( $eventoEntity );
		$this->em->flush ();
		return $id;
	}
} 
