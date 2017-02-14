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
     * @todo set block group
     */

    public function __construct()
    {
        parent::__construct();

        /**
         * @todo set controller, then update buttons save & delete
         */
        if (!Mage::registry('current_faq')->getId()) {
            /**
             * 
             * @todo remove button delete
             */
        }
    }

    public function getHeaderText()
    {
        /**
         * @todo if register model is set, return 'Edit Faq', else return 'Add new Faq' by using helper
         */
    }

    public function getHeaderCssClass()
    {
        return 'icon-head head-faq';
    }

}
