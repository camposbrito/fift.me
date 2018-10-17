
function esconder() {
    $('#messages').hide();
}
function resetMensagem() {
    $('#messages').show();
 
    $('#messages').empty(); 
}
function getDataTime(){
    var d = new Date();
    return d;
}
var socket = io.connect('//127.0.0.1:1337');


socket.on('connect', function () {
    
    resetMensagem();
    $('#messages').append('<font color="green"><b>'+ getDataTime()  +'  - Connected</b></font><br>');
    setTimeout(esconder, 4000);

    socket.on('broadcast', function (data) {      
        resetMensagem(); 
        $('#messages').append('<font color="orange"><b>'+ getDataTime()  +' - '+(data.message)+'</b></font><br>');  
        setTimeout(esconder, 4000);
    });

    socket.on('reseting', function (data) {
        resetMensagem(); 
        $('#messages').append('<font color="brown"><b>'+ getDataTime()  +' - '+(data.message)+'</b></font><br>');            
        setTimeout(esconder, 4000);
    });
    socket.on('SetCartao', function(data) {  
        console.debug(data);              
        window.location.href = './#/dashboard';
    });
    socket.on('SetOcorrencia', function(data) {  
        console.debug(data);   
        angular.element('#DashboardController').scope().setQuantidade(data);           
        angular.element('#DashboardController').scope().$apply();
        // window.location.href = './#/dashboard';
    });
    

    $('#IniciarTurno').click(function() {
        resetMensagem(); 
        console.debug('#IniciarTurno');
        $('#div-AproxCartao').show();
        $('#div-AproxCartao').addClass("d-flex");
        $('#div-IniciarTurno').hide();
        $('#div-IniciarTurno').removeClass("d-flex");
        var sMessage = 'Iniciar Turno.';
        socket.emit('GetCartao',  {'message' : sMessage});     
        setTimeout(esconder, 4000);
    });
    
    $('#finalizaturno').click(function() {
        console.debug('#finalizaturno');
        window.location.href = './#/finaliza';
    });
    $('#ConcluirTurno').click(function() {
        console.debug('#resultado');
        window.location.href = './#/resultado';
    });
    socket.on('disconnect', function () {
        resetMensagem(); 
        $('#messages').append('<font color="red"><b>'+ getDataTime()  +'  - disconnected</b></font><br>');
        // setTimeout(esconder, 4000);
    });
});
