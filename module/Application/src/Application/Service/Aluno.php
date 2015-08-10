<?php

namespace Application\Service;

use Doctrine\ORM\EntityManager;
use Application\Entity\Aluno as AlunoEntity;
use Application\Entity\Configurator;

class Aluno  {
	public function __construct(EntityManager $em) {
		parent::_construct ( $em );
		$this->entity = "Application\Entity\Aluno";
	}
	public function insert($nome) {
		$AlunoEntity = new AlunoEntity ();
		$AlunoEntity->setNomeAluno ( $nome );
		
		$this->em->persist ( $AlunoEntity );
		$this->em->flush ();
		
		return $AlunoEntity;
	}
	public function update(array $data) {
		$alunoEntity = $this->em->getReference ( 'Application\Entity\Aluno', $data ['cod_aluno'] );
		if (empty ( $data ['senha'] ))
			unset ( $data ['senha'] );
		$alunoEntity = Configurator::configure ( $alunoEntity, $data );
		
		$this->em->persist ( $alunoEntity );
		$this->em->flush ();
		
		return $alunoEntity;
	}
	public function delete($id) {
		$alunoEntity = $this->em->getReference ( $this->entity ['$id'] );
		
		$this->em->remove ( $alunoEntity );
		$this->em->flush ();
		return $id;
	}
} 