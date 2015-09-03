<?php

/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Application\Form\demoForm;
use Application\InputFilter\demosForm;

class IndexController extends AbstractActionController {

    public function indexAction() {

        $form = new demoForm();
        return new ViewModel(array('login' => $form,'flashMessages' => $this->flashMessenger()->getMessages()));
//        return new ViewModel();
    }
    
    public function loginAction() {
        
        $form = new demoForm();
        $inputFilter = new demosForm();
        $data = $this->getRequest()->getPost();
      
        $form->setData($data);
        $form->setInputFilter($inputFilter);
        if ($form->isValid()) {
//            echo 'is valid';
//            exit();
        } else {
//            var_dump($form->getMessages());
//            exit();
            $this->flashMessenger()->addMessage(json_encode($form->getMessages()));
//            //f029a90471a4
            return $this->redirect()->toUrl('/application/index');
        }
    }

}
