myApp.controller("JornadaController", [
  "$scope",
  "$location",
  "$log",
  "$http",
  "LocalStorageService",   
  function($scope, $location, $log, $http, LocalStorageService) {
    $scope.currentPath = $location.path();
    //console.log($scope.currentPath);
    $http
      .get("JornadaTrabalho/getAll")
      .success(function(data) {
        $scope.JornadaTrabalho = data;
      })
      .error(function(data, status) {
        $log.error(status);
      });
    $http
      .get("turno/getAtual")
      .success(function(data) {
        $scope.turno = data;
      })
      .error(function(data, status) {
        $log.error(status);
      });
 
  }
]);
