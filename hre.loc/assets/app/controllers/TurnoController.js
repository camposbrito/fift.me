
myApp.controller("TurnoController", [
  "$scope",
  "$location",
  "$log",
  "$http",
  "LocalStorageService",   
  function($scope, $location, $log, $http, LocalStorageService) {
    $scope.InProgress = false;
    
    $scope.currentPath = $location.path();
    LocalStorageService.set('path', $location.path());
    $scope.setQuantidade = function(data) {
      var obj = JSON.parse(data);
      if (obj == "{start:  false}")
        $scope.turno.QtdPecas = parseInt($scope.turno.QtdPecas) + parseInt(sessionStorage.PecasPorCiclo);
    };
    $scope.getAtual = function() {
      $http
      .get("turno/getAtual")
        .success(function(data) {
          $scope.turno = data; 
          LocalStorageService.set('Turno.id', data.id);          
        })
        .error(function(data, status) {
          $log.error(status);
        });
    };
    $scope.EmAndamento = function() {
      console.log('Em andamento');

      $http
        .get("turno/EmAndamento")
        .success(function(data) {
          $scope.Current = data;
          LocalStorageService.set("InProgress", data.progress);
          if (data.progress == true) 
          {            
            $location.path('/dashboard/index');      
          }
           
        })
        .error(function(data, status) {
          $log.error(status);
        });
    };

    $scope.FinalizarTurno = function() {      
      $location.path('/finaliza');                     
    }
  }
]);

