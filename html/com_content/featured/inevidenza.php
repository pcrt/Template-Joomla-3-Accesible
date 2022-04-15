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

// If the page class is defined, add to class as suffix.
// It will be a separate class if the user starts it with a space
?>
<div class="in-evidenza">
	<div class="container-lg">
		<div class="row">
			<div class="mx-3 mx-lg-0 blog-featured<?php echo $this->pageclass_sfx; ?>" itemscope itemtype="https://schema.org/Blog">
				<?php if ($this->params->get('show_page_heading') != 0) : ?>
				<div class="page-header">
					<h4>
					<?php echo $this->escape($this->params->get('page_heading')); ?>
					</h4>
				</div>
				<?php endif; ?>
				<?php if ($this->params->get('page_subheading')) : ?>
					<p> 
						<?php echo $this->escape($this->params->get('page_subheading')); ?>
					</p>
				<?php endif; ?>
					<div class="it-grid-list-wrapper it-image-label-grid it-masonry">
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
										</div>
								<?php endforeach; ?>
							<?php endif; ?>

							<?php if (!empty($this->link_items)) : ?>
								<div class="items-more">
								<?php echo $this->loadTemplate('links'); ?>
								</div>
							<?php endif; ?>
						</div>
					</div>
				<?php if ($this->params->def('show_pagination', 2) == 1  || ($this->params->get('show_pagination') == 2 && $this->pagination->pagesTotal > 1)) : ?>
					<div class="pagination">

						<?php if ($this->params->def('show_pagination_results', 1)) : ?>
							<p class="counter pull-right">
								<?php echo $this->pagination->getPagesCounter(); ?>
							</p>
						<?php endif; ?>
								<?php echo $this->pagination->getPagesLinks(); ?>
					</div>
				<?php endif; ?>
			</div>
		</div>
	</div>
</div>