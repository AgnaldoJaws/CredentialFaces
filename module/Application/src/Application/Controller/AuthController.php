<?php

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\Authentication\AuthenticationService;
use Zend\Authentication\Storage\Session as SessionStorage;;
use Zend\View\Model\ViewModel;
use  Application\Form\Login as LoginForm;

class AuthController extends AbstractActionController
{

    public function indexAction()
    {
    	$form = new LoginForm();
    	$error = false;
    	
        $request = $this->getRequest();
        if($request->isPost()) {
            $form->setData($request->getPost());
            if ($form->isValid()){
            $data = $request->getPost()->toArray();	
            }

            $auth = new AuthenticationService();
            $sessionStorage = new SessionStorage("Application");
            $auth->setStorage($sessionStorage);

            $authAdapter = $this->getServiceLocator()->get('Application\Auth\DoctrineAdapter');
            $authAdapter->setUsername($data['email'])
                ->setPassword($data['password']);

            $result = $auth->authenticate($authAdapter);

            if($result->isValid()) {
                $sessionStorage->write($auth->getIdentity()['user'], null);
                return $this->redirect()->toRoute("Application",array('controller'=>'IndexController','action'=>'index'));

            } else {
                $error = true;
            }
        }

        return new ViewModel(array('form'=>$form, 'error'=>$error));

    }

} 