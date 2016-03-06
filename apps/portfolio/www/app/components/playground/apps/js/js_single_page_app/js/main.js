// This script implements simple routing by loading partial HTML files
// named corresponding to fragment identifiers.
//
// By Ethan Neff October 2014

// Wrap everything in an immediately invoked function expression,
// so no global variables are introduced.
(function () {
  // Stores the cached partial HTML pages.
  // Keys correspond to fragment identifiers.
  // Values are the text content of each loaded partial HTML file.
  var partialsCache = {}

  // Encapsulates an HTTP GET request using XMLHttpRequest.
  // Fetches the file at the given path, then
  // calls the callback with the text content of the file.
  function fetchFile(path, callback){

    // Create a new AJAX request for fetching the partial HTML file.
    var request = new XMLHttpRequest();

    // Call the callback with the content loaded from the file.
    request.onload = function () {
    	// return the callback as a function
    	callback(request.responseText);
    };

    // Fetch the partial HTML file for the given fragment id.
    request.open("GET", path);
    request.send(null);
  }

  // Gets the appropriate content for the given fragment identifier.
  // This function implements a simple cache.
  function getContent(fragmentId, callback){
    // If the page has been fetched before,
    if(partialsCache[fragmentId]) {
      // pass the previously fetched content to the callback.
      callback(partialsCache[fragmentId]);
    } else {
      // If the page has not been fetched before, fetch it.
      fetchFile("inc/" + fragmentId + ".html", function (content) {

        // Store the fetched content in the cache.
        partialsCache[fragmentId] = content;

        // Pass the newly fetched content to the callback.
        // return to navigation the function 'callback' with the arguement 'content'
        callback(content);
      });
    }
  }

  // Sets the "active" class on the active navigation link.
  function setActiveLink(fragmentId){
  	var navbarDiv = document.getElementById("navbar");
  	var links = navbarDiv.children;
  	var i, link, pageName;
  	for(i = 0; i < links.length; i++){
  		link = links[i];
  		pageName = link.getAttribute("href").substr(1);
  		if(pageName === fragmentId) {
  			link.setAttribute("class", "active");
  		} else {
  			link.removeAttribute("class");
  		}
  	}
  }

  // Updates dynamic content based on the fragment identifier.
  function navigate(){
    // Get a reference to the "content" div.
    var contentDiv = document.getElementById("content");

    // Isolate the fragment identifier using substr.
    // This gets rid of the "#" character.
    var fragmentId = location.hash.substr(1);

    // Set the "content" div innerHTML based on the fragment identifier.
    getContent(fragmentId, function (content) {
    	// fill the div
    	// (with the async completion block 'callback' which returns the content within a function)
    	contentDiv.innerHTML = content;
    });

    // Toggle the "active" class on the link currently navigated to.
    setActiveLink(fragmentId);
  }

  function getJavascriptCode () {
    var code = document.getElementById('code');
    fetchFile(code.getAttribute('data-src'), function(content) {
      code.innerHTML = Prism.highlight(content,Prism.languages.javascript);
    });
  }

    // If no fragment identifier is provided,
  if(!location.hash) {
    // default to #home.
    location.hash = "#home";
  }

  // Navigate once to the initial fragment identifier.
  navigate();

  // fill the page with the javascript code
  getJavascriptCode();

  // Navigate whenever the fragment identifier value changes.
  window.addEventListener("hashchange", navigate)


}());
