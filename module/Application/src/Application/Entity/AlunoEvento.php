<?php

namespace Application\Entity;


use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="aluno_evento")
 */
class Aluno_Evento {
	
	/**
	 * @ORM\Id
	 * @ORM\Column(type="integer")
	 * @ORM\GeneratedValue
	 */
	private $cod_aln_evt;
	
	/**
	 * @ORM\ManyToOne(targetEntity="CredentialFaces\Entity\Aluno", inversedBy="Aluno_Evento")
	 * @ORM\JoinColumn(name="cod_aluno", referencedColumnName="cod_aluno")
	 */
	private $aluno;
	
	/**
	 * @ORM\ManyToOne(targetEntity="CredentialFaces\Entity\Evento", inversedBy="Aluno_Evento")
	 * @ORM\JoinColumn(name="cod_evento", referencedColumnName="cod_evento")
	 */
	private $evento;
	
	
	/**
	 * @ORM\Column(type="string")
	 */
	private $data_entrada;
	
	public function getCodAlnEvt() {
		return $this->cod_aln_evt;
	}
	public function setCodAlnEvt($cod_aln_evt) {
		$this->cod_aln_evt = $cod_aln_evt;
		return $this;
	}
	public function getCodEvento() {
		return $this->cod_evento;
	}
	public function setCodEvento($cod_evento) {
		$this->cod_evento = $cod_evento;
		return $this;
	}
	public function getCodAluno() {
		return $this->cod_aluno;
	}
	public function setCodAluno($cod_aluno) {
		$this->cod_aluno = $cod_aluno;
		return $this;
	}
	public function getDataEntrada() {
		return $this->data_entrada;
	}
	public function setDataEntrada($data_entrada) {
		$this->data_entrada = $data_entrada;
		return $this;
	}
	
	
} 