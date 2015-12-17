console.log('a');


function bob() {
  var data = {};
  data.email = "s@s.com";
  data.password = "s";
  $.post('http://localhost/improve/api/1/users/', data, function(data) {
    console.log(data);
  });
}

bob();
