var myApp = angular.module("myApp", ["ngRoute"]);

myApp.config(function($routeProvider) {
  $routeProvider

    .when("/", {
      templateUrl: "templates/hre.html" 
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
    $http
      .get("sessao/get")
      .success(function(data) {        
        $scope.session = data;

      })
      .error(function(data, status) {
        $log.error(status);
      });

    $scope.getQuantidade = function() {
      $http
        .get("sessao/getQuantidade")
        .success(function(data) {
          $scope.Quantidade = data;
        })
        .error(function(data, status) {
          $log.error(status);
        });
    };
    $scope.setQuantidade = function(data) {
        var obj = JSON.parse(data);
        if (obj == '{start:  false}')
          $scope.Quantidade.qtde = parseInt($scope.Quantidade.qtde) + 1;
    };
    $scope.getOperador = function() {
        $http
          .get("sessao/getOperador")
          .success(function(data) {
            console.debug(data)
            $scope.Operador = data;;
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
    console.debug('terminoController');
    $http
      .get("sessao/get")
      .success(function(data) {        
        $scope.session = data;

      })
      .error(function(data, status) {
        $log.error(status);
      });

    $scope.getTermino = function() {
      $http
        .get("sessao/getTermino")
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

myApp.controller("ResultadoController", [
  "$scope",
  "$location",
  "$log",
  "$http",
  function($scope, $location, $log, $http) {
    console.debug('ResultadoController');
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


myApp.controller("SessionController", [
  "$scope",
  "$location",
  "$log",
  "$http",
  function($scope, $location, $log, $http) {
    console.debug('SessionController');
    $http
      .get("sessao/get")
      .success(function(data) {
        $scope.session = data;
      })
      .error(function(data, status) {
        $log.error(status);
      });
  }
]);
