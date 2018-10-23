var server     = require('http').createServer(),
    io         = require('socket.io')(server),
    logger     = require('winston'),
    port       = 1337,
    clients = {};

logger.format.colorize();
logger.format.timestamp();

logger.info('SocketIO > listening on port ' + port);

io.on('connection', function (socket){
    var nb = 0;
    clients[socket.id] = socket;
    logger.info('SocketIO > Connected socket > ' + socket.id);
    socket.emit("test", "ping");
  
    socket.on('test', function (e) {
      console.log(e);
    });
    socket.on('broadcast', function (message) {
        ++nb;
        logger.info('ElephantIO broadcast > broadcast >' + JSON.stringify(message));

        // send to all connected clients
        io.sockets.emit("broadcast", message);
    });
    socket.on('GetCartao', function (message) {
        ++nb;
        logger.info('ElephantIO broadcast > GetCartao >' + JSON.stringify(message));

        // send to all connected clients
        // io.sockets.emit("SetCartao",  JSON.stringify('{tag: \'02150E0\'}'));
    });
    socket.on('SetCartao', function (message) {
        ++nb;
        logger.info('ElephantIO broadcast > SetCartao >' + JSON.stringify(message));

        // send to all connected clients
        io.sockets.emit("SetCartao",  message);
    });
    socket.on('SetOcorrencia', function (message) {
        ++nb;
        logger.info('ElephantIO broadcast > SetOcorrencia >' + JSON.stringify(message));
        // console.log(clients.length);
        // console.debug(clients[socket.id].rooms);
        console.debug(clients[socket.id].id);
        // send to all connected clients
        io.sockets.emit("SetOcorrencia",  message);
    });
    socket.on('reset', function (message) {
        ++nb;
        
        logger.info('ElephantIO broadcast > reset >' + JSON.stringify(message));

        // send to all connected clients
        io.sockets.emit("reseting",  message);
    });
    socket.on('disconnect', function () {
        delete clients[socket.id];
        logger.info('SocketIO : Received ' + nb + ' messages');
        logger.info('SocketIO > Disconnected socket ' + socket.id);
    });
});

server.listen(port);
