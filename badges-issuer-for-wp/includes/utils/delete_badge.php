<?php

require_once("../../../../../wp-load.php");

if(is_user_logged_in()) {
  if(isset($_GET['hash'])) {
    $upload_dir = wp_upload_dir();
    $json_files_dir = $upload_dir['basedir']."/badges-issuer/json/";
    $url_assertion = $json_files_dir."assertion_".$_GET['hash'].".json";
    $url_badge = $json_files_dir."badge_".$_GET['hash'].".json";

    if(unlink($url_assertion) && unlink($url_badge)) {
      echo "<script>window.close();</script>";
    }
  }
}
else
  echo "Not connected!";

?>