<?php

/**
 * Created by Alexandr Krivonos
 * Email: krausweb291985@gmail.com
 * Date: 10/30/15
 * Time: 3:14 PM
 */
class AKS_Aircalculator_Block_Aircalculator extends Mage_Core_Block_Template
{
    public function getAircalculatorCollection()
    {
        $calculatorCollection = Mage::getModel("aircalculator/aircalculator")->getCollection()->setOrder("aircalculator_field_key", "DESC");
        return $calculatorCollection;
    }
}