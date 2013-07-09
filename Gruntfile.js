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
	watch: {
		gruntFile : {
			files : ['www/less/*.less','www/js/lib/bootstrap/less/*.less'],
			tasks : ['less:development']
		}
	},
	lint : {
		files :  [
			'www/js/main.js'
		]
	},
	uglify: {
		options : {
			banner : '/* <%= pkg.name %> */\n'
		},
		build : {
			src : 'www/js/main.js',
			dest : '<%= pkg.name %>.<%= pkg.version %>.min.js'
		}
	},
	less : {
		development : {
			files : {
				'www/css/screen.css' : ['www/js/lib/bootstrap/less/bootstrap.less', 'www/less/screen.less']
			}
		}
	}
});

grunt.loadNpmTasks('grunt-contrib-watch');
grunt.loadNpmTasks('grunt-contrib-less');
grunt.loadNpmTasks('grunt-contrib-uglify');

grunt.registerTask('default', ['less']);

};