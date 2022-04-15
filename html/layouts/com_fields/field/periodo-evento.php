<?php
/**
 * @package     Joomla.Site
 * @subpackage  com_fields
 *
 * @copyright   Copyright (C) 2005 - 2020 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */
defined('_JEXEC') or die;

if (!key_exists('field', $displayData))
{
	return;
}

$field = $displayData['field'];
$label = JText::_($field->label);
$value = $field->value;
$showLabel = $field->params->get('showlabel');
$labelClass = $field->params->get('label_render_class');

if ($value == '')
{
	return;
}

?>
<?php if ($showLabel == 1) : ?>
	<span class="field-label <?php echo $labelClass; ?>"><?php echo htmlentities($label, ENT_QUOTES | ENT_IGNORE, 'UTF-8'); ?>: </span>
<?php endif; ?>
<svg class="icon icon-sm"><use xlink:href="/templates/joomla-designitalia/svg/sprite.svg#it-calendar"></use></svg><span class="field-value-evento"><?php echo $value; ?></span>
