angular.module('appRoutes', []).config(['$routeProvider', '$locationProvider', '$httpProvider', function($routeProvider, $locationProvider, $httpProvider) {
    $routeProvider
        .when('/', {
            templateUrl: '/views/index.html',
            controller: 'IndexController'
        });

    $locationProvider.html5Mode(true);

    // $httpProvider.defaults.headers.common["X-Requested-With"] = 'XMLHttpRequest';
}]);
