<?php

class views_handler_field_emh_webform_answer extends views_handler_field {

  /**
   * Add additional fields.
   */
  function construct() {
    parent::construct();
    $this->additional_fields['sid'] = 'sid';
  }

  /**
   * Define our additional configuration setting.
   */
  function option_definition() {
    $options = parent::option_definition();
    return $options;
  }

  /**
   * Renders our field, displays the answer.
   */
  function render($values) {
    if (isset($values->{$this->aliases['sid']})) {
      $sid = $values->{$this->aliases['sid']};
    }
    else {
      return 0;
    }

    module_load_include('inc', 'webform', 'includes/webform.submissions');
    $submission = webform_get_submissions(array('sid' => $sid));
    $nid = $submission[$sid]->nid;
    $entity = webform_get_submission($nid, $sid);
    global $language;
    return l(
            emh_request_get_answer($entity, 'webform_submission'),
            'node/' . $nid . '/submission/' . $sid,
            array(
              'language' => $language,
              'html' => TRUE,
            )
          );
  }

  /**
   * Only display the column for users with the appropriate permission.
   */
  function access() {
    return TRUE;
  }

  /**
   * Just do some basic checks.
   */
  function query() {
    $this->ensure_my_table();
    $this->add_additional_fields();
  }

}