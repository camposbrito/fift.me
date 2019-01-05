'use strict';

var reconnection = true,
    reconnectionDelay = 500,
    reconnectionTry = 0;

function initClient() {
  resetMensagem("client trying connect.", 'silver');
  connectClient();
}

function DisconnectingSocked(socket) {
  resetMensagem("client trying disconnect", 'silver');
  socket.disconnect();
}
function LimparMessages(msg, color) { 
  $("#messages").empty();
  $("#messages").append("<span class='badge badge-light circle-badge text-right' onclick='LimparMessages()'>X</span>" );
}

function resetMensagem(msg, color) {
  ////console.log(getDataTime() + ' - '+ msg);  
  $("#messages").show();
  //$("#messages").empty();
  $("#messages").append('<font color="'+color+'"><b>' + getDataTime() + " - " + msg + "</b></font><br>" );
}

resetMensagem("Loading", 'silver');

function getDataTime() {
  var d = new Date();
  return d;
}

function connectClient() {
  var socket = "";
  socket = io.connect('http://127.0.0.1:1337', { forceNew: true });    
    socket.on('connect', function (e) {
      resetMensagem("Connected - "+ socket.id, 'green');
      routesClient(socket);
    });
    
    socket.on("connect_error", function(e){
        reconnectionTry++;
        resetMensagem("client trying reconnect. #" + reconnectionTry, 'silver');               
    });
  
  return false;
}

function routesClient(socket){
  // ////console.log('connecteds');
  //+---------------+
  //|---- TESTE ----|
  //+---------------+ 
  socket.on('test', function (e) {
    ////console.log(e);
    socket.emit("test", "PONG");
  });
  //+---------------+
  //|- RECEBE RFID -|
  //+---------------+ 
  socket.on("SetCartao", function(data) {
    var TAG = $.parseJSON(data);
    var Jornada = $("#Jornada").val();
    ////console.log(TAG);
    $.post("./turno/save", { TAG, Jornada });

    $("#your-modal-id").modal("hide");
    $("body").removeClass("modal-open");
    $(".modal-backdrop").remove();

    window.location.href = "./#/em_andamento/";
    // socket.disconnect(true);
  });
  //+---------------+
  //|- CICLO START -|
  //+---------------+ 
  socket.on("SetCicloStart", function(data) {
    var socket_id = socket.id;
    var Dados = $.parseJSON(data);
    $.post("./ciclostart/save", { Dados, socket_id });
    angular.element("#TurnoController").scope().setQuantidade(data);
    angular.element("#TurnoController").scope().$apply(); 
  });

  //+---------------+
  //|SALVAR PARAMETRO|
  //+---------------+ 
  $("#parametros-salvar").click(function() {
    var Parametros = $("#parametros").serialize();
    //console.debug("#salvar-parametros");
    $.post("../parametros/salvar", Parametros);
    socket.disconnect(true);
    socket.close();
    window.location.href = "../#/em_andamento/";
  });
  
  //+---------------+
  //|SALVAR OCORRENCIA|
  //+---------------+ 
  $("#ocorrencia-salvar").click(function() {
    var Ocorrencia = $("#ocorrencia-form").serialize();
    //console.debug("#salvar-parametros");
    $.post("./ocorrencia/salvar", Ocorrencia);
    if(angular.element("#ocorrencia-form").length > 0 )
    {
      // angular.element("#ocorrencia-form").scope().IntervaloProgramado();
      // angular.element("#ocorrencia-form").scope().MaquinaPreparacao();
      angular.element("#ocorrencia-form").scope().RoteamentoBloqueio();
      angular.element("#ocorrencia-form").scope().$apply(); 
    }
    // socket.disconnect(true);
    // socket.close();
    // window.location.href = "../#/em_andamento/";
  });
  
  //+---------------+
  //|--- DISCONN ---|
  //+---------------+ 
  socket.on('disconnect', function () {
    socket.disconnect();
    reconnectionTry = 0;
    ////console.log("client disconnected");
    resetMensagem("disconnected" , 'red' );
    
    if((reconnection === true) && (!socket.connected)) {
            setTimeout(function () {
              resetMensagem("client trying reconnect", 'silver');
                    connectClient();
                }, reconnectionDelay);
        }
  });
  //+---------------+
  //|--- EVENTS ---|
  //+---------------+ 

  $('#dashboard-index').click(function(){
    //alert('dashboard');
    socket.disconnect();
    socket.close();
  });
  $('#parametros-index').click(function(){
    //alert('parametros');
    socket.disconnect();
    socket.close();
  });
  $('#ocorrencia-listar').click(function(){
    //alert('parametros');
    socket.disconnect();
    socket.close();
    window.location.href = "./#/ocorrencias/listar/";
  });
  $('#ocorrencia-nova').click(function(){
    //alert('parametros');
    socket.disconnect();
    socket.close();
  });
  $('#ocorrencia-voltar').click(function(){
    //alert('parametros');
    socket.disconnect();
    socket.close();
  });
  $('#concluir-turno').click(function(){
    //alert('concluir-turno');
    socket.disconnect();
    socket.close();
  });

  $('#turno-fechar').click(function(){
    //alert('fechar-turno');
    socket.disconnect();
    socket.close();
  });
  return false;
}


resetMensagem("Inicializando", 'silver'); 
initClient();
