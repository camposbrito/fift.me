<div class="col-xs-4 col-xs-offset-5 col-lg-4 col-lg-offset-5 col-md-4 col-md-offset-5 col-sm-4 col-sm-offset-5 text-center">
    <img src="<?= base_url('assets/img/mondrian.png'); ?>" class="img-responsive"/>
</div>
  
<div class="col-md-6 col-md-offset-3 text-center">
    <?php
    if (isset($erro) and ( $erro != '')) {
        echo '<div class="warning_inline alert alert-danger col-md-6 col-md-offset-3 text-center">' . $erro . '</div>';
    }
    ?> 
    <form class="form-signin" method="post" action="<?= base_url(); ?>login/logar">        
        <!--<h4 class="form-signin-heading">Por favor, digite suas informações.</h4>-->

        <input type="text" id="login" name="login" class="form-control" placeholder="Nome de usuário" required autofocus>

        <input type="password" id="senha" name="senha" class="form-control" placeholder="Senha" required>

        <button class="btn btn-sm btn btn-primary btn-block" type="submit">Entrar</button>
    </form>
</div>


