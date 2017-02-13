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
 * Adminhtml faq edit container block
 *
 * @category    Webinse
 * @package     Webinse_Faq4
 * @author      Webinse Team <info@webinse.com>
 * @copyright   2017 Webinse Ltd. (https://www.webinse.com)
 * @license     http://opensource.org/licenses/OSL-3.0 The Open Software License 3.0
 */
class Webinse_Faq4_Block_Adminhtml_Faq_Edit extends Mage_Adminhtml_Block_Widget_Form_Container
{

    /**
     * (Done)@todo set block group
     */

    public function __construct()
    {
        parent::__construct();

        /**
         * @todo set controller, then update buttons save & delete
         */
        $this-> _blockGroup= 'webinse_faq4';
        $this->_mode = 'edit';
        $this->_controller = 'adminhtml_faq';
        $faq_id = (int)Mage::registry('current_faq')->getId();
        $faq = Mage::getModel('faq4/faq')->load($faq_id);
        if (!Mage::registry('current_faq')->getId()) {
            /**
             *
             * @todo remove button delete
             */
            $this->_removeButton('delete');
        }
    }

    public function getHeaderText()
    {
        /**
         * @todo if register model is set, return 'Edit Faq', else return 'Add new Faq' by using helper
         */
        $faq = Mage::registry('current_faq');
        if ($faq->getId()) {
            return Mage::helper('webinse_faq4')->__("Edit Faq");
        } else {
            return Mage::helper('webinse_faq4')->__("Add new Faq");
        }
    }

    public function getHeaderCssClass()
    {
        return 'icon-head head-faq';
    }

}
