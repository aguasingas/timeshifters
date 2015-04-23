var projectsApp = angular.module('hola', ['ngRoute', 'ngResource']);

projectsApp.config(['$routeProvider',
	function($routeProvider){
		$routeProvider.when('/', {
			templateUrl: 'partials/contact-list.html',
			controller: 'ContactListCtrl',
			controllerAs: 'vm'
		})
		// .when('/available-spots', {
		// 	templateUrl: 'partials/available-spots.html',
		// 	controller: 'AvailableSpotsCtrl',
		// 	controllerAs: 'vm'
		// })
		.otherwise({
			redirectTo: "/"
		});
	}]);
