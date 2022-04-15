<?php
/**
 * @package     Joomla.Plugin
 * @subpackage  Fields.Repeatable
 *
 * @copyright   Copyright (C) 2005 - 2020 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

$fieldValue = $field->value;

if ($fieldValue === '')
{
	return;
}

// Get the values
$fieldValues = json_decode($fieldValue, true);

if (empty($fieldValues))
{
	return;
}

$html = '<ul class="lista-allegati">';



$nome = $allegati = '';

foreach ($fieldValues as $values)
{
	foreach($values as $index => $value) {
		if ($index == 'Nome') {
			$nome = $value;
		} elseif ($index == 'Allegato') {
			$allegati = $value;
		} 
	}
	$html .= '<li><a href="' . $allegati . '" target="_blank">' . $nome . '</a></li>';
}


$html .= '</ul>';

echo $html;
