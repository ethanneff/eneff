$(document).ready(function() {
 var flickerAPI = "//api.flickr.com/services/feeds/photos_public.gne?jsoncallback=?";

 // when submit button is pressed
 $('form').submit(function (evt) {
    // assign
    var $submitButton = $('#submit');
    var $searchField = $('#search');
    var animal = $searchField.val();

    // prevent the submit button from going to another page
    evt.preventDefault();
    // reset the photos div
    $('#photos').html('');
    // disable the search until a reponse comes back
    $searchField.prop("disabled",true);
    $submitButton.attr("disabled", true).val("Searching....");

    // pull from flickr (url, data, callfunction)
    $.getJSON(flickerAPI, {
        tags: animal,
        format: "json"
      },
    function(data){
      // create html string for photos
      var photoHTML = '';
      // loop through the JSON data
      if (data.items.length > 0) {
        $.each(data.items,function(i,photo) {
          photoHTML += '<li class="grid-25 tablet-grid-50">';
          photoHTML += '<a href="' + photo.link + '" class="image">';
          photoHTML += '<img src="' + photo.media.m + '"></a></li>';
        }); // end each
      } else {
        photoHTML = "<p>No photos found that match: " + animal + ".</p>"
      }
      // add the HTML string to the HTML document
      $('#photos').html(photoHTML);
      // re-enable the search
      $searchField.prop("disabled", false);
      $submitButton.attr("disabled", false).val("Search");
    }); // end getJSON
  }); // end click
}); // end ready