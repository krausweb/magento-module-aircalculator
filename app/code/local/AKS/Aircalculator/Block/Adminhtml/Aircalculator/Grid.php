<?php

/**
 * Created by Alexandr Krivonos
 * Email: krausweb291985@gmail.com
 * Date: 11/2/15
 * Time: 7:10 PM
 */
class AKS_Aircalculator_Block_Adminhtml_Aircalculator_Grid extends Mage_Adminhtml_Block_Widget_Grid
{
    protected function _prepareCollection(){
        $this->setCollection( Mage::getModel("aircalculator/aircalculator")->getCollection() );
        return parent::_prepareCollection();
    }

    /**
     * колонки, которые будут показываться в гриде
     * @return $this
     * @throws Exception
     */
    protected function _prepareColumns(){
        $helper = Mage::helper("aircalculator");

        $this->setDefaultSort('aircalculator_sort');
        $this->setDefaultDir('ASC');

        // список колонок можно увидеть в методе: \Mage_Adminhtml_Block_Widget_Grid_Column::_getRendererByType
        // или app/code/core/Mage/Adminhtml/Block/Widget/Grid/Column.php:207
        $this->addColumn('aircalculator_id', array(
            'header' => $helper->__("ID")
            , 'index' => 'aircalculator_id'
        ));
        // addColumn первым параметром принимает название название колонки,
        // а вторым параметром — массив с данными о колонке, где index — название колонки в базе данных, а type — тип колонки
        $this->addColumn('aircalculator_field_key', array(
            'header' => $helper->__("Ключ")
            , 'index' => 'aircalculator_field_key'
            , 'type' => 'text'
        ));
        $this->addColumn('aircalculator_field_name', array(
            'header' => $helper->__("Название")
            , 'index' => 'aircalculator_field_name'
            , 'type' => 'text'
        ));
        $this->addColumn('aircalculator_field_value', array(
            'header' => $helper->__("Значение")
            , 'index' => 'aircalculator_field_value'
            , 'type' => 'text'
        ));
        $this->addColumn('aircalculator_field_type', array(
            'header' => $helper->__("Тип поля")
            , 'index' => 'aircalculator_field_type'
            , 'type' => 'text'
        ));
        $this->addColumn('aircalculator_sort', array(
            'header' => $helper->__("Порядок")
            , 'index' => 'aircalculator_sort'
            , 'type' => 'text'
        ));

        return parent::_prepareColumns();
    }

    protected function _prepareMassaction(){
        $this->setMassactionIdField("aircalculator_id");
        $this->getMassactionBlock()->setFormFieldName("aircalculator");

        // $this->__("Удалить") - текст в селекте с действиями
        // $this->getUrl("*/*/massDelete") - куда отправлять/какой обработчик
        $this->getMassactionBlock()->addItem('delete',array(
            'label' => $this->__("Удалить")
            , 'url' => $this->getUrl("*/*/massDelete")
        ));

        /* Для информативности:
        Пример зависимых селектов, в массовых операциях - можно посмотреть в классе грида
        Mage_Adminhtml_Block_Catalog_Product_Grid */

        return $this;
    }

    /**
     * для перехода в редакцию через клик пользователя по строке
     * @param $model
     * @return string
     */
    public function getRowUrl($model){
        return $this->getUrl("*/*/edit", array("aircalculator_id" => $model->getAircalculator_id() ));
    }
}