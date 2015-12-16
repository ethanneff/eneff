$(document).ready(function () {
  $('#content').load("pages/about.html");
});

$("header nav a").on("click", function(event) {
	event.preventDefault();
	var anchorLocation = $(this).attr("href");
  $('#content').load("pages/"+anchorLocation);
  console.log($(this).parent().siblings().length);

  $("header nav a").each(function(){
  	$(this).removeClass("selected");
  });
  $(this).addClass('selected')
});
