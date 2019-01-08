
myApp.controller("TurnoController", [
  "$scope",
  "$location",
  "$log",
  "$http",
  "LocalStorageService",   
  function($scope, $location, $log, $http, LocalStorageService) {
    $scope.InProgress = false;
    $scope.ocorrencias_aberto_count  = LocalStorageService.get("ocorrencias_aberto_count");
    $scope.currentPath = $location.path();
    LocalStorageService.set('path', $location.path());
    $scope.setQuantidade = function(data) {
      var obj = JSON.parse(data);
      $scope.CriarOcorrencia = obj.CriarOcorrencia;
      $scope.ContouPeca = obj.ContouPeca;
      if (obj.ContouPeca){
        $scope.turno.QtdPecas = parseInt($scope.turno.QtdPecas) + parseInt(sessionStorage.PecasPorCiclo);
      }
      if (obj.CriarOcorrencia) {
        var iOcorrencia = parseInt(LocalStorageService.get("ocorrencias_aberto_count"));
        iOcorrencia = iOcorrencia + 1;
        LocalStorageService.set("ocorrencias_aberto_count", iOcorrencia.toString());
        $scope.ocorrencias_aberto_count  = iOcorrencia.toString();        
      }
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

