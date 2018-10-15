<?php
class Sankhalainfo_Manufacturerlogo_IndexController extends Mage_Core_Controller_Front_Action
{
    public function indexAction()
    {
    	
    	/*
    	 * Load an object by id 
    	 * Request looking like:
    	 * http://site.com/manufacturerlogo?id=15 
    	 *  or
    	 * http://site.com/manufacturerlogo/id/15 	
    	 */
    	/* 
		$manufacturerlogo_id = $this->getRequest()->getParam('id');

  		if($manufacturerlogo_id != null && $manufacturerlogo_id != '')	{
			$manufacturerlogo = Mage::getModel('manufacturerlogo/manufacturerlogo')->load($manufacturerlogo_id)->getData();
		} else {
			$manufacturerlogo = null;
		}	
		*/
		
		 /*
    	 * If no param we load a the last created item
    	 */ 
    	/*
    	if($manufacturerlogo == null) {
			$resource = Mage::getSingleton('core/resource');
			$read= $resource->getConnection('core_read');
			$manufacturerlogoTable = $resource->getTableName('manufacturerlogo');
			
			$select = $read->select()
			   ->from($manufacturerlogoTable,array('manufacturerlogo_id','title','content','status'))
			   ->where('status',1)
			   ->order('created_time DESC') ;
			   
			$manufacturerlogo = $read->fetchRow($select);
		}
		Mage::register('manufacturerlogo', $manufacturerlogo);
		*/

			
		$this->loadLayout();     
		$this->renderLayout();
    }
}