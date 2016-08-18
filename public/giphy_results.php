<?php

if (isset($_POST['submit'])) {
  $curl = curl_init();
  $q = $_POST['giphy'];
  curl_setopt_array($curl, array(
    CURLOPT_RETURNTRANSFER => 1,
    CURLOPT_URL => 'http://api.giphy.com/v1/gifs/search?q='. $q .'&api_key=dc6zaTOxFJmzC',
    CURLOPT_USERAGENT => 'Giphy Sample Request'
  ));
  $data = curl_exec($curl);
  curl_close($curl);
}
// echo $data;

 ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Giphy Results</title>
  </head>
  <body>
    
  </body>
</html>
