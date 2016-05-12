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
class Model_DbTable_Perfil extends Model_DbTable_Abstract {
    
    protected $_name = "perfil";
    
    protected $_primary = "perfil_id";
    
    protected function getQueryAll() {
        $select = parent::getQueryAll();
        
        $select->joinInner('time', 'perfil.time_id = time.time_id', array('*'));
        
        return $select;        
    }
    
    public function getReportPerfis() {
        $select = $this->getQueryAll();
        $select->columns(array(
            'time.time_nome',
            'cadastros' => new Zend_Db_Expr('count(*)')
        ));
        $select->group('time.time_id');
        $select->order('count(*) DESC');
        
        return $this->fetchAll($select);
    }
    
}
