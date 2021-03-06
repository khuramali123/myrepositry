<?php
/**
 * @version		$Id: html.php 763 2012-01-04 15:07:52Z joomlaworks $
 * @package		Frontpage Slideshow
 * @author		JoomlaWorks http://www.joomlaworks.gr
 * @copyright	Copyright (c) 2006 - 2012 JoomlaWorks Ltd. All rights reserved.
 * @license		Commercial - This code cannot be redistributed without permission from JoomlaWorks Ltd.
 */

// no direct access
defined('_JEXEC') or die('Restricted access');

class FPSSHelperHTML {
	
	function published(&$row, $i) {
		if(version_compare( JVERSION, '1.6.0', 'ge' )) {
			return JHtml::_('jgrid.published', $row->published, $i, '', true, 'cb', $row->publish_up, $row->publish_down);
		}
		else {
			$db = JFactory::getDBO();
			$nullDate = $db->getNullDate();
			$now = JFactory::getDate();
			$config	= JFactory::getConfig();
			$publish_up = JFactory::getDate($row->publish_up);
			$publish_down = JFactory::getDate($row->publish_down);
			$publish_up->setOffset($config->getValue('config.offset'));
			$publish_down->setOffset($config->getValue('config.offset'));
			$img = 'tick.png';
			if ( $now->toUnix() <= $publish_up->toUnix() && $row->published == 1 ) {
				$img = 'publish_y.png';
			} else if ( ( $now->toUnix() <= $publish_down->toUnix() || $row->publish_down == $nullDate ) && $row->published == 1 ) {
				$img = 'tick.png';
			} else if ( $now->toUnix() > $publish_down->toUnix() && $row->published == 1 ) {
				$img = 'publish_r.png';
			}
			return JHTML::_('grid.published', $row, $i , $img);
		}
	}

	function featured(&$row, $i) {
		$mainframe = &JFactory::getApplication();
		$iconsPath = (version_compare( JVERSION, '1.6.0', 'ge' ))? JURI::base(true).'/templates/'.$mainframe->getTemplate().'/images/admin/': JURI::base(true).'/images/';
		$icon = $row->featured ? 'tick.png' : 'publish_x.png';
		$alt = $row->featured ? JText::_('FPSS_FEATURED') : JText::_('FPSS_NOT_FEATURED');
		$action = $row->featured ? JText::_('FPSS_REMOVE_FEATURED_FLAG') : JText::_('FPSS_FLAG_AS_FEATURED');
		$html = '
        <a href="javascript:void(0);" onclick="return listItemTask(\'cb'. $i .'\',\'featured\')" title="'. $action .'">
        <img src="'.$iconsPath.$icon .'" border="0" alt="'. $alt .'" /></a>'
        ;
        return $html;
	}

	function getCategoryFilter($name, $active = NULL) {
		jimport('joomla.application.component.model');
		JModel::addIncludePath(JPATH_ADMINISTRATOR.DS.'components'.DS.'com_fpss'.DS.'models');
		$model = &JModel::getInstance('categories', 'FPSSModel');
		$model->setState('published', -1);
		$model->setState('ordering', 'category.name');
		$model->setState('orderingDir', 'ASC');
		$categories = $model->getData();
		$option = new JObject();
		$option->id = 0;
		$option->name = JText::_('FPSS_SELECT_CATEGORY');
		array_unshift($categories, $option);
		return JHTML::_('select.genericlist', $categories, $name, '', 'id', 'name', $active);
	}
	
	function getAuthorFilter($name, $active) {
		$db =& JFactory::getDBO();
		$query = "SELECT id AS value, name AS text FROM #__users WHERE block = 0 ORDER BY name";
		$db->setQuery($query);
		$users[] = JHTML::_('select.option',  '0', JText::_('FPSS_SELECT_AUTHOR'));
		$users = array_merge($users, $db->loadObjectList());
		$filter = JHTML::_('select.genericlist', $users, $name, 'class="inputbox" size="1" ', 'value', 'text', $active);
		return $filter;
	}

	function getJSON($array=array()) {

		if(function_exists('json_encode')){
			return json_encode($array);
		}

		$object = '{';
		foreach ((array)$array as $k => $v)	{
			if (is_null($v)) {
				continue;
			}
			if (!is_array($v) && !is_object($v)) {
				$object .= ' "'.$k.'": ';
				$object .= (is_numeric($v) || strpos($v, '\\') === 0) ? (is_numeric($v)) ? $v : substr($v, 1) : '"'.$v.'"';
				$object .= ',';
			}
			else {
				$object .= ' '.$k.': '.FPSSModelSlide::getJSON($v).',';
			}
		}
		if (substr($object, -1) == ',') {
			$object = substr($object, 0, -1);
		}
		$object .= '}';

		return $object;
	}
}