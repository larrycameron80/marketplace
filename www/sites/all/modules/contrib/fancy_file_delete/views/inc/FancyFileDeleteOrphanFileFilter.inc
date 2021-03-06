<?php
/**
 * @file
 * Fancy File Delete Orphan Files Views Settings.
 */

class FancyFileDeleteOrphanFileFilter extends views_handler_filter {

  function value_form(&$form, &$form_state) {
    parent::value_form($form, $form_state);

    // Hide default behavoir just in case.
    $form['expose_button']['#access'] = FALSE;
    $form['more']['#access'] = FALSE;

    $form['orphan_text'] = array(
      '#type' => 'item',
      '#markup' => t('This is just a custom query filter no need for any configuration.')
    );
  }

  function query() {
    $this->ensure_my_table();

    // Check to see if field collection is present to prevent deletion.
    // Of files attached in them, else grab oprhans normally.
    // @see https://www.drupal.org/node/2721831 for issue.
    if (module_exists('field_collection')) {
      $query = db_query("SELECT fm.fid, fm.filename, fm.uri, fu.count FROM {file_managed} fm LEFT OUTER JOIN {file_usage} fu ON (fm.fid = fu.fid) LEFT OUTER JOIN node n ON fu.id = n.nid LEFT OUTER JOIN {field_collection_item} fci ON fu.id = fci.item_id WHERE nid IS NULL AND fci.item_id IS NULL AND fu.id != fu.fid;");
    }
    else {
      $query = db_query("SELECT fm.* FROM {file_managed} fm LEFT OUTER JOIN {file_usage} fu ON (fm.fid = fu.fid) LEFT OUTER JOIN node n ON (fu.id = n.nid) WHERE n.nid IS NULL");
    }

    // Check to see total.
    $total = $query->rowCount();

    if ($total) {
      $results = $query->fetchAll();
      foreach ($results as $result) {
        $files[] = $result->fid;
      }
      $this->query->add_where(0, $this->table_alias . '.fid', array($files), 'IN');
    }
    else {
      // No Results, return NULL, carry on.
      $this->query->add_where(0, $this->table_alias . '.fid', NULL, '=');
    }

  }
}
