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
        //+---------------+
        //|---- TESTE ----|
        //+---------------+ 
        socket.on('test', function (e) {
            console.info('Connected > ' + e +' > '+ socket.id);
        });
        //+---------------+
        //|- RECEBE RFID -|
        //+---------------+ 
        socket.on('SetCartao', function (message) {
            console.info('broadcast > SetCartao >' + message);     
            // send to all connected clients
            io.sockets.emit("SetCartao",  message);
        });
        //+---------------+
        //|- CICLO START -|
        //+---------------+ 
        socket.on('SetCicloStart', function (message) {
            console.info('broadcast > SetCicloStart >' + JSON.stringify(message));
            console.info('broadcast > SetCicloStart > socket.id > ' + (clients[socket.id].id));
            // send to all connected clients
            io.sockets.emit("SetCicloStart",  message);
        });
        //+---------------+
        //|--- DISCONN ---|
        //+---------------+  
        socket.on("disconnect",function(data){            
            // console.info(data);
            console.info('disconnected socket > ' + socket.id);            
            delete clients[socket.id];
        });
    });
    server.listen(port);          