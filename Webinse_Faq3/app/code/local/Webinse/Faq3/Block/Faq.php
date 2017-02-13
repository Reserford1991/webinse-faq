<?php
/**
 * Webinse
 *
 * PHP Version 5.6.23
 *
 * @category    Webinse
 * @package     Webinse_Faq3
 * @author      Webinse Team <info@webinse.com>
 * @copyright   2017 Webinse Ltd. (https://www.webinse.com)
 * @license     http://opensource.org/licenses/OSL-3.0 The Open Software License 3.0
 */
/**
 * Frontend block FAQ
 *
 * @category    Webinse
 * @package     Webinse_Faq3
 * @author      Webinse Team <info@webinse.com>
 * @copyright   2017 Webinse Ltd. (https://www.webinse.com)
 * @license     http://opensource.org/licenses/OSL-3.0 The Open Software License 3.0
 */
class Webinse_Faq3_Block_Faq extends Mage_Core_Block_Template
{

    /**
     * Retrieve all faq sorted by date
     * 
     * @return Webinse_Faq3_Model_Resource_Faq_Collection
     */
     public function getAllFaq()
    {
        /**
         * @todo get collection of all faq
         */
        $collection = array();
        $collection = Mage::getModel('faq3/faq')->getCollection()
            ->setOrder('date','desc');
        return $collection;
    }
        /**
            * Retrieve faq by id
            *
            * @return Webinse_Faq3_Model_Faq
        */
    public function getFaqById()
    {
            /**
                * @todo get params from url and load model
            */
        $id = $this->getRequest()->getParam('id');
            $faqObject = Mage::getModel('faq3/faq');
            $faqObject->load($id);
        return $faqObject;
    }  
}    