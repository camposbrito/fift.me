myApp.controller("ParametrosController", [
  "$scope",
  "$location",
  "$log",
  "$http",
  "LocalStorageService",   
  function($scope, $location, $log, $http, LocalStorageService) {
    $scope.currentPath = $location.path();
    //console.log($scope.currentPath);
      $http
      .get("parametros/get")
      .success(function(data) {
        $scope.parametros         = data;
        
        
        LocalStorageService.set('PecasPorCiclo', data.PecasPorCiclo);

        $scope.Turno               = LocalStorageService.get('Turno.id');
        $scope.InProgresso         = LocalStorageService.get("InProgress") == true ? LocalStorageService.get("InProgress") : false;
        $scope.InPreparation       = LocalStorageService.get("InPreparation") == true ? LocalStorageService.get("InPreparation") : false;
        $scope.InMaintenance       = LocalStorageService.get("InMaintenance") == true ? LocalStorageService.get("InMaintenance") : false;
        $scope.InScheduledInterval = LocalStorageService.get("InScheduledInterval") == true ? LocalStorageService.get("InScheduledInterval") : false;
        
      })
      .error(function(data, status) {
        $log.error(status);
    });
  }
]);
