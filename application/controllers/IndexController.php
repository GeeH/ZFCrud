<?php

class IndexController extends Zend_Controller_Action
{

    public function init()
    {
    }

    public function indexAction()
    {
    }

    public function tableAction()
    {
        $table = Zend_Filter::filterStatic($this->_getParam('table'), 'Alpha');

        $AMDG = new Application_Model_DbTable_Generic(array(
            'name' => $table
        ));

        $this->view->table = $table;
        $this->view->data = $AMDG->getAllData();
        $this->view->meta = $AMDG->getDescription();
    }

    public function crudAction()
    {
        $table = Zend_Filter::filterStatic($this->_getParam('table'), 'Alpha');
        $id = Zend_Filter::filterStatic($this->_getParam('id'), 'StripTags');

        $AMDG = new Application_Model_DbTable_Generic(array(
            'name' => $table
        ));

        $form = new Application_Form_Crud(array(
            'data' => $AMDG->getDescription()
        ));
        
        if ($this->_request->isPost()) {
            $formData = $this->_request->getPost();
            if ($form->isValid($formData)) {
                // DO Add/Edit function here
                die('Success');
            } else {
                $form->populate($formData);
            }
        }

        $this->view->form = $form;
    }

}

