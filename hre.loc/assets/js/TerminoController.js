

myApp.controller("TerminoController", [
  "$scope",
  "$location",
  "$log",
  "$http",
  "LocalStorageService",   
  function($scope, $location, $log, $http, LocalStorageService) {
    $scope.currentPath = $location.path();
    //console.log($scope.currentPath);
    $http
      .get("turno/getResultadoAtual")
      .success(function(data) {
        $scope.turno = data;
      })
      .error(function(data, status) {
        $log.error(status);
      });
      $scope.ConcluirTurno = function() {
        var Pecas_Producao  = $("#Pecas_Producao").val();
        var Refugo_Producao = $("#Refugo_Producao").val();
        var Refugo_Fundicao = $("#Refugo_Fundicao").val();
        
        $.post("./turno/concluir_turno", {
          Pecas_Producao,
          Refugo_Producao,
          Refugo_Fundicao
        });   
        $location.path('/resultado');                  
      };
  }
  
]);
