<?php

/**
 * Created by Alexandr Krivonos
 * Email: krausweb291985@gmail.com
 * Date: 10/31/15
 * Time: 4:19 PM
 *
 * Методы добавления, редактирования и удаления записей
 */
class AKS_Aircalculator_Adminhtml_AircalculatorController extends Mage_Adminhtml_Controller_Action
{
    public function indexAction(){
        //echo "Вы зашли в админку, для редакции калькулятора";

        // начало сбора шаблона + установка активности выбранного пункта меню
        $this->loadLayout()->_setActiveMenu('aircalculator');

        // createBlock, в качестве первого параметра - принимает строку блока [module]/[block] для формирования класса блока
        // добавление контента на layout
        $this->_addContent( $this->getLayout()->createBlock('aircalculator/adminhtml_aircalculator') );
        $this->renderLayout();
    }

    /**
     * добавление нового элемента
     * newAction/new/ - editAction/edit/ - saveAction/save/ - deleteAction/delete/ --- "зарезервированные" названия
     */
    public function newAction(){
        // переадресация на редактирование, потому-что всё заполнение идентично
        $this->_forward('edit');
    }

    /**
     * редактирование элемента
     */
    public function editAction(){
        // выбираем нужный элемент для редакции
        $id = (int)$this->getRequest()->getParam('aircalculator_id');
        Mage::register('current_aircalculator', Mage::getModel('aircalculator/aircalculator')->load($id));

        // подгрузка стандартного шаблона вывода информации
        $this->loadLayout()->_setActiveMenu('aircalculator');

        // подключаем в админку .css and .js файлы
        $this->getLayout()->getBlock('head')->addItem('skin_js', 'aircalculator/adminhtml/scripts.js');
        $this->getLayout()->getBlock('head')->addItem('skin_css', 'aircalculator/adminhtml/styles.css');

        $this->_addContent( $this->getLayout()->createBlock('aircalculator/adminhtml_aircalculator_edit') );
        $this->renderLayout();
    }

    /**
     * метод самого сохранения элемента
     */
    public function saveAction(){
        if($data = $this->getRequest()->getPost()){
            try {
                $model = Mage::getModel('aircalculator/aircalculator');
                $model->setData($data)->setAircalculator_id($this->getRequest()->getParam('aircalculator_id'));
                if(!$model->getCreated()){
                    $model->setCreated(now());
                }
                $model->save();

                /* если требуется обработка фото
                $id = $model->getAircalculator_id();

                if (isset($_FILES['image']['name']) && $_FILES['image']['name'] != '') {
                    $uploader = new Varien_File_Uploader('image');
                    $uploader->setAllowedExtensions(array('jpg', 'jpeg'));
                    $uploader->setAllowRenameFiles(false);
                    $uploader->setFilesDispersion(false);
                    $uploader->save($helper->getImagePath(), $id . '.jpg'); // Upload the image
                } else {
                    if (isset($data['image']['delete']) && $data['image']['delete'] == 1) {
                        @unlink($helper->getImagePath($id));
                    }
                }
                */

                Mage::getSingleton('adminhtml/session')->addSuccess($this->__('Данные успешно добавлены'));
                Mage::getSingleton('adminhtml/session')->setFormData(false);
                $this->_redirect('*/*/');
            } catch (Exception $e) {
                Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
                Mage::getSingleton('adminhtml/session')->setFormData($data);
                $this->_redirect('*/*/edit', array(
                    'aircalculator_id' => $this->getRequest()->getParam('aircalculator_id')
                ));
            }
            return;
        }
        Mage::getSingleton('adminhtml/session')->addError($this->__("Сохраняемый элемент не найден"));
        $this->_redirect("*/*/");
    }

    /**
     * метод самого удаления элемента
     */
    public function deleteAction(){
        if($id = $this->getRequest()->getParam("aircalculator_id")){
            try{
                // удаление
                Mage::getModel("aircalculator/aircalculator")->setId($id)->delete();
                Mage::getSingleton("adminhtml/session")->addSuccess($this->__("Элемент успешно удалён"));
            }catch(Exception $e){
                Mage::getSingleton("adminhtml/session")->addError($e->getMessage());
                $this->_redirect("*/*/edit", array('aircalculator_id'=>$id));
            }
        }
        $this->_redirect("*/*/");
    }


    /**
     * массовое удаление элемента/тов
     */
    public function massDeleteAction(){
        $aircalculator = $this->getRequest()->getParam("aircalculator", null);

        if(is_array($aircalculator) && sizeof($aircalculator)>0){
            try{
                foreach($aircalculator as $id){
                    Mage::getModel("aircalculator/aircalculator")->setId($id)->delete();
                }
                // текст в случае УСПЕХА. (вывод - в месте всех уведомлений - в левом верхнем углу)
                $this->_getSession()->addSuccess($this->__("Всего удалено %d элемента/ов", sizeof($aircalculator)));
            }catch (Exception $e){
                $this->_getSession()->addError($e->getMessage());
            }
        }else{
            // текст в случае ОШИБКИ(уведомление)
            $this->_getSession()->addError($this->__("Пожалуйста, выберите элементы"));
        }
        $this->_redirect("*/*");
    }
}