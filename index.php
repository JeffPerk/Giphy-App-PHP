<?php
  $curl = curl_init();
  $q = 'dogs';

  curl_setopt_array($curl, array(
    CURLOPT_RETURNTRANSFER => 1,
    CURLOPT_URL => 'http://api.giphy.com/v1/gifs/search?q='.$q.'&api_key=dc6zaTOxFJmzC',
    CURLOPT_USERAGENT => 'Giphy Sample Request'
  ));

  $resp = curl_exec($curl);
  // pre($resp);

  curl_close($curl);

  function pre($var) {
   	echo sprintf('<pre>%s</pre>', print_r($var, true));
  }
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Giphy App</title>
  </head>
  <body>
    
  </body>
</html>
