<?php
/**
* product builder component
* @package productbuilder
* @version $Id:1 products.php  2012-2-3 sakisTerzis $
* @author Sakis Terzis (sakis@breakDesigns.net)
* @copyright	Copyright (C) 2010-2012 breakDesigns.net. All rights reserved
* @license	GNU/GPL v2
*/

defined('_JEXEC') or die('Restricted access');

jimport('joomla.application.component.controlleradmin');
//require_once(VMF_ADMINISTRATOR.DS.'controllers'.DS.'default.php');

class productbuilderControllerProducts extends JControllerAdmin
{

	/**
	 * Proxy for getModel.
	 *
	 * @param	string	$name	The name of the model.
	 * @param	string	$prefix	The prefix for the PHP class name.
	 *
	 * @return	JModel
	 * @since	1.6
	 */
	public function getModel($name = 'Product', $prefix = 'productbuilderModel', $config = array('ignore_request' => true))
	{
		$model = parent::getModel($name, $prefix, $config);

		return $model;
	}

}
?>