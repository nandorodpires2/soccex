<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Decorator
 *
 * @author Fernando
 */
class Form_Decorator {
    public static $simpleElementDecorators = array(
        array('ViewHelper'),
        array('Label', array('tag' => 'span', 'escape' => false, 'requiredPrefix' => '<span class="required">* </span>')),
        array('Description', array('tag' => 'div', 'class' => 'desc-item')),
        array('Errors', array('class' => 'alert alert-danger')),
        array('HtmlTag', array('tag' => 'div', 'class' => 'form-group'))
    );
}
