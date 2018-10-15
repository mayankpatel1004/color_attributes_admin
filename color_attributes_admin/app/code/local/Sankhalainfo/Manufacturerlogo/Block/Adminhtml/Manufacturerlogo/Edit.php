<?php

class Sankhalainfo_Manufacturerlogo_Block_Adminhtml_Manufacturerlogo_Edit extends Mage_Adminhtml_Block_Widget_Form_Container
{
    public function __construct()
    {
        parent::__construct();
                 
        $this->_objectId = 'id';
        $this->_blockGroup = 'manufacturerlogo';
        $this->_controller = 'adminhtml_manufacturerlogo';
        
        $this->_updateButton('save', 'label', Mage::helper('manufacturerlogo')->__('Save Color Logo'));
        $this->_updateButton('delete', 'label', Mage::helper('manufacturerlogo')->__('Delete Color Logo'));
		
        $this->_addButton('saveandcontinue', array(
            'label'     => Mage::helper('adminhtml')->__('Save And Continue Edit'),
            'onclick'   => 'saveAndContinueEdit()',
            'class'     => 'save',
        ), -100);

        $this->_formScripts[] = "
            function toggleEditor() {
                if (tinyMCE.getInstanceById('manufacturerlogo_content') == null) {
                    tinyMCE.execCommand('mceAddControl', false, 'manufacturerlogo_content');
                } else {
                    tinyMCE.execCommand('mceRemoveControl', false, 'manufacturerlogo_content');
                }
            }

            function saveAndContinueEdit(){
                editForm.submit($('edit_form').action+'back/edit/');
            }
        ";
    }

    public function getHeaderText()
    {
        if( Mage::registry('manufacturerlogo_data') && Mage::registry('manufacturerlogo_data')->getId() ) {
            return Mage::helper('manufacturerlogo')->__("Edit Manufacturer Logo '%s'", $this->htmlEscape(Mage::registry('manufacturerlogo_data')->getTitle()));
        } else {
            return Mage::helper('manufacturerlogo')->__('Add Manufacturer Logo');
        }
    }
}