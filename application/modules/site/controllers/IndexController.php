<?php

class Site_IndexController extends Zend_Controller_Action {

    public function init() {
        $mobileDetect = new Mobile_MobileDetect();
        $is_mobile = $mobileDetect->isMobile();
        
        //$is_mobile = true;
        if ($is_mobile) {
            $this->_redirect("mobile/");
        }
        
    }

    public function indexAction() {
        
        // form de cadastro
        $form = new Form_Site_Cadastro();
        $this->view->form = $form;

    }

}

