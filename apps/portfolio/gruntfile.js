// npm install;
// npm init;
// npm install --save-dev grunt;
// npm install --save-dev grunt-contrib-watch;
// npm install --save-dev grunt-contrib-clean;

// npm install --save-dev grunt-contrib-uglify;
// npm install --save-dev grunt-contrib-jshint;
// npm install --save-dev grunt-contrib-concat;

// npm install --save-dev grunt-contrib-sass;
// npm install --save-dev grunt-contrib-csslint;
// npm install --save-dev grunt-contrib-cssmin;

// npm install --save-dev grunt-contrib-autoprefixer;
// npm install --save-dev grunt-contrib-imagemin;
// npm install --save-dev grunt-contrib-htmlmin;
// npm install --save-dev grunt-browser-sync;


'use strict';

module.exports = function(grunt) {
  // Configurable paths
  var config = {
    app: 'app',
    dist: 'dist'
  };

  grunt.initConfig({

    // Project settings
    config: config,

    // watch
    watch: {
      files: ['<%= jshint.files %>'],
      tasks: ['jshint']
    },


    // javascript
    jshint: {
      files: ['gruntfile.js', 'src/**/*.js', 'test/**/*.js'],
      options: {
        globals: {
          jQuery: true
        }
      }
    },

  });

  grunt.loadNpmTasks('grunt-contrib-jshint');
  grunt.loadNpmTasks('grunt-contrib-watch');
  grunt.loadNpmTasks('grunt-browser-sync');

  grunt.registerTask('default', ['jshint']);


};