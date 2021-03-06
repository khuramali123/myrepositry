<?php
/**
 * @package		Joomla.Site
 * @subpackage	com_search
 * @copyright	Copyright (C) 2005 - 2013 Open Source Matters, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

// no direct access
defined('_JEXEC') or die;
$lang = JFactory::getLanguage();
$upper_limit = $lang->getUpperLimitSearchWord();
?>

<form id="searchForm" action="<?php echo 'index.php?option=com_search&searchword='.$_REQUEST['searchword'];?>" method="post">


<!--https://dev.tileredi.com/index.php?searchword=3060&option=com_search-->
<!--===== Edit by chetnath =======-->

<!--
	<fieldset class="word">
		<label for="search-searchword">
			<?php echo JText::_('COM_SEARCH_SEARCH_KEYWORD'); ?>
		</label>
		<input type="text" name="searchword" id="search-searchword" size="30" maxlength="<?php echo $upper_limit; ?>" value="<?php echo $this->escape($this->origkeyword); ?>" class="inputbox" />
		<button name="Search" onclick="this.form.submit()" class="button"><?php echo JText::_('COM_SEARCH_SEARCH');?></button>
		<input type="hidden" name="task" value="search" />
	</fieldset>

	<div class="searchintro<?php echo $this->params->get('pageclass_sfx'); ?>">
		<?php if (!empty($this->searchword)):?>
		<p><?php echo JText::plural('COM_SEARCH_SEARCH_KEYWORD_N_RESULTS', $this->total);?></p>
		<?php endif;?>
	</div>

	<fieldset class="phrases">
		<legend><?php echo JText::_('COM_SEARCH_FOR');?>
		</legend>
			<div class="phrases-box">
			<?php echo $this->lists['searchphrase']; ?>
			</div>
			<div class="ordering-box">
			<label for="ordering" class="ordering">
				<?php echo JText::_('COM_SEARCH_ORDERING');?>
			</label>
			<?php echo $this->lists['ordering'];?>
			</div>
	</fieldset>

	<?php if ($this->params->get('search_areas', 1)) : ?>
		<fieldset class="only">
		<legend><?php echo JText::_('COM_SEARCH_SEARCH_ONLY');?></legend>
		<?php foreach ($this->searchareas['search'] as $val => $txt) :
			$checked = is_array($this->searchareas['active']) && in_array($val, $this->searchareas['active']) ? 'checked="checked"' : '';
		?>
		<input type="checkbox" name="areas[]" value="<?php echo $val;?>" id="area-<?php echo $val;?>" <?php echo $checked;?> />
			<label for="area-<?php echo $val;?>">
				<?php echo JText::_($txt); ?>
			</label>
		<?php endforeach; ?>
		</fieldset>
	<?php endif; ?>
-->

<?php if ($this->total > 0) : ?>

	<div class="orderby-displaynumber" style="text-align:center;">
		<p class="counter" style="text-align:center;">
			<?php echo $this->pagination->getPagesCounter(); ?>
		</p>
		<label for="limit">
			<?//php echo JText::_('JGLOBAL_DISPLAY_NUM'); ?>
		</label>
		<?php echo $this->pagination->getLimitBox(); ?>

		<div class="pagination" style="font-size:12px">
			<?php echo $this->pagination->getPagesLinks(); ?>
		</div>
	</div>

<?php endif; ?>

</form>

<style>

.orderby-displaynumber{

    background: none repeat scroll 0 0 #FAFAFA;
    border: 1px solid #E5E5E5;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1) inset;
    font-size: 11px;
    margin-top: 5px;
    padding: 5px 15px;
}

</style>