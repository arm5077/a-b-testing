(function(){

	var app = angular.module("ABCreator", []);
	
	app.controller("FormController", ["$http", function($http){
		
		FormControllerObject = this;
		this.sites = [{ "url":""}];
		this.embed_site = false;
		
		// Click submit button; send sites to the backend
		this.submit = function(sites){
			
			$http({
				url: "php/index.php", 
				method: "GET",
				params: { content: sites.map(function(item){ return item.url }).join(',')},
				headers: {'Content-Type' : 'application/x-www-form-urlencoded; charset=UTF-8'}
			}).success(function(data){
				FormControllerObject.embed_site = data.url;
				
			});
			
		};
		
	} ]);

})();