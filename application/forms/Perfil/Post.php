<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Post
 *
 * @author Fernando
 */
class Form_Perfil_Post extends App_Forms_Form {
    
    public function init() {
        
        $url = $this->getView()->url(array(
            'module' => 'perfil',
            'controller' => 'posts',
            'action' => 'add'
        ), 'default', true);
        $this->setAction($url);
        $this->setMethod('post');
        
        // post_content
        $postContent = new Zend_Form_Element_TextArea("post_content");
        $postContent->setAttribs(array(
            'class' => 'form-control',
            'rows' => 5,
            'placeholder' => 'Descreve o conteúdo do seu post'
        ));
        $this->addElement($postContent);
        
        parent::init();
    }
    
}
