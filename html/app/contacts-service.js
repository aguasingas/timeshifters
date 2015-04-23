angular.module('hola')
		.factory('ContactsService', ['$resource',
			function($resource) {
				return $resource('api/contacts.json', {}, {
					query: {method: 'GET', params:{},  isArray: true}
				});
			}
		]);