var myApp = angular.module("myApp", ["ngRoute"]);

myApp.config(function($routeProvider) {
  $routeProvider
    .when("/", {
      templateUrl: "templates/hre.html" 
    })
    .when("/ocorrencia", {
      redirectTo: "/ocorrencia/1"
    })
    .when("/ocorrencia/:num", {
      templateUrl: "templates/ocorrencia.html",
      controller: "OcorrenciaController"
    })
    .when("/dashboard", {
      templateUrl: "templates/dashboard.html",
      controller: "DashboardController"
    })    
    .when("/finaliza", {
      templateUrl: "templates/terminoturno.html",
      controller: "TerminoController"
    })
    .when("/resultado", {
      templateUrl: "templates/resultado.html",
      controller: "ResultadoController"
    })
    .otherwise({
      redirectTo: "/"
  })  
});



myApp.controller("DashboardController", [
  "$scope",
  "$location",
  "$log",
  "$http",
  function($scope, $location, $log, $http) {
    console.debug('DashboardController');
    // $http
    //   .get("sessao/get")
    //   .success(function(data) {        
    //     $scope.session = data;

    //   })
    //   .error(function(data, status) {
    //     $log.error(status);
    //   });

    // $scope.getQuantidade = function() {
    //   $http
    //     .get("sessao/getQuantidade")
    //     .success(function(data) {
    //       $scope.Quantidade = data;
    //     })
    //     .error(function(data, status) {
    //       $log.error(status);
    //     });
    // };
    // $scope.setQuantidade = function(data) {
    //     var obj = JSON.parse(data);
    //     console.debug($scope.turno);
    //     // if (obj == '{start:  false}')
    //     //   $scope.turno.QtdPecas = parseInt($scope.turno.QtdPecas) + 1;
    // };
    // $scope.getOperador = function() {
    //     $http
    //       .get("sessao/getOperador")
    //       .success(function(data) {
    //         console.debug(data)
    //         $scope.Operador = data;;
    //       })
    //       .error(function(data, status) {
    //         $log.error(status);
    //       });
    //   };     
  }
]);

myApp.controller("ResultadoController", [
  "$scope",
  "$location",
  "$log",
  "$http",
  function($scope, $location, $log, $http) {
    console.debug('ResultadoController');
    // $http
    //   .get("sessao/get")
    //   .success(function(data) {        
    //     $scope.session = data;

    //   })
    //   .error(function(data, status) {
    //     $log.error(status);
    //   });

    //   $scope.getResultado = function() {
    //     $http
    //       .get("sessao/getResultado")
    //       .success(function(data) {
    //         console.debug(data);
    //         $scope.quantidade = data;
    //       })
    //       .error(function(data, status) {
    //         $log.error(status);
    //       });
    //   };  
    //   $scope.getTermino = function() {
    //     $http
    //       .get("sessao/getResultado")
    //       .success(function(data) {
    //         console.debug(data);
    //         $scope.quantidade = data;
    //       })
    //       .error(function(data, status) {
    //         $log.error(status);
    //       });
    //   };      
  }
]);

myApp.controller("OcorrenciaController", [
  "$scope",
  "$location",
  "$log",
  "$http",
  function($scope, $location, $log, $http) {
    console.debug('OcorrenciaController');
    $http
      .get("sessao/get")
      .success(function(data) {        
        $scope.session = data;

      })
      .error(function(data, status) {
        $log.error(status);
      });

      $scope.getResultado = function() {
        $http
          .get("sessao/getResultado")
          .success(function(data) {
            console.debug(data);
            $scope.quantidade = data;
          })
          .error(function(data, status) {
            $log.error(status);
          });
      };  
      $scope.getTermino = function() {
        $http
          .get("sessao/getResultado")
          .success(function(data) {
            console.debug(data);
            $scope.quantidade = data;
          })
          .error(function(data, status) {
            $log.error(status);
          });
      };      
  }
]);

// myApp.controller("SessionController", [
//   "$scope",
//   "$location",
//   "$log",
//   "$http",
//   // function($scope, $location, $log, $http) {
//   //   console.debug('SessionController');
//   //   $http
//   //     .get("sessao/get")
//   //     .success(function(data) {
//   //       $scope.session = data;
//   //     })
//   //     .error(function(data, status) {
//   //       $log.error(status);
//   //     });
//   // }
// ]);

/* CONTROLLERS OFICIAIS */
myApp.controller("ResultadoController", [
    "$scope",
    "$location",
    "$log",
    "$http",
    function($scope, $location, $log, $http) {
      console.debug('ResultadoController');
      $http
        .get("turno/getResultadoAtual")
        .success(function(data) {
          $scope.turno = data;
          $scope.turno.Previsto = $scope.turno.QuantidadePrevistaTurno;
          $scope.turno.Refugos = parseInt($scope.turno.RefugosProducao) + parseInt($scope.turno.RefugosFundicao);
          $scope.turno.Producao = parseInt($scope.turno.PecasProducao) - parseInt($scope.turno.Refugos);
          $scope.turno.Diferenca = parseInt($scope.turno.QuantidadePrevistaTurno) - parseInt($scope.turno.Producao);
          //Qualidade = quantidade de produtos produzidos – (quantidade retrabalhada + quantidade perdida) / quantidade de produtos produzidos
//          previsto-(previsto-realizado+refugo)/previsto*100
          var OEE = parseFloat(($scope.turno.Previsto-($scope.turno.Previsto-$scope.turno.Producao+$scope.turno.Refugos))/$scope.turno.Previsto)*100;
          // var OEE = parseInt(parseFloat(parseFloat($scope.turno.Producao - $scope.turno.Refugos/$scope.turno.Producao)) );         
          $scope.turno.OEE = 0;
          if (!isNaN(OEE)){
            $scope.turno.OEE = OEE.toFixed(2);
          }
        })
        .error(function(data, status) {
          $log.error(status);
        });
        $scope.setQuantidade = function(data) {
          var obj = JSON.parse(data);
          // console.debug($scope.turno);
          // console.debug($scope.turno.QtdPecas);
          if (obj == '{start:  false}')
            $scope.turno.QtdPecas = parseInt($scope.turno.QtdPecas) + 1;
        };
        $scope.inProgress = function() {
          $http
            .get("turno/inProgress")
            .success(function(data) {            
              // $scope.Current = data;
              // console.debug($scope.Current);
              // if (data.progress == true)
              // window.location.href = "./#/dashboard";
            })
            .error(function(data, status) {
              $log.error(status);
            });
        }; 
    }
  ]);
  
myApp.controller("TerminoController", [
  "$scope",
  "$location",
  "$log",
  "$http",
  function($scope, $location, $log, $http) {
   
    $http
      .get("turno/getResultadoAtual")
      .success(function(data) {
        $scope.turno = data;
      })
      .error(function(data, status) {
        $log.error(status);
      });
      $scope.setQuantidade = function(data) {
        var obj = JSON.parse(data);
        // console.debug($scope.turno);
        // console.debug($scope.turno.QtdPecas);
        if (obj == '{start:  false}')
          $scope.turno.QtdPecas = parseInt($scope.turno.QtdPecas) + 1;
      };
      $scope.inProgress = function() {
        $http
          .get("turno/inProgress")
          .success(function(data) {            
            // $scope.Current = data;
            // console.debug($scope.Current);
            // if (data.progress == true)
            // window.location.href = "./#/dashboard";
          })
          .error(function(data, status) {
            $log.error(status);
          });
      }; 
  }
]);

myApp.controller("TurnoController", [
  "$scope",
  "$location",
  "$log",
  "$http",
  function($scope, $location, $log, $http) {
    console.debug('TurnoController');
    $http
      .get("turno/getAtual")
      .success(function(data) {
        $scope.turno = data;
      })
      .error(function(data, status) {
        $log.error(status);
      });
      $scope.setQuantidade = function(data) {
        var obj = JSON.parse(data);
        // console.debug($scope.turno);
        // console.debug($scope.turno.QtdPecas);
        if (obj == '{start:  false}')
          $scope.turno.QtdPecas = parseInt($scope.turno.QtdPecas) + 1;
      };
      $scope.inProgress = function() {
        $http
          .get("turno/inProgress")
          .success(function(data) {            
            $scope.Current = data;
            console.debug($scope.Current);
            if (data.progress == true)
            window.location.href = "./#/dashboard";
          })
          .error(function(data, status) {
            $log.error(status);
          });
      }; 
  }
]);

myApp.controller("ParametrosController", [
  "$scope",
  "$location",
  "$log",
  "$http",
  function($scope, $location, $log, $http) {
    console.debug('TurnoController');
    $http
      .get("parametros/get")
      .success(function(data) {
        $scope.parametros = data;
      })
      .error(function(data, status) {
        $log.error(status);
      });
  }
]);

myApp.controller("TipoOcorrenciaController", [
  "$scope",
  "$location",
  "$log",
  "$http",
  function($scope, $location, $log, $http) {
    console.debug('TipoOcorrenciaController');
    // $http
    //   .get("tipo_ocorrencia/getAll")
    //   .success(function(data) {
    //     $scope.turno = data;
    //   })
    //   .error(function(data, status) {
    //     $log.error(status);
    //   });

    $scope.getAll = function() {
      $http
        .get("tipo_ocorrencia/getAll")
        .success(function(data) {
          console.debug(data);
          $scope.TipoOcorrencia = data;
        })
        .error(function(data, status) {
          $log.error(status);
        });
    };
  }  
]);
