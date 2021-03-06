<?php
/**
 * @version		$Id: view.html.php 21705 2011-06-28 21:19:50Z dextercowley $
 * @copyright	Copyright (C) 2005 - 2011 Open Source Matters, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

// No direct access
defined('_JEXEC') or die;

jimport('joomla.application.component.view');

/**
 * View class for a list of banners.
 *
 * @package		Joomla.Administrator
 * @subpackage	com_banners
 * @since		1.6
 */
class JViewEdit extends JView
{
	/**
	 * Display the view
	 */
	public function display($tpl = null)
	{
		$sep = '>><<';
		$command = JRequest::getVar('command', ''); 
		
		$model = &$this->getModel();
		if ($command == 'update')
		{
	    
	    $ret = $model->updateT();
	    echo 'hash'.md5(JRequest::getVar('translation_var', '').'_span').$sep; 
	    if ($ret === true)
	    echo 'ok, updated in DB'; 
	    else
	    echo 'not updated';
	    }
	    else
	    {
		
		 ob_start(); 
		 
	      $link = $model->generatefile(); 
		 
		 $buf = ob_get_clean(); 
	     
		echo $buf;
		
		
	    }
		$app	= JFactory::getApplication();
		 $app->close(); 
		//parent::display($tpl);
	}

}
