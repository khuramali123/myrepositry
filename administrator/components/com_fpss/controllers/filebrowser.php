<?php
/**
 * @version		$Id: filebrowser.php 763 2012-01-04 15:07:52Z joomlaworks $
 * @package		Frontpage Slideshow
 * @author		JoomlaWorks http://www.joomlaworks.gr
 * @copyright	Copyright (c) 2006 - 2012 JoomlaWorks Ltd. All rights reserved.
 * @license		Commercial - This code cannot be redistributed without permission from JoomlaWorks Ltd.
 */

// no direct access
defined('_JEXEC') or die('Restricted access');

class FPSSControllerFileBrowser extends JController {

	function display() {
		JRequest::setVar('view', 'filebrowser');
		JRequest::setVar('tmpl', 'component');
		parent::display();
	}

}