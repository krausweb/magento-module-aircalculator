<?php
/**
 * Created by Alexandr Krivonos
 * Email: krausweb291985@gmail.com
 * Date: 10/24/15
 * Time: 4:21 PM
 *
 * Create table and set default data for storage info about air conditioner
 */


$installer = $this;
$aircalculator = $installer->getTable('aircalculator/table_aircalculator');
// НАЧАЛО установки
$installer->startSetup();

// для удаления старой таблицы
$installer->getConnection()->dropTable($aircalculator);

// создаем структуру новой таблицы
$table = $installer->getConnection()
    ->newTable($aircalculator)
    ->addColumn('aircalculator_id', Varien_Db_Ddl_Table::TYPE_INTEGER, null, array('identity'  => true,
                                                                                   'nullable'  => false,
                                                                                   'primary'   => true))
    ->addColumn('aircalculator_field_key', Varien_Db_Ddl_Table::TYPE_TEXT, 255, array('nullable'  => false,
                                                                                      'unique' => true))
    ->addColumn('aircalculator_field_name', Varien_Db_Ddl_Table::TYPE_TEXT, 255, array('nullable'  => true))
    ->addColumn('aircalculator_field_value', Varien_Db_Ddl_Table::TYPE_TEXT, null, array('nullable'  => true))
    ->addColumn('aircalculator_field_type', Varien_Db_Ddl_Table::TYPE_INTEGER, 1, array('nullable'  => false,
                                                                                           'unsigned' => true,
                                                                                           'default' => 1,
                                                                                           'comment' => '1 - input-text, 2 - select, 3 - settings'))
    ->addColumn('aircalculator_sort', Varien_Db_Ddl_Table::TYPE_INTEGER, 1, array('nullable' => true,
                                                                                  'default' => 1))
    ->addIndex('idx_aircalculator_field_key', 'aircalculator_field_key')
    ->addIndex('idx_aircalculator_field_type', 'aircalculator_field_type')
    ->addIndex('idx_aircalculator_sort', 'aircalculator_sort');

// само создание таблицы
$installer->getConnection()->createTable($table);
// КОНЕЦ установки
$installer->endSetup();

// это будет работать только в для БД типа InnoDB
$table = $installer->getConnection()->query("INSERT INTO aks_aircalculator
                                                  ( aircalculator_field_key, aircalculator_field_name, aircalculator_field_value, aircalculator_field_type, aircalculator_sort)
                                                VALUES('area', 'Площадь помещения:', NULL, 1, 1)
                                                    , ('ceiling_height', 'Высота потолка:', '2.8', 1, 2)
                                                    , ('windows_orientation', 'Ориентация окон:', '[{\"id\":1, \"name\":\"Север\", \"val\":0.85, \"active\":false}, {\"id\":2, \"name\":\"Юг\", \"val\":1.23, \"active\":true}, {\"id\":3, \"name\":\"Запад\", \"val\":1.1, \"active\":false}, {\"id\":4, \"name\":\"Восток\", \"val\":1, \"active\":false}, {\"id\":5, \"name\":\"Северо-запад\", \"val\":1, \"active\":false}, {\"id\":6, \"name\":\"Юго-запад\", \"val\":1.23, \"active\":false}, {\"id\":7, \"name\":\"Юго-восток\", \"val\":1.1, \"active\":false}, {\"id\":8, \"name\":\"Северо-восток\", \"val\":0.85, \"active\":false}]', 2, 3)
                                                    , ('count_tv_pc', 'Количество телевизоров и компъютеров:', NULL, 1, 4)
                                                    , ('count_people', 'Количество людей:', NULL, 1, 5)
                                                    , ('power_conditioner', 'Мощность кондиционера:', NULL, 1, 6)
                                                    , ('settings_h1', 'h1', 'Калькулятор мощности кондиционера', 3, 7)
                                                    , ('settings_title', 'title', 'Калькулятор мощности кондиционера', 3, 8)
                                                    , ('settings_description', 'description', 'Калькулятор мощности кондиционера, расчет мощности, кондиционер', 3, 9)
                                                    , ('settings_keywords', 'keywords', 'Калькулятор, мощность, кондиционер', 3, 10);");