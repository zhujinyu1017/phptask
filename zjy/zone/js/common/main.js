requirejs.config({
	baseUrl: 'http://task.zjy.com/zone',
	paths : {
		rule : "js/common/rule-validation",
		"ueditor.config" : ["js/ueditor/ueditor.config"],
		"ueditor.all" : ["js/ueditor/ueditor.all"],
		"codemirror":["codemirror/codemirror-5.19.0/lib/codemirror"],
		"javascript":["codemirror/codemirror-5.19.0/mode/javascript/javascript"],
	},
	shim: {
		"underscore": {
			exports: "_",
		},
		// "layer": {
		// 	deps: ["jquery"],
		// 	exports: "layer"
		// },

	}
})
