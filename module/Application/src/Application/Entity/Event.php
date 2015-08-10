<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Application\Entity\Configurator;

/**
 * @ORM\Entity
 * @ORM\Table(name="event")
 * @ORM\Entity(repositoryClass="Application\Entity\AlunoRepository")
 */
class Event {
	
	/**
	 * @ORM\Id
	 * @ORM\Column(type="integer")
	 * @ORM\GeneratedValue
	 *
	 * @var int
	 */
	protected $cod_event;
	
	/**
	 * @ORM\Column(type="text")
	 *
	 * @var string
	 */
	protected $nome;
	
	public function getCodEvent() {
		return $this->cod_event;
	}
	public function setCodEvent( $cod_event) {
		$this->cod_event = $cod_event;
		return $this;
	}
	public function getNome() {
		return $this->nome;
	}
	public function setNome( $nome) {
		$this->nome = $nome;
		return $this;
	}
	
	
	
	
	
	
	
	public function toArray() {
		return array (
				'id' => $this->getCodEvent (),				
				'nome' => $this->getNome(),
				
		);
	}
}




