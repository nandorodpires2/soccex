<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of TimeController
 *
 * @author Fernando
 */
class Admin_TimeController extends Zend_Controller_Action {
    
    public function init() {
        
    }
    
    public function indexAction() {
        
    }
    
    public function cadastroAction() {
        
        $form = new Form_Admin_TimeCadastro();
        $this->view->form = $form;
        
        if ($this->getRequest()->isPost()){
            $data = $this->getRequest()->getPost();
            if ($form->isValid($data)) {
                $data = $form->getValues();
                
                try {
                    
                    $modelTime = new Model_DbTable_Time();
                    $modelTime->insert($data);
                    
                    $this->_helper->flashMessenger->addMessage(array(
                        'success' => 'Time cadastrado'
                    ));
                    
                    $this->_redirect("admin/time");
                    
                } catch (Exception $ex) {
                    $this->_helper->flashMessenger->addMessage(array(
                        'danger' => $ex->getMessage()
                    ));
                    $this->_redirect("admin/time/cadastro");
                }
                
            }
        }
        
    }
    
}
