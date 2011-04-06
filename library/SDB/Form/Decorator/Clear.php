<?php
class SDB_Form_Decorator_Clear extends Zend_Form_Decorator_Abstract
{
    public function render($content)
    {
        return '<li>'.$content.'<div class="clear"></div></li>';
    }
}
?>
