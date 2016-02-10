module.exports = function(grunt) {
  "use strict";
  require("matchdep").filterDev(" grunt-* ").forEach(function(obj) {
    console.log(obj);
    return grunt.loadNpmTasks(obj);
  });
  return grunt.initConfig({
    config: {
      assets: 'img/',
      _javascript: 'js',
      _css: './',
      _stylus: 'styl',
      _root: '../../../',
      _plugins: '../../plugins/',
      pkg: 'package.json'
    },
    babel: {
      options: {
        sourceMap: false,
      },
      dev: {
        files: {
          "main.js": "<%= config._javascript %>/concated.js"
        }
      },
      production: {
        options: {
          sourceMap: true,
        },
        files: {
          "<%= config._javascript %>/concated.js": "<%= config._javascript %>/concated.js"
        }
      }
    },
    concat: {
      options: {
        separator: ';',
      },
      production: {
        src: [
          '<%= config._javascript %>/git/jQuery-Google-Analytics/jquery.googleanalytics.js',
          '<%= config._javascript %>/main.js',
        ],
        dest: '<%= config._javascript %>/concated.js',
      },
    },
    stylus: {
      options: {
        paths: [
          '<%= config.assets %>',
        ],
        urlfunc: 'embedurl', // use embedurl('test.png') in our code to trigger Data URI embedding
        use: ['nib'],
        compress: true,
        rawDefine: true,
        "include css": true,
      },
      compile: {
        files: {
          'style.css': "<%= config._stylus %>/main.styl"
        }
      }
    },
    uglify: {
      production: {
        src: '<%= config._javascript %>/concated.js',
        dest: 'main.js',
        options: {
          sourceMappingURL: function(dest) {
            console.log(dest);
            return dest + ".map";
          },
          sourceMapPrefix: 3,
          sourceMap: 'main.js.map',
          compress: true,
          mangle: true
        }
      }
    },
    watch: {
      stylus: {
        files: ["<%= config._stylus %>/**/*.styl"],
        tasks: ['stylus']
      },
      js: {
        files: [
          "!<%= config._javascript %>/concated.js",
          "!<%= config._javascript %>/*.min.js",
          "<%= config._javascript %>/**/*.js",
        ],
        tasks: ['concat', 'babel:dev']
      }
    }
  },

  grunt.registerTask('default', [
    'stylus',
    'concat:production',
    'babel:dev',
    'watch'
  ]),

  grunt.registerTask('production', [
    'stylus',
    'concat:production',
    'babel:production',
    'uglify:production',
  ]));
};
