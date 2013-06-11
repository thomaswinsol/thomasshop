<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Acl
 *
 * @author webmaster
 */
class Syntra_Auth_Acl extends Zend_Controller_Plugin_Abstract  {
    //put your code here
    
    public function preDispatch(\Zend_Controller_Request_Abstract $request)  {
   
        // Op welke controllers heb je rechten
        $acl    = new  Zend_Acl();        
        $roles  = array ('GUEST','USER','ADMIN');        
        $controllers = array ('gebruiker','index','product','error');
        
        foreach ($roles as $role) {
            $acl->addRole($role);
        }        
        
        foreach ($controllers as $controller) {
            //$acl->add(new Zend_Acl_Resource($controller));
            $acl->addResource($controller);             
        }
        
        $acl->allow('ADMIN');  // access to everything
        $acl->allow('USER');         
        //$acl->deny('ADMIN','product'); 
        //    
             
        Zend_Registry::set('Zend_Acl', $acl);
        
    }       
}

?>
