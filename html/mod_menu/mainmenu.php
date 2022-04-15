<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_menu
 *
 * @copyright   Copyright (C) 2005 - 2019 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

$id = '';

if ($tagId = $params->get('tag_id', ''))
{
	$id = ' id="' . $tagId . '"';
}

// The menu class is deprecated. Use nav instead
?>


			<!--start nav-->
			<nav class="navbar navbar-expand-lg has-megamenu">
				<button class="custom-navbar-toggler" type="button" aria-controls="nav1" aria-expanded="false" aria-label="Toggle navigation" data-target="#nav1">
					<svg class="icon icon-sm">
					<use xlink:href="/templates/joomla-designitalia/svg/sprite.svg#it-burger"></use>
					</svg>
				</button>
				<div class="navbar-collapsable" id="nav1" style="display: none;">
					<div class="overlay" style="display: none;"></div>
						<div class="close-div">
							<button class="btn close-menu" type="button"><svg class="icon icon-lg icon-light"><use xlink:href="/templates/joomla-designitalia/svg/sprite.svg#it-close"></use></svg></button>
						</div>
						<div class="menu-wrapper">
							<ul class="navbar-nav <?php echo $class_sfx; ?>" <?php echo $id; ?>>
							
							
							<?php 
								foreach ($list as $i => &$item)
								{
								$class = 'item-' . $item->id;

								if ($item->id == $default_id)
								{
									$class .= ' default';
								}

								if ($item->id == $active_id || ($item->type === 'alias' && $item->params->get('aliasoptions') == $active_id))
								{
									$class .= ' current';
								}

								if (in_array($item->id, $path))
								{
									$class .= ' active';
								}
								elseif ($item->type === 'alias')
								{
									$aliasToId = $item->params->get('aliasoptions');

									if (count($path) > 0 && $aliasToId == $path[count($path) - 1])
									{
										$class .= ' active';
									}
									elseif (in_array($aliasToId, $path))
									{
										$class .= ' alias-parent-active';
									}
								}

								if ($item->type === 'separator')
								{
									$class .= ' divider';
								}

								if ($item->deeper)
								{
									$class .= ' deeper';
								}

								if ($item->parent)
								{
									$class .= ' parent';
								}


								/*if ($item->level == 1)
								{
								echo '<li class="menu-dropdown-simple-wrapper ' . $class . ' level' . $item->level . ' ' . $item->anchor_css . '">';
								}  elseif ($item->level == 2) {
								echo '<li class="2 menu-dropdown-simple-wrapper ' . $class . ' level' . $item->level . ' ' . $item->anchor_css . '">';		
								} elseif ($item->level == 3) {
									*/
										
									if ($item->deeper && ($item->level == 1))
									{
											echo '<li class="nav-item dropdown ' . $class . ' level' . $item->level . ' ' . $item->anchor_css . '">';
									} elseif ($item->deeper && ($item->level == 2)) {
										echo '<div class="col-12 col-lg-4 nav-item ' . $class . ' level' . $item->level . ' ' . $item->anchor_css . '">';		
									} else {
										echo '<li class="nav-item ' . $class . ' level' . $item->level . ' ' . $item->anchor_css . '">';		
									}
								//	echo var_dump($item);
								
									/*}*/

								switch ($item->type) :
									case 'separator':
									case 'component':
									case 'heading':
									case 'url':
										require JModuleHelper::getLayoutPath('mod_menu', 'mainmenu_' . $item->type);
										break;

									default:
										require JModuleHelper::getLayoutPath('mod_menu', 'mainmenu_url');
										break;
								endswitch;

								// The next item is deeper.
								if ($item->deeper)
								{

									if ($item->anchor_css == 'megamenu'){
										echo '<div class="dropdown-menu"><div class="link-list-wrapper"><div class="row w-100">';
									} else {
										if ($item->level >= 2) {
										echo '<div class=""><div class="link-list-wrapper"><ul class="link-list">';
										} else {
											echo '<div class="dropdown-menu"><div class="link-list-wrapper"><ul class="link-list">';
										}
									}
										
								}
								// The next item is shallower.
								elseif ($item->shallower)
								{
									echo '</li>';


									if ($item->anchor_css == 'megamenu'){
										echo str_repeat('</ul></div></div></li>', $item->level_diff);
									} else {
										if ($item->level == 3) {
											echo '</ul></div></div></div>';
											echo str_repeat('</div></div></div></li>', $item->level_diff - 1);
										} else {
											echo str_repeat('</ul></div></div></li>', $item->level_diff);
										}
									}


									
								}
								// The next item is on the same level.
								else
								{
									echo '</li>';
								}
								}
								?></ul>
						
						
					
						
						</div>
					</div>
			</nav>