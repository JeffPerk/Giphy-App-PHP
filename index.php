<?php
  $curl = curl_init();
  $q = $_GET['search'];

  curl_setopt_array($curl, array(
    CURLOPT_RETURNTRANSFER => 1,
    CURLOPT_URL => 'http://api.giphy.com/v1/gifs/search?q='. $q .'&api_key=dc6zaTOxFJmzC',
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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giphy App</title>
    <link rel="stylesheet" href="css/bootstrap.min.css" charset="utf-8">
    <link rel="stylesheet" href="css/style_main.css" charset="utf-8">
    <link href='https://fonts.googleapis.com/css?family=Bangers' rel='stylesheet' type='text/css'>
  </head>
  <body>

    <section class="header-container">
      <div class="app-name">
        GiphyApp
      </div>
      <div class="favorites-link">
        Favorites
      </div>
    </section>
    <section class="search-container">
      <div class="title-container">
        <div class="title-banner">
          The Giphy App
        </div>
        <hr>
      </div>
      <div class="search-input-container">
        <div class="suggestion-boxes">
          <span>Suggestions:<div id="suggestion-box"></div></span>
        </div>
        <div class="input-container">
          <div class="input-title">
            <h4>Find Your Giphy!</h4>
          </div>
          <form class="input-form" action="giphy_results.php" method="post">
            <input id="search-field" type="text" name="giphy" placeholder="Search For Giphy...">
            <input id="search-button" class="btn btn-success" type="submit" name="submit" value="Search">
          </form>
        </div>
      </div>
    </section>


    <script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/suggestion_box.js"></script>
  </body>
</html>
