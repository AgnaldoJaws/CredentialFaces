<?php

namespace Application\Form;


use Zend\Form\Form, Zend\Form\Element\Select;

class Login extends Form {
	public function __construct($name = null) {
		parent::__construct ( 'user' );
		
		$this->setAttribute ( 'method', 'post' );
		
		$this->add ( array (
				'name' => 'email',
				'options' => array (
						'type' => 'email',
						'label' => 'Email' 
				),
				'attributes' => array (
						'placeholder' => 'Entre com o Email' 
				) 
		) );
		
		$this->add ( array (
				'name' => 'password',
				'options' => array (
						'type' => 'Password',
						'label' => 'Senha' 
				),
				'attributes' => array (
						'type' => 'password' 
				) 
		) );
		
		$this->add ( array (
				'name' => 'submit',
				'type' => 'submit',
				'attributes' => array (
						'type' => 'submit',
						'class' => 'btn-cucces' 
				),
				'options' => array (
						'label' => 'Login' 
				) 
		) );
	}
}