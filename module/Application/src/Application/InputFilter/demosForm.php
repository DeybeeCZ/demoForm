<?php

namespace Application\InputFilter;

use Zend\InputFilter\InputFilter;
use Zend\InputFilter\Input;
use Zend\Validator\StringLength;
use Zend\Filter\StringTrim;

class demosForm extends InputFilter {

    public function __construct() {
        $this->add(
                array(
                    'name' => 'name',
                    'required' => TRUE,
                    'filters' => array(
                        array('name' => 'StripTags'),
                    ),
                    'validators' => array(
                        array(
                            'name' => 'stringLength',
                            'options' => array(
                                'min'=>5,
                                'max' => 20,
                            )
                        )
                    )
                )
        );


        $e = new Input('password');
        $e->setRequired(true);
        $e->getValidatorChain()->attach(new StringLength(array(
            'encoding' => 'UTF-8',
            'min' => 6,
            'max' => 32,
        )));
        $e->getFilterChain()->attach(new StringTrim());
        $this->add($e);
    }

}
