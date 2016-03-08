// no globals
(function() {
  "use strict";

  //////////////////////////////////////////////////
  // nav and load pages based on url hash (query string)
  //////////////////////////////////////////////////
  var router = (function() {
    // listeners
    $(window).bind("hashchange", function(event) {
      // handle hash changes
      route(event.target.location.hash);
    });

    $(document).ready(function() {
      logger.log("router.load");
      // handle page load
      route(window.location.hash);
    });

    // methods
    function route(hash) {
      logger.log("router.route", hash);
      // pages
      if (hash.indexOf("#/playground") === 0 || hash === "" || hash === "#/" || hash.indexOf("#/?") === 0 ) {
        app.loadPlayground();
      } else if (hash.indexOf('#/documents') === 0) {
        app.loadDocuments();
      } else if (hash.indexOf('#/about') === 0) {
        app.loadAbout();
      }
      // modals
      modals.load();
    }
  })();



  //////////////////////////////////////////////////
  // get/set the url
  //////////////////////////////////////////////////
  var url = (function() {
    // methods
    function addParameter(param, value, url) {
      logger.log("url.addParameter");
      if (!url) url = window.location.hash;
      var val = new RegExp('(\\?|\\&)' + param + '=.*?(?=(&|$))');
      var qstring = /\?.+$/;

      if (val.test(url)) {
        return url.replace(val, '$1' + param + '=' + value);
      } else if (qstring.test(url)) {
        return url + '&' + param + '=' + value;
      } else {
        return url + '?' + param + '=' + value;
      }
    }

    function getParameter(name, url) {
      logger.log("url.getParameter");
      if (!url) url = window.location.href;
      name = name.replace(/[\[\]]/g, "\\$&");
      var regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)"),
      results = regex.exec(url);
      if (!results) return null;
      if (!results[2]) return '';
      return decodeURIComponent(results[2].replace(/\+/g, " "));
    }

    function removeParameter(parameter, url) {
      logger.log("url.removeParameter");
      if (!url) url = window.location.href;
      var urlparts = url.split('?');
      if (urlparts.length >= 2) {
        var prefix = encodeURIComponent(parameter) + '=';
        var pars = urlparts[1].split(/[&;]/g);
        for (var i = pars.length; i-- > 0;) {
          if (pars[i].lastIndexOf(prefix, 0) !== -1) {
            pars.splice(i, 1);
          }
        }

        if (pars.length > 0) {
          return urlparts[0] + '?' + pars.join('&');
        } else {
          return urlparts[0];
        }
      } else {
        return url;
      }
    }

    return {
      addParameter: addParameter,
      getParameter: getParameter,
      removeParameter: removeParameter
    };
  })();



  //////////////////////////////////////////////////
  // handle the modals
  //////////////////////////////////////////////////
  var modals = (function() {
    // cache DOM
    var $modals;
    var $modal;

    // methods
    function init() {
      logger.log('modals.init');
      $modals = $(".modal");

      // listen for modal loads
      $("a[data-modal]").on("click", function(e) {
        var queryString = url.addParameter("modal", $(this).data("modal"));
        // bypass the hash change
        if (queryString.indexOf("#/") !== 0) queryString = "#/" + queryString;
        // update the query string to change pages/modals
        e.originalEvent.currentTarget.href = queryString;
      });

      // listen for modal closes
      $(".modal-content > span.close").on("click", function(e) {
        close();
      });

      $(".modal").on("click", function(e) {
        if (e.target !== this) return;
        close();
      });

      load();
    }

    function load(id) {
      logger.log('modals.load');
      if (!id) id = url.getParameter("modal");
      if (id !== null && typeof $modals !== "undefined") {
        $modals.each(function() {
          if ($(this).data("modal") == id) {
            $(this).css("display", "block");
            $modal = $(this);
          }
        });
      }
    }

    function close() {
      logger.log('modals.close');
      $modal.css("display", "none");
      location.href = url.removeParameter("modal");
    }

    return {
      init: init,
      load: load,
      close: close
    };
  })();



  //////////////////////////////////////////////////
  // handle pages and nav
  //////////////////////////////////////////////////
  var app = (function() {
    // cache DOM
    var $content = $("#content");
    var $nav = $("#main-nav");
    var $navContaner = $nav.children();
    var $navItems = $navContaner.children();
    var cache = {};
    var dir = "/apps/portfolio/www/app/components/";

    // load pages
    function loadPlayground() {
      logger.log('app.loadPlayground');
      renderContent("playground", dir + "playground/index.php", function(local) {
        var section = cache.$playground;
        if (local) {
          mason.load(section);
        } else {
          mason.init(section);
        }
      });
      renderNav("nav-playground");
    }

    function loadDocuments() {
      logger.log('app.loadDocuments');
      renderContent("documents", dir + "documents/index.php", function(local) {
        if (local) {
          accordion.load();
        } else {
          accordion.init(cache);
        }
      });
      renderNav("nav-documents");
    }

    function loadAbout() {
      logger.log('app.loadAbout');
      renderContent("about", dir + "about/index.php", function(local) {

      });
      renderNav("nav-about");
    }

    // update DOM
    function renderNav(element) {
      logger.log('app.renderNav');
      (element) ? $navContaner.removeClass("none") : $navContaner.removeClass("none");

      $navItems.each(function() {
        ($(this).attr('id') === element) ? $(this).addClass("selected") : $(this).removeClass("selected");
      });
    }

    function renderContent(page, url, callback) {
      logger.log('app.renderContent');
      if (cache.hasOwnProperty("$"+page)) {
        logger.log('app.renderContent.local');
        $content.html(cache["$"+page]);
        modals.init();
        callback(1);
      } else {
        logger.log('app.renderContent.download');
        $content.load(url, function(data) {
          cache["$"+page] = $("#"+page);
          modals.init();
          callback(0);
        });
      }
    }


    // public
    return {
      loadPlayground: loadPlayground,
      loadDocuments: loadDocuments,
      loadAbout: loadAbout
    }
  })();

  var logger = (function(blah) {
    var prod = true
    function log(msg) {
      if (!prod) console.log(msg);
    }
    return {
      log: log
    }
  })();

  var mason = (function () {
    function init(section) {
      logger.log('mason.init');
      // listener for images loaded
      section.imagesLoaded().progress(function() {
        load(section);
      });
    }

    function load(section) {
      logger.log('mason.load');
      // reorder grid
      section.children().each(function() {
        if ($(this).hasClass("grid")) {
          $(this).masonry();
        }
      });
    }

    return {
      init: init,
      load: load,
    }
  })();

  var accordion = (function() {
    var nested = [];
    var titles = [];
    var comments = [];

    function init(cache) {
      logger.log('app.initAccordion');
      // cache
      nested = cache.$documents.find('.nested-accordion');
      titles = cache.$documents.find('h3');
      comments = cache.$documents.find('.comment');
      // slide up
      comments.each(function() {
        $(this).slideUp(0);
      });
      // regular page load
      load();
    }

    function load() {
      logger.log('app.renderAccordion');
      // page load
      listen();
    }

    function listen() {
      // add listeners for button press
      titles.each(function() {
        $(this).click(function(){
          $(this).next('.comment').slideToggle(200);
          $(this).toggleClass('selected');
        });
      });
    }

    return {
      init: init,
      load: load,
    }
  })();

})();


(function verticalRhythm(pixels) {
  if (!pixels) var pixels = 24;

  var body = document.body;
  var html = document.documentElement;
  var height = Math.max(body.scrollHeight, body.offsetHeight, html.clientHeight, html.scrollHeight, html.offsetHeight);

  for (var i = 0; i < height / pixels; i++) {
    var div = document.createElement('div');
    div.style.position = "absolute";
    div.style.width = "100%";
    div.style.borderTop = "1px dashed black";
    div.style.marginTop = i * pixels + "px";
    body.parentNode.insertBefore(div, body);
  }
})(-1)