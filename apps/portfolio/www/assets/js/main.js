// cache DOM
var $content = $("#content");
var $nav = $("#main-nav");
var $navContaner = $nav.children();
var $navItems = $navContaner.children();
var cache = {};
var dir = "/apps/portfolio/www/app/components/";


// listen to hash changes
$(window).bind('hashchange', function(event) {
  console.log('hashChange');
  router(event.target.location.hash);
});

$(document).ready(function() {
  console.log('loadPage');
  router(window.location.hash);
});

// route to data
function router(hash) {
  console.log('router');
  if (hash == '#/playground') {
    loadPlayground();
  } else if (hash == '#/documents') {
    loadDocuments();
  } else if (hash == '#/about') {
    loadAbout();
  } else {
    loadPlayground();
  }
}

// load data
function loadPlayground() {
  console.log('loadPlayground');
  renderContent("playground", dir + "playground/index.php", function(local) {
    (local) ? renderMason() : imagesLoaded();
  });
  renderNav("nav-playground");

}

function loadDocuments() {
  console.log('loadDocuments');
  renderContent("documents", dir + "documents/index.php", function(local) {
    renderAccordion();
  });
  renderNav("nav-documents");
}

function loadAbout() {
  console.log('loadAbout');
  renderContent("about", dir + "about/index.php", function(local) {

  });
  renderNav("nav-about");
}


// update DOM
function renderNav(element) {
  (element) ? $navContaner.removeClass("none") : $navContaner.removeClass("none");

  $navItems.each(function() {
    ($(this).attr('id') === element) ? $(this).addClass("selected") : $(this).removeClass("selected");
  });
}

function renderContent(page, url, callback) {
  if (cache.hasOwnProperty("$"+page)) {
    console.log('local');
    $content.html(cache["$"+page]);
    callback(1);
  } else {
    console.log('download');
    $content.load(url, function(data) {
      cache["$"+page] = $("#"+page);
      callback(0);
    });
  }
}

function imagesLoaded() {
  console.log('imagesLoaded');
  cache.$playground.imagesLoaded()
  .progress( renderMason );
}

function renderMason() {
  console.log('renderMason');
  cache.$playground.masonry();
}

function renderAccordion() {
  console.log('renderAccordion');
  $('.nested-accordion').find('.comment').slideUp();
  $('.nested-accordion').find('h3').click(function(){
    $(this).next('.comment').slideToggle(100);
    $(this).toggleClass('selected');
  });
}


