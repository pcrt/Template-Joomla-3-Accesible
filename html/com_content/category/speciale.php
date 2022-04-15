<?php
/**
 * @package     Joomla.Site
 * @subpackage  com_content
 *
 * @copyright   Copyright (C) 2005 - 2020 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

JHtml::addIncludePath(JPATH_COMPONENT . '/helpers');

JHtml::_('behavior.caption');

$dispatcher = JEventDispatcher::getInstance();

$this->category->text = $this->category->description;
$dispatcher->trigger('onContentPrepare', array($this->category->extension . '.categories', &$this->category, &$this->params, 0));
$this->category->description = $this->category->text;

$results = $dispatcher->trigger('onContentAfterTitle', array($this->category->extension . '.categories', &$this->category, &$this->params, 0));
$afterDisplayTitle = trim(implode("\n", $results));

$results = $dispatcher->trigger('onContentBeforeDisplay', array($this->category->extension . '.categories', &$this->category, &$this->params, 0));
$beforeDisplayContent = trim(implode("\n", $results));

$results = $dispatcher->trigger('onContentAfterDisplay', array($this->category->extension . '.categories', &$this->category, &$this->params, 0));
$afterDisplayContent = trim(implode("\n", $results));

?>
<div class="blog<?php echo $this->pageclass_sfx; ?> mt-5" itemscope itemtype="https://schema.org/Blog">
	<div class="container-lg">
		<div class="row">

			<?php
				$document = &JFactory::getDocument();
				$renderer = $document->loadRenderer('modules');
				$options = array('style' => 'xhtml');
				$position = 'left';
				
				if ($renderer->render($position, $options, null) != ''){ 
				
			?>
					<div class="col-lg-4">
						<div class="leftbar-jdi">
							<?php echo $renderer->render($position, $options, null); ?>
						</div>
					</div>
					<div class="col-12 col-lg-8">
				<?php } else { ?>
					<div class="col-12">
				<?php } ?>
				<div class="intro-blog">
					<?php if ($this->params->get('show_page_heading')) : ?>
						<div class="page-header">
							<h1> <?php echo $this->escape($this->params->get('page_heading')); ?> </h1>
						</div>
					<?php endif; ?>

					<?php if ($this->params->get('show_category_title', 1) or $this->params->get('page_subheading')) : ?>
						<h2> <?php echo $this->escape($this->params->get('page_subheading')); ?>
							<?php if ($this->params->get('show_category_title')) : ?>
								<span class="subheading-category"><?php echo $this->category->title; ?></span>
							<?php endif; ?>
						</h2>
					<?php endif; ?>
					<?php echo $afterDisplayTitle; ?>

					<?php if ($this->params->get('show_cat_tags', 1) && !empty($this->category->tags->itemTags)) : ?>
						<?php $this->category->tagLayout = new JLayoutFile('joomla.content.tags'); ?>
						<?php echo $this->category->tagLayout->render($this->category->tags->itemTags); ?>
					<?php endif; ?>

					<?php if ($beforeDisplayContent || $afterDisplayContent || $this->params->get('show_description', 1) || $this->params->def('show_description_image', 1)) : ?>
						<div class="category-desc clearfix">
							<?php if ($this->params->get('show_description_image') && $this->category->getParams()->get('image')) : ?>
								<img src="<?php echo $this->category->getParams()->get('image'); ?>" alt="<?php echo htmlspecialchars($this->category->getParams()->get('image_alt'), ENT_COMPAT, 'UTF-8'); ?>"/>
							<?php endif; ?>
							<?php echo $beforeDisplayContent; ?>
							<?php if ($this->params->get('show_description') && $this->category->description) : ?>
								<?php echo JHtml::_('content.prepare', $this->category->description, '', 'com_content.category'); ?>
							<?php endif; ?>
							<?php echo $afterDisplayContent; ?>
						</div>
					<?php endif; ?>

					<?php if (empty($this->lead_items) && empty($this->link_items) && empty($this->intro_items)) : ?>
						<?php if ($this->params->get('show_no_articles', 1)) : ?>
							<p><?php echo JText::_('COM_CONTENT_NO_ARTICLES'); ?></p>
						<?php endif; ?>
					<?php endif; ?>

					<?php $leadingcount = 0; ?>
					<?php if (!empty($this->lead_items)) : ?>
						<div class="items-leading clearfix">
							<?php foreach ($this->lead_items as &$item) : ?>
								<div class="leading-<?php echo $leadingcount; ?><?php echo $item->state == 0 ? ' system-unpublished' : null; ?>"
									itemprop="blogPost" itemscope itemtype="https://schema.org/BlogPosting">
									<?php
									$this->item = &$item;
									echo $this->loadTemplate('item');
									?>
								</div>
								<?php $leadingcount++; ?>
							<?php endforeach; ?>
						</div><!-- end items-leading -->
					<?php endif; ?>


					<div class="grid-blog it-grid-list-wrapper it-image-label-grid it-masonry">
						<div class="card-columns">
							
								<?php if (!empty($this->intro_items)) : ?>
									<?php foreach ($this->intro_items as $key => &$item) : ?>

										<div class="col-12">
											<div class="it-grid-item-wrapper" itemprop="blogPost" itemscope itemtype="https://schema.org/BlogPosting">
												<?php
												$this->item = &$item;
												echo $this->loadTemplate('item');
												?>
											</div>
											<!-- end item -->
											<?php $counter++; ?>
										</div>
	
									<?php endforeach; ?>
								<?php endif; ?>

						</div>
					</div>



					<?php if (!empty($this->link_items)) : ?>
						<div class="items-more">
							<?php echo $this->loadTemplate('links'); ?>
						</div>
					<?php endif; ?>

					<?php if ($this->maxLevel != 0 && !empty($this->children[$this->category->id])) : ?>
						<div class="cat-children">
							<?php if ($this->params->get('show_category_heading_title_text', 1) == 1) : ?>
								<h3> <?php echo JText::_('JGLOBAL_SUBCATEGORIES'); ?> </h3>
							<?php endif; ?>
							<?php echo $this->loadTemplate('children'); ?> </div>
					<?php endif; ?>
					<?php if (($this->params->def('show_pagination', 1) == 1 || ($this->params->get('show_pagination') == 2)) && ($this->pagination->get('pages.total') > 1)) : ?>
						<div class="pagination-wrapper">
						<?php echo $this->pagination->getPagesLinks(); ?> 					
						</div>
						<?php if ($this->params->def('show_pagination_results', 1)) : ?>
							<div class="d-block counter-pagination text-center small"> <?php echo $this->pagination->getPagesCounter(); ?> </div>
						<?php endif; ?>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>
</div>
