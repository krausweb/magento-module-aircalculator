<?php
/**
 * Created by Alexandr Krivonos
 * Email: krausweb291985@gmail.com
 * Date: 10/23/15
 * Time: 10:24 AM
 */
class AKS_Aircalculator_IndexController extends Mage_Core_Controller_Front_Action
{
    /**
     * Инициализация Layout и AngularJS
     */
    public function indexAction(){
        // get - title/keywords/description
        $title = $description = $keywords = '';
        $aircalculator_data = Mage::getModel('aircalculator/aircalculator')->getCollection();
        foreach ($aircalculator_data as $key => $aircalculator_res) {
            if($aircalculator_res->getAircalculator_field_key() == 'settings_title') $title = $aircalculator_res->getAircalculator_field_value();
            elseif($aircalculator_res->getAircalculator_field_key() == 'settings_description') $description = $aircalculator_res->getAircalculator_field_value();
            elseif($aircalculator_res->getAircalculator_field_key() == 'settings_keywords') $keywords = $aircalculator_res->getAircalculator_field_value();
        }
        ///////////

        $this->loadLayout();
        $this->getLayout()->getBlock('head')->addData(array('title'=>$title, 'description'=>$description, 'keywords'=>$keywords) );
        $this->getLayout()->getBlock('head')->addJs('angularjs/angular.js');
        $this->getLayout()->getBlock('head')->addJs('angularjs/angular-route.js');
        $this->getLayout()->getBlock('head')->addJs('angularjs/angular-resource.js');
        $this->getLayout()->getBlock('head')->addItem('skin_js', 'js/aircalculator/aircalculator_angular.js');
        $this->renderLayout();
    }

    /**
     * Основные данные. Вернет список ВСЕХ данных для работы калькулятора
     * @return array[objects]
     */
    public function getAjaxIndexDataAction(){
        $aircalculator_data = Mage::getModel('aircalculator/aircalculator')->getCollection();
        $aircalculator_data->getSelect()->order('aircalculator_sort ASC');
        exit(json_encode($aircalculator_data->getData()));
    }
}