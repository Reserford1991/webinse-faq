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
			* for example you may visit the following URL http://example.com/Webinse_Faq1/index/index/
			* frontName - you must set in config.xml file
		*/
		public function indexAction()
		{
			echo 'Webinse Faq1 Module index';
		}
		
		/**
			* This method has been created to show output to screen
			*
			* for example you may visit the following URL http://example.com/Webinse_Faq1/index/index2/
		*/
		public function index2Action()
		{
			$string = 'Webinse Faq1 Module index2';
			
			/**
				* @todo This you should output $string by using standard magento method to set body
				*       see $this->getResponse()
			*/
			
			$this->getResponse()->setBody($string);
		}
		
		/**
			* Use this url to send parameter to Controller http://example.com/Webinse_Faq1/index/params?key1=value1&key2=value2
		*/
		public function paramsAction()
		{
			$params = array();
			/**
				* @todo here you must replace the empty array by all parameters that have been sent to the Controller
				*       see $this->getRequest()
			*/
			
			foreach($this->getRequest()->getParams() as $key=>$value) {
				$params[$key]=$value;
			}
			
			
			/*		-- Dafaul code --
				echo '<dl>';
				foreach($params as $key => $value){
				echo '<dt><strong>Param: </strong>' . $key . '</dt>';
				echo '<dt><strong>Value: </strong>' . $value . '</dt>';
				}
				echo '</dl>';
			*/
			
			// Slightly improved layout
			
			echo '<dl>';
			foreach($params as $key => $value){
				echo '<dt><strong>Param: </strong>' . $key . '</dt>';
				echo '<dd><strong>Value: </strong>' . $value . '</dd>';
			}
			echo '</dl>';
			
		}
		
		/**
			* Use this url to send parameter to Controller http://example.com/Webinse_Faq1/index/getCustomerById/id/1
		*/
		public function getCustomerByIdAction()
		{
			/**
				* @todo acquire ID from URL
				*       that ID will help you to load proper row from DB using model
			*/
			$customerID = $this->getRequest()->getParam('id');						// getting customer ID from URL
			echo $customerID;														// Just check of ID
			$customerObject = Mage::getModel('customer/customer')->load($customerID);		// trying to load customer with specified ID
			//var_dump($customerObject->getData());
			
			if ($customerObject->getId()) // Checking whether customer ID is correct
			{
				// This is an existing customer
				echo "<br>There is such client in database<br>";
				var_dump($customerObject->getData());		// printing customer data
				
			} 
			else 
			{
				// This is not an existing customer
				echo "There is no such client in database";
			}
			
			
		}
	}
