<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Cadastro
 *
 * @author Fernando
 */
class Form_Site_Cadastro extends Zend_Form {
    
    public function init() {
        
        // form id
        $this->setAttrib("id", "form-perfil-cadastro");
        
        // form action
        $action = $this->getView()->url(array(
            'controller' => 'cadastro',
            'action' => 'index'
        ), 'default', true);
        $this->setAction($action);
        
        // time_id
        //$modelTime = new Model_DbTable_Time();
        $timeId = new Zend_Form_Element_Hidden("time_id");
        $timeId->setLabel("Pra qual time você torce? ");
        $timeId->setRequired();
        $timeId->addErrorMessages(array(
        Zend_Validate_NotEmpty::IS_EMPTY => "Escolha um time!"
        ));
        $timeId->setDecorators(Form_Decorator::$simpleElementDecorators);
        $this->addElement($timeId);
        
        /*
        $timeId->setLabel("Selecione seu time do coração: ");
        $timeId->setAttribs(array(
            'class' => 'form-control'
        ));
        $timeId->setRequired();
        $timeId->setDecorators(Form_Decorator::$simpleElementDecorators);
        $timeId->setMultiOptions($modelTime->fetchPairs());
        
        */
        
        // perfil_email
        $perfilEmail = new Zend_Form_Element_Text("perfil_email");
        $perfilEmail->setLabel("Informe seu E-mail: ");
        $perfilEmail->setAttribs(array(
            'class' => 'form-control',
            'placeholder' => 'Informe o e-mail'
        ));
        $perfilEmail->setRequired();
        /*
        $perfilEmail->addErrorMessages(array(
            Zend_Validate_EmailAddress::INVALID => "Email inválido!"
        ));
         * 
         */
        $perfilEmail->setDecorators(Form_Decorator::$simpleElementDecorators);
        $perfilEmail->addValidators(array(
            new Form_Validators_Email(),
            new Zend_Validate_EmailAddress()
        ));
        $this->addElement($perfilEmail);
        
        // submit
        $submit = new Zend_Form_Element_Submit("submit");
        $submit->setLabel("CADASTRAR");
        $submit->setAttrib("class", "btn btn-success btn-block");
        $this->addElement($submit);
        
    }
    
}
