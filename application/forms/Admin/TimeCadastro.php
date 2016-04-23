<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of TimeCadastro
 *
 * @author Fernando
 */
class Form_Admin_TimeCadastro extends Zend_Form {
    
    public function init() {
        
        // time_nome
        $timeNome = new Zend_Form_Element_Text("time_nome");
        $timeNome->setLabel("Nome: ");
        $timeNome->setRequired();
        $timeNome->setAttribs(array(
            'class' => 'form-control'
        ));
        $this->addElement($timeNome);
        
        // time_escudo
        $timeEscudo = new Zend_Form_Element_File("time_escudo");
        $timeEscudo->setLabel("Escudo: ");
        ///$timeEscudo->addDecorators(App_Forms_Decorators::$ElementDecoratorFile);
        $timeEscudo->setAttribs(array(
            'class' => 'filestyle',                      
            'data-buttonText' => 'Selecione o escudo',
            'data-iconName' => 'fa fa-folder-open-o'
        ));
        $timeEscudo->setRequired();
        $timeEscudo->setDestination(Zend_Registry::get('config')->time->escudo->path);
        $timeEscudo->addValidators(array(
            array('Extension', false, 'jpg,jpeg,png'),
            //array('Size', false, '100KB'),
        ));
        $this->addElement($timeEscudo);
        
        // time_divisao
        $timeDivisao = new Zend_Form_Element_Text("time_divisao");
        $timeDivisao->setLabel("Divisão: ");
        $timeDivisao->setRequired();
        $timeDivisao->setAttribs(array(
            'class' => 'form-control'
        ));
        $this->addElement($timeDivisao);
        
        // pais_id
        $paisId = new Zend_Form_Element_Hidden("pais_id");
        $paisId->setValue(1);
        $this->addElement($paisId);
        
        // submit
        $submit = new Zend_Form_Element_Submit("submit");
        $submit->setLabel("Cadastrar");
        $submit->setAttribs(array(
            'class' => 'btn btn-primary btn-block'
        ));
        $this->addElement($submit);
        
    }
    
}
