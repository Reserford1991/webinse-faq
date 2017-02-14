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
        $helper = Mage::helper('webinse_faq4'); // @todo: you must set properly URI of your helper
        $this->_title($helper->__('Webinse'))->_title($helper->__('FAQ'));

        /**
         * you can see about register method there http://alanstorm.com/magento_registry_singleton_tutorial
         */
        Mage::register('current_faq', Mage::getModel('faq4/faq'));
        $faqId = (int)$this->getRequest()->getParam('id');
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
        $this->_setActiveMenu('webinse_faq4');
        $this->renderLayout();
    }

    /**
     * Edit or create faq
     */
    public function newAction()
    {
    
        $this->_initFaq();

        // /**
         // * @todo: set active menu and add
         // */
        
        $this->loadLayout();
        $this->_setActiveMenu('webinse_faq4');
        /**
         * @todo: append faq block (webinse_faq4/adminhtml_faq_edit) to content
         *      (you may find in magento how do it, for example go to Mage -> Adminhtml -> controllers and open CustomerController)
         */
        $this->_addContent($this->getLayout()->createBlock('webinse_faq4/adminhtml_faq_edit'));
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
        $data = $this->getRequest()->getPost();
        if (!empty($data)) {
            try {
                $user_id = Mage::getSingleton('admin/session')->getUser()->getUserId();
                Mage::getModel('faq4/faq')->setData($data)->setUser_id($user_id)
                    ->save();
                Mage::getSingleton('adminhtml/session')->addSuccess(Mage::helper('webinse_faq4')->__('Faq successfully saved'));
            } catch (Mage_Core_Exception $e) {
                Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
            } catch (Exception $e) {
                Mage::logException($e);
                Mage::getSingleton('adminhtml/session')->addError($this->__('Somethings went wrong'));
            }
        }
        return $this->_redirect('*/*/');
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
        $tipId = $this->getRequest()->getParam('id', false);
 
        try {
            Mage::getModel('webinse_faq4/faq')->setId($tipId)->delete();
            Mage::getSingleton('adminhtml/session')->addSuccess(Mage::helper('webinse_faq4')->__('Faq successfully deleted'));
            return $this->_redirect('*/*/');
        } catch (Mage_Core_Exception $e){
            Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
        } catch (Exception $e) {
            Mage::logException($e);
            Mage::getSingleton('adminhtml/session')->addError($this->__('Somethings went wrong'));
        }
 
        $this->_redirectReferer();
    }
}
