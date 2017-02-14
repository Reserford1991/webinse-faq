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
 * Frontend index controller
 *
 * @category    Webinse
 * @package     Webinse_Faq3
 * @author      Webinse Team <info@webinse.com>
 * @copyright   2017 Webinse Ltd. (https://www.webinse.com)
 * @license     http://opensource.org/licenses/OSL-3.0 The Open Software License 3.0
 */
class Webinse_Faq3_IndexController extends Mage_Core_Controller_Front_Action
{

    private function _initLayout()
    {
        $this->loadLayout()->renderLayout();
    }

    /**
     * This method is output all questions and answers to them
     * For example you may visit the following URL http://example.com/frontName/index/getAllFaq
     */
    public function getAllFaqAction()
    {
        $this->_initLayout();
    }

    /**
     * Render form to add new faq
     */
    public function addNewFaqAction()
    {
        // the same form is used to create and edit
        $this->_forward('editFaqById');
    }

    /**
     * Render form to edit faq
     */
    public function editFaqByIdAction()
    {
        // @todo here you must load and render layout
    }

    /**
     * Save faq by using id or add new record
     */
    public function saveAction()
    {
        /**
         * @todo here you must realize create or edit logic
         *      if id exist in post, you can load model by using it otherwise create new record
         *      add message about successful saving or editing by using session (see models such as Mage_Core_Model_Session and extended classes)
         */
    }

    /**
     * Delete faq by id
     */
    public function deleteAction()
    {
        /**
         * @todo get id sent by url and delete faq
         *       add message by using session
         */
    }

}
