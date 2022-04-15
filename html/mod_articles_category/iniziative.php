<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_articles_category
 *
 * @copyright   Copyright (C) 2005 - 2016 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;
JLoader::register('FieldsHelper', JPATH_ADMINISTRATOR . '/components/com_fields/helpers/fields.php');
$images = json_decode($item->images);



?>

<div class="owl-carousel owl-theme iniziative-wrapper mt-4" id="iniziativecarosello">
	<?php if ($grouped) : ?>

	<?php else : ?>
		<?php foreach ($list as $item) : ?>


			<?php 
				

				$article = JTable::getInstance("content"); 
				$article->load($item->id); // Get Article ID 
				$article_intro = $article->get("introtext");

				$fields = $item->jcfields ?: FieldsHelper::getFields($context, $item, true);	
				foreach($fields as $field){
					if ($field->value){
						$item->fields[$field->name] = $field;
					}
				}		


			?>
			
			<div class="item">
			<div class="row align-items-center">				
				<div class="col-12 col-lg-5">
					<div class="">
						<a class="<?php echo $item->active; ?>" href="<?php echo $item->link; ?>">
						<img src="<?php echo json_decode($item->images)->image_intro; ?>" alt="<?php echo $item->title; ?>" class="img-fluid" />
						</a>
					</div>
				</div>
				<div class="col-12 col-lg-7">
					<p class="event-date">
						<svg class="icon icon-sm align-middle"><use xlink:href="/templates/joomla-designitalia/svg/sprite.svg#it-calendar"></use></svg><span><?php echo $item->fields['data-o-periodo-evento']->value; ?></span>
					<p>

					<?php if ($params->get('link_titles') == 1) : ?>
						<a class="mod-articles-category-title <?php echo $item->active; ?>" href="<?php echo $item->link; ?>">
							<?php echo $item->title; ?>
						</a>
					<?php else : ?>
						<?php echo $item->title; ?>
					<?php endif; ?>
					<?php if ($params->get('show_introtext')) : ?>
						<a class="<?php echo $item->active; ?>" href="<?php echo $item->link; ?>">
							<?php echo $article_intro; ?>
						</a>
					<?php endif; ?>
					<?php if ($params->get('show_readmore')) : ?>
						<p class="">
							<a class="<?php echo $item->active; ?>" href="<?php echo $item->link; ?>">
								<?php echo JText::_('MOD_ARTICLES_CATEGORY_READ_MORE'); ?>
							</a>
						</p>
					<?php endif; ?>
				</div>
			</div>
			</div>
		<?php endforeach; ?>
	<?php endif; ?>
</div>
