<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Servidor PI</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <!-- <link rel="stylesheet" href="../../assets/css/hre.css"> -->
</head>
<body>
  <div id="messages" class=" alert alert-secondary" role="alert" style="display:none;"> </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <span>Ciclo Start</span>
      <label class="switch">
        <input id="start" type="checkbox"  >
        <span class="slider round"></span>
      </label>
      <br>
      <button id="operador" type="button" class="btn btn-default"      value="02150E0">02150E0 | Operador&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </button>
      <button id="supervisor" type="button" class="btn btn-default"    value="019643A">019643A | Supervisor&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </button>
      <button id="administrador" type="button" class="btn btn-default" value="01A013D">01A013D | Administrador</button>

    </div>
  </div>
</body>
<script src="./node_modules/socket.io-client/dist/socket.io.js"></script>
<style type="text/css">
  .switch {
    position: relative;
    display: inline-block;
    width: 60px;
    height: 34px;
  }

  .switch input {
    opacity: 0;
    width: 0;
    height: 0;
  }

  .slider {
    position: absolute;
    cursor: pointer;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background-color: #ccc;
    -webkit-transition: .4s;
    transition: .4s;
  }

  .slider:before {
    position: absolute;
    content: "";
    height: 26px;
    width: 26px;
    left: 4px;
    bottom: 4px;
    background-color: white;
    -webkit-transition: .4s;
    transition: .4s;
  }

  input:checked + .slider {
    background-color: #2196F3;
  }

  input:focus + .slider {
    box-shadow: 0 0 1px #2196F3;
  }

  input:checked + .slider:before {
    -webkit-transform: translateX(26px);
    -ms-transform: translateX(26px);
    transform: translateX(26px);
  }

  /* Rounded sliders */
  .slider.round {
    border-radius: 34px;
  }

  .slider.round:before {
    border-radius: 50%;
  }
</style>
<script>
'use strict';

var  reconnection = true,
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
  
  socket.on('test', function (e) {
    console.log(e);
    socket.emit("test", "pong");
  });
  
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
</script>
</html>
