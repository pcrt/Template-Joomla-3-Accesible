<?php
defined('_JEXEC') or die('Restricted access'); ?>


<?php function modChrome_bottom($module, $params, $attribs) { ?>
    <div class="col-menubottom">
        <?php if ($module->showtitle) { ?>
            <div class="title-menu-bottom"><?php echo $module->title; ?></div>
        <?php } ?>
        <?php echo $module->content; ?>
    </div>
<?php } ?>

<?php function modChrome_userbottom($module, $params, $attribs) { ?>
    <div class="userbottom-content">
    <div class="container-lg"> 
        <div class="mx-3 mx-lg-1">
            <div class="row">
                <div class="col">   
                    <?php if ($module->showtitle) { ?>    
                        <div class="title-userbottom">
                            <h5><?php echo $module->title; ?></h5>
                        </div>
                    <?php } ?>
                    <?php echo $module->content; ?>
                </div>
            </div>   
        </div>  
    </div>
    </div>
<?php } ?>

<?php function modChrome_user($module, &$params, &$attribs) { 

    echo '<div class="user-content ' .$params->get( 'moduleclass_sfx' ) .'" >';
    $headerTag     = htmlspecialchars($params->get('header_tag'), ENT_QUOTES, 'UTF-8');
    ?>

        <div class="container-lg"> 
            <div class="mx-3 mx-lg-1">
                <div class="row">
                    <div class="col">   
                        <?php if ($module->showtitle) { ?>    
                            <div class="title-user">
                                <?php echo '<' . $headerTag . ' class="' . $headerClass . '">' . $module->title . '</' . $headerTag . '>'; ?>
                            </div>
                        <?php } ?>
                        <?php echo $module->content; ?>
                    </div>
                </div>   
            </div>  
        </div>
    </div>
<?php } ?>

<?php function modChrome_istituti($module, $params, $attribs) { ?>
    <div class="card-wrapper card-space card-istituti">
        <div class="card card-bg card-big border-bottom-card">
            <div class="card-body">
                <div class="row">
                    <div class="col-auto">
                        <svg class="icon align-bottom"><use xlink:href="/templates/joomla-designitalia/svg/sprite.svg#it-pa"></use></svg>                    
                    </div>
                    <div class="col">
                        <?php if ($module->showtitle) { ?>
                            <h5 class="card-title"><?php echo $module->title; ?></h5>
                        <?php } ?>
                        <?php echo $module->content; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php } ?>