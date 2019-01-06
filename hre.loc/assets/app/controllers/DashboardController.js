myApp.controller("DashboardController", [
  "$scope",  
  "$location",
  "$log",
  "$http",
  "LocalStorageService",   
  function($scope, $location, $log, $http, LocalStorageService) {
    $scope.Turno = LocalStorageService.get('Turno.id');
    $scope.currentPath = $location.path();
    $http
    .get("ocorrencia/ocorrencias_ciclo_count?Turno_Id=" + $scope.Turno)
    .success(function(data) {
      $scope.ocorrencias_aberto_count  = data.Registros;
      LocalStorageService.set("ocorrencias_aberto_count", data.Registros);
    });
    $scope.InProgress          = $.parseJSON(LocalStorageService.get("InProgress"))          ? true: false;   
    if (($scope.InProgress == false))
    {                  
      $location.path('/');           
    }
       
    $scope.InPreparation       = $.parseJSON(LocalStorageService.get("InPreparation"))       ? true: false;
    $scope.InMaintenance       = $.parseJSON(LocalStorageService.get("InMaintenance"))       ? true: false;
    $scope.InScheduledInterval = $.parseJSON(LocalStorageService.get("InScheduledInterval")) ? true: false;    
    if ($scope.InPreparation == true ||      
      $scope.InMaintenance  == true ||     
      $scope.InScheduledInterval  == true)
    {
      $location.path('/ocorrencia/bloqueio');
    }
    $scope.getOperador = function() {
      $http
        .get("sessao/getOperador")
        .success(function(data) {
          $scope.Operador = data;
          LocalStorageService.set('operador', data.Descricao);
        })
        .error(function(data, status) {
          $log.error(status);
        });
    };
  }
]);
