<?php

// JAVASCRIPT & JQUERY FUNCTIONS

add_action( 'admin_footer', 'js_form' ); // Write our JS below here
add_action( 'wp_footer', 'js_form' );
/**
 * Loads and displays the available languages of badge's description according to the badge selected.
 *
 * @author Nicolas TORION
 * @since 1.0.0
*/
function js_form() {
  ?>

  <script>
  jQuery("#badge_form_a .level").on("click", function() {

    jQuery("#badge_form_a #select_badge").html("<br /><img src='http://<?php echo $_SERVER['SERVER_NAME']; ?>/wp-content/plugins/badges-issuer-for-wp/images/load.gif' width='50px' height='50px' />");

    var data = {
			'action': 'action_select_badge',
      'form': 'form_a_',
			'level_selected': jQuery("#badge_form_a .level:checked").val()
		};

		// since 2.8 ajaxurl is always defined in the admin header and points to admin-ajax.php
		jQuery.post("<?php echo "http://".$_SERVER['SERVER_NAME']."/wp-content/plugins/badges-issuer-for-wp/includes/ajax/custom_ajax.php"; ?>", data, function(response) {
			jQuery("#badge_form_a #select_badge").html(response);
		});
  });

  jQuery("#badge_form_b .level").on("click", function() {

    jQuery("#badge_form_b #select_badge").html("<br /><img src='http://<?php echo $_SERVER['SERVER_NAME']; ?>/wp-content/plugins/badges-issuer-for-wp/images/load.gif' width='50px' height='50px' />");

    var data = {
			'action': 'action_select_badge',
      'form': 'form_b_',
			'level_selected': jQuery("#badge_form_b .level:checked").val()
		};

		// since 2.8 ajaxurl is always defined in the admin header and points to admin-ajax.php
		jQuery.post("<?php echo "http://".$_SERVER['SERVER_NAME']."/wp-content/plugins/badges-issuer-for-wp/includes/ajax/custom_ajax.php"; ?>", data, function(response) {
			jQuery("#badge_form_b #select_badge").html(response);
		});
  });

  jQuery("#badge_form_c .level").on("click", function() {

    jQuery("#badge_form_c #select_badge").html("<br /><img src='http://<?php echo $_SERVER['SERVER_NAME']; ?>/wp-content/plugins/badges-issuer-for-wp/images/load.gif' width='50px' height='50px' />");

    var data = {
			'action': 'action_select_badge',
      'form': 'form_c_',
			'level_selected': jQuery("#badge_form_c .level:checked").val()
		};

		// since 2.8 ajaxurl is always defined in the admin header and points to admin-ajax.php
		jQuery.post("<?php echo "http://".$_SERVER['SERVER_NAME']."/wp-content/plugins/badges-issuer-for-wp/includes/ajax/custom_ajax.php"; ?>", data, function(response) {
			jQuery("#badge_form_c #select_badge").html(response);
		});
  });
  </script>
  <?php
}

add_action( 'admin_footer', 'js_send_badge_form' ); // Write our JS below here
add_action( 'wp_footer', 'js_send_badge_form' );

/**
 * Check if different forms for sending badges are completed well.
 * If it's the case, the submit buttons are activated.
 *
 * @author Nicolas TORION
 * @since 1.0.0
*/
function js_send_badge_form() {
  ?>
  <script>
    setInterval(function(){check_badge_form();}, 500);

    function check_mails(mails) {

      var testEmail = /^[A-Z0-9._%+-]+@([A-Z0-9-]+\.)+[A-Z]{2,4}$/i;

      for (var i = 0; i < mails.length; i++) {
        if(!testEmail.test(mails[i])) {
          return false;
        }
      }
      return true;
    }

    function check_badge_form() {
      var badge_a = jQuery("#badge_form_a .input-badge");

      var mails_b = jQuery("#badge_form_b .mail").val().split("\n");
      var badge_b = jQuery("#badge_form_b .input-badge");

      var mails_c = jQuery("#badge_form_c .mail").val().split("\n");
      var badge_c = jQuery("#badge_form_c .input-badge");

      if(!badge_a.is(':checked')) {
        jQuery('#submit_button_a').prop('disabled', true);
      }
      else {
        jQuery('#submit_button_a').prop('disabled', false);
      }

      if(!check_mails(mails_b) || !badge_b.is(':checked')) {
        jQuery('#submit_button_b').prop('disabled', true);
      }
      else {
        jQuery('#submit_button_b').prop('disabled', false);
      }

      if(!check_mails(mails_c) || !badge_c.is(':checked')) {
        jQuery('#submit_button_c').prop('disabled', true);
      }
      else {
        jQuery('#submit_button_c').prop('disabled', false);
      }
    }
  </script>
<?php
}
 ?>
