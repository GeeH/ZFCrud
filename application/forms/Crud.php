<?php

class Application_Form_Crud extends Zend_Form
{

    /**
     * Table Meta Data
     * @var array
     */
    private $_data;

    public function  __construct($options = null) {
        parent::__construct($options);
    }

    public function init()
    {

        $this->addPrefixPath('SDB_Form_Decorator', 'SDB/Form/Decorator', 'decorator');
        $this->setName('crud');

//        $title = new Zend_Form_Element_Select('title');
//        $title->setLabel('Title')
//              ->setMultiOptions(array('mr'=>'Mr', 'mrs'=>'Mrs'))
//              ->setRequired(true)->addValidator('NotEmpty', true);

        foreach($this->_data as $key=>$val)
        {

            $element{$key} = new Zend_Form_Element_Text($key);
            $element{$key}->setLabel($key);
            if($val['NULLABLE'] == false)
            {
                $element{$key}->setRequired(true)->addValidator('NotEmpty', true);

            }
            if($val['DATA_TYPE'] == 'varchar')
            {
                $element{$key}->addValidator('stringLength', false, array(1, $val['LENGTH']));
            }
            $this->addElement($element{$key});
        }

//                  ->setRequired(true)
//                  ->addValidator('NotEmpty');

       
        $submit = new Zend_Form_Element_Submit('submit');
        $submit->setLabel('Save');
        $this->addElement($submit);

        $this->clearDecorators();
        $this->addDecorator('FormElements')
         ->addDecorator('HtmlTag', array('tag' => '<ul>'))
         ->addDecorator('Form');

        $this->setElementDecorators(array(
            array('ViewHelper'),
            array('Errors'),
            array('Description'),
            array('Label', array('tag'=> 'div', 'class'=>"label-div", 'separator' => ' ')),
            array('HtmlTag', array('tag' => 'div', 'class'=>'element-group')),
            array('Clear')
        ));

        $submit->setDecorators(array(
            array('ViewHelper'),
            array('Description'),
            array('HtmlTag', array('tag' => 'div', 'class'=>'submit-group')),
            array('Clear')
        ));
        
    }

    protected function setData($data)
    {
        $this->_data = $data;
    }

}

