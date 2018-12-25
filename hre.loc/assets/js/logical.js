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