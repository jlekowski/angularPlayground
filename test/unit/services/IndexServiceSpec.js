describe('IndexService', function() {
    var $httpBackend;

    beforeEach(module('IndexService'));
    //beforeEach(module('ngMockE2E'));
    beforeEach(inject(function(_$httpBackend_) {
        $httpBackend = _$httpBackend_;
    }));

    afterEach(function() {
        $httpBackend.verifyNoOutstandingExpectation();
        $httpBackend.verifyNoOutstandingRequest();
    });

    it('should get items', inject(function(Index) {
        $httpBackend.expectGET('/items').respond('testResponse');

        Index.get().success(function(data) {
            expect(data).toBe('testResponse');
        });

        $httpBackend.flush();
    }));
});
