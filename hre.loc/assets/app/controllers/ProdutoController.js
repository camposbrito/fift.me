
myApp.controller("ProdutoController", [
  "$scope",  
  "$location",
  "$log",
  "$http",
  "LocalStorageService",   
  function($scope, $location, $log, $http, LocalStorageService) {
    $scope.currentPath = $location.path();
     
    $scope.getAll = function() {
      $http
        .get("Produto/getAll")
        .success(function(data) {
          $scope.Produto = data;
        })
        .error(function(data, status) {
          $log.error(status);
        });
    };
  }
]);
