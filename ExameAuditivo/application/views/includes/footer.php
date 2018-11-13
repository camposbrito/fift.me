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

<script src="<?= base_url(); ?>assets/js/locales/bootstrap-datepicker.pt-BR.min.js"></script>

    <!-- Skycons -->
    <!--<script src="<?= base_url(); ?>assets/js/vendors/skycons/skycons.js"></script>-->
    <!-- Flot -->
    <script src="<?= base_url(); ?>assets/js/vendors/Flot/jquery.flot.js"></script>
    <script src="<?= base_url(); ?>assets/js/vendors/Flot/jquery.flot.pie.js"></script>
    <script src="<?= base_url(); ?>assets/js/vendors/Flot/jquery.flot.time.js"></script>
    <script src="<?= base_url(); ?>assets/js/vendors/Flot/jquery.flot.stack.js"></script>
    <script src="<?= base_url(); ?>assets/js/vendors/Flot/jquery.flot.resize.js"></script>
    <!-- Flot plugins -->
    <script src="<?= base_url(); ?>assets/js/vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
    <script src="<?= base_url(); ?>assets/js/vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
    <script src="<?= base_url(); ?>assets/js/vendors/flot.curvedlines/curvedLines.js"></script>
    <!-- DateJS -->
    <script src="<?= base_url(); ?>assets\js\vendors\Flot\examples\axes-time-zones\date.js"></script>
    
        <script src="<?= base_url(); ?>assets\js\vendors/Chart.js/dist/Chart.min.js"></script>
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
    $('form').submit(function () {
        $(this).find('button[type=submit]').prop('disabled', true);
        $('#salvar').prop('disabled', true);
    });
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

    $('#dataNascimento').datepicker({
        format: "dd/mm/yyyy",
        endDate: "0d", 
        language: 'pt-BR'
    });
      $('#dataConsulta').datepicker({
        format: 'dd/mm/yyyy',
    	language: 'pt-BR',    	
    	startDate:'-15d',
        endDate: "+0d", 
    	todayHighlight: true,        
        startView: 0,
        clearBtn: true, 
//        orientation: "top right",
//        daysOfWeekDisabled: "0,6",
//        daysOfWeekHighlighted: "1,2,3,4,5,6",
        autoclose: true
        
        
    });
    $('#periodoInicial').datepicker({
        format: "dd/mm/yyyy",
        language: 'pt-BR',
         endDate: "0d", 
    	todayHighlight: true
    });
    $('#periodoFinal').datepicker({
        format: "dd/mm/yyyy",
        language: 'pt-BR',
        endDate: "0d", 
    	todayHighlight: true
    });</script>

<script type="text/javascript">
    $(document).ready(function () {
        var url = $('form').attr("action");
        if (url.indexOf("ReflexoEstapediano") <= 0)
            $("input").addClass("pula");
    });</script>



<?php
if (isset($consulta)) {
    if ($consulta[0]->Fechamento == 'S' || $consulta[0]->Invalido == 'S') {
        ?>

        <script type="text/javascript">
            $("input").prop("disabled", true);
            $("button").prop("disabled", true);
            $("select").prop("disabled", true);
            $("textarea").prop("disabled", true);</script>
        <?php
    }
}
?>

<script type="text/javascript">
//    $(document).ready(function () {
//        /* ao pressionar uma tecla em um campo que seja de class="pula" */
//        $('.pula').focusin(function (e) {
//            campo = $('.pula');
//            if (campo.hasClass( "check-rodrigo" )) {
//                /* guarda o seletor do campo que foi pressionado Enter */
//
//                /* pega o indice do elemento*/
//                indice = campo.index(this);
//                /*soma mais um ao indice e verifica se não é null
//                 *se não for é porque existe outro elemento
//                 */
//                if (campo[indice + 1] != null) {
//                    /* adiciona mais 1 no valor do indice */
//                    proximo = campo[indice + 1];
//                    /* passa o foco para o proximo elemento */
//                    proximo.focus();
//                }
//                /* impede o sumbit caso esteja dentro de um form */
//                e.preventDefault(e);
//                return false;
//            }
//        })
//    });
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
        $("label").dblclick(function () {
            var ele = $(this).attr("for");
            var TipoParecer = $(this)[0].innerHTML;
            var base_url = '<?php echo site_url(); ?>';
            var controller = '/Modelo_has_TipoParecer_Controller';
            var action = 'BuscarByTipoParecer';
            var texto = $("textarea#" + ele).val();
            if ($("textarea#" + ele).attr('disabled') !== "disabled") {
                if (texto === '') {
                    $.ajax({
                        url: base_url + controller + '/' + action,
                        type: 'POST',
                        cache: false,
                        data: {"TipoParecer": TipoParecer},
                        beforeSend: function () {
                            $("#ajax").html('<div class="col-sm-2 col-md-2  col-sm-offset-5 col-sd-offset-5 " ><img src="<?= base_url('assets/img/giphy2.gif'); ?>" class="img-responsive text-center center"/></div>');
                        },
                        success: function (msg) {
                            $("textarea#" + ele).val(msg);
                        }
                    });
                }
            }
            return false;
        });
    });
    $(function () {
        $("textarea").click(function () {

            // alert(1);
        });
    });
</script>
</body>
</html>
