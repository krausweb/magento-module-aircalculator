<?php

/**
 * Created by Alexandr Krivonos
 * Email: krausweb291985@gmail.com
 * Date: 10/22/15
 * Time: 12:23 AM
 *
 * Хелпер-заглушка - Нужен для разных целей.
 * Без него не будет работать Админка!!!
 */
class AKS_Aircalculator_Helper_Data extends Mage_Core_Helper_Abstract
{


    ///////////////////////////////////////////////////////
    /* доп методы !!!

    /**
     * Доп метод - для получения пути к фото
     * @param int $id
     * @return string
     *
    public function getImagePath($id = 0)
    {
        $path = Mage::getBaseDir('media') . '/aircalculator';
        if ($id) {
            return "{$path}/{$id}.jpg";
        } else {
            return $path;
        }
    }

    /**
     * Доп метод - для получения url к фото
     * @param int $id
     * @return string
     *
    public function getImageUrl($id = 0)
    {
        $url = Mage::getBaseUrl(Mage_Core_Model_Store::URL_TYPE_MEDIA) . 'aircalculator/';
        if ($id) {
            return $url . $id . '.jpg';
        } else {
            return $url;
        }
    }

    /**
     * подготовка "ссылки" в "нормальный" вид для дальнейшего сохранения в БД
     * @param $url
     * @return string
     *
    public function prepareUrl($url)
    {
        return trim(preg_replace('/-+/', '-', preg_replace('/[^a-z0-9]/sUi', '-', strtolower(trim($url)))), '-');
    }
    */////////////////////////////////
}