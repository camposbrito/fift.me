myApp.config(function($routeProvider) {
  $routeProvider
    .when("/", {
      templateUrl: "templates/hre.html"
    })
    .when("/ocorrencia/novo", {
      templateUrl: "templates/ocorrencia-novo.html",
      controller: "OcorrenciaController"
    })
    .when("/ocorrencia/bloqueio", {
      templateUrl: "templates/ocorrencia-bloqueio.html",
      controller: "OcorrenciaController"
    })
    .when("/ocorrencias/listar", {
      templateUrl: "templates/ocorrencia-listar.html",
      controller: "OcorrenciaController"
    })
    .when("/dashboard/index", {
      templateUrl: "templates/dashboard.html",
      controller: "DashboardController"
    })
    .when("/parametros", {
      templateUrl: "templates/parametros.html",
      controller: "parametrosController"
    })
    .when("/em_andamento", {
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
    });
    
});
