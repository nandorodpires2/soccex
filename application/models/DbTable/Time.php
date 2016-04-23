<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Time
 *
 * @author Fernando
 */
class Model_DbTable_Time extends Zend_Db_Table_Abstract {

    protected $_name = "time";
    
    protected $_primary = "time_id";
    
    public function fetchPairs() {
        $options = array();
        
        $times = $this->fetchAll("time_ativo = 1", "time_nome asc");
        
        foreach ($times as $times) {
            $options[$times->time_id] = $times->time_nome;
        }
        
        return $options;
    }
    
}
