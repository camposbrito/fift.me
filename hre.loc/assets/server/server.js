var server     = require('http').createServer(),
    io         = require('socket.io')(server),
    logger     = require('winston'),
    port       = 1337,
    clients    = {};
    
    logger.format.colorize();
    logger.format.timestamp();

    console.info('listening on port ' + port);
    io.sockets.on('connection', function (socket) {
        clients[socket.id] = socket;
        console.info('Connected > CONN > ' + socket.id);
        console.info('Connected > PING > ' + socket.id);
        socket.emit("test", "ping");
        
        socket.on('test', function (e) {
            console.info('Connected socket > ' + e +' > '+ socket.id);
        });
        
        socket.on("disconnect",function(data){            
            // console.info(data);
            console.info('disconnected socket > ' + socket.id);            
            delete clients[socket.id];
        });
    });
    server.listen(port);          