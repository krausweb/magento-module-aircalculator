<?php
/**
 * Created by Alexandr Krivonos
 * Email: krausweb291985@gmail.com
 * Date: 10/21/15
 * Time: 11:07 PM
 */
class AKS_Aircalculator_Model_Aircalculator extends Mage_Core_Model_Abstract
{
    public function _construct(){
        parent::_construct();
        // В итоге при этой инициализации - будет инициализироваться класс AKS_Aircalculator_Model_Resource_Aircalculator
        $this->_init("aircalculator/aircalculator");
    }

    ///////////////////////////////////////////////////////
    /* доп функции

    /**
     * Доп функция - для удаления изображения при удалении элемента
     * @return Mage_Core_Model_Abstract
     *
    protected function _afterDelete()
    {
        $helper = Mage::helper('aircalculator');
        @unlink($helper->getImagePath($this->getAircalculator_id()));
        return parent::_afterDelete();
    }

    /**
     * Доп метод - для работы с фото
     * @return null
     *
    public function getImageUrl()
    {
        $helper = Mage::helper('aircalculator');
        if ($this->getAircalculator_id() && file_exists($helper->getImagePath($this->getAircalculator_id()))) {
            return $helper->getImageUrl($this->getAircalculator_id());
        }
        return null;
    }

    /**
     * для сохранения ссылки с предварительной обработкой(prepareUrl()) - если не пришла инфа из поля - возмется из поля с ключем (aircalculator.aircalculator_field_key)
     * @return Mage_Core_Model_Abstract
     *
    protected function _beforeSave()
    {
        $helper = Mage::helper('aircalculator');

        if (!$this->getData('aircalculator_link')) {
            $this->setData('aircalculator_link', $helper->prepareUrl($this->getAircalculator_field_key()));
        } else {
            $this->setData('aircalculator_link', $helper->prepareUrl($this->getData('aircalculator_link')));
        }
        return parent::_beforeSave();
    }
    *//////////////////////////////////////////////////////
}