var projectsApp = angular.module('hola', ['ngRoute', 'ngResource']);

projectsApp.config(['$routeProvider',
	function($routeProvider){
		$routeProvider.when('/', {
			templateUrl: 'partials/contact-list.html',
			controller: 'ContactListCtrl',
			controllerAs: 'vm'
		})
		// .when('/projects/add', {
		// 	templateUrl: 'partials/project-add.html',
		// 	controller: 'ProjectCrudCtrl',
		// 	controllerAs: 'vm'
		// })
		.otherwise({
			redirectTo: "/"
		});
	}]);
