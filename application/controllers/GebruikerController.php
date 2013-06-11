<?php

class GebruikerController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        // action body
    }
    
    public function loginAction()
    {
        //
        //$this->view->form = $loginform;
        $this->_helper->layout()->disableLayout();
        $this->_helper->viewRenderer->setNoRender(true);
        if ($this->getRequest()->getPost()) {
            $postParams = $this->getRequest()->getPost();
  
            $loginform = new Application_Form_Signup();
            
            if ($loginform->isValid($postParams)) {
                         
                $params = $loginform->getValues();
                $auth = Zend_Auth::getInstance();
                
                // meegeven welke database driver we gebruiken
                $authAdapter = new Zend_Auth_Adapter_DbTable(Zend_Registry::get('db'));
               
                $authAdapter->setTablename('gebruikers')
                             ->setIdentityColumn('naam')
                             ->setCredentialColumn('wachtwoord')
                             ->setIdentity($params['naam'])
                             ->setCredential($params['wachtwoord']);

                $result = $auth->authenticate($authAdapter);
                
                If ($result->isValid()) {
                        echo ("U bent ingelogd");
                }
                else {
                       // alle foutmeldingen weergeven op het scherm
                       foreach ($result->getMessages() as $message) {
                           echo $message;
                       }
                }
                $this->_helper->redirector('index','index');
            }
        }
    }

    
     public function logoutAction()
     {
        $this->_helper->layout->disableLayout();
        $this->_helper->viewRenderer->setNoRender();
        Zend_Auth::getInstance()->clearIdentity();
        $this->_helper->redirector('index','index');
     }


}

