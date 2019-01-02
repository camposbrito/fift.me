myApp.controller("DashboardController", [
  "$scope",  
  "$location",
  "$log",
  "$http",
  "LocalStorageService",   
  function($scope, $location, $log, $http, LocalStorageService) {
    console.log('DashboardController');
    // //console.log('scope');
    // //console.log($scope);
    // //console.log('location');
    // //console.log($location);
    // //console.log('log');
    // //console.log($log);
    // //console.log('http');
    // //console.log($http);
    // //console.log('FIM:DashboardController');
    $scope.currentPath = $location.path();
         
    $scope.InProgress          = LocalStorageService.get("InProgress")          ? true: false;   
    if (($scope.InProgress == false))
    {                  
      $location.path('/');   
      // alert('InProgress');         
    }
    
    $scope.InPreparation       = LocalStorageService.get("InPreparation")       ? true: false;
    $scope.InMaintenance       = LocalStorageService.get("InMaintenance")       ? true: false;
    $scope.InScheduledInterval = LocalStorageService.get("InScheduledInterval") ? true: false;    
    if ($scope.InPreparation == true ||      
      $scope.InMaintenance  == true ||     
      $scope.InScheduledInterval  == true)
    {
      $location.path('/ocorrencia/bloqueio');
    }
    //console.log($scope.currentPath);
    //console.log('>>>' +LocalStorageService.get('Turno.id')   );
    $scope.getOperador = function() {
      $http
        .get("sessao/getOperador")
        .success(function(data) {
          // console.debug(data);
          $scope.Operador = data;
          LocalStorageService.set('operador', data.Descricao);
        })
        .error(function(data, status) {
          $log.error(status);
        });
    };
    
    /*function() {
      //console.log('in progress');
      $http
        .get("turno/EmAndamento")
        .success(function(data) {                    
          // console.debug($scope.Current);
          LocalStorageService.set("InProgress", data.progress);
          if (data.progress == false) 
          {            
            
            $location.path('/');            
          }
           
        })
        .error(function(data, status) {
          $log.error(status);
        });
    };*/
  }
]);
