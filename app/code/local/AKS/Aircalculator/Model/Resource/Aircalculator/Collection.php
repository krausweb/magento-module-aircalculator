<?php

/**
 * Created by Alexandr Krivonos
 * Email: krausweb291985@gmail.com
 * Date: 10/29/15
 * Time: 10:21 PM
 */
class AKS_Aircalculator_Model_Resource_Aircalculator_Collection extends Mage_Core_Model_Mysql4_Collection_Abstract
{
    public function _construct(){
        parent::_construct();
        // инициализация класса коллекции объектов, в конструкторе которой - происходит инициализация исходной модели AKS_Aircalculator_Model_Aircalculator
        $this->_init("aircalculator/aircalculator");
    }
}