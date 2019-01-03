
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
    $scope.TipoOcorrenciaDescr = LocalStorageService.get('TipoOcorrenciaDescr');
    $scope.RoteamentoBloqueio = function(){
      $http
      .get("ocorrencia/GetOcorrenciaAberto?Turno_Id=" + $scope.Turno)
      .success(function(data) {    
                 
        if (data.length > 0){
          ocorrencia = data;  
          TipoOcorrencia = ocorrencia.TipoOcorrencia;
        
          LocalStorageService.set('InPreparation', TipoOcorrencia.Preparacao == 'S');
          LocalStorageService.set('InMaintenance', TipoOcorrencia.Manutencao == 'S');
          LocalStorageService.set('InScheduledInterval', TipoOcorrencia.InterProgr == 'S');
          LocalStorageService.set('TipoOcorrenciaDescr', TipoOcorrencia.Descricao);
          if ( TipoOcorrencia.Preparacao == 'S')
          {
            $scope.MaquinaPreparacao()            
          }
          else
          if (TipoOcorrencia.Manutencao == 'S') 
          {
            $scope.MaquinaManutencao();
          }  
          else
          if (TipoOcorrencia.InterProgr == 'S')     
          {
            $scope.IntervaloProgramado();
          }
        }            
      })
      .error(function(data, status) {
        $log.error(status);
      });  
    }
    $scope.IntervaloProgramado = function(){
      console.log('IntervaloProgramado');

      LocalStorageService.set('backgroud_color', '#ffa500');
      LocalStorageService.set('font_color', '#ffffff');
      LocalStorageService.set('Mensagem', 'INTERVALO PROGRAMADO');  
      $location.path('/ocorrencia/bloqueio');          
    };
    $scope.MaquinaPreparacao = function(){
      console.log('MaquinaPreparacao');
      
      LocalStorageService.set('backgroud_color', '#1e90ff');
      LocalStorageService.set('font_color', '#000000');
      LocalStorageService.set('Mensagem', 'Máquina em Preparação');    
      $location.path('/ocorrencia/bloqueio');        
    };
    $scope.MaquinaManutencao = function(){
      console.log('MaquinaManutencao');
      
      LocalStorageService.set('backgroud_color', '#ff0000');
      LocalStorageService.set('font_color', '#000000');
      LocalStorageService.set('Mensagem', 'Máquina em Manutenção');   
      $location.path('/ocorrencia/bloqueio');      
    };
    $scope.LiberarMaquina = function(){
      $http({
        url: 'ocorrencia/FinalizarTurno',
        method: "POST",
        headers: {'Content-Type': 'application/json'},        
        data: JSON.stringify({ 'Turno' : $scope.Turno })
      })
      .then(function(response) {
        LocalStorageService.set('InScheduledInterval', false);
        LocalStorageService.set('InMaintenance', false);
        LocalStorageService.set('InPreparation', false);
        $location.path('/dashboard/index');       
      }, 
      function(response) { // optional
        $log.error(response);
      })
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