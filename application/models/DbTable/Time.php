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
class Model_DbTable_Time extends Model_DbTable_Abstract {

    protected $_name = "time";
    
    protected $_primary = "time_id";
    
    protected function getQueryAll() {
        $select = parent::getQueryAll();
        $select->order("time_divisao ASC");
        $select->order("time_nome ASC");
        return $select;
    }

    public function getTimesByDivisao($divisao = null) {
        $select = $this->getQueryAll()->where("time_ativo = ?", 1);
        
        if ($divisao) {
            $select->where("time_divisao = ?", $divisao);
        }       
        
        return $this->fetchAll($select);
    }

    public function fetchPairs() {
        $options = array();
        
        $times = $this->fetchAll("time_ativo = 1", "time_nome asc");
        
        foreach ($times as $times) {
            $options[$times->time_id] = $times->time_nome;
        }
        
        return $options;
    }
    
}
