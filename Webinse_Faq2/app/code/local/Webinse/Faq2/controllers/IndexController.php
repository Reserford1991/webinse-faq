<?php
/**
 * Webinse
 *
 * PHP Version 5.6.23
 *
 * @category    Webinse
 * @package     Webinse_Faq2
 * @author      Webinse Team <info@webinse.com>
 * @copyright   2017 Webinse Ltd. (https://www.webinse.com)
 * @license     http://opensource.org/licenses/OSL-3.0 The Open Software License 3.0
 */
/**
 * Frontend index controller
 *
 * @category    Webinse
 * @package     Webinse_Faq2
 * @author      Webinse Team <info@webinse.com>
 * @copyright   2017 Webinse Ltd. (https://www.webinse.com)
 * @license     http://opensource.org/licenses/OSL-3.0 The Open Software License 3.0
 */
class Webinse_Faq2_IndexController extends Mage_Core_Controller_Front_Action
{

    /**
     * For example you may visit the following URL http://example.com/frontName/index/getAllFaq
     */
    public function getAllFaqAction()
    {
        /**
         * @todo Load your collection
         */
        $collection = array();
        foreach($collection as $item){
            echo '<h2>' . $item->getQuestion() . '</h2>';
            echo '<p>' . $item->getAnswer() . '</p>';
            echo '<p>' . $item->getDate() . '</p>';
        }
    }

    /**
     * For example you may visit the following URL http://example.com/frontName/index/addNewFaq?question=question1&answer=answer1
     */
    public function addNewFaqAction()
    {
        /**
         * @todo here you must get all params sent by url
         */
        $params = array();
        $faqObject = Mage::getModel('your_model/faq');

        /**
         * @todo set params to faq object
         */
        $faqObject->save();

        echo 'New record with ID = ' . $faqObject->getId() . ' successfully added.';
    }

    /**
     * For example you may visit the following URL http://example.com/frontName/index/editFaqById/id/1
     */
    public function editFaqByIdAction()
    {
        /**
         * @todo here you must get id sent by url and load record by id
         */
        $faqObject = Mage::getModel('your_model/faq');

        /**
         * @todo change some field ('question' or 'answer') in object
         */
        $faqObject->save();
        echo 'Record with ID = ' . $faqObject->getId() . ' have been changed.';
    }

    /**
     * For example you may visit the following URL http://example.com/frontName/index/deleteFaqById/id/1
     */
    public function deleteFaqByIdAction()
    {
        /**
         * @todo here you must get id sent by url
         */
        $id = '';

        /**
         * @todo Load model by id
         */
        $faqObject = Mage::getModel('your_model/faq');

        /**
         * @todo Delete record
         */
        echo 'Record with ID = ' . $id . ' have been deleted.';
    }

}
