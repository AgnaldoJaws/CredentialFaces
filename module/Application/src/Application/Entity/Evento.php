<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="Application\Entity\EventoRepository")
 * @ORM\Table(name="evento")
 */
class Evento
{

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     */
    private $cod_evento;
    
    /**
     * @ORM\Column(type="string")
     */
    private $curso;
    
    /**
     * @ORM\Column(type="string")
     */
    private $nome_evento;
    
    /**
     * @ORM\Column(type="string")
     */
    private $tema;
    
    /**
     * @ORM\Column(type="string")
     */
    private $local;
    
    /**
     * @ORM\Column(type="string")
     */
    private $data;
    
    /**
     * @ORM\Column(type="string")
     */
    private $horario;
    
    /**
     * @ORM\Column(type="string")
     */
    private $valor;
    
	public function getCodEvento() {
		return $this->cod_evento;
	}
	public function setCodEvento($cod_evento) {
		$this->cod_evento = $cod_evento;
		return $this;
	}
	public function getCurso() {
		return $this->curso;
	}
	public function setCurso($curso) {
		$this->curso = $curso;
		return $this;
	}
	public function getNomeEvento() {
		return $this->nome_evento;
	}
	public function setNomeEvento($nome_evento) {
		$this->nome_evento = $nome_evento;
		return $this;
	}
	public function getTema() {
		return $this->tema;
	}
	public function setTema($tema) {
		$this->tema = $tema;
		return $this;
	}
	public function getLocal() {
		return $this->local;
	}
	public function setLocal($local) {
		$this->local = $local;
		return $this;
	}
	public function getData() {
		return $this->data;
	}
	public function setData($data) {
		$this->data = $data;
		return $this;
	}
	public function getHorario() {
		return $this->horario;
	}
	public function setHorario($horario) {
		$this->horario = $horario;
		return $this;
	}
	public function getValor() {
		return $this->valor;
	}
	public function setValor($valor) {
		$this->valor = $valor;
		return $this;
	}
	
    
    

   

} 