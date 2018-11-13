
<!-- Bootstrap core JavaScript
================================================== -->
<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>-->
<!--<script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>-->
<script src="<?= base_url(); ?>assets/js/bootstrap.min.js"></script>
<!-- Just to make our placeholder images work. Don't actually copy the next line! -->
<script src="<?= base_url(); ?>assets/js/vendor/holder.min.js"></script>
<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script src="<?= base_url(); ?>assets/js/ie10-viewport-bug-workaround.js"></script>

<script src="<?= base_url(); ?>assets/js/bootstrap-datepicker.js"></script>
<script>
    $('#dataNascimento').datepicker({
        format: "dd/mm/yyyy"
    });
    $('#periodoInicial').datepicker({
        format: "dd/mm/yyyy",
        language: 'pt-BR'
    });
    $('#periodoFinal').datepicker({
        format: "dd/mm/yyyy",
        language: 'pt-BR'
    });</script>

<script type="text/javascript">
    $("input").addClass("pula");</script>



<?php
if (isset($consulta)) {
    if ($consulta[0]->Fechamento == 'S' || $consulta[0]->Invalido == 'S') {
        ?>

        <script type="text/javascript">
            $("input").prop("disabled", true);
            $("select").prop("disabled", true);</script>
        <?php
    }
}
?>

<script type="text/javascript">

//     $('input:checkbox').prop('checked', true);

    $(document).ready(function () {
        /* ao pressionar uma tecla em um campo que seja de class="pula" */
        $('.pula').keypress(function (e) {
            /* 
             * verifica se o evento é Keycode (para IE e outros browsers)
             * se não for pega o evento Which (Firefox)
             */
            var tecla = (e.keyCode ? e.keyCode : e.which);
            /* verifica se a tecla pressionada foi o ENTER */
            if (tecla == 13) {
                /* guarda o seletor do campo que foi pressionado Enter */
                campo = $('.pula');
                /* pega o indice do elemento*/
                indice = campo.index(this);
                /*soma mais um ao indice e verifica se não é null
                 *se não for é porque existe outro elemento
                 */
                if (campo[indice + 1] != null) {
                    /* adiciona mais 1 no valor do indice */
                    proximo = campo[indice + 1];
                    /* passa o foco para o proximo elemento */
                    proximo.focus();
                }
                /* impede o sumbit caso esteja dentro de um form */
                e.preventDefault(e);
                return false;
            }

        });
    });
    $(function () {
        $("#pagination a").click(function () {
            var url = $(this).attr("href");
            $.ajax({
                type: "POST",
                data: $('form#pesquisa').serialize(),
                url: url,
                beforeSend: function () {
                    $("#content").html('<div class="col-sm-2 col-md-2  col-sm-offset-5 col-sd-offset-5 " ><img src="<?= base_url('assets/img/giphy2.gif'); ?>" class="img-responsive text-center center"/></div>');
                },
                success: function (msg) {
                    $("#content").html(msg);
                }
            });
            return false;
        });
    });
    $(function () {
        $("#enviar").click(function () {
            var url = $('form#pesquisa').attr("action");
            $.ajax({
                type: "POST",
                data: $('form#pesquisa').serialize(),
                url: url,
                beforeSend: function () {
                    $("#content").html('<div class="col-sm-2 col-md-2  col-sm-offset-5 col-sd-offset-5 " ><img src="<?= base_url('assets/img/giphy2.gif'); ?>" class="img-responsive text-center center"/></div>');
                },
                success: function (msg) {
                    $("#content").html(msg);
                }
            });
            return false;
        });
    });
    $(function () {
        $("#Consultas a").click(function () {
            var id = $(this).attr("data-consulta");
            if (id !== undefined) {
                vurl = "<?= base_url('index.php/Imprime/') ?>/" + id;
                $.ajax({
                    type: "POST",
                    data: id,
                    url: vurl,
                    beforeSend: function () {
                        $("#content").html('<div class="col-sm-2 col-md-2  col-sm-offset-5 col-sd-offset-5 " ><img src="<?= base_url('assets/img/giphy2.gif'); ?>" class="img-responsive text-center center"/></div>');
                    },
                    success: function (msg) {
                        $("#Imprime").html(msg);
                    }
                });
            }
        });
    });
    $(function () {
        $("#ajaxadasd a").click(function () {
            var url = $(this).attr("href");
            $.ajax({
                type: "POST",
                data: $('form').serialize(),
                url: url,
                beforeSend: function () {
                    $("#ajax").html('<div class="col-sm-2 col-md-2  col-sm-offset-5 col-sd-offset-5 " ><img src="<?= base_url('assets/img/giphy2.gif'); ?>" class="img-responsive text-center center"/></div>');
                },
                success: function (msg) {
                    $("#ajax").html(msg);
                }
            });
            return false;
        });
    });
    $(function () {
        $("#atualizar").click(function () {
            $(this).ajaxSubmit({
                type: "POST",
                //set the data type
                dataType: 'json',
                url: 'index.php/user/signin', // target element(s) to be updated with server response 
                cache: false,
                //check this in firefox browser
                success: function (response) {
                    console.log(response);
                    alert(response)
                },
                error: onFailRegistered
            });
            return false;
        });
    });</script>
<script>

    $(function () {
        $('#buton').click(function () {
            $(this).ajax({
                type: 'POST',
                dataType: 'json',
                success: function (data) {
                    var val = '<select name=\"user\">"' +
                            '<option>Select from below</option>' +
                            '<option>' + data.id + '</option>' +
                            '<option>' + data.name + '</option>' +
                            '<option>' + data.age + '</option>' +
                            '<option>' + data.sex + '</option>' +
                            '</select>';
                    $('#ans').html(val);
                },
                error: function (data) {
                    alert(data);
                }
            });
            return false;
        });
    });
    
    
    $("#cep").on("click",function(){
                  
                var base_url = '<?php echo site_url(); ?>';
                var controller = '/cliente';
                var action = 'consultaCep';
                var cep = $(this).val();

                //requisicao ajax enviando os parâmetros via POST
                $.ajax({
                   'url' : base_url + controller + '/' + action,
                   'type' : 'POST',
                   'data' : {'cep' : cep},
                    'success' : function(data){
                       //recuperando o resultado via json
                        var dado = $.parseJSON(data);
                      //populando os valores                     
                        $("#endereco").val(dado.rua);
                        $("#bairro").val(dado.bairro);
                        $("#cidade").val(dado.cidade);
                        $("#estado").val(dado.estado);
                        $("#numero").focus();
                    }
                });
            return false;
           }); 
</script>


<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Alteração de senha</h4>
            </div>
            <form class="form-horizontal" action="<?= base_url('index.php/Funcionario/atualizar_senha_dashboard/') ?>" method="post">
                <input id="Cod" name="Cod" type="hidden"   class="form-control  input-sm " required value="<?= $this->session->userdata['Cod']; ?>">
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
</body>
</html>
