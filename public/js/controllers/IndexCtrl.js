angular.module('IndexCtrl', []).controller('IndexController', function($scope, $routeParams, $rootScope, Index) {
    console.info('IndexCtrl');
    Index.test();

    $scope.sortColumn = 'name';
    $scope.sortReverse = false;

    $scope.items = [
        {id: 1, name: 'item 1'},
        {id: 2, name: 'item 2'}
    ];

    $scope.selectItem = function(item) {
        $rootScope.item = item;
    };

    $scope.deleteItem = function() {
        $scope.items.splice($scope.items.indexOf($scope.selectedItem), 1);
        $('#item-delete-modal').modal('hide');
    };

    $scope.confirmDeleteItem = function(item) {
        $scope.selectedItem = item;
        $('#item-delete-modal').modal('show');
    };
});
