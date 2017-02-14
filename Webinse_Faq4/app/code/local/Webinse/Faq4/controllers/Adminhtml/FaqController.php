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
 * Backend faq controller
 *
 * @category    Webinse
 * @package     Webinse_Faq4
 * @author      Webinse Team <info@webinse.com>
 * @copyright   2017 Webinse Ltd. (https://www.webinse.com)
 * @license     http://opensource.org/licenses/OSL-3.0 The Open Software License 3.0
 */
class Webinse_Faq4_Adminhtml_FaqController extends Mage_Adminhtml_Controller_Action
{
    /**
     * Init actions
     *
     * @return Webinse_Faq4_Model_Faq
     */
    protected function _initFaq()
    {
        $helper = Mage::helper('your_helper'); // @todo: you must set properly URI of your helper
        $this->_title($helper->__('Webinse'))->_title($helper->__('FAQ'));

        /**
         * you can see about register method there http://alanstorm.com/magento_registry_singleton_tutorial
         */
        Mage::register('current_faq', Mage::getModel('webinse_faq4/faq'));
        $faqId = $this->getRequest()->getParam('id');
        if (!is_null($faqId)) {
            Mage::registry('current_faq')->load($faqId);
        }
    }

    /**
     * Faq grid
     */
    public function indexAction()
    {
        $this->loadLayout();

        /**
         * @todo: set active menu
         */
        $this->renderLayout();
    }

    /**
     * Edit or create faq
     */
    public function newAction()
    {
        $this->_initFaq();

        /**
         * @todo: set active menu and add
         */
        /**
         * @todo: append faq block (webinse_faq4/adminhtml_faq_edit) to content
         *      (you may find in magento how do it, for example go to Mage -> Adminhtml -> controllers and open CustomerController)
         */
        $this->renderLayout();
    }

    /**
     * Edit faq action. Forward to new action.
     */
    public function editAction()
    {
        $this->_forward('new');
    }

    /**
     * Create or save faq.
     */
    public function saveAction()
    {
        /**
         * @todo save to db all params from post
         *      to 'user_id' field set id of the current administrator
         */
    }

    /**
     * Delete faq action
     */
    public function deleteAction()
    {
        /**
         * @todo delete faq by id, use try..catch blocks,
         *          set message about delete process to session and then set redirect to index action
         */
    }

}
