<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Application\Entity\Configurator;

/**
 * @ORM\Entity
 * @ORM\Table(name="aluno")
 * @ORM\Entity(repositoryClass="Application\Entity\AlunoRepository")
 */
class Aluno {
	
	/**
	 * @ORM\Id
	 * @ORM\Column(type="integer")
	 * @ORM\GeneratedValue
	 *
	 * @var int
	 */
	protected $cod_aluno;
	
	/**
	 * @ORM\Column(type="text")
	 *
	 * @var string
	 */
	protected $cidade;
	
	/**
	 * @ORM\Column(type="text")
	 *
	 * @var string
	 */
	protected $nome_aluno;
	
	/**
	 * @ORM\Column(type="text")
	 *
	 * @var string
	 */
	protected $endereco;
	
	/**
	 * @ORM\Column(type="text")
	 *
	 * @var string
	 */
	protected $bairro;
	
	/**
	 * @ORM\Column(type="text")
	 *
	 * @var string
	 */
	protected $estado;
	
	/**
	 * @ORM\Column(type="text")
	 *
	 * @var string
	 */
	protected $complemento;
	
	/**
	 * @ORM\Column(type="text")
	 *
	 * @var string
	 */
	protected $cpf;
	
	/**
	 * @ORM\Column(type="text")
	 *
	 * @var string
	 */
	protected $rg;
	/**
	 * @ORM\Column(type="text")
	 *
	 * @var string
	 */
	protected $celular;
	/**
	 * @ORM\Column(type="text")
	 *
	 * @var string
	 */
	protected $telefone;
	
	/**
	 * @ORM\Column(type="text")
	 *
	 * @var string
	 */
	protected $email;
	/**
	 * @ORM\Column(type="text")
	 *
	 * @var string
	 */
	protected $cep;
	/**
	 * @ORM\Column(type="text")
	 *
	 * @var string
	 */
	protected $skype;
	
	/**
	 * @ORM\Column(type="text")
	 *
	 * @var string
	 */
	protected $senha;
	
	/**
	 * @ORM\Column(type="text")
	 *
	 * @var string
	 */
	protected $salt;
	public function __construct($options = null) {
		Configurator::configure ( $this, $options );
		$this->salt = base_convert ( sha1 ( uniqid ( mt_rand (), true ) ), 16, 36 );
	}
	public function getCodAluno() {
		return $this->cod_aluno;
	}
	public function setCodAluno($cod_aluno) {
		$this->cod_aluno = $cod_aluno;
		return $this;
	}
	public function getAlunoEvento() {
		return $this->aluno_evento;
	}
	public function setAlunoEvento($aluno_evento) {
		$this->aluno_evento = $aluno_evento;
		return $this;
	}
	public function getCidade() {
		return $this->cidade;
	}
	public function setCidade($cidade) {
		$this->cidade = $cidade;
		return $this;
	}
	public function getNomeAluno() {
		return $this->nome_aluno;
	}
	public function setNomeAluno($nome_aluno) {
		$this->nome_aluno = $nome_aluno;
		return $this;
	}
	public function getEndereco() {
		return $this->endereco;
	}
	public function setEndereco($endereco) {
		$this->endereco = $endereco;
		return $this;
	}
	public function getBairro() {
		return $this->bairro;
	}
	public function setBairro($bairro) {
		$this->bairro = $bairro;
		return $this;
	}
	public function getEstado() {
		return $this->estado;
	}
	public function setEstado($estado) {
		$this->estado = $estado;
		return $this;
	}
	public function getComplemento() {
		return $this->complemento;
	}
	public function setComplemento($complemento) {
		$this->complemento = $complemento;
		return $this;
	}
	public function getCpf() {
		return $this->cpf;
	}
	public function setCpf($cpf) {
		$this->cpf = $cpf;
		return $this;
	}
	public function getRg() {
		return $this->rg;
	}
	public function setRg($rg) {
		$this->rg = $rg;
		return $this;
	}
	public function getCelular() {
		return $this->celular;
	}
	public function setCelular($celular) {
		$this->celular = $celular;
		return $this;
	}
	public function getTelefone() {
		return $this->telefone;
	}
	public function setTelefone($telefone) {
		$this->telefone = $telefone;
		return $this;
	}
	public function getEmail() {
		return $this->email;
	}
	public function setEmail($email) {
		$this->email = $email;
		return $this;
	}
	public function getCep() {
		return $this->cep;
	}
	public function setCep($cep) {
		$this->cep = $cep;
		return $this;
	}
	public function getSkype() {
		return $this->skype;
	}
	public function setSkype($skype) {
		$this->skype = $skype;
		return $this;
	}
	public function getSenha() {
		return $this->senha;
	}
	public function setSenha($senha) {
		$hashSenha = $this->encryptPassword ( $senha );
		$this->senha = $hashSenha;
		return $this;
	}
	public function getSalt() {
		return $this->salt;
	}
	public function setSalt($salt) {
		$this->salt = $salt;
		return $this;
	}
	public function encryptPassword($senha) {
		$hashSenha = hash ( 'sha512', $senha . $this->salt );
		for($i = 0; $i < 64000; $i ++)
			$hashSenha = hash ( 'sha512', $hashSenha );
		
		return $hashSenha;
	}
	public function toArray() {
		return array (
				'id' => $this->getCodAluno (),				
				'cidade' => $this->getCidade (),
				'nome_aluno' => $this->getNomeCliente (),				
				'endereco' => $this->getEndereco (),
				'bairro' => $this->getBairro (),
				'estado' => $this->getEstado (),
				'complemento' => $this->getComplemento (),
				'cpf' => $this->getCpf (),
				'rg' => $this->getRg (),
				'celular' => $this->getCelular (),
				'telefone' => $this->getTelefone (),
				'email' => $this->getEmail (),
				'cep' => $this->getCep (),
				'skype' => $this->getSkype (),
				'senha' => $this->getSenha (),
				'salt' => $this->getSalt () 
		);
	}
}




