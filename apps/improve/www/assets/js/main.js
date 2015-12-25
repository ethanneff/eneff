function bob() {
  var data = {};
  data.email = "s@s.com";
  data.password = "s";
  $.post("http://localhost/improve/api/1/users/", data, function(data) {
    console.log(data);
  });
}

bob();


// listen
$(window).on('hashchange', function(event) {
  var hash = window.location.hash;
  var clean = hash.replace(/\/*#+\/*/gi,"");
  console.log(clean);
});


// user
var user = (function() {
  return {

  }
}());

// router
var router = (function() {

}());


// pubsub


// main
var main = (function() {
  // cache dom
  var $nav = $("#nav li");
  var $navHeader = $("#nav-header");
  var $login = $("#login");
  var $logout = $("#logout");

  // bind
  $nav.on("click", function(event) { _nav(event, $(this)); });
  $login.on("click", function(event) { login(event, $(this)); });
  $logout.on("click", function(event) { logout(event, $(this)); });

  // listen

  // functions
  function _nav(event, element) {
    $navHeader.text("| " + element.find(".hidden-xs").text());
    $nav.removeClass("active");
    element.addClass("active");
  }

  function login(event, element) {
    console.log('a');
    // element.toggleClass("hidden");
    // $logout.toggleClass("hidden");
  }

  function logout(event, element) {
    element.toggleClass("hidden");
    $login.toggleClass("hidden");
  }

  return {
    login: login,
    logout: logout
  }
}());


