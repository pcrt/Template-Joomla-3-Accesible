<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_search
 *
 * @copyright   Copyright (C) 2005 - 2020 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

// Including fallback code for the placeholder attribute in the search field.
JHtml::_('jquery.framework');
JHtml::_('script', 'system/html5fallback.js', array('version' => 'auto', 'relative' => true, 'conditional' => 'lt IE 9'));

if ($width)
{
	$moduleclass_sfx .= ' ' . 'mod_search' . $module->id;
	$css = 'div.mod_search' . $module->id . ' input[type="search"]{ width:auto; }';
	JFactory::getDocument()->addStyleDeclaration($css);
	$width = ' size="' . $width . '"';
}
else
{
	$width = '';
}
?>
<div class="btn-mod-mobile-search d-block d-lg-none"><button class="button-ico-search" id="btn-searchjdi"><svg class="icon icon-sm icon-white"><use xlink:href="/templates/joomla-accessibile/svg/sprite.svg#it-search"></use></svg></button></div>
<div class="mod-search<?php echo $moduleclass_sfx; ?> mb-3 mb-md-0">
	<form action="<?php echo JRoute::_('index.php'); ?>" method="post" class="form-inline" role="search">
		<div class="row m-0 w-100">
		<?php
			//$output = '<label for="mod-search-searchword' . $module->id . '" class="element-invisible">' . $label . '</label> ';
			$output .= '<div class="col p-0"><input name="searchword" id="mod-search-searchword' . $module->id . '" maxlength="' . $maxlength . '"  class="inputbox search-query input-medium" type="search"' . $width;
			$output .= ' placeholder="' . $text . '" /></div>';

			if ($button) :
				if ($imagebutton) :
					$btn_output = ' <div class="col-auto p-0 btn-mod-search"><input type="image" alt="' . $button_text . '" class="button-ico-search" src="' . $img . '" onclick="this.form.searchword.focus();"/></div>';
				else :
					$btn_output = ' <div class="col-auto p-0 btn-mod-search"><button class="button-ico-search" onclick="this.form.searchword.focus();"><svg class="icon icon-sm icon-white"><use xlink:href="/templates/joomla-accessibile/svg/sprite.svg#it-search"></use></svg></button></div>';
					
					
				  
				endif;

				switch ($button_pos) :
					case 'top' :
						$output = $btn_output . '<br />' . $output;
						break;

					case 'bottom' :
						$output .= '<br />' . $btn_output;
						break;

					case 'right' :
						$output .= $btn_output;
						break;

					case 'left' :
					default :
						$output = $btn_output . $output;
						break;
				endswitch;
			endif;

			echo $output;
		?>
		<input type="hidden" name="task" value="search" />
		<input type="hidden" name="option" value="com_search" />
		<input type="hidden" name="Itemid" value="<?php echo $mitemid; ?>" /></div>
	</form>
</div>
