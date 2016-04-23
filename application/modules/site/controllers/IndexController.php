<?php

class Site_IndexController extends Zend_Controller_Action {

    public function init() {
        
    }

    public function indexAction() {
        
        // form de cadastro
        $form = new Form_Site_Cadastro();
        $this->view->form = $form;

    }

}

