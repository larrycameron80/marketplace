<?php
/**
 * @file
 * ft_content_type.features.inc
 */

/**
 * Implements hook_ctools_plugin_api().
 */
function ft_content_type_ctools_plugin_api($module = NULL, $api = NULL) {
  if ($module == "field_group" && $api == "field_group") {
    return array("version" => "1");
  }
  if ($module == "strongarm" && $api == "strongarm") {
    return array("version" => "1");
  }
}

/**
 * Implements hook_image_default_styles().
 */
function ft_content_type_image_default_styles() {
  $styles = array();

  // Exported image style: news_block.
  $styles['news_block'] = array(
    'label' => 'news block (265x105)',
    'effects' => array(
      2 => array(
        'name' => 'image_scale',
        'data' => array(
          'width' => 300,
          'height' => 250,
          'upscale' => 0,
        ),
        'weight' => 1,
      ),
    ),
  );

  // Exported image style: profile_picture.
  $styles['profile_picture'] = array(
    'label' => 'profile picture',
    'effects' => array(),
  );

  return $styles;
}

/**
 * Implements hook_node_info().
 */
function ft_content_type_node_info() {
  $items = array(
    'article' => array(
      'name' => t('Article'),
      'base' => 'node_content',
      'description' => '',
      'has_title' => '1',
      'title_label' => t('Title'),
      'help' => '',
    ),
    'challenge' => array(
      'name' => t('Challenge'),
      'base' => 'node_content',
      'description' => t('Request for service proposals to innovate or solve a problem'),
      'has_title' => '1',
      'title_label' => t('Title'),
      'help' => '',
    ),
    'circle' => array(
      'name' => t('Circle'),
      'base' => 'node_content',
      'description' => '',
      'has_title' => '1',
      'title_label' => t('Title'),
      'help' => '',
    ),
    'corporate' => array(
      'name' => t('Organisation'),
      'base' => 'node_content',
      'description' => '',
      'has_title' => '1',
      'title_label' => t('Title'),
      'help' => '',
    ),
    'page' => array(
      'name' => t('Basic page'),
      'base' => 'node_content',
      'description' => t('Use <em>basic pages</em> for your static content, such as an \'About us\' page.'),
      'has_title' => '1',
      'title_label' => t('Title'),
      'help' => '',
    ),
    'question1' => array(
      'name' => t('Question'),
      'base' => 'node_content',
      'description' => t('Ask a question online and get multiple answers from experts'),
      'has_title' => '1',
      'title_label' => t('Title'),
      'help' => '',
    ),
    'webform' => array(
      'name' => t('Mission'),
      'base' => 'node_content',
      'description' => t('Create a mission to identify best experts profiles for a specific task or mission'),
      'has_title' => '1',
      'title_label' => t('Title'),
      'help' => '',
    ),
    'working_group' => array(
      'name' => t('Working Group'),
      'base' => 'node_content',
      'description' => '',
      'has_title' => '1',
      'title_label' => t('Title'),
      'help' => '',
    ),
  );
  drupal_alter('node_info', $items);
  return $items;
}