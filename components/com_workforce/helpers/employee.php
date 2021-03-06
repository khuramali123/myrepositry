<?php
/**
 * @version 2.0.1 2012-08-17
 * @package Joomla
 * @subpackage Work Force
 * @copyright (C) 2012 the Thinkery
 * @license GNU/GPL see LICENSE.php
 */

defined( '_JEXEC' ) or die( 'Restricted access' );

class WorkforceHelperEmployee extends JObject
{
	var $_db	= null;
	var $_type	= null;
	var $_sort	= null;
	var $_order	= null;
	var $_id	= null;
	var $_where	= null;
	
	function __construct(&$db)
	{
		$this->_db = $db;
	}
	
	function setType($type)
	{
		$this->_type = $type;
	}
	
	function setId($id)
	{
		$this->_id = $id;
	}

	function setWhere($where)
	{
		$this->_where = $where;
	}
	
	function setOrderBy($sort, $order)
	{
		$this->_sort = $sort;
		$this->_order = $order;
	}
	
	function getEmployee($limitstart = 0, $limit = 10, $debug = null)
	{
		switch($this->_type)
		{
			case 'employees':
				$this->_db->setQuery( WorkforceHelperQuery::buildEmployeesQuery($this->_where, $limitstart, $limit, $debug) );
            break;
				
			case 'employee':
				$this->_db->setQuery( WorkforceHelperQuery::buildEmployeesQuery($this->_where, 0, 1, $debug) );
			break;
				
			default:
				$this->_db->setQuery( WorkforceHelperQuery::buildEmployeesQuery($this->_where, $limitstart, $limit, $debug) );
            break;
				
		}
		$employees = $this->_db->loadObjectList();
        return $employees;
	}
}
?>