
myApp.controller("ResultadoController", [
  "$scope",
  "$location",
  "$log",
  "$http",
  "LocalStorageService",   
  function($scope, $location, $log, $http, LocalStorageService) {
    $scope.currentPath = $location.path();
    //console.log($scope.currentPath);
    console.debug("ResultadoController");
    $http
      .get("turno/getResultadoAtual")
      .success(function(data) {
        $scope.turno = data;
        $scope.turno.Previsto   = $scope.turno.QuantidadePrevistaTurno;
        $scope.turno.Refugos    = parseInt($scope.turno.RefugosProducao) 
                                + parseInt($scope.turno.RefugosFundicao);

        $scope.turno.Producao   = parseInt($scope.turno.PecasProducao) 
                                - parseInt($scope.turno.Refugos);
                                
        $scope.turno.Diferenca  = parseInt($scope.turno.QuantidadePrevistaTurno) 
                                - parseInt($scope.turno.Producao);
        //Qualidade = quantidade de produtos produzidos – (quantidade retrabalhada + quantidade perdida) / quantidade de produtos produzidos
        //previsto-(previsto-realizado+refugo)/previsto*100
        var OEE =
          parseFloat(
            ($scope.turno.Previsto -
              ($scope.turno.Previsto -
                $scope.turno.Producao +
                $scope.turno.Refugos)) /
              $scope.turno.Previsto
          ) * 100;
        // var OEE = parseInt(parseFloat(parseFloat($scope.turno.Producao - $scope.turno.Refugos/$scope.turno.Producao)) );
        $scope.turno.OEE = 0;
        if (!isNaN(OEE)) {
          $scope.turno.OEE = OEE.toFixed(2);
        }
      })
      .error(function(data, status) {
        $log.error(status);
      }); 
      $scope.FecharTurno = function() {  
        $.post("./turno/encerrar_turno");
        $location.path('/');                  
    }   
  }
]);