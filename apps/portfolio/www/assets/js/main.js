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
      console.debug("router.load");
      // handle page load
      route(window.location.hash);
    });

    // methods
    function route(hash) {
      console.debug("router.route", hash);
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
      console.debug("url.addParameter");
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
      console.debug("url.getParameter");
      if (!url) url = window.location.href;
      name = name.replace(/[\[\]]/g, "\\$&");
      var regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)"),
      results = regex.exec(url);
      if (!results) return null;
      if (!results[2]) return '';
      return decodeURIComponent(results[2].replace(/\+/g, " "));
    }

    function removeParameter(parameter, url) {
      console.debug("url.removeParameter");
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
      console.debug('modals.init');
      $modals = $(".modal");

      // listen for modal loads
      $("a[data-modal]").on("click", function(e) {
        var queryString = url.addParameter("modal", $(this).data("modal"));
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
      console.debug('modals.load');
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
      console.debug('modals.close');
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
      console.debug('app.loadPlayground');
      renderContent("playground", dir + "playground/index.php", function(local) {
        if (local) {
          renderMason();
        } else {
          imagesLoaded();
        }
        modals.init();
      });

      renderNav("nav-playground");
    }

    function loadDocuments() {
      console.debug('app.loadDocuments');
      renderContent("documents", dir + "documents/index.php", function(local) {
        renderAccordion();
      });
      renderNav("nav-documents");
    }

    function loadAbout() {
      console.debug('app.loadAbout');
      renderContent("about", dir + "about/index.php", function(local) {

      });
      renderNav("nav-about");
    }

    // update DOM
    function renderNav(element) {
      console.debug('app.renderNav');
      (element) ? $navContaner.removeClass("none") : $navContaner.removeClass("none");

      $navItems.each(function() {
        ($(this).attr('id') === element) ? $(this).addClass("selected") : $(this).removeClass("selected");
      });
    }

    function renderContent(page, url, callback) {
      console.debug('app.renderContent');
      if (cache.hasOwnProperty("$"+page)) {
        console.debug('app.renderContent.local');
        $content.html(cache["$"+page]);
        callback(1);
      } else {
        console.debug('app.renderContent.download');
        $content.load(url, function(data) {
          cache["$"+page] = $("#"+page);
          callback(0);
        });
      }
    }

    function imagesLoaded() {
      console.debug('app.imagesLoaded');
      cache.$playground.imagesLoaded()
      .progress(renderMason);
    }

    function renderMason() {
      console.debug('app.renderMason');
      cache.$playground.children().each(function() {
        if ($(this).hasClass("grid")) {
          $(this).masonry();
        }
      });
    }

    function renderAccordion() {
      console.debug('app.renderAccordion');
      $('.nested-accordion').find('.comment').slideUp();
      $('.nested-accordion').find('h3').click(function(){
        $(this).next('.comment').slideToggle(100);
        $(this).toggleClass('selected');
      });
    }

    // public
    return {
      loadPlayground: loadPlayground,
      loadDocuments: loadDocuments,
      loadAbout: loadAbout
    }
  })();
})();