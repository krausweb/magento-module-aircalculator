<?php

/**
 * Created by Alexandr Krivonos
 * Email: krausweb291985@gmail.com
 * Date: 10/29/15
 * Time: 10:15 PM
 */
class AKS_Aircalculator_Model_Resource_Aircalculator extends Mage_Core_Model_Mysql4_Abstract
{
    public function _construct(){
        // первым параметром является путь к названию нужной таблицы, а вторым — поле, использующееся в качестве первичного ключа (PRIMARY KEY) таблицы
        $this->_init("aircalculator/table_aircalculator", "aircalculator_id");
    }
}