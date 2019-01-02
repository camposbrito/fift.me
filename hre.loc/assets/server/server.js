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
        console.info('CONN > ' + socket.id);
        //+---------------+
        //|---- CONECTADOS ----|
        //+---------------+ 
        // var clients_in_the_room = io.sockets.clients('room');  
        for (var clientId in clients ) {
            console.log('client: %s', clientId); //Seeing is believing 
            // var client_socket = io.sockets.connected[clientId];//Do whatever you want with this
            // console.log('client Socket: %s', client_socket.id); //Seeing is believing 
        } 
        //+---------------+
        //|---- TESTE ----|
        //+---------------+ 

        // console.info('PING > ' + socket.id);
        // socket.emit("test", "PING");
        // socket.on('test', function (e) {
        //     console.info(e +' > '+ socket.id);
        // });
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
            console.info('DISCONN > ' + socket.id);            
            delete clients[socket.id];
        });
    });
    server.listen(port);          