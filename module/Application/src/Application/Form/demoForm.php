<?php

namespace Application\Form;

use Zend\Form\Form,
    Zend\Form\Element;

class demoForm extends Form {

    public function __construct($name = null, $options = array()) {
        //Formulario
        //Contruimos el formulario en base al padre
        parent::__construct('login', $options);

        //seteamos el actiond el formulario
        $this->setAttributes(array('action' => '/application/index/login'));

        //Elementos
        //Creamos un elemento de tipo texto y seteamos su atributo name
        $e = new Element\Text('name');

        //Seteamos los atributos del elemento
        $e->setAttributes(array(
            'id' => 'txt_name',
            'class' => 'txt_name_clase',
        ));
        //seteamos las opciones del elemento
        $e->setOptions(array('label' => 'Usuario: '));
        //añadimos al formulario
        $this->add($e);

        //Definimos los parametros del elemento a generar
        $e = array(
            'type' => 'password',
            'name' => 'password',
            'attributes' => array(
                'id' => `txt_password`,
                'class' => 'txt_password_clase',
            ),
            'options' => array(
                'label' => 'Clave: '
            )
        );
        //agregamo el elemento
        $this->add($e);
        
        //Agregando un boton
        $e = new Element\Submit('enviar');
        $e->setAttributes(array(
            'id' => `btn_login`,
            'value' => 'Enviar',
            'class' => 'btn_login'
        ));
        $this->add($e);
    }

}
