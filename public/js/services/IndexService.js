angular.module('IndexService', []).factory('Index', ['$http', function($http) {
    return {
        get: function() {
            return $http.get('/items');
        },
        create: function(data) {
            return $http.post('/items', data);
        },
        delete: function(id) {
            return $http.delete('/items/' + id);
        },
        test: function() {
            console.info('IndexService');
        }
    }
}]);