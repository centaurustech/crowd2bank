// Basic Grunt configuration
module.exports = function(grunt) {

	//define variable for config
	var globalConfig = {
		app: 'app',
		assets: 'public/assets',
		styles: 'public/assets/styles',
		less: 'public/assets/less',
        scripts: 'public/assets/scripts',
		bower_components: 'bower_components'
	};

    // 1. All configuration goes here
    grunt.initConfig({
        pkg: grunt.file.readJSON('package.json'),

        //set variable for config
        globalConfig: globalConfig,

        // less configuration
        less: {
        	dist: {
        		files: {
        			'<%= globalConfig.styles %>/app.min.css': [
        			'<%= globalConfig.less %>/app.less'
        			]
        		},
        		options: {
        			compress: true,
        			sourceMap: false,
        			sourceMapFilename: '<%= globalConfig.bower_components %>/bootstrap/dist/css/bootstrap.css.map',
        			sourceMapRootpath: '<%= globalConfig.bower_components %>'
        		}
        	}
        },

        // Copy specific scripts from bower components to a scripts folder.
        bowercopy: {
            options: {
                srcPrefix: 'bower_components',
                color: true,
            },
            scripts: {
                options: {
                    destPrefix: '<%= globalConfig.scripts %>/vendor'
                },
                files: {
                    'jquery.js': 'jquery/dist/jquery.min.js',
                    'jquery.min.map': 'jquery/dist/jquery.min.map',
                    'bootstrap.js': 'bootstrap/dist/js/bootstrap.min.js',
                    'modernizr.js': 'modernizr/modernizr.js',
                    'require.js': 'requirejs/require.js',
                    'backbone.js': 'backbone/backbone.js',
                    'underscore.js': 'underscore/underscore.js'
                }
            }
        },

        // Watch files, trigger tasks and enable live reload
        watch: {
			markup: {
                files: ['<%= globalConfig.app %>/{,*/}*.php'],
				options: {
				    livereload: true
				}
            },
            less: {
                files: ['<%= globalConfig.less %>/{,*/}*.less'],
                tasks: ['less'],
				options: {
				    livereload: true
				}
            },
            gruntjs: {
                files: 'Gruntfile.js',
                options: {
                    livereload: true
                }
            }
        }	

    });

    // 3. Where we tell Grunt we plan to use this plug-in.    
    grunt.loadNpmTasks('grunt-contrib-less');
    grunt.loadNpmTasks('grunt-contrib-watch');    
    grunt.loadNpmTasks('grunt-bowercopy');



    // 4. Where we tell Grunt what to do when we type "grunt" into the terminal.
    grunt.registerTask('default', ['watch']);

    grunt.registerTask('copy', ['bowercopy'])


};