<div class="row section actions">
  <div class="col-sm-8">
    <?php print render($content['links']['node']); ?>
    <?php print render($content['links']['forward']); ?>
  </div>
  <div class="col-sm-4 text-right">

    <ul class="links list-inline">

      <?php if (!isExpertUser()) : ?>

      <?php if (function_exists('webform_get_submission_count')) : ?>
      <?php if (webform_get_submission_count($node->nid) > 0) : ?>
      <li class="answers_link"><a href="<?php print base_path(); ?>node/<?php print $node->nid; ?>/results"><?php print t('Select best answers'); ?></a></li>
      <?php endif; ?>
      <?php endif; ?>

      <?php if ($comment_count > 0) : ?>
      <li class="answers_link"><a href="<?php print base_path(); ?>node/<?php print $node->nid; ?>/answers"><?php print t('Select best answers'); ?></a></li>
      <?php endif; ?>

      <?php endif; ?>

    </ul>

    <?php print render($content['links']['flag']); ?>

  </div>

</div>
