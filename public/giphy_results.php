<?php

if (isset($_POST['submit'])) {
  $curl = curl_init();
  $q = $_POST['giphy'];
  if (strpos($q, " ")) {
    $q = str_replace(" ", "", $q);
  }
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
    <link rel="stylesheet" href="css/bootstrap.min.css" charset="utf-8">
    <link rel="stylesheet" href="css/style_main.css" charset="utf-8">
    <link href='https://fonts.googleapis.com/css?family=Bangers' rel='stylesheet' type='text/css'>
  </head>
  <body>
    <section class="header-container">
      <div class="app-name">
        <a id="giphy-title" href="index.php">GiphyApp</a>
      </div>
      <div class="favorites-link">
        Favorites
      </div>
    </section>
    <section class="results-container">
      <div class="results-bar">
        <?php foreach ($data['data'] as $key => $value): ?>
          <?php echo "<div><img id='image-thumbnail' src='".$value['images']['fixed_height_small']['url']."'/></div>"; ?>
        <?php endforeach; ?>
      </div>
    </section>
  </body>
</html>
