<?php
  $curl = curl_init();
  if (isset($_POST['submit'])) {
    $q = $_POST['giphy'];
    curl_setopt_array($curl, array(
      CURLOPT_RETURNTRANSFER => 1,
      CURLOPT_URL => 'http://api.giphy.com/v1/gifs/search?q='. $q .'&api_key=dc6zaTOxFJmzC',
      CURLOPT_USERAGENT => 'Giphy Sample Request'
    ));

  $resp = curl_exec($curl);

  curl_close($curl);
  header('Location:giphy_results.php');
  die();
}

?>
