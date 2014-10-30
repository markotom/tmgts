'use strict';

module.exports = function (grunt) {

  grunt.initConfig({
    pkg: grunt.file.readJSON('package.json'),

    // Watch task
    watch: {
      less: {
        files: 'assets/styles/less/**/*.less',
        tasks: 'less:development',
        options: {
          spawn: false
        }
      },
      uglify: {
        files: [ 'assets/scripts/**/*.js' ],
        tasks: [ 'uglify' ],
        options: {
          spawn: false
        }
      }
    },

    browserSync: {
      default_options: {
        bsFiles: {
          src: [
            'built/**/*',
            '**/*.php'
          ]
        },
        server: {
          baseDir: './',
          routes: {
            'http://localhost': 'http://localhost:3000'
          }
        },
        options: {
          watchTask: true,
          proxy: 'localhost/~marcogodinez/wordpress'
        }
      }
    },

    // Less task
    less: {
      development: {
        files: {
          'built/css/tmgts.css': 'assets/styles/less/tmgts.less'
        }
      },
      production: {
        options: {
          cleancss: true
        },
        files: {
          'built/css/tmgts.css': 'assets/styles/less/tmgts.less'
        }
      }
    },

    // Uglify task
    uglify: {
      production: {
        files: {
          'built/js/tmgts.min.js': [
            'bower_components/bootstrap/dist/js/bootstrap.min.js',
            'assets/scripts/tmgts.js'
          ]
        }
      }
    },

    // Compress task
    compress: {
      theme: {
        options: {
          archive: '<%= pkg.name %>-<%= pkg.version %>.zip'
        },
        files: [
          { src: ['*.php'] },
          { src: ['style.css'] },
          { src: ['screenshot.png'] },
          { src: ['assets/images/**/*'] },
          { src: ['built/**/*'] },
          { src: ['includes/**/*'] },
          { src: ['templates/**/*'] },
          { src: ['option-tree/**/*'] }
        ]
      }
    },

    // Shell task
    shell: {
      optiontree: {
        command: [
          'rm -rf option-tree',
          'git clone https://github.com/valendesigns/option-tree.git',
        ].join('&&')
      }
    },

  });

  // Load plugins
  grunt.loadNpmTasks('grunt-browser-sync');
  grunt.loadNpmTasks('grunt-contrib-compress');
  grunt.loadNpmTasks('grunt-contrib-less');
  grunt.loadNpmTasks('grunt-contrib-uglify');
  grunt.loadNpmTasks('grunt-contrib-watch');
  grunt.loadNpmTasks('grunt-shell');

  grunt.registerTask('default', ['browserSync', 'watch']);

  grunt.registerTask('deploy', [
    'uglify:production',
    'less:production'
  ]);

  grunt.registerTask('theme', [
    'deploy',
    'shell:optiontree',
    'compress:theme'
  ]);

};
