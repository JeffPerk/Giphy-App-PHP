<?php

if (isset($_POST['submit'])) {
  $curl = curl_init();
  $q = $_POST['giphy'];
  if (ctype_space($q)) {
    echo "I'm here";
    // $search_q = str_replace(" ", "", $q);
  }
  // echo $search_q;
  curl_setopt_array($curl, array(
    CURLOPT_RETURNTRANSFER => 1,
    CURLOPT_URL => 'http://api.giphy.com/v1/gifs/search?q='. $q .'&api_key=dc6zaTOxFJmzC',
    CURLOPT_USERAGENT => 'Giphy Sample Request'
  ));
  $data= curl_exec($curl);
  $data = json_decode($data, true);
  curl_close($curl);
}
  // echo "<pre>".print_r($data, true)."</pre>";
  // exit;
 ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Giphy Results</title>
  </head>
  <body>
    <?php foreach ($data['data'] as $key => $value): ?>
      <?php //echo "<pre>".print_r($value, true)."</pre>"; ?>
      <?php echo "<img src='".$value['images']['fixed_height']['url']."'/>"; ?>
    <?php endforeach; ?>
  </body>
</html>
