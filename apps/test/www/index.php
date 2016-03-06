<?php

function curl($url) {
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $url);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
  $data = curl_exec($ch);
  curl_close($ch);
  return $data;
}

$scraped_website = curl("https://www.evernote.com/shard/s319/sh/5f357f2c-0313-47e0-b8aa-f1d74a56afb3/b7698a97e3104e9f");

?>

<!DOCTYPE html>
<html>
<head>
  <title></title>
  <style type="text/css" media="screen">

  </style>
</head>
<body>

</body>
<script src="/apps/test/jquery.min.js"></script>

<script>
  // no globals
  function getHTML() {
    $.ajax({
      url: 'https://www.google.com',
      type: 'GET',
      success: function(res) {
        console.log(res.responseText);
      }
    });
  }
</script>
</html>