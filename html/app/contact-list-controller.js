angular.module('hola')
	.controller('ContactListCtrl', ['$location', 'ContactsService', function($location, ContactsService) {
		var vm = this;

		vm.contacts = [];
		vm.selection = [];

		vm.go = go;
		vm.toggleSelection = toggleSelection;

		getContacts();


		function toggleSelection(contactId) {
			console.log("Contact clicked... Id:", contactId);
			var idx = vm.selection.indexOf(contactId);
			if (idx > -1) {
				console.log("Contact '" + contactId + "' was ALREADY selected");
				vm.selection.splice(idx, 1);
			} else {
				console.log("Contact '" + contactId + "' was NOT selected");
				vm.selection.push(contactId);
			}

			console.log("Selected contacts:", vm.selection);
		}

		function getContacts() {
			var prj = ContactsService.query().$promise.then(function(result) {
				vm.contacts = result;
			});

		}

		function go(url) {
			$location.path(url);
		}

	}]);
