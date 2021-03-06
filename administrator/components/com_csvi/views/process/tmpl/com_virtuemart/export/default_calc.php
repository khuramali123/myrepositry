<?php
/**
 * Import category options
 *
 * @package 	CSVI
 * @subpackage 	Import
 * @author 		Roland Dalmulder
 * @link 		http://www.csvimproved.com
 * @copyright 	Copyright (C) 2006 - 2012 RolandD Cyber Produksi
 * @license 	GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html
 * @version 	$Id: default_calc.php 2052 2012-08-02 05:44:47Z RolandD $
 */

defined( '_JEXEC' ) or die;
?>
<fieldset>
	<legend><?php echo JText::_('COM_CSVI_OPTIONS'); ?></legend>
	<ul>
		<li><div class="option_label"><?php echo $this->form->getLabel('language', 'general'); ?></div>
			<div class="option_value"><?php echo $this->form->getInput('language', 'general'); ?></div></li>
		<li><div class="option_label"><?php echo $this->form->getLabel('category_separator', 'general'); ?></div>
			<div class="option_value"><?php echo $this->form->getInput('category_separator', 'general'); ?></div></li>
	</ul>
</fieldset>
<div class="clr"></div>