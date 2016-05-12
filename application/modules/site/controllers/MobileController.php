<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of MobileController
 *
 * @author Fernando
 */
class Site_MobileController extends Zend_Controller_Action {
    
    public function init() {
        
    }
    
    public function indexAction() {
        // form de cadastro
        $form = new Form_Site_Cadastro();
        $this->view->form = $form;
        
        if ($this->getRequest()->isPost()) {
            $data = $this->getRequest()->getPost();
            if ($form->isValid($data)) {
                $data = $form->getValues();
                
                try {
                    
                    Zend_Db_Table_Abstract::getDefaultAdapter()->beginTransaction();
                    
                    $modelPerfil = new Model_DbTable_Perfil();
                    $modelPerfil->insert($data);
                    
                    // envia email de confirmacao
                    $pluginMail = new Plugin_Mail();
                    $pluginMail->send("padrao.phtml", "Cadastro recebido", $data['perfil_email']);
                    //$pluginMail->send("padrao.phtml", "Cadastro recebido", "nandorodpires@gmail.com");
                    
                    // mensagem
                    $this->_helper->flashMessenger->addMessage(array(
                        'success' => 'Cadastro realizado com sucesso!'
                    ));
                    
                    Zend_Db_Table_Abstract::getDefaultAdapter()->commit();
                    
                    $this->_redirect("/mobile");
                } catch (Exception $ex) {
                    Zend_Db_Table_Abstract::getDefaultAdapter()->rollBack();
                    
                    $this->_helper->flashMessenger->addMessage(array(
                        'danger' => 'Houve um problema ao realizar o cadatro!'
                    ));
                    
                    $this->_redirect("/mobile");
                }
                
            }
        }
    }
    
}
