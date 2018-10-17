<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>hre.loc</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/styles.min.css">
</head>	


<header >
         <div class="container"  ng-controller="secondCtrl" ng-init="getSessao()">
            <div class="row" >
                <div class="col-xs-4 col-sm-4  col-md-4 col-lg-4 col-xl-4 offset-lg-0 text-center"  ng-repeat="session in sessao">
                    <div>
						<span>Equipamento</span>
                        <div class="card"><span>{{session.Equipamento}}<br></span></div>
                    </div>
                </div>
                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 col-xl-4 text-center"  ng-repeat="session in sessao">
                    <div>
						<span>Produto</span>
                        <div class="card"><span>{{session.Produto}}<br></span></div>
                    </div>
                </div>
                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 col-xl-4 text-center"  ng-repeat="session in sessao">
                    <div>
						<span>Operacao</span>
                        <div class="card"><span>{{session.Operacao}}<br></span></div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="container-fluid d-flex flex-column body-content justify-content-center">	 	
       
        <!-- <div class="row">		 -->
        
            <!-- <div ng-controller="secondCtrl" ng-init="getPosts()">
                
                <form name="addPostForm" ng-model="addPostForm" >
                    <input type="text" ng-model="postText" />
                    <input type="submit" name="submit" ng-click="addPost()" />
                </form>
            </div>
                                                        
            <div ng-repeat="post in posts" class="col-12">
                <div>
                    <span> {{post.postText}} <br></span>
                </div>
            </div>
        </div>
        <span>Teste -> {{posts.getPosts().postText}} <br></span> -->
        <div class="row">		
            <div class="col"></div>
            <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 col-xl-4"><button class="btn btn-primary btn-block btn-lg d-block" type="button"><br>INICIAR TURNO<br><br></button></div>
            <div class="col"></div>
        </div>
    </div>
    <footer>
        <div class="container flex-row">
            <div class="row justify-content-center align-items-center align-self-center">
                <div class="col"><span></span><button class="btn btn-primary btn-lg" type="button" style="margin-top:7px;">MENU</button></div>
                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-3 col-xl-4"></div>
                <div class="col d-flex flex-column align-items-end"><span></span><button class="btn btn-primary btn-lg d-flex align-content-center" type="button" style="margin-top:7px;">AJUDA</button></div>
            </div>
        </div>
    </footer> 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/js/bootstrap.bundle.min.js"></script>   