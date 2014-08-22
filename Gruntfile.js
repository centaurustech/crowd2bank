// Basic Grunt configuration
module.exports = function(grunt) {

	//define variable for config
	var globalConfig = {
		app: 'app',
		assets: 'public/assets',
		styles: 'public/assets/styles',
		less: 'public/assets/less',
        scripts: 'public/assets/scripts',
		bower_components: 'public/bower_components'
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
                files: 'Gruntfile.js'
            }
        }	


    });

    // 3. Where we tell Grunt we plan to use this plug-in.    
    grunt.loadNpmTasks('grunt-contrib-less');
    grunt.loadNpmTasks('grunt-contrib-watch');

    // 4. Where we tell Grunt what to do when we type "grunt" into the terminal.
    grunt.registerTask('default', ['watch']);

};