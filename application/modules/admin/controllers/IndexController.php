<?php

class Admin_IndexController extends Zend_Controller_Action {

    public function init() {
        
    }

    public function indexAction() {
        
        // numero de cadastros
        $modelPerfil = new Model_DbTable_Perfil();
        $report = $modelPerfil->getReportPerfis();
        $this->view->report = $report;
        
        // total de cadastros
        $total = $modelPerfil->getCount();        
        $this->view->total = $total->count;
        
    }

}

