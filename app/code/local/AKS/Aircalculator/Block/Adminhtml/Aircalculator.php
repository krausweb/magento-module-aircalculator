<?php

/**
 * Created by Alexandr Krivonos
 * Email: krausweb291985@gmail.com
 * Date: 11/2/15
 * Time: 5:59 PM
 */
class AKS_Aircalculator_Block_Adminhtml_Aircalculator extends Mage_Adminhtml_Block_Widget_Grid_Container
{
    public function _construct(){
        parent::_construct();

        $helper = Mage::helper("aircalculator");
        $this->_blockGroup = "aircalculator";
        $this->_controller = "adminhtml_aircalculator";

        $this->_headerText = $helper->__("Калькуляр кондиционеров - управление <br/>
            Не удалять обязательные ключи: area, ceiling_height, windows_orientation, count_people, count_tv_pc, power_conditioner");
        $this->_addButtonLabel = $helper->__("Создать новое поле");
    }
}