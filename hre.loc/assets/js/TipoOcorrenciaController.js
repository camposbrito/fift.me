
myApp.controller("TipoOcorrenciaController", [
  "$scope",  
  "$location",
  "$log",
  "$http",
  "LocalStorageService",   
  function($scope, $location, $log, $http, LocalStorageService) {
    $scope.currentPath = $location.path();
    
    //console.log('RODRIGO DE CAMPOS BRITO')
    //console.log('GET id - turno atual');     
    //console.log(sessionStorage.TurnoAtual);
    //console.log($scope.currentPath);
    //console.log('>>>' +LocalStorageService.get('Turno.id')   );
    $http
      .get("tipo_ocorrencia/getAll")
      .success(function(data) {
        $scope.TipoOcorrencia = data;
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
    $scope.getAll = function() {
      $http
        .get("tipo_ocorrencia/getAll")
        .success(function(data) {
          $scope.TipoOcorrencia = data;
        })
        .error(function(data, status) {
          $log.error(status);
        });
    };
  }
]);
