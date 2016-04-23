<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Email
 *
 * @author Fernando
 */
class Form_Validators_Email extends Zend_Validate_Abstract {
    
    const ALREADY_EXISTS = "alreadyExists";

    protected $_messageTemplates = array(    
        self::ALREADY_EXISTS => "Já existe um perfil cadastrado com este e-mail"
    );

    public function isValid($value, $context = null) {
        
        // verifica se já existe
        $modelPerfil = new Model_DbTable_Perfil();
        $perfil = $modelPerfil->fetchRow("perfil_email = '{$value}'");
        
        if (null !== $perfil) {
            $this->_error(self::ALREADY_EXISTS);
            return false;
        }
        return true;
        
    }
    
}