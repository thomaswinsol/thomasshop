<?php

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{

    protected function _initRegisterControllerPlugins()
    {
        $this->bootstrap('frontController');
        $front = $this->getResource('frontController');
        $front->registerPlugin(new Syntra_Controller_Plugin_Translate());
        $front->registerPlugin(new Syntra_Controller_Plugin_Navigation());
        $front->registerPlugin(new Syntra_Auth_Acl());
        $front->registerPlugin(new Syntra_Auth_Auth());
    } 
    
    protected function _initMyActionHelpers()
    {
        $this->bootstrap('frontController');
        $signup = Zend_Controller_Action_HelperBroker::getStaticHelper('Signup');
        Zend_Controller_Action_HelperBroker::addHelper($signup);
    }
    
    /*public function _initNavigation() {
        // registreer de navigation plugin
        $this->bootstrap('frontController');
        $front = $this->getResource('frontController');
        $front->registerPlugin(new Syntra_Controller_Plugin_Navigation());
    }*/
    public function _initDbAdapter()
    {
        $this->bootstrap('db');
        $db = $this->getResource('db');
        // maak een soort van globale variabele 
        Zend_Registry::set('db',$db);        
    }
    
}

