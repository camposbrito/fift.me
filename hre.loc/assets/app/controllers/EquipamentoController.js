
myApp.controller("EquipamentoController", [
  "$scope",  
  "$location",
  "$log",
  "$http",
  "LocalStorageService",   
  function($scope, $location, $log, $http, LocalStorageService) {
    $scope.currentPath = $location.path();
 
    $scope.getAll = function() {
      $http
        .get("Equipamento/getAll")
        .success(function(data) {
          $scope.Equipamento = data;
        })
        .error(function(data, status) {
          $log.error(status);
        });
    };
  }
]);
