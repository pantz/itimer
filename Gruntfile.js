/*global module:false*/
module.exports = function(grunt) {

// Project configuration.
grunt.initConfig({
	pkg: grunt.file.readJSON('package.json'),
	meta: {
		version: '0.1.0',
		banner: '/*! <%= pkg.name %> - v<%= pkg.version %> - ' +
		'<%= grunt.template.today("yyyy-mm-dd") %>\n' +
		'* <%= pkg.homepage %>\n' +
		'* Copyright (c) <%= grunt.template.today("yyyy") %> ' +
		'<%= pkg.author %>;*/'
	},
	less : {
		testing : {
			options : {
				compress:false
			},
			files : {
				'css/screen.css' : 'less/screen.less'
			}
		},
		production : {
			options : {
				compress:true,
				yuicompress:true,
				dumpLineNumbers:"all"
			},
			files : {
				'css/screen.min.css' : 'less/screen.less'
			}
		}
	},
	concat : {
		build : {
			src: [
				'js/vendor/bootstrap/docs/assets/js/bootstrap.js',
				'js/vendor/bootstrap-datepicker/js/bootstrap-datepicker.js',
				'js/vendor/bootstrap-timepicker/js/bootstrap-timepicker.js',
				'js/vendor/jquery-countdown/jquery.countdown.js',
				'js/vendor/jquery-itimer/jquery.itimer.js'
			],
			dest: 'js/dist/itimer.js'
		}
	},
	uglify: {
		alltrack : {
			files: {
				'js/dist/itimer.min.js': ['js/dist/itimer.js']
			},
			options : {
				banner: '/* \n'+ 
				' * <%= pkg.name %> v<%= pkg.version %>\n' +
				' * <%= grunt.template.today("yyyy-mm-dd, h:MM:ss TT") %>\n' +
				' * <%= pkg.author %>\n' +
				' * Copyright (c) <%= grunt.template.today("yyyy") %> - <%= pkg.description %> \n' +
				' */ \n\n'
			}
		}
	},
});

grunt.loadNpmTasks('grunt-contrib-concat');
grunt.loadNpmTasks('grunt-contrib-uglify');
grunt.loadNpmTasks('grunt-contrib-less');

grunt.registerTask('default', ['less', 'concat', 'uglify']);

};