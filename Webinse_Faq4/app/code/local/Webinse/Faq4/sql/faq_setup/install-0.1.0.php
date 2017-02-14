<?php
/**
 * Webinse
 *
 * PHP Version 5.6.23
 *
 * @category    Webinse
 * @package     Webinse_Faq4
 * @author      Webinse Team <info@webinse.com>
 * @copyright   2017 Webinse Ltd. (https://www.webinse.com)
 * @license     http://opensource.org/licenses/OSL-3.0 The Open Software License 3.0
 */
/**
 * Install db script
 *
 * @category    Webinse
 * @package     Webinse_Faq4
 * @author      Webinse Team <info@webinse.com>
 * @copyright   2017 Webinse Ltd. (https://www.webinse.com)
 * @license     http://opensource.org/licenses/OSL-3.0 The Open Software License 3.0
 */
/**
 * @var $this Mage_Core_Model_Resource_Setup
 */
 //echo 'Running This Upgrade: '.get_class($this)."\n <br /> \n";
$installer = $this;
$installer->startSetup();

/**
 * @todo add table webinse_faq4 (don't use method run(), it's deprecated method)
 *
 * entity_id    - int, not null, auto increment, primary key
 * question     - varchar
 * answer       - varchar
 * user_id      - int (current admin ID), set foreign key for this field (related with table - 'admin_user', field - 'user_id')
 */

$table = $installer->getConnection()->newTable($installer->getTable('faq4/faq'))
    ->addColumn('entity_id', Varien_Db_Ddl_Table::TYPE_INTEGER, 11, array(
        'unsigned' => true,
        'nullable' => false,
        'primary' => true,
        'identity' => true,
        ))
    ->addColumn('question', Varien_Db_Ddl_Table::TYPE_TEXT, 255, array(
        'nullable' => false,
        ))
    ->addColumn('answer', Varien_Db_Ddl_Table::TYPE_TEXT, 255, array(
        'nullable' => false,
        ))
    ->addColumn('user_id', Varien_Db_Ddl_Table::TYPE_INTEGER, 10, array(
        'unsigned' => true,
        'nullable' => false,
        ))
    ->addForeignKey(
                $installer->getFkName(
                    'faq4/faq',
                    'user_id',
                    'admin_user',
                    'user_id'
                ),
                'user_id',
                $installer->getTable('admin_user'), 
                'user_id', Varien_Db_Ddl_Table::ACTION_CASCADE, Varien_Db_Ddl_Table::ACTION_CASCADE
            )
            ;
$installer->getConnection()->createTable($table);
$installer->endSetup();