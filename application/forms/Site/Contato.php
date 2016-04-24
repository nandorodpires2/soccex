<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Contato
 *
 * @author Fernando
 */
class Form_Site_Contato extends Zend_Form {
    
    public function init() {
        
        // contato_nome
        $contatoNome = new Zend_Form_Element_Text("contato_nome");
        $contatoNome->setLabel("Nome: ");
        $contatoNome->setAttribs(array(
            'class' => 'form-control',
            'placeholder' => 'Informe seu nome'
        ));
        $contatoNome->setRequired();
        $contatoNome->setDecorators(Form_Decorator::$simpleElementDecorators);
        $this->addElement($contatoNome);
        
        // contato_email
        $contatoEmail = new Zend_Form_Element_Text("contato_email");
        $contatoEmail->setLabel("E-mail: ");
        $contatoEmail->setAttribs(array(
            'class' => 'form-control',
            'placeholder' => 'Informe seu e-mail'
        ));
        $contatoEmail->setRequired();
        $contatoEmail->setDecorators(Form_Decorator::$simpleElementDecorators);
        $this->addElement($contatoEmail);
                
        // contato_assunto
        $contatoAssunto = new Zend_Form_Element_Text("contato_assunto");
        $contatoAssunto->setLabel("Assunto: ");
        $contatoAssunto->setAttribs(array(
            'class' => 'form-control',
            'placeholder' => 'Informe o assunto'
        ));
        $contatoAssunto->setRequired();
        $contatoAssunto->setDecorators(Form_Decorator::$simpleElementDecorators);
        $this->addElement($contatoAssunto);
        
        // contato_mensagem
        $contatoMensagem = new Zend_Form_Element_Textarea("contato_mensagem");
        $contatoMensagem->setLabel("Texto: ");
        $contatoMensagem->setAttribs(array(
            'class' => 'form-control',           
            'rows' => 5
        ));
        $contatoMensagem->setRequired();
        $contatoMensagem->setDecorators(Form_Decorator::$simpleElementDecorators);
        $this->addElement($contatoMensagem);
        
        // submit
        $submit = new Zend_Form_Element_Submit("submit");
        $submit->setLabel("Enviar");
        $submit->setAttrib('class', 'btn btn-primary btn-block');
        $this->addElement($submit);
        
    }
    
}
