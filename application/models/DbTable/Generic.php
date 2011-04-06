<?php

class Application_Model_DbTable_Generic extends Zend_Db_Table_Abstract
{

    protected $_name;

    public function getAllData()
    {
        $select = $this->select();
        //$select->limit();
        return $select->query()->fetchAll();
    }

    public function getDescription()
    {
        return $this->getAdapter()->describeTable($this->_name);
    }
}

