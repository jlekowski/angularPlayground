describe('IndexCtrl', function() {
    var $controller, $routeParams, $rootScope, IndexService, $scope;

    beforeEach(module('IndexCtrl'));
    beforeEach(inject(function(_$controller_, _$rootScope_) {
        $controller = _$controller_;
        $rootScope = _$rootScope_;
        $scope = $rootScope.$new();
        $routeParams = {};
        IndexService = jasmine.createSpyObj('IndexService', ['test']);
    }));

    it('$scope.sortColumn', function() {
        $controller('IndexController', {$scope: $scope, $routeParams: $routeParams, $rootScope: $rootScope, Index: IndexService});
        expect($scope.sortColumn).toBe('name');
        expect(IndexService.test).toHaveBeenCalled();
    });

    it('$scope.sortReverse', function() {
        $controller('IndexController', {$scope: $scope, $routeParams: $routeParams, $rootScope: $rootScope, Index: IndexService});
        expect($scope.sortReverse).toBeFalsy();
    });
});
