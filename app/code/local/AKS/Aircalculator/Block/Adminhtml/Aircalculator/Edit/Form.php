<?php

/**
 * Created by Alexandr Krivonos
 * Email: krausweb291985@gmail.com
 * Date: 11/7/15
 * Time: 5:51 PM
 *
 * Для вывода формы
 */
class AKS_Aircalculator_Block_Adminhtml_Aircalculator_Edit_Form extends Mage_Adminhtml_Block_Widget_Form
{
    protected function _prepareForm()
    {
        $helper = Mage::helper('aircalculator');
        $model = Mage::registry('current_aircalculator');

        // Инициализация формы. 'id' => 'edit_form' ... - уникальный HTML id формы (<form id="edit_form" ...)
        $form = new Varien_Data_Form(array(
                                         'id' => 'edit_form',
                                         'action' => $this->getUrl('*/*/save', array(
                                             'aircalculator_id' => $this->getRequest()->getParam('aircalculator_id')
                                         )),
                                         'method' => 'post',
                                         'enctype' => 'multipart/form-data'
                                     ));

        $this->setForm($form);

        $fieldset = $form->addFieldset('aircalculator_form', array('legend' => $helper->__('Информация о кондиционерах')));

        $fieldset->addField('aircalculator_field_key', 'text', array(
            'label' => $helper->__('Уникальный ключ'),
            'required' => true,
            'name' => 'aircalculator_field_key'
        ));
        $fieldset->addField('aircalculator_field_name', 'text', array(
            'label' => $helper->__('Название поля'),
            'required' => true,
            'name' => 'aircalculator_field_name'
        ));
        $fieldset->addField('aircalculator_field_value', 'text', array(
            'label' => $helper->__('Значение по умолчанию'),
            'required' => false,
            'name' => 'aircalculator_field_value'
        ));
        $fieldset->addField('aircalculator_field_type', 'text', array(
            'label' => $helper->__('Тип: 1 - текстовое поле, 2 - выбор, 3 - настройки'),
            'required' => true,
            'name' => 'aircalculator_field_type'
        ));
        $fieldset->addField('aircalculator_sort', 'text', array(
            'label' => $helper->__('Порядок'),
            'required' => false,
            'name' => 'aircalculator_sort'
        ));


        $form->setUseContainer(true);

        if($data = Mage::getSingleton('adminhtml/session')->getFormData()){
            $form->setValues($data);
        } else {
            $form->setValues($model->getData());
        }

        return parent::_prepareForm();
    }
}