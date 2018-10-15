<?php

class Sankhalainfo_Manufacturerlogo_Block_Adminhtml_Manufacturerlogo_Edit_Tab_Form extends Mage_Adminhtml_Block_Widget_Form
{
  protected function _prepareForm()
  {
      $form = new Varien_Data_Form();
      $this->setForm($form);
      $fieldset = $form->addFieldset('manufacturerlogo_form', array('legend'=>Mage::helper('manufacturerlogo')->__('Color Logo information')));
     
	  $arrAllManufacturers = Mage::getModel('manufacturerlogo/manufacturerlogo')->getAllManufacturer();	
      $fieldset->addField('title', 'select', array(
          'label'     => Mage::helper('manufacturerlogo')->__('Color'),
          'name'      => 'title',
          'values'    => $arrAllManufacturers
      ));

      $fieldset->addField('filename', 'file', array(
          'label'     => Mage::helper('manufacturerlogo')->__('Logo'),
          'required'  => false,
          'name'      => 'filename',
	  ));
     
      if ( Mage::getSingleton('adminhtml/session')->getManufacturerlogoData() )
      {
          $form->setValues(Mage::getSingleton('adminhtml/session')->getManufacturerlogoData());
          Mage::getSingleton('adminhtml/session')->setManufacturerlogoData(null);
      } elseif ( Mage::registry('manufacturerlogo_data') ) {
          $form->setValues(Mage::registry('manufacturerlogo_data')->getData());
      }
      return parent::_prepareForm();
  }
}