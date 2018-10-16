<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>hre.loc</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/styles.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/hre.css">     
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!-- <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script> -->
    <script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://code.angularjs.org/1.3.0-rc.1/angular.min.js"></script>
    <script src="https://code.angularjs.org/1.5.0-rc.1/angular-route.min.js"></script>
    <script src="<?php echo base_url("assets/js/app.js"); ?>"></script>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/js/bootstrap.bundle.min.js"></script>   
    <script src='//cdnjs.cloudflare.com/ajax/libs/socket.io/1.7.4/socket.io.min.js'></script>
   
</head>	
<body ng-app="myApp">
<div id="messages" class=" alert alert-secondary" role="alert" style="display:none;"> </div>
    <!-- Hello World! -->
    <ng-view></ng-view>
    
</body>       
<script>
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
                angular.element('#dashboardController').scope().setQuantidade(data);           
                angular.element('#dashboardController').scope().$apply();
                // window.location.href = './#/dashboard';
            });
            

            $('#IniciarTurno').click(function() {
                resetMensagem(); 
                $('#div-AproxCartao').show();
                $('#div-AproxCartao').addClass("d-flex");
                $('#div-IniciarTurno').hide();
                $('#div-IniciarTurno').removeClass("d-flex");
                var sMessage = 'Iniciar Turno.';
                socket.emit('GetCartao',  {'message' : sMessage});     
                setTimeout(esconder, 4000);
            });
            
            $('#replayButton').click(function() {
                resetMensagem(); 
                var sMessage = $('#message').val();
                socket.emit('reset',  {'message' : sMessage});     
                setTimeout(esconder, 4000);
            });
            socket.on('disconnect', function () {
                resetMensagem(); 
                $('#messages').append('<font color="red"><b>'+ getDataTime()  +'  - disconnected</b></font><br>');
                // setTimeout(esconder, 4000);
            });
        });
    </script>
</html>