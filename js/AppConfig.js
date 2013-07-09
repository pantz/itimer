requirejs.config({
    baseUrl: 'js',
    paths: {
        'jquery' : 'lib/jquery',
        'underscore' : 'lib/underscore',
        'backbone' : 'lib/backbone',
        'backbone.abstract' : 'lib/backbone.abstract',
        'backbone.layoutmanager' : 'lib/backbone.layoutmanager',
        'mustache' : 'lib/mustache',
        'json' : 'lib/json2'
    },
    shim : {
    	'backbone' : {
    		deps : ['underscore', 'jquery', 'json'],
    		exports : 'Backbone'
    	},
    	'underscore' : {
    		exports : '_'
    	},
    	'backbone.layoutmanager' : {
    		deps : ['backbone'],
    		exports : 'Backbone.LayoutManager'
    	},
    	'backbone.abstract' : {
    		deps : ['backbone'],
    		exports : 'Backbone'
    	}
    }
});

requirejs(['App'], function(App){
	App.initialize();
});
