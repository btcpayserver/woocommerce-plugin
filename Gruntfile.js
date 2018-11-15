/**
 * @license Copyright 2011-2014 BitPay Inc., MIT License 
 * see https://github.com/bitpay/woocommerce-plugin/blob/master/LICENSE
 */

'use strict';

module.exports = function(grunt) {

  // Project configuration.
  grunt.initConfig({
    pkg: grunt.file.readJSON('package.json'),
    clean: {
      build: ['dist'],
      dev: {
        src: ['/var/www/html/woocommerce/wp-content/plugins/btcpay-for-woocommerce/'],
        options: {
          force: true
        }
      }
    },
    compress: {
      build: {
        options: {
          archive: 'dist/btcpay-for-woocommerce.zip'
        },
        files: [{
          expand: true,
          cwd: 'dist',
          src: ['**']
        }]
      }
    },
    copy: {
      build: {
        files: [
          {
            expand: true,
            cwd: 'src/',
            src: ['**/**.php', 'assets/js/**/**.*', 'assets/img/**/**.*', 'templates/**/**.*'],
            dest: 'dist/btcpay-for-woocommerce'
          },
          {
            expand: true,
            cwd: 'vendor/bitpay/php-client/src/',
            src: ['**/**.*'],
            dest: 'dist/btcpay-for-woocommerce/lib'
          },
          {
            src: 'readme.txt',
            dest: 'dist/btcpay-for-woocommerce/readme.txt'
          },
          {
            src: 'LICENSE',
            dest: 'dist/btcpay-for-woocommerce/license.txt'
          }
        ]
      },
      dev: {
        files: [{
          expand: true,
          cwd: 'dist/btcpay-for-woocommerce',
          src: ['**/**'],
          dest: '/var/www/html/woocommerce/wp-content/plugins/btcpay-for-woocommerce/'
        }]
      }
    },
    cssmin: {
      build: {
        options: {
          banner: '/**\n * @license Copyright 2011-2018 BitPay Inc. & BtcPay Inc., MIT License\n * see https://github.com/btcpayserver/woocommerce-plugin/blob/master/LICENSE\n */'
        },
        files: {
          'dist/btcpay-for-woocommerce/assets/css/style.css': ['src/assets/css/**.css']
        }
      }
    },
    phpcsfixer: {
        build: {
            dir: 'src/'
        },
        options: {
            bin: 'vendor/bin/php-cs-fixer',
            diff: true,
            ignoreExitCode: true,
            level: 'all',
            quiet: true
        }
    },
    watch: {
      scripts: {
        files: ['src/**/**.*'],
        tasks: ['dev'],
        options: {
          spawn: false,
          atBegin: true
        },
      },
    },
  });

  // Load the plugins
  grunt.loadNpmTasks('grunt-contrib-clean');
  grunt.loadNpmTasks('grunt-contrib-compress');
  grunt.loadNpmTasks('grunt-contrib-copy');
  grunt.loadNpmTasks('grunt-contrib-cssmin');
  grunt.loadNpmTasks('grunt-contrib-watch');
  grunt.loadNpmTasks('grunt-php-cs-fixer');

  // Default task(s).
  grunt.registerTask('build', ['phpcsfixer', 'clean:build', 'cssmin:build', 'copy:build', 'compress:build']);
  grunt.registerTask('dev', ['build', 'clean:dev', 'copy:dev']);
  grunt.registerTask('default', 'build');

};

