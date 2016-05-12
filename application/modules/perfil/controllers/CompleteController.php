<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CompleteController
 *
 * @author Fernando
 */
class Perfil_CompleteController extends Zend_Controller_Action {
    
    public function init() {
        
    }
    
    public function indexAction() {
    
        $perfil_id = 1;
        //$perfil_id = Zend_Auth::getInstance()->getIdentity()->perfil_id;
        
        // dados do perfil
        $modelPerfil = new Model_DbTable_Perfil();
        $perfil = $modelPerfil->getById($perfil_id);
        
        if (!$perfil) {
            
        }
        
        // form 
        $formPerfil = new Form_Perfil_Perfil();
        // remover validators
        $formPerfil->perfil_email->removeValidator('email');
        $formPerfil->populate($perfil->toArray());
        $this->view->formPerfil = $formPerfil;
        
        if ($this->getRequest()->isPost()) {
            $data = $this->getRequest()->getPost();
            if($formPerfil->isValid($data)) {
                $data = $formPerfil->getValues();
                
                try {
                    $modelPerfil->updateById($data, $perfil_id);
                } catch (Exception $ex) {
                    die($ex->getMessage());
                }
                
            }
        }        
        
    }
    
}
