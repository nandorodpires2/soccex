<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ContatoController
 *
 * @author Fernando
 */
class Site_ContatoController extends Zend_Controller_Action {
    
    public function init() {
        
    }
    
    public function indexAction() {
        
        // form
        $form = new Form_Site_Contato();
        $this->view->form = $form;
        
        if ($this->getRequest()->isPost()) {
            $data = $this->getRequest()->getPost();
            if ($form->isValid($data)) {
                $data = $form->getValues();
                
                try {
                    
                    $modelContato = new Model_DbTable_Contato();
                    $modelContato->insert($data);
                    
                    // envia o email
                    $pluginMail = new Plugin_Mail();
                    
                    $this->_helper->flashMessenger->addMessage(array(
                        'success' => 'Sua mensagem foi enviada com sucesso'
                    ));
                    
                } catch (Exception $ex) {
                    $this->_helper->flashMessenger->addMessage(array(
                        'danger' => $ex->getMessage()
                    ));
                }
                
                $this->_redirect("/");
                
            }
        }
        
    }
    
}
