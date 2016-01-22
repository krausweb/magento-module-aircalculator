<?php

/**
 * Created by Alexandr Krivonos
 * Email: krausweb291985@gmail.com
 * Date: 11/7/15
 * Time: 5:40 PM
 *
 * Для редактирования элементов
 */
class AKS_Aircalculator_Block_Adminhtml_Aircalculator_Edit extends Mage_Adminhtml_Block_Widget_Form_Container
{
    public function _construct(){
        $this->_blockGroup = "aircalculator";
        $this->_controller = "adminhtml_aircalculator";
    }

    public function getHeaderText(){
        $helper = Mage::helper("aircalculator");
        $model = Mage::registry("current_aircalculator");

        if($model->getAircalculator_id()){
            return $helper->__("Редактирование элемента: %s", $this->escapeHtml($model->getAircalculator_field_name()) );
        }else{
            return $helper->__("Добавление нового элемента");
        }
    }

}