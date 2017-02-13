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
 * Adminhtml faq edit form block
 *
 * @category    Webinse
 * @package     Webinse_Faq4
 * @author      Webinse Team <info@webinse.com>
 * @copyright   2017 Webinse Ltd. (https://www.webinse.com)
 * @license     http://opensource.org/licenses/OSL-3.0 The Open Software License 3.0
 */
class Webinse_Faq4_Block_Adminhtml_Faq_Edit_Form extends Mage_Adminhtml_Block_Widget_Form
{

    /**
     * Prepare form for render
     */
    protected function _prepareLayout()
    {
        parent::_prepareLayout();
        $helper = Mage::helper('webinse_faq4'); // @todo: you must set properly URI of your helper
        $form = new Varien_Data_Form();
        $faq  = Mage::registry('current_faq');

        $fieldset = $form->addFieldset('base_fieldset', array('legend' => $helper->__('FAQ Information')));

        if ($faq->getId()) {
            /**
             * @todo: add field with faq id
             */
            $fieldset->addField('entity_id', 'hidden', array(
                'name'      => 'entity_id',
                'required'  => true
            ));
        }

        /**
         * @todo: add other fields, use class for validation (js/prototype/validation.js)
         */
        $fieldset->addField('question', 'text', array(
            'name'      => 'question',
            'label'     => Mage::helper('webinse_faq4')->__('Question'),
            'maxlength' => '250',
            'required'  => true,
            'class'     => 'validate-alphanum',
        ));

        $fieldset->addField('answer', 'textarea', array(
            'name'      => 'answer',
            'label'     => Mage::helper('webinse_faq4')->__('Answer'),
            'style'     => 'width: 98%; height: 200px;',
            'required'  => true,
            'class'     => 'validate-alphanum',
        ));

        $form->addValues($faq->getData());
        /**
         * @todo: set action to form and other params to form
         */
        $form->setMethod('post');
        $form->setUseContainer(true);
        $form->setId('edit_form');
        $form->setAction($this->getUrl('*/*/save'));

        $form->setValues($faq->getData());

        $this->setForm($form);
    }

}
