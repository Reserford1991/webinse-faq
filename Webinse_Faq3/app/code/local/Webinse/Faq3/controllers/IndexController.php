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
        **/
    public function getAllFaqAction()
    {
        $this->_initLayout();
    }
        
    /**
     * Render form to edit faq
     */
    public function addNewFaqAction()
    {
        // the same form is used to create and edit
        //$this->_forward('editFaqById');
        $this->_forward('editFaqById');
    }
        
/**
* Render form to edit faq
*/
    public function editFaqByIdAction()
    {
        // @todo here you must load and render layout
        $this->loadLayout();
        $this->renderLayout();
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
        if ($id = $this->getRequest()->getParam('id') == 0)
        {
            $data = $this->getRequest()->getPost();
            $session= Mage::getSingleton('core/session');
            $faq= Mage::getModel('faq3/faq');
            $faq->addData($data);
            $faq->setData('date', date('Y-m-d H:i:s'));
            try{
                $faq->save();
                $session->addSuccess('Add a faq sucessfully');
            }
            catch(Exception $e){
                $session->addError('Add Error');
            }
        }
        else
        {
            $data = $this->getRequest()->getPost();
            $session= Mage::getSingleton('core/session');
            $FaqID = $this->getRequest()->getParam('id');    // getting element ID from URL
            $faq = Mage::getModel('faq3/faq');
            $faq->load($FaqID);
            $faq->addData($data);
			$faq->setDate(date('Y-m-d H:i:s'));
            try{
                $faq->save();
                $session->addSuccess('Add a faq sucessfully');
            }
            catch(Exception $e){
                $session->addError('Add Error');
            }
        }
        $this->_redirect('faq3/index/getAllFaq');
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
        $id = $this->getRequest()->getParam('id');
        try {
            Mage::getModel('faq3/faq')->setId($id)->delete();
        } 
        catch(Exception $e) {
            Mage::getSingleton('core/session')->addError($this->__('Error occurred: %s',$e->getMessage()));
            $this->_redirectReferer();
            return;
        }
        $this->_redirect('faq3/index/getAllFaq');
        Mage::getSingleton('core/session')->addSuccess($this->__('Successfully deleted id %s',$id));
    }
        
}
