<?php defined ('_JEXEC') or die; ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>">
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
          <jdoc:include type="head" />
      <?php
          $doc = JFactory::getDocument();
          unset($doc->_scripts[JURI::root(true) . '/media/system/js/mootools-more.js']);
          unset($doc->_scripts[JURI::root(true) . '/media/system/js/mootools-core.js']);
          unset($doc->_scripts[JURI::root(true) . '/media/system/js/core.js']);
          unset($doc->_scripts[JURI::root(true) . '/media/system/js/modal.js']);
          unset($doc->_scripts[JURI::root(true) . '/media/system/js/caption.js']);
          unset($doc->_scripts[JURI::root(true) . '/media/jui/js/jquery.min.js']);
          unset($doc->_scripts[JURI::root(true) . '/media/jui/js/jquery-noconflict.js']);
          unset($doc->_scripts[JURI::root(true) . '/media/jui/js/bootstrap.min.js']);
          unset($doc->_scripts[JURI::root(true) . '/media/jui/js/jquery-migrate.min.js']);
          unset($doc->_scripts[JURI::root(true) . '/plugins/content/jw_sig/jw_sig/includes/js/jquery_fancybox/fancybox/lib/jquery.mousewheel-3.0.6.pack.js']);
          unset($doc->_scripts[JURI::root(true) .  '/plugins/content/jw_sig/jw_sig/includes/js/jquery_fancybox/fancybox/jquery.fancybox.pack.js?v=2.1.5']);
          unset($doc->_scripts[JURI::root(true) .  '/plugins/content/jw_sig/jw_sig/includes/js/jquery_fancybox/fancybox/helpers/jquery.fancybox-buttons.js?v=2.1.5']);
          unset($doc->_scripts[JURI::root(true) .  '/plugins/content/jw_sig/jw_sig/includes/js/jquery_fancybox/fancybox/helpers/jquery.fancybox-thumbs.js?v=2.1.5']);
          unset($doc->_scripts[JURI::root(true) .  '/plugins/content/jw_sig/jw_sig/includes/js/behaviour.js']);
          $doc = JFactory::getDocument();
            foreach ( $doc->_links as $k => $array ) {
              if ( $array['relation'] == 'canonical' ) {
                  unset($doc->_links[$k]);
              }
          }
        defined('_JEXEC') or die;
        unset($this->_scripts[JURI::root(true).'/media/system/js/caption.js']);
        if (isset($this->_script['text/javascript']))
        { $this->_script['text/javascript'] = preg_replace('%window\.addEvent\    (\'load\',\s*function\(\)\s*{\s*new\s*JCaption\(\'img.caption\'\);\s*}\);\s*%',     '', $this->_script['text/javascript']);
        if (empty($this->_script['text/javascript']))
        unset($this->_script['text/javascript']);}
        ?>
        <?php
        defined( '_JEXEC' ) or die( 'Access Denied.' );
      $this->_scripts = array();
      ?>
      <link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/css/fonts.css" />
      <link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/css/bootstrap-italia.min.css" />
      <link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/css/jdi-ok.css">
  </head>
  <?php
    $app = JFactory::getApplication();
    $menu = $app->getMenu()->getActive();
    $pageclass = '';
    if (is_object($menu))
      $pageclass = $menu->params->get('pageclass_sfx');
  ?>
  <body class="<?php echo $pageclass ?>">
    <header class="it-header-wrapper">
      <div class="it-nav-wrapper">
        <div class="it-header-center-wrapper">
          <div class="container-lg">
            <div class="row">
              <div class="col-10 col-lg-7 main-title">
                  <div class="wrapper-title ml-5 ml-lg-0">
                    <a href="<?php echo $this->baseurl; ?>/">
                      <div class="d-flex flex-row align-items-center">
                        <div class="logo-img"><jdoc:include type="modules" name="logo" style="logo"/></div>
                        <div class="d-flex flex-column pl-3 pl-sm-4">
                          <span class="text-sitename">
                          <?php echo htmlspecialchars($app->get('sitename')); ?>
                          </span>
                          <span class="d-block site-subname"><jdoc:include type="modules" name="subtitle" style="subtitle"/></span>
                        </div>
                      </div>
                    </a>
                  </div>
              </div>
              <div class="col-12 offset-lg-1 col-lg-4">
                <jdoc:include type="modules" name="search" style="search"/>
              </div>
            </div>
          </div>
        </div>
        <div class="it-header-navbar-wrapper">
          <div class="container-lg">
            <div class="row">
              <div class="col-12">
                  <jdoc:include type="modules" name="menuprincipale" style="menuprincipale"/>
              </div>  
            </div>
          </div>        
        </div>
      </div>
    </header>
    <main>
    <?php if ($this->countModules('header')){ ?>
      <div class="modheader-wrapper">
        <jdoc:include type="modules" name="header" style="header"/>
    </div>
      <?php } ?>
      <?php if ($this->countModules('percorso')){ ?>
        <div class="breadcrumbs-jdi">
          <div class="container-lg">
            <div class="row">
              <div class="col-12">
                <jdoc:include type="modules" name="percorso" style="percorso"/>
              </div>
            </div>
          </div>
        </div>
      <?php } ?>
      <?php if ($this->countModules('user')){ ?>
      <section class="user-wrapper">
        <jdoc:include type="modules" name="user" style="user" headerLevel="1"/>
      </section>
      <?php } ?>
      <section class="component">
        <jdoc:include type="component" />
      </section>
      <?php if ($this->countModules('userbottom')){ ?>
      <section class="userbottom-wrapper">
        <jdoc:include type="modules" name="userbottom" style="userbottom"/>
      </section>
      <?php } ?>
    </main>
    <footer id="footer-wrapper" class="footer-wrapper">
      <div class="container-lg">
        <div class="boottom-row">
          <div class="row">
            <div class="col-md-4">
              <jdoc:include type="modules" name="bottom1" style="bottom"/>
            </div>
            <div class="col-md-4">
              <jdoc:include type="modules" name="bottom2" style="bottom"/>
            </div>
            <div class="col-md-4">
              <jdoc:include type="modules" name="bottom3" style="bottom"/>
            </div>
          </div>
        </div>
      </div>
      <div class="footer-row">
        <div class="footer-menu">
          <div class="container-lg">
            <div class="row">
              <div class="col"><jdoc:include type="modules" name="footer" /></div>
            </div>
          </div>
        </div>
        <div class="container-lg mt-4 copyright">
          <div class="row">
            <div class="col">
            <jdoc:include type="modules" name="copyright" style="copyright"/>
            </div>
          </div>  
        </div>
      </div>
    </footer>
    <script src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/js/bootstrap-italia.bundle.min.js"></script>
    <script src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/js/owl.carousel.min.js"></script>
    <link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/css/owl.theme.default.min.css">
    <script src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/js/jdi.js"></script>
  </body>
</html>
