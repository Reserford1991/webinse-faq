<?php
/**
 * Webinse
 *
 * PHP Version 5.6.23
 *
 * @category    Webinse
 * @package     Webinse_Faq1
 * @author      Webinse Team <info@webinse.com>
 * @copyright   2017 Webinse Ltd. (https://www.webinse.com)
 * @license     http://opensource.org/licenses/OSL-3.0 The Open Software License 3.0
 */
/**
 * Frontend index controller
 *
 * @category    Webinse
 * @package     Webinse_Faq1
 * @author      Webinse Team <info@webinse.com>
 * @copyright   2017 Webinse Ltd. (https://www.webinse.com)
 * @license     http://opensource.org/licenses/OSL-3.0 The Open Software License 3.0
 */
class Webinse_Faq1_IndexController extends Mage_Core_Controller_Front_Action
{

    /**
     * This method has been created to show output to screen
     *
     * for example you may visit the following URL http://example.com/frontName/index/index/
     * frontName - you must set in config.xml file
     */
    public function indexAction()
    {
        echo 'Webinse Faq1 Module index';
    }

    /**
     * This method has been created to show output to screen
     *
     * for example you may visit the following URL http://example.com/frontName/index/index2/
     */
    public function index2Action()
    {
        $string = 'Webinse Faq1 Module index2';

        /**
         * @todo This you should output $string by using standard magento method to set body
         *       see $this->getResponse()
         */
    }

    /**
     * Use this url to send parameter to Controller http://example.com/frontName/index/params?key1=value1&key2=value2
     */
    public function paramsAction()
    {
        $params = array();
        /**
         * @todo here you must replace the empty array by all parameters that have been sent to the Controller
         *       see $this->getRequest()
         */

        echo '<dl>';
        foreach($params as $key => $value){
            echo '<dt><strong>Param: </strong>' . $key . '</dt>';
            echo '<dt><strong>Value: </strong>' . $value . '</dt>';
        }
        echo '</dl>';
    }

    /**
     * Use this url to send parameter to Controller http://example.com/frontName/index/getCustomerById/id/1
     */
    public function getCustomerByIdAction()
    {
        /**
         * @todo acquire ID from URL
         *       that ID will help you to load proper row from DB using model
         */
        $customerObject = Mage::getModel('example/model');

        var_dump($customerObject->getData());
    }
}
