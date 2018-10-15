<?php

class Sankhalainfo_Manufacturerlogo_Model_Manufacturerlogo extends Mage_Core_Model_Abstract
{
    public function _construct()
    {
        parent::_construct();
        $this->_init('manufacturerlogo/manufacturerlogo');
    }
	
	public function getAllManufacturer()
	{
		$objProduct = Mage::getModel('catalog/product');
		$objManufacturer = Mage::getResourceModel('eav/entity_attribute_collection')->setEntityTypeFilter($objProduct->getResource()->getTypeId())->addFieldToFilter('attribute_code', 'color');

		$objAttribute = $objManufacturer->getFirstItem()->setEntity($objProduct->getResource());
		$arrManufacturers = $objAttribute->getSource()->getAllOptions(false);
		return $arrManufacturers;
	}
	
	public function getManufacturer($intManufacturerId)
	{
		$strManufacturer = '';
		$arrManufacturers = $this->getAllManufacturer();
		if(count($arrManufacturers))
		{
			foreach($arrManufacturers as $aManufacturer)
			{
				if($aManufacturer['value'] == $intManufacturerId)
				{
					$strManufacturer = ucwords($aManufacturer['label']);
					break;
				}
			}
		}
		return $strManufacturer;
	}
}