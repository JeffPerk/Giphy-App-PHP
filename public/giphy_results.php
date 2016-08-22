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
          <?php echo "<div class='gif-image'><img style='height: 100%; width: 100%;' id='image-thumbnail' src='".$value['images']['fixed_height_small']['url']."'/></div>"; ?>
        <?php endforeach; ?>
      </div>
      <div id="modal"></div>
    </section>


    <script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
    <script type="text/javascript">
      $(function() {
        var currentMousePos = {x: -1, y: -1};
        $(document).mousemove(function(event) {
          currentMousePos.x = event.pageX;
          currentMousePos.y = event.pageY;
          if($('#modal').css('display') != 'none') {
            $('#modal').css({
              top: currentMousePos.y,
              left: currentMousePos.x + 12
            });
          }
        });
        $('.gif-image').on('mouseover', function() {
          var image = $(this).find('#image-thumbnail');
          var modal = $('#modal');
          $(modal).html(image.clone());
          $(modal).css({
              top: currentMousePos.y,
              left: currentMousePos.x + 12
          });
          $(modal).show();
        });
        $('.gif-image').on('mouseleave', function() {
          $(modal).hide();
        });
      });
    </script>
  </body>
</html>
