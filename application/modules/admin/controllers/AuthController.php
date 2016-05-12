<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AuthController
 *
 * @author Fernando
 */
class Admin_AuthController extends Zend_Controller_Action {
    
    public function loginAction() {
        $form = new Form_Admin_Login();
        $this->view->form = $form;
     
        if ($this->getRequest()->isPost()) {
            $data = $this->getRequest()->getPost();
            if ($form->isValid($data)) {
                
                $email = $form->getValue('admin_email');                
                $senha = $form->getValue('admin_senha'); 
                
                $db = Zend_Registry::get('db');               
                $authAdapter = new Zend_Auth_Adapter_DbTable($db);
                
                $authAdapter->setTableName('admin')
                        ->setIdentityColumn('admin_email')
                        ->setCredentialColumn('admin_senha')
                        ->setIdentity($email)
                        ->setCredential(md5($senha));

                $auth = Zend_Auth::getInstance();                
                $result = $auth->authenticate($authAdapter);
                
                if ($result->isValid()) {    
                    
                    Zend_Auth::getInstance()->getStorage()->write(array('admin_email' => $email));
                    $this->_redirect("admin/");
                    
                } else {
                    die('invalid');
                }
                
            }
            
        }
    }
    
    public function logoutAction() {
        $this->_helper->layout->disableLayout(true);
        $this->_helper->viewRenderer->setNoRender(true);
        
        Zend_Auth::getInstance()->clearIdentity();
        Zend_Session::destroy();
        
        $this->_redirect("/admin");
    }
    
}
