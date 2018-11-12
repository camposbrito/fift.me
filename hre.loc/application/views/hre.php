<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>hre.loc</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/styles.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/hre.css">     
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/Funky.css">   
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!-- <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script> -->
    <!-- <script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://code.angularjs.org/1.3.0-rc.1/angular.min.js"></script>
    <script src="https://code.angularjs.org/1.5.0-rc.1/angular-route.min.js"></script>
    <script src="<?php echo base_url("assets/js/app.js"); ?>"></script>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/js/bootstrap.bundle.min.js"></script>   
    <script src='//cdnjs.cloudflare.com/ajax/libs/socket.io/1.7.4/socket.io.min.js'></script>
   
</head>	
<body ng-app="myApp">
    <div id="messages" class=" alert alert-secondary" role="alert" style="display:none;"> </div>
    <ng-view></ng-view>            
</body>       

</html>