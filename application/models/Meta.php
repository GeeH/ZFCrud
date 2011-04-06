<?php
class Application_Model_Meta extends Zend_Db_Table_Abstract
{

    public function getTables()
    {
        return ($this->getAdapter()->listTables());
    }

    public function describeTable($table)
    {
        return $this->getAdapter()->describeTable($table);
    }
}

