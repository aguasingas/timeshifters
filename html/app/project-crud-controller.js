angular.module('projectsApp')
	.controller('ProjectCrudCtrl', ['$rootScope', '$location', 'ProjectService', function($rootScope, $location, ProjectService) {
		var vm = this;
		vm.project = {};
		vm.submitCreateProject = submitCreateProject;
		vm.cancelCreateProject = cancelCreateProject;

		function submitCreateProject(isValid) {
			$rootScope.$broadcast('show-errors-check-validity');
			if (!isValid) {
				return;
			}

			ProjectService.create(vm.project).$promise.then(function(result) {
        		// console.log('ProjectCrudCtrl:ProjectService.create(): ', result);
				$location.path('/');
			});
		}

		function cancelCreateProject() {
			$location.path('/');
		}

	}]);
