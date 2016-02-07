module.exports = function(grunt) {
  "use strict";
  require("matchdep").filterDev(" grunt-* ").forEach(function(obj) {
    console.log(obj);
    return grunt.loadNpmTasks(obj);
  });
  return grunt.initConfig({
    config: {
      assets: 'img/',
      _javascript: 'js/',
      _js: 'js/src/',
      _css: './',
      _stylus: 'styl',
      _root: '../../../',
      _plugins: '../../plugins/',
      pkg: 'package.json'
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
        src: 'js/main.js',
        dest: 'js/main.min.js',
        options: {
          sourceMappingURL: function(dest) {
            console.log(dest);
            return dest + ".map";
          },
          sourceMapPrefix: 3,
          sourceMap: 'js/main.min.js.map',
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
      // js: {
      //   files: ["<%= config._js %>*.js"],
      //   tasks: ['uglify:production']
      // }
    }
  }, grunt.registerTask('default', ['stylus', 'watch']));
};
