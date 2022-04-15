<?php
/**
 * @package     Joomla.Site
 * @subpackage  com_search
 *
 * @copyright   Copyright (C) 2005 - 2020 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

JHtml::_('bootstrap.tooltip');

$lang = JFactory::getLanguage();
$upper_limit = $lang->getUpperLimitSearchWord();

?>
<form id="searchForm" action="<?php echo JRoute::_('index.php?option=com_search'); ?>" method="post">
	<div class="btn-toolbar mt-4">
		<div class="row m-0 w-100">
			<div class="col p-0">
				<input type="text" name="searchword" title="<?php echo JText::_('COM_SEARCH_SEARCH_KEYWORD'); ?>" placeholder="<?php echo JText::_('COM_SEARCH_SEARCH_KEYWORD'); ?>" id="search-searchword" size="30" maxlength="<?php echo $upper_limit; ?>" value="<?php echo $this->escape($this->origkeyword); ?>" class="inputbox" />
			</div>
			<div class="col-auto p-0">	
				<button name="Search" onclick="this.form.submit()" class="button-ico-comsearch" title="<?php echo JHtml::_('tooltipText', 'COM_SEARCH_SEARCH');?>">
					<svg class="icon icon-sm icon-white"><use xlink:href="/templates/joomla-accessibile/svg/sprite.svg#it-search"></use></svg>
				</button>
			</div>
		</div>
		<input type="hidden" name="task" value="search" />
		<div class="clearfix"></div>
	</div>
	<div class="mt-2 searchintro<?php echo $this->params->get('pageclass_sfx'); ?>">
		<?php if (!empty($this->searchword)) : ?>
			<p>
				<?php echo JText::plural('COM_SEARCH_SEARCH_KEYWORD_N_RESULTS', '<span class="badge badge-info">' . $this->total . '</span>'); ?>
			</p>
		<?php endif; ?>
	</div>
	<?php if ($this->params->get('search_phrases', 1)) : ?>
		<fieldset class="phrases">
			<legend>
				<?php echo JText::_('COM_SEARCH_FOR'); ?>
			</legend>
			<div class="phrases-box">
				<?php echo $this->lists['searchphrase']; ?>
			</div>

		</fieldset>
	<?php endif; ?>
	<div class="row">
		<div class="col">
			<div class="ordering-box">
				<label for="ordering" class="ordering">
					<?php echo JText::_('COM_SEARCH_ORDERING'); ?>
				</label>
				<?php echo $this->lists['ordering']; ?>
			</div>
		</div>
		<div class="col text-right">
			<?php if ($this->total > 0) : ?>
				<div class="form-limit">
					<label for="limit">
						<?php echo JText::_('JGLOBAL_DISPLAY_NUM'); ?>
					</label>
					<?php echo $this->pagination->getLimitBox(); ?>
				</div>
				<p class="counter">
					<?php echo $this->pagination->getPagesCounter(); ?>
				</p>
			<?php endif; ?>
		</div>
	</div>
</form>
