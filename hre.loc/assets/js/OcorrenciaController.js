
myApp.controller("OcorrenciaController", [
  "$scope",
  "$location",
  "$log",
  "$http",
  "LocalStorageService",   
  function($scope, $location, $log, $http, LocalStorageService) {
    $scope.currentPath = $location.path();
    $scope.Turno = LocalStorageService.get('Turno.id');
    $scope.currentPage = 1;
    $scope.backgroud_color = LocalStorageService.get('backgroud_color');
    $scope.font_color = LocalStorageService.get('font_color');
    $scope.Mensagem = LocalStorageService.get('Mensagem');

    $scope.RoteamentoBloqueio = function(){
      $http
      .get("ocorrencia/GetOcorrenciaAberto?Turno_Id=" + $scope.Turno)
      .success(function(data) {
        console.log(data);
        Ocorrencia = data;
        console.log(Ocorrencia);        
        TipoOcorrencia = Ocorrencia.TipoOcorrencia;
        console.log(TipoOcorrencia);
        LocalStorageService.set('InPreparation', data.TipoOcorrencia.Preparacao == 'S');
        if ( data.TipoOcorrencia.Preparacao == 'S')
        {
          $scope.MaquinaPreparacao();
        }
        LocalStorageService.set('InMaintenance', data.TipoOcorrencia.Manutancao == 'S');
        if (data.TipoOcorrencia.Manutencao == 'S') 
        {
          $scope.MaquinaManutencao();
        }  
        LocalStorageService.set('InScheduledInterval', data.TipoOcorrencia.InterProgr == 'S');
        if (data.TipoOcorrencia.InterProgr == 'S')     
        {
          $scope.IntervaloProgramado();
        }
        $location.path('/ocorrencia/bloqueio');
      })
      .error(function(data, status) {
        $log.error(status);
      });  
    }
    $scope.IntervaloProgramado = function(){
      LocalStorageService.set('backgroud_color', '#ffa500');
      LocalStorageService.set('font_color', '#ffffff');
      LocalStorageService.set('Mensagem', 'INTERVALO PROGRAMADO');            
    };
    $scope.MaquinaPreparacao = function(){
      LocalStorageService.set('backgroud_color', '#1e90ff');
      LocalStorageService.set('font_color', '#000000');
      LocalStorageService.set('Mensagem', 'Máquina em Preparação');            
    };
    $scope.MaquinaManutencao = function(){
      LocalStorageService.set('backgroud_color', '#ff0000');
      LocalStorageService.set('font_color', '#000000');
      LocalStorageService.set('Mensagem', 'Máquina em Manutenção');         
    };
    $http
      .get("ocorrencia/Count?Turno_Id=" + $scope.Turno)
      .success(function(data) {
        $scope.lastPage = data.Registros;
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
        .get("ocorrencia/getAll?pageno=" + $scope.currentPage+"&Turno_Id=" + $scope.Turno)
        .success(function(data) {
          $scope.ocorrencia = data;
        })
        .error(function(data, status) {
          $log.error(status);
        });
    };
    function getPerPage() {
      return parseInt(sessionStorage.itemPerPage);
    }
    if (sessionStorage.getItem("itemPerPage") === null) {
      sessionStorage.setItem("itemPerPage", 10);
    }
    $scope.changeNum = function(itemNum) {
      sessionStorage.itemPerPage = itemNum;
      $scope.numPerPage = getPerPage();
    };
    $scope.voltar_ocorrencia = function() {
      $location.path('/dashboard/index');            
    }
    $scope.pageChanged = function(pageno) {
      // Equivalent to //console.log
      $scope.currentPage = pageno;
      $scope.getAll();
      // $log.log('Page changed to: ' + $scope.pagination.currentPage);
    };
  }
]);