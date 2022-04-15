<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_banners
 *
 * @copyright   Copyright (C) 2005 - 2020 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

JLoader::register('BannerHelper', JPATH_ROOT . '/components/com_banners/helpers/banner.php');
?>
<div class="owl-carousel owl-theme slideheader <?php echo $moduleclass_sfx; ?>" id="slideheader">
<?php if ($headerText) : ?>
	<?php echo $headerText; ?>
<?php endif; ?>

<?php foreach ($list as $item) : ?>
	<div class="slideritem">
		<?php $link = JRoute::_('index.php?option=com_banners&task=click&id=' . $item->id); ?>
		<?php if ($item->type == 1) : ?>
			<?php // Text based banners ?>
			<?php echo str_replace(array('{CLICKURL}', '{NAME}'), array($link, $item->name), $item->custombannercode); ?>
		<?php else : ?>
			<?php $imageurl = $item->params->get('imageurl'); ?>
			<?php $width = $item->params->get('width'); ?>
			<?php $height = $item->params->get('height'); ?>
			<?php if (BannerHelper::isImage($imageurl)) : ?>
				<?php // Image based banner ?>
				<?php $baseurl = strpos($imageurl, 'http') === 0 ? '' : JUri::base(); ?>
				<?php $alt = $item->params->get('alt'); ?>
				<?php $alt = $alt ?: $item->name; ?>
				<?php $alt = $alt ?: JText::_('MOD_BANNERS_BANNER'); ?>

					<div class="slideheader-container">
						<div class="image-container" style="background-image: url(<?php echo $baseurl . $imageurl; ?>)"></div>
						<?php if ($item->description != ''){ ?>
						<div class="wrap-slide">
							<div class="container-lg px-0">
								<div class="caption-slide">
									<p class="title-slider">
										<a
											href="<?php echo $link; ?>"
											title="<?php echo htmlspecialchars($item->name, ENT_QUOTES, 'UTF-8'); ?>">
											<?php echo htmlspecialchars($item->name, ENT_QUOTES, 'UTF-8'); ?>
										</a>
									</p>
									<p class="text-slider">
									<a
										href="<?php echo $link; ?>"
										title="<?php echo htmlspecialchars($item->name, ENT_QUOTES, 'UTF-8'); ?>">
										<?php echo JHtmlString::truncate(strip_tags($item->description), 180); ?>
									</a>
									</p>
								</div>
							</div>
						</div>
						<?php } ?>
					</div>
			<?php elseif (BannerHelper::isFlash($imageurl)) : ?>
				<object
					classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000"
					codebase="http://fpdownload.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,0,0"
					<?php if (!empty($width)) echo ' width="' . $width . '"';?>
					<?php if (!empty($height)) echo ' height="' . $height . '"';?>
				>
					<param name="movie" value="<?php echo $imageurl; ?>" />
					<embed
						src="<?php echo $imageurl; ?>"
						loop="false"
						pluginspage="http://www.macromedia.com/go/get/flashplayer"
						type="application/x-shockwave-flash"
						<?php if (!empty($width)) echo ' width="' . $width . '"';?>
						<?php if (!empty($height)) echo ' height="' . $height . '"';?>
					/>
				</object>
			<?php endif; ?>
		<?php endif; ?>
		<div class="clr"></div>
	</div>
<?php endforeach; ?>

<?php if ($footerText) : ?>
	<div class="bannerfooter">
		<?php echo $footerText; ?>
	</div>
<?php endif; ?>
</div>
