var myApp = angular.module("myApp", ["ngRoute"]);

myApp.config(function($routeProvider) {
  $routeProvider

    .when("/", {
      templateUrl: "templates/hre.html" //,

      // controller: "hreController"
    })

    .when("/dashboard", {
      templateUrl: "templates/dashboard.html",

      controller: "dashboardController"
    })
    .otherwise({
      redirectTo: "/"
  }); /*

        .when("/hre", {
            templateUrl: "templates/hre.html",

            controller: "hreController"
        })*/;
});

// myApp.controller('mainController', ['$scope', '$location', '$log', function ($scope, $location, $log) {

//     $scope.nome = 'Rodrigo';

// }]);

// myApp.controller('secondController', ['$scope', '$location', '$log', '$http', function ($scope, $location, $log, $http) {

//     $scope.frmToggle = function () {

//         $('#blogForm').slideToggle();

//     }

//     $http.get('welcome/get').

//         success(function (data) {

//             $scope.posts = data;

//         }).

//         error(function (data, status) {

//             $log.error(status);

//         });

//     $scope.criarPost = function () {

//         $http.post('welcome/post',

//             {

//                 'title': $scope.title,

//                 'description': $scope.description

//             }

//         ).success(function (data) {

//             $scope.posts = data;

//         });

//     }

// }]);

myApp.controller("dashboardController", [
  "$scope",
  "$location",
  "$log",
  "$http",
  function($scope, $location, $log, $http) {
    $http
      .get("sessao/get")
      .success(function(data) {
        // console.debug(data);
        $scope.session = data;
        // console.debug($scope.session);
      })
      .error(function(data, status) {
        $log.error(status);
      });

    $scope.getQuantidade = function() {
      $http
        .get("sessao/getQuantidade")
        .success(function(data) {
          // console.debug(data);
          $scope.Quantidade = data;
          // console.debug($scope.session);
        })
        .error(function(data, status) {
          $log.error(status);
        });
    };
    $scope.setQuantidade = function(data) {
      // $http
      //   .get("sessao/getQuantidade")
      //   .success(function(data) {
        console.debug(JSON.parse(data));
        var obj = JSON.parse(data);
        console.debug(obj);
        console.debug(obj.start);

          console.debug($scope.Quantidade.qtde);
          if (obj == '{start:  false}')
            $scope.Quantidade.qtde = parseInt($scope.Quantidade.qtde) + 1;
          // $scope.Quantidade.qtde = ($scope.Quantidade.qtde) + 1;
          // console.debug($scope.session);
        // })
        // .error(function(data, status) {
        //   $log.error(status);
        // });
    };
    $scope.getOperador = function() {
        $http
          .get("sessao/getOperador")
          .success(function(data) {
            // console.debug(data);
            $scope.Operador = data;
            // console.debug($scope.session);
          })
          .error(function(data, status) {
            $log.error(status);
          });
      };

    // $scope.frmToggle = function () {

    //     $('#blogForm').slideToggle();

    // }

    // $http.get('sessao/get').

    //     success(function (data) {

    //         $scope.session = data;

    //     }).

    //     error(function (data, status) {

    //         $log.error(status);

    //     });

    // $scope.criarPost = function () {

    //     $http.post('welcome/post',

    //         {

    //             'title': $scope.title,

    //             'description': $scope.description

    //         }

    //     ).success(function (data) {

    //         $scope.posts = data;

    //     });

    // }
  }
]);

myApp.controller("SessionController", [
  "$scope",
  "$location",
  "$log",
  "$http",
  function($scope, $location, $log, $http) {
    // $scope.frmToggle = function () {

    //     $('#blogForm').slideToggle();

    // }

    $http
      .get("sessao/get")
      .success(function(data) {
        // console.debug(data);
        $scope.session = data;
        console.debug($scope.session);
      })
      .error(function(data, status) {
        $log.error(status);
      });

    // $scope.criarPost = function () {

    //     $http.post('welcome/post',

    //         {

    //             'title': $scope.title,

    //             'description': $scope.description

    //         }

    //     ).success(function (data) {

    //         $scope.posts = data;

    //     });

    // }
  }
]);
