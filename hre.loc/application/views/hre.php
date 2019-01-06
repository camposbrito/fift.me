<!DOCTYPE html>
<html lang="pt">
<head>
<link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url("assets/icon/favicon.ico"); ?>"/>
</head>	
<body ng-app="myApp">
    <div id="messages" class=" alert alert-secondary" role="alert" style="display:none;"> <span class="badge badge-light circle-badge text-right" onclick='LimparMessages()'>X</span> </div>
    <ng-view></ng-view>            
</body>       

</html>