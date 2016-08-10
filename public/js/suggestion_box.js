$(document).ready(function(e) {
  var suggestion_box1 = ['funny', 'dogs', 'space', 'crazy', 'crude', 'cats', 'dangerous', 'stupid', 'stunts', 'bears', 'basketball', 'drunk', 'tacos', 'potatoes', 'football'];

  function runSuggestion(arr) {
    var div = $('#suggestion-box')
    // var div2 = $('#suggestion-box2')
    // var div3 = $('#suggestion-box3')
    $.each(arr, function(index, value) {
      setTimeout(function() {
        div.html("#" + value).fadeIn().fadeOut(5000);
      }, 6000 * index);
    });
  }

  runSuggestion(suggestion_box1);
})
