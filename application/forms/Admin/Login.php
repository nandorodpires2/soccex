<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Login
 *
 * @author Fernando Rodrigues
 */
class Form_Admin_Login extends Zend_Form {
    
    public function init() {
        
        // admin_email
        $adminEmail = new Zend_Form_Element_Text("admin_email");
        $adminEmail->setLabel("E-mail: ");
        $adminEmail->setRequired();
        $adminEmail->setAttribs(array(
            'class' => 'form-control',
            'placeholder' => 'Informe o e-mail'
        ));
        $this->addElement($adminEmail);
        
        // admin_senha
        $adminSenha = new Zend_Form_Element_Password("admin_senha");
        $adminSenha->setLabel("Senha: ");
        $adminSenha->setRequired();
        $adminSenha->setAttribs(array(
            'class' => 'form-control',
            'placeholder' => 'Informe a senha'
        ));
        $this->addElement($adminSenha);
        
        // submit
        $submit = new Zend_Form_Element_Submit("submit");        
        $submit->setLabel("Acessar");
        $submit->setAttrib('class', 'btn btn-primary btn-block');
        $this->addElement($submit);
        
    }
    
}
