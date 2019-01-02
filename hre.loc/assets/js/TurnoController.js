
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
      // console.debug("get Atual");
      $http
      .get("turno/getAtual")
        .success(function(data) {
          //console.log(data);
          
          $scope.turno = data; 
          LocalStorageService.set('Turno.id', data.id);          
          //console.log('RODRIGO DE CAMPOS BRITO')
          //console.log('save id - turno atual');     
          //console.log(sessionStorage.TurnoAtual);
          // //console.log($window.sessionStorage.TurnoAtual2);
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
          // console.debug($scope.Current);
          if (data.progress == true) 
          {            
            $location.path('/dashboard/index');      
            // alert('EmAndamento');
          }
           
        })
        .error(function(data, status) {
          $log.error(status);
        });
    };
    $scope.GetOcorrencias = function() {      
        $location.path('/ocorrencias/listar');                  
    }
    $scope.FinalizarTurno = function() {      
      $location.path('/finaliza');                     
    }
  }
]);

