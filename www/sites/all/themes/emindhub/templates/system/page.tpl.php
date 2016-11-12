<?php
/**
 * @file
 * Default theme implementation to display a single Drupal page.
 *
 * The doctype, html, head and body tags are not in this template. Instead they
 * can be found in the html.tpl.php template in this directory.
 *
 * Available variables:
 *
 * General utility variables:
 * - $base_path: The base URL path of the Drupal installation. At the very
 *   least, this will always default to /.
 * - $directory: The directory the template is located in, e.g. modules/system
 *   or themes/bartik.
 * - $is_front: TRUE if the current page is the front page.
 * - $logged_in: TRUE if the user is registered and signed in.
 * - $is_admin: TRUE if the user has permission to access administration pages.
 *
 * Site identity:
 * - $front_page: The URL of the front page. Use this instead of $base_path,
 *   when linking to the front page. This includes the language domain or
 *   prefix.
 * - $logo: The path to the logo image, as defined in theme configuration.
 * - $site_name: The name of the site, empty when display has been disabled
 *   in theme settings.
 * - $site_slogan: The slogan of the site, empty when display has been disabled
 *   in theme settings.
 *
 * Navigation:
 * - $main_menu (array): An array containing the Main menu links for the
 *   site, if they have been configured.
 * - $secondary_menu (array): An array containing the Secondary menu links for
 *   the site, if they have been configured.
 * - $breadcrumb: The breadcrumb trail for the current page.
 *
 * Page content (in order of occurrence in the default page.tpl.php):
 * - $title_prefix (array): An array containing additional output populated by
 *   modules, intended to be displayed in front of the main title tag that
 *   appears in the template.
 * - $title: The page title, for use in the actual HTML content.
 * - $title_suffix (array): An array containing additional output populated by
 *   modules, intended to be displayed after the main title tag that appears in
 *   the template.
 * - $messages: HTML for status and error messages. Should be displayed
 *   prominently.
 * - $tabs (array): Tabs linking to any sub-pages beneath the current page
 *   (e.g., the view and edit tabs when displaying a node).
 * - $action_links (array): Actions local to the page, such as 'Add menu' on the
 *   menu administration interface.
 * - $feed_icons: A string of all feed icons for the current page.
 * - $node: The node object, if there is an automatically-loaded node
 *   associated with the page, and the node ID is the second argument
 *   in the page's path (e.g. node/12345 and node/12345/revisions, but not
 *   comment/reply/12345).
 *
 * Regions:
 * - $page['help']: Dynamic help text, mostly for admin pages.
 * - $page['highlighted']: Items for the highlighted content region.
 * - $page['content']: The main content of the current page.
 * - $page['sidebar_first']: Items for the first sidebar.
 * - $page['sidebar_second']: Items for the second sidebar.
 * - $page['header']: Items for the header region.
 * - $page['footer']: Items for the footer region.
 *
 * @see bootstrap_preprocess_page()
 * @see template_preprocess()
 * @see template_preprocess_page()
 * @see bootstrap_process_page()
 * @see template_process()
 * @see html.tpl.php
 *
 * @ingroup themeable
 */
global $base_url;
?>
<header id="navbar" role="banner" class="navbar navbar-emh">

  <div class="container">

    <div class="row">

      <?php if ( $logged_in ): ?>
      <div class="emh-brand col-sm-1">
      <?php else : ?>
      <div class="emh-brand col-xs-6 col-sm-3">
      <?php endif; ?>

        <?php if (!empty($page['burgermenu'])): ?>
        <div class="burger-menu-btn-container" onclick="onClickBurgerMenuBtn();">
          <button type="button" class="btn btn-default emh-blue">
            <span class="glyphicon glyphicon-menu-hamburger" aria-hidden="true"></span>
          </button>
        </div>
        <?php endif; ?>

        <?php if ($logo): ?>
        <a class="logo navbar-btn" href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>">
          <?php if ( $logged_in ): ?>
          <img src="<?php print $base_url . '/' . drupal_get_path('theme', 'emindhub'); ?>/images/logo/circles.svg" alt="<?php print $site_name; ?>" />
          <?php else : ?>
          <img src="<?php print $base_url . '/' . drupal_get_path('theme', 'emindhub'); ?>/images/logo/logo-h.svg" alt="<?php print $site_name; ?>" />
          <?php endif; ?>
        </a>
        <?php endif; ?>

      </div>

      <?php if ( $logged_in ): ?>
      <div class="col-md-11">
      <?php else : ?>
      <div class="col-md-9">
      <?php endif; ?>

        <nav class="navbar">

          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            </button>
          </div>

          <?php if (!empty($page['topmenu']) || !empty($page['navigation'])): ?>

          <div class="collapse navbar-collapse">
            <?php print render($page['topmenu']); ?>
            <?php print render($page['navigation']); ?>
          </div>

          <?php endif; ?>

        </nav>

      </div>

    </div>

  </div>

</header>

<?php if (!empty($page['header'])): ?>
<header role="banner" id="page-header">
  <div class="container-fluid">

    <div class="row">
      <?php print render($page['header']); ?>
    </div>

  </div>
</header>
<?php endif; ?>

<div class="main-container container-fluid">

    <header id="title">

      <div class="container">

        <a id="main-content"></a>

        <div class="row">

          <div class="title-left">

            <?php print render($title_prefix); ?>
            <?php if (!empty($title)): ?>
              <div class="title">
                <?php emindhub_show_request_type(); ?>
                <h1 class="page-header"><?php print $title; ?></h1>
              </div>
            <?php endif; ?>
            <?php print render($title_suffix); ?>

            <?php if (!empty($page['title'])): ?>
              <?php print render($page['title']); ?>
            <?php endif; ?>

            <?php if (!empty($baseline)) : ?>
              <p class="emh-title-baseline"><?php print $baseline; ?></p>
            <?php endif; ?>

          </div>

          <?php if (!empty($page['title_right'])): ?>
            <?php print render($page['title_right']); ?>
          <?php endif; ?>

        </div>

        <?php if (!empty($page['title_bottom'])): ?>
          <?php print render($page['title_bottom']); ?>
        <?php endif; ?>

        <?php print $messages; ?>

        <?php $primary_tabs = emh_submenu_menu_tabs_primary($tabs);
        if (!empty($primary_tabs)) : ?>
          <ul class="tabs--primary nav nav-tabs">
            <?php print render($primary_tabs); ?>
          </ul>
        <?php endif; ?>

      </div>

    </header>

    <?php if (!empty($page['top'])): ?>
      <div class="container-fluid">
        <?php print render($page['top']); ?>
      </div>
    <?php endif; ?>

    <div class="container">

      <?php if (!empty($page['highlighted'])): ?>
      <div class="highlighted jumbotron">
          <?php print render($page['highlighted']); ?>
      </div>
      <?php endif; ?>

      <div class="row">

        <?php if (!empty($page['sidebar_first'])) : ?>
        <?php if ($is_front) : ?>
        <aside id="sidebar-first" class="col-md-5 col-md-offset-1" role="complementary">
        <?php else : ?>
        <aside id="sidebar-first" class="col-md-2" role="complementary">
        <?php endif; ?>
          <?php print render($page['sidebar_first']); ?>
        </aside>
        <?php endif; ?>

        <section id="maincol"<?php print $content_column_class; ?>>

          <?php if (!empty($action_links)): ?>
            <ul class="action-links"><?php print render($action_links); ?></ul>
          <?php endif; ?>

          <?php print render($page['content']); ?>

        </section>

        <?php if (!empty($page['sidebar_second']) || !empty($page['help'])): ?>
        <?php if ($is_front) : ?>
        <aside id="sidebar-second" class="col-md-5" role="complementary">
        <?php else : ?>
        <aside id="sidebar-second" class="col-md-3" role="complementary">
        <?php endif; ?>
          <?php if (!empty($page['help'])): ?>
            <?php print render($page['help']); ?>
          <?php endif; ?>
          <?php print render($page['sidebar_second']); ?>
        </aside>
        <?php endif; ?>

      </div>

    </div>

    <?php if (!empty($page['bottom']) || !empty($page['bottom_right'])): ?>
    <div class="container">
      <div class="bottom row">

        <?php if (!empty($page['bottom']) && !empty($page['bottom_right'])): ?>
        <div class="row">
          <?php print render($page['bottom']); ?>
          <?php print render($page['bottom_right']); ?>
        </div>
        <?php endif; ?>

        <?php if ( (!empty($page['bottom']) && empty($page['bottom_right'])) || (empty($page['bottom']) && !empty($page['bottom_right'])) ): ?>
          <?php print render($page['bottom']); ?>
          <?php print render($page['bottom_right']); ?>
        <?php endif; ?>

      </div>
    </div>
    <?php endif; ?>

</div>

<?php print render($page['burgermenu']); ?>

<footer class="footer">
  <div class="container">
    <div class="row">
      <div class="footer-logo">
        <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>">
          <img src="<?php print $base_url . '/' . drupal_get_path('theme', 'emindhub'); ?>/images/logo/logo-h-white.svg" alt="<?php print $site_name; ?>" />
          <span><?php print $site_slogan; ?></span>
        </a>
      </div>
      <div class="footer-nav">
        <?php print render($page['footer_top']); ?>
      </div>
      <div class="footer-contact">
        <h4><?php print t('Contact us'); ?></h4>
        <p><a href="<?php print url('contact'); ?>">contact@emindhub.com</a></p>
      </div>
      <div class="footer-social">
        <div class="social-links">
          <a class="social-network" href="https://twitter.com/emindhub"><img src="<?php print $base_url . '/' . drupal_get_path('theme', 'emindhub'); ?>/images/twitter.svg" alt="Twitter" /></a>
          <a class="social-network" href="https://www.linkedin.com/company/emindhub"><img src="<?php print $base_url . '/' . drupal_get_path('theme', 'emindhub'); ?>/images/linkedin.svg" alt="Linkedin" /></a>
        </div>
      </div>
    </div>
    <hr />
    <p class="footer-credits"><?php print date('Y'); ?> <?php print $site_name; ?> | <?php print t('All rights reserved'); ?></p>
  </div>
</footer>

<?php print render($page['footer_bottom']); ?>
