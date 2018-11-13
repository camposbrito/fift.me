<div class="col-sm-12 col-sm-offset-0 col-md-12 col-md-offset-0 main">
    <h1 class="page-header">Funcionário</h1>
</div>

<div class="col-sm-12 col-sm-offset-0 col-md-12 col-md-offset-0 main">
    <form class="form-horizontal" action="<?= base_url('index.php/Funcionario/save/') ?>" method="post">
        <fieldset>

            <!-- Form Name -->
            <legend>Atualizar</legend>
            <input id="Cod" name="Cod" type="hidden"   class="form-control  input-sm " required value="<?= $funcionario[0]->Cod; ?>">


            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label text-left" for="Descricao">Nome</label>  
                <div class="col-md-4">
                    <input id="Descricao" name="Descricao" type="text" placeholder="Informe o Nome" class="form-control  input-sm " value="<?= $funcionario[0]->Descricao; ?>" required="">

                </div>
            </div>
            
                        <!-- Select Basic -->
            <div class="form-group">
                <label class="col-md-4 control-label" for="tipoexame">Empresa</label>
                <div class="col-md-4">
                    <select id="empresa" name="empresa" class="form-control" required="" >
                        <option ></option>
                        <?php
                        foreach ($Empresas as $emp) {
                            ?>
                            <option  <?= $emp->Cod == $funcionario[0]->Empresa ? 'selected' : ''; ?> value="<?= $emp->Cod; ?>"><?= $emp->Descricao; ?></option>
                            <?php
                        }
                        ?>
                    </select>
                </div>
            </div>
            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="CRFA">CRFA</label>  
                <div class="col-md-2">
                    <input id="CRFA" name="CRFA" type="text" placeholder="Informe o CRFA" class="form-control  input-sm " value="<?= $funcionario[0]->CRFA; ?>">

                </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="Login">Login</label>  
                <div class="col-md-2">
                    <input required="" id="Login" name="Login" type="text" placeholder="Informe o Login" class="form-control  input-sm " value="<?= $funcionario[0]->Login; ?>">

                </div>
            </div>


            <!-- Multiple Checkboxes -->
            <div class="form-group">
                <label class="col-md-4 control-label" for="Administrativo"></label>
                <div class="col-md-4">
                    <div class="checkbox">
                        <label for="Administrativo">
                            <input type="checkbox" name="Administrativo" id="Administrativo" value="S" <?= $funcionario[0]->Administrativo == 'S' ? 'Checked' : ''; ?> >
                            Privilégio Administrativo
                        </label>
                    </div>
                </div>
            </div>
            
                        <!-- Multiple Checkboxes -->
            <div class="form-group">
                <label class="col-md-4 control-label" for="Gestor"></label>
                <div class="col-md-4">
                    <div class="checkbox">
                        <label for="Gestor">
                            <input type="checkbox" name="Gestor" id="Gestor" value="S" <?= $funcionario[0]->Gestor == 'S' ? 'Checked' : ''; ?> >
                            Gestor
                        </label>
                    </div>
                </div>
            </div>

            <!-- Multiple Checkboxes -->
            <div class="form-group">
                <label class="col-md-4 control-label" for="Ativo"></label>
                <div class="col-md-4">
                    <div class="checkbox">
                        <label for="Ativo">
                            <input type="checkbox" name="Ativo" id="Ativo" value="S" <?= $funcionario[0]->Ativo == 'S' ? 'Checked' : ''; ?>>
                            Ativo
                        </label>
                    </div>
                </div>
            </div>




            <!-- Button (Double) -->
            <div class="form-group ">
                <label class="col-md-4 control-label" for="buttonEnviar"></label>
                <div class="col-md-8 text-right">
                    <input type="submit" class="btn btn-sm btn-success" value="Salvar"  id="salvar" />
                    <button  class="btn btn-sm btn-info " disabled=""  >Resetar senha</button>
                    <!--                        <button  type="button"  class="btn btn-sm btn-info " data-toggle="modal" data-target="#myModal">Alterar senha</button>                        -->
                    <button type="reset" id="buttonCancel" name="buttonCancel" class="btn btn-sm btn-info">Reverter</button>
                    <a class="btn btn-sm btn-danger"  href="<?= base_url('index.php/Funcionario/') ?>">Voltar</a>
                </div>
            </div>

        </fieldset>
    </form>

</div>



<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Alteração de senha</h4>
            </div>
            <form class="form-horizontal" action="<?= base_url('index.php/Funcionario/atualizar_senha/') ?>" method="post">
                <input id="Cod" name="Cod" type="hidden"   class="form-control  input-sm " required value="<?= $funcionario[0]->Cod; ?>">
                <div class="modal-body">

                    <fieldset>

                        <!-- Form Name -->


                        <!-- Password input-->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="password_atual">Senha Atual</label>
                            <div class="col-md-5">
                                <input id="password_atual" name="password_atual" type="password" placeholder="Informe a senha Atual" class="form-control  input-sm " required="">

                            </div>
                        </div>

                        <!-- Password input-->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="password_nova">Senha Nova</label>
                            <div class="col-md-5">
                                <input id="password_nova" name="password_nova" type="password" placeholder="Informe a nova Senha" onkeyup="checarSenha()" class="form-control  input-sm " required="">

                            </div>
                        </div>

                        <!-- Password input-->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="password_confirmar">Confirme a Senha</label>
                            <div class="col-md-5">
                                <input id="password_confirmar" name="password_confirmar" type="password" placeholder="Informe a confirmação da Senha" onkeyup="checarSenha()" class="form-control  input-sm " required="">

                            </div>
                        </div>

                    </fieldset>

                    <div class="form-group">
                        <div id="divcheck" class="col-md-5">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Fechar</button>
                    <button type="submit" class="btn btn-sm btn-primary" name="enviarsenha" id="enviarsenha" disabled="">Salvar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>

    function checarSenha() {
        var password = $("#password_nova").val();
        var confirmPassword = $("#password_confirmar").val();


        if (password == '' || '' == confirmPassword) {
            $("#divcheck").html("<span style='color: red'>Campo de senha vazio!</span>");
            document.getElementById("enviarsenha").disabled = true;
        } else if (password != confirmPassword) {
            $("#divcheck").html("<span style='color: red'>Senhas não conferem!</span>");
            document.getElementById("enviarsenha").disabled = true;
        } else {
            $("#divcheck").html("<span style='color: green'>Senha iguais!</span>");
            document.getElementById("enviarsenha").disabled = false;
        }
    }
</script>