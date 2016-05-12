<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of PostsController
 *
 * @author Fernando
 */
class Perfil_PostsController extends Zend_Controller_Action {
    
    public function init() {
        
    }
    
    public function indexAction() {
        
        /**
         * form post
         */
        $formPost = new Form_Perfil_Post();
        $formPost->submit->setLabel("POSTAR");
        $this->view->formPost = $formPost;
        
    }
    
    public function addAction() {
        
    }
    
}
