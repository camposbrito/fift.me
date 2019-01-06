
myApp.controller("OperacaoController", [
  "$scope",  
  "$location",
  "$log",
  "$http",
  "LocalStorageService",   
  function($scope, $location, $log, $http, LocalStorageService) {
    $scope.currentPath = $location.path();
    $scope.getAll = function() {
      $http
        .get("operacao/getAll")
        .success(function(data) {
          $scope.Operacao = data;
        })
        .error(function(data, status) {
          $log.error(status);
        });
    };
  }
]);
