<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Perfil
 *
 * @author Fernando
 */
class Form_Perfil_Perfil extends Zend_Form {
    
    public function init() {
        
        // form id
        $this->setAttrib("id", "form-perfil-perfil");
        
        // form action
        $action = $this->getView()->url(array(
            'module' => 'perfil',
            'controller' => 'complete',
            'action' => 'index'
        ), 'default', true);
        $this->setAction($action);
        
        // time_id
        $modelTime = new Model_DbTable_Time();
        $timeId = new Zend_Form_Element_Select("time_id");
        $timeId->setLabel("Pra qual time você torce? ");
        $timeId->setRequired();
        $timeId->addErrorMessages(array(
        Zend_Validate_NotEmpty::IS_EMPTY => "Escolha um time!"
        ));
        $timeId->setDecorators(Form_Decorator::$simpleElementDecorators);
        $this->addElement($timeId);        
        $timeId->setLabel("Para qual time voce torce?");
        $timeId->setAttribs(array(
            'class' => 'form-control'
        ));
        $timeId->setRequired();
        $timeId->setDecorators(Form_Decorator::$simpleElementDecorators);
        $timeId->setMultiOptions($modelTime->fetchPairs());
        
        // perfil_nome
        $perfilNome = new Zend_Form_Element_Text("perfil_nome");
        $perfilNome->setLabel("Nome: ");
        $perfilNome->setAttribs(array(
            'class' => 'form-control',
            'placeholder' => 'Informe o nome completo'
        ));
        $perfilNome->setRequired();
        $perfilNome->setDecorators(Form_Decorator::$simpleElementDecorators);        
        $this->addElement($perfilNome);
        
        // perfil_email
        $perfilEmail = new Zend_Form_Element_Text("perfil_email");
        $perfilEmail->setLabel("E-mail: ");
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
        
        // perfil_email
        $perfilDataNascimento = new Zend_Form_Element_Text("perfil_data_nascimento");
        $perfilDataNascimento->setLabel("Data de Nascimento: ");
        $perfilDataNascimento->setAttribs(array(
            'class' => 'form-control',
            'placeholder' => 'Informe a data de nascimento'
        ));
        $perfilDataNascimento->setRequired();
        $perfilDataNascimento->setDecorators(Form_Decorator::$simpleElementDecorators);
        $this->addElement($perfilDataNascimento);
        
        // submit
        $submit = new Zend_Form_Element_Submit("submit");
        $submit->setLabel("COMPLETAR PERFIL");
        $submit->setAttrib("class", "btn btn-success btn-block");
        $this->addElement($submit);
        
    }
    
}
