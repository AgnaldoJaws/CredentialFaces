<?php

namespace Application\Service;

use Doctrine\ORM\EntityManager;
use Application\Entity\AlunoEvento as AlunoEventoEntity;


class AlunoEvento
{

    private $em;

    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }

    public function insert(array $data)
    {
        $alunoEntity = $this->em
            ->getReference('Application\Entity\Aluno', $data['cod_aluno']);
        
        $eventoEntity = $this->em
        ->getReference('Application\Entity\Evento', $data['cod_evento']);

        $alunoEvento = new AlunoEventoEntity();
        $alunoEvento
            ->setAluno($alunoEntity)
        ->setEvento($eventoEntity);


        $this->em->persist($alunoEvento);
        $this->em->flush();

        return $alunoEvento;
    }

    public function update(array $data)
    {
    	$alunoEntity = $this->em
    	->getReference('Application\Entity\Aluno', $data['cod_aluno']);
    	
    	$eventoEntity = $this->em
    	->getReference('Application\Entity\Evento', $data['cod_evento']);
    	
       

        $alunoEvento = $this->em->getReference('Application\Entity\AlunoEvento', $data['cod_aln_evt']);
        $alunoEvento
            ->setAlno($alunoEntity)
        ->setEvento($eventoEntity);

        $this->em->persist($alunoEvento);
        $this->em->flush();

        return $alunoEvento;
    }

    public function delete($id)
    {
    	$alunoEvento = $this->em->getReference('Application\Entity\AlunoEvento', $id);

        $this->em->remove($alunoEvento);
        $this->em->flush();
        return $id;
    }

} 