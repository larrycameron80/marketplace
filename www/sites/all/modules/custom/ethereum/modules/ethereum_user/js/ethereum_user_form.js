/**
 * @file
 */

(function ($) {

  Drupal.behaviors.ethereum_user_form = {
    attach: function (context, settings) {
      $('#ethereum_user_address_trigger').click(function () {
        $('#ethereum-user-form').toggle('fast');
      });
    }
  }
}(jQuery));
