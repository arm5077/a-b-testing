(function(){

	var app = angular.module("ABCreator", []);
	
	app.controller("FormController", ["$http", function($http){
		
		this.sites = [
			{
				"url":""
			}
		];
		
		// Click submit button; send sites to the backend
		this.submit = function(sites){
			
		};
		
	} ]);

})();