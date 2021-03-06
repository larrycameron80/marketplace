<section id="<?php print $block_html_id; ?>" class="emh-module requests container <?php print $classes; ?> clearfix"<?php print $attributes; ?>>

  <?php print render($title_prefix); ?>
  <?php if ($title) : ?>
    <h2<?php print $title_attributes; ?>><span><?php print $title; ?></span></h2>
  <?php endif;?>
  <?php print render($title_suffix); ?>

  <div class="emh-subtitle">
    <?php print t('Access the latest requests'); ?>
  </div>

  <?php if ($content) : ?>
    <?php print $content; ?>

    <div class="emh-dots emh-dots-alt"></div>

    <div class="emh-actions">

      <div class="emh-action">
        <a class="emh-button solid" href="#login-connexion" data-toggle="modal" data-target="#login-connexion"><?php print t('Post a request'); ?></a>
      </div>

      <div class="emh-action">
        <a class="emh-button solid-alt" href="#login-connexion" data-toggle="modal" data-target="#login-connexion"><?php print t('Answer a request'); ?></a>
      </div>

    </div>

  <?php endif;?>

</section> <!-- /.block -->
