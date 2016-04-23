<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Times
 *
 * @author Fernando
 */
class Zend_View_Helper_Times extends Zend_View_Helper_Abstract {
    
    public function times($divisao) {        
        $modelTime = new Model_DbTable_Time();
        $times = $modelTime->getTimesByDivisao($divisao);        
        return $times;
    }
    
}
