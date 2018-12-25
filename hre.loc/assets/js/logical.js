'use strict';

var reconnection = true,
    reconnectionDelay = 5000,
    reconnectionTry = 0;

function initClient() {
  connectClient();
}

function connectClient() {
  var socket = "";
  socket = io.connect('http://127.0.0.1:1337');
  
    socket.on('connect', function (e) {
      routesClient(socket);
    });
    
    socket.on("connect_error", function(e){
        reconnectionTry++;
        console.log("Reconnection attempt #"+reconnectionTry);
    });
  
  return false;
}

function routesClient(socket){
  console.log('connected');
  //+---------------+
  //|---- TESTE ----|
  //+---------------+ 
  socket.on('test', function (e) {
    console.log(e);
    socket.emit("test", "pong");
  });
  //+---------------+
  //|- RECEBE RFID -|
  //+---------------+ 
  socket.on("SetCartao", function(data) {
    var TAG = $.parseJSON(data);
    var Jornada = $("#Jornada").val();
    console.log(TAG);
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
  //| INICIAR TURNO |
  //+---------------+   
  // $("#IniciarTurno").click(function() {
  //   resetMensagem();
  //   console.debug("#IniciarTurno");
  //   var sMessage = "Iniciar Turno";
  //   socket.emit("GetCartao", { message: sMessage });
  // });
  //+---------------+
  //| INICIAR TURNO |
  //+---------------+ 
  // $("#inicio").click(function() {
  //   console.debug("inicio");
  //   socket.disconnect(true);
  // });

  // $("#parametros").click(function() {
  //   console.debug("parametros");
  //   socket.disconnect(true);
  // });
  //+---------------+
  //|SAVAR PARAMETRO|
  //+---------------+ 
  $("#salvar-parametros").click(function() {
    var Parametros = $("#parametros").serialize();
    console.debug("#salvar-parametros");
    $.post("../parametros/salvar", Parametros);
    // socket.disconnect(true);
    window.location.href = "../#/em_andamento/";
  });
  //+---------------+
  //|-- FINALIZAR --|
  //+---------------+ 
  $("#finalizaturno").click(function() {
    // console.debug("#finalizaturno");
    // socket.disconnect(true);
    window.location.href = "./#/finaliza";
  });
  
  //+---------------+
  //|--- DISCONN ---|
  //+---------------+ 
  socket.on('disconnect', function () {
    socket.disconnect();
    console.log("client disconnected");
    if(reconnection === true) {
            setTimeout(function () {
                    console.log("client trying reconnect");
                    connectClient();
                }, reconnectionDelay);
        }
  });
  
  return false;
}

 window.onload = function () {
   initClient();
 };