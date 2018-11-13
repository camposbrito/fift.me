<div class="col-sm-6 col-sm-offset-0 col-md-6 col-md-offset-0 main">
    <div class="page-header"><h4>Impedanciometria</h4></div>
</div>
<form class="form-horizontal" action="<?= base_url('index.php/Impedanciometria/salvar/') ?>" method="post">
    <div class="form-group  col-sm-6 col-sm-offset-0 col-md-6 col-md-offset-0 main">
        <label class="col-md-4 control-label" for="buttonEnviar"></label>
        <div class="col-md-8 text-right">
            <input type="submit" class="btn btn-sm btn-success salvar" id="salvar" value="Salvar" />
            <input type="button" class="btn btn-sm btn-info"   class="btn btn-sm btn-info btn-group" id="atualizar_impedanciometria" value="Atualizar">
            <a  href="<?= base_url('index.php/Consulta/alterar/' . $id); ?>"   class="btn btn-sm btn-danger">Voltar</a>
        </div>
    </div>
    <input type="hidden" value="<?= $impedanciometria[0]->Cod ?>" name="codImpedanciometria" >
    <input type="hidden" value="<?= $consulta[0]->Cod ?>" name="Consulta">
    <div class="col-sm-12 col-sm-offset-0 col-md-12 col-md-offset-0 main">

        <div class="row col-sm-12 col-sm-offset-0 col-md-12 col-md-offset-0">
            <!-- Select Basic -->
            <div class="form-group">
                <label class="col-md-4 control-label" for="selectbasic">Meatoscopia O.D.</label>
                <div class="col-md-6">
                    <select id="Meatoscopia_OD" name="Meatoscopia_OD" class="form-control">
                        <option ></option>
                        <?php
                        $meas = 0;
                        foreach ($meatoscopias as $mea) {
                            ?>
                            <option <?= $impedanciometria[0]->Meatoscopia_OD == $mea->Cod ? 'selected' : ''; ?> value="<?= $mea->Cod; ?>"><?= $mea->Descricao; ?></option>
                            <?php
                        }
                        ?>
                    </select>
                </div>
            </div>

            <!-- Select Basic -->
            <div class="form-group">
                <label class="col-md-4 control-label" for="selectbasic">Meatoscopia O.E.</label>
                <div class="col-md-6">
                    <select id="Meatoscopia_OE" name="Meatoscopia_OE" class="form-control">
                        <option ></option>
                        <?php
                        $meas = 0;
                        foreach ($meatoscopias as $mea) {
                            ?>
                            <option <?= $impedanciometria[0]->Meatoscopia_OE == $mea->Cod ? 'selected' : ''; ?> value="<?= $mea->Cod; ?>"><?= $mea->Descricao; ?></option>
                            <?php
                        }
                        ?>
                    </select>
                </div>
            </div>

            <!-- Select Basic -->
            <div class="form-group">
                <label class="col-md-4 control-label" for="selectbasic">Equipamento</label>
                <div class="col-md-6">
                    <select id="Equipamento" name="Equipamento" class="form-control">
                        <option ></option>
                        <?php
                        $equipamento = 0;
                        foreach ($equipamentos as $equi) {
                            ?>
                            <option <?= $impedanciometria[0]->Equipamento == $equi->Cod ? 'selected' : ''; ?> value="<?= $equi->Cod; ?>"><?= $equi->Descricao; ?></option>
                            <?php
                        }
                        ?>
                    </select>
                </div>
            </div>
        </div>
    </div>
    <div class="row col-sm-12 col-sm-offset-0 col-md-12 col-md-offset-0">
        <fieldset>
            <table style="margin: 0 auto;" class="table-condensed ">
                <tr>
                    <td><table style="margin: 0 auto;" class="table-condensed ">
                            <tr>
                                <td></td>    
                                <td>Complacência - Orelha Direita</td>
                            </tr>
                            <tr>
                                <th class="text-right">Mín.</th>
                                <td><input type="number" step="0.01" class="form-control" id="ComplacenciaOD_Min" name="ComplacenciaOD_Min" value="<?= $impedanciometria[0]->ComplacenciaOD_Min; ?>"/></td>
                            </tr>
                            <tr>
                                <th class="text-right">Máx.</th>
                                <td><input type="number" step="0.01" class="form-control" id="ComplacenciaOD_Max" name="ComplacenciaOD_Max" value="<?= $impedanciometria[0]->ComplacenciaOD_Max; ?>"/></td>
                            </tr>
                            <tr>
                                <th class="text-right">Resultado</th>
                                <td>
                                    <input class="form-control" disabled="" name="ComplacenciaOD_Res2" id="ComplacenciaOD_Res2" value="<?= $impedanciometria[0]->ComplacenciaOD_Res; ?>"/>
                                    <input class="form-control" type="hidden" name="ComplacenciaOD_Res" id="ComplacenciaOD_Res" value="<?= $impedanciometria[0]->ComplacenciaOD_Res; ?>"/>
                                </td>

                            </tr>
                            <tr>
                                <td colspan="3"></td>
                            </tr>
                            <tr>
                                <th class="text-right">Pressão de Ouvido Médio</th>
                                <td><input type="number"  class="form-control" id="PressaoOMLD" name="PressaoOMLD" value="<?= $impedanciometria[0]->PressaoOMLD; ?>"/></td>

                            </tr>


                        </table></td>
                    <td>
                        <table style="margin: 0 auto;" class="table-condensed ">
                            <tr>
                                <td>Complacência - Orelha Esquerda</td>
                            </tr>
                            <tr>
                                <td><input type="number" step="0.01" class="form-control" id="ComplacenciaOE_Min" name="ComplacenciaOE_Min" value="<?= $impedanciometria[0]->ComplacenciaOE_Min; ?>" /></td>               
                            </tr>
                            <tr>
                                <td><input type="number" step="0.01"  class="form-control" id="ComplacenciaOE_Max" name="ComplacenciaOE_Max" value="<?= $impedanciometria[0]->ComplacenciaOE_Max; ?>"/></td>               
                            </tr>
                            <tr>
                                <td>
                                    <input class="form-control" disabled=""   name="ComplacenciaOE_Res2" id="ComplacenciaOE_Res2" value="<?= $impedanciometria[0]->ComplacenciaOE_Res; ?>"/>
                                    <input class="form-control" type="hidden" name="ComplacenciaOE_Res"  id="ComplacenciaOE_Res"  value="<?= $impedanciometria[0]->ComplacenciaOE_Res; ?>"/>
                                </td>               
                            </tr>
                            <tr>
                                <td colspan="3"></td>
                            </tr>
                            <tr>
                                <td><input type="number" class="form-control" id="PressaoOMLE" name="PressaoOMLE" value="<?= $impedanciometria[0]->PressaoOMLE; ?>"  /></td>               
                            </tr>


                        </table>
                    </td></tr>
            </table>
        </fieldset>

    </div>

</form>

<script type="text/javascript">
    truncateDecimals = function (number, digits) {
        var multiplier = Math.pow(10, digits),
                adjustedNum = number * multiplier,
                truncatedNum = Math[adjustedNum < 0 ? 'ceil' : 'floor'](adjustedNum);

        return truncatedNum / multiplier;
    };

    $("#ComplacenciaOD_Min").focusout(function () {
        var min = $("#ComplacenciaOD_Min").val().replace(',', '.');
        var max = $("#ComplacenciaOD_Max").val().replace(',', '.');
        if ($.isNumeric(max) && $.isNumeric(min)) {


            var res = truncateDecimals(max - min, 2);
            $("#ComplacenciaOD_Res").val(res);
            $("#ComplacenciaOD_Res2").val(res);
        } else {
            $("#ComplacenciaOD_Res").val("");
            $("#ComplacenciaOD_Res2").val("");
        }
    });
    $("#ComplacenciaOD_Max").focusout(function () {
        var min = $("#ComplacenciaOD_Min").val().replace(',', '.');
        var max = $("#ComplacenciaOD_Max").val().replace(',', '.');
        if ($.isNumeric(max) && $.isNumeric(min)) {
            var res = truncateDecimals(max - min, 2);
            $("#ComplacenciaOD_Res").val(res);
            $("#ComplacenciaOD_Res2").val(res);
        } else {
            $("#ComplacenciaOD_Res").val("");
            $("#ComplacenciaOD_Res2").val("");
        }
    });

    $("#ComplacenciaOE_Min").focusout(function () {
        var min = $("#ComplacenciaOE_Min").val().replace(',', '.');
        var max = $("#ComplacenciaOE_Max").val().replace(',', '.');
        if ($.isNumeric(max) && $.isNumeric(min)) {
            var res = truncateDecimals(max - min, 2);
            $("#ComplacenciaOE_Res").val(res);
            $("#ComplacenciaOE_Res2").val(res);
        } else {
            $("#ComplacenciaOE_Res").val("");
            $("#ComplacenciaOE_Res2").val("");
        }
    });
    $("#ComplacenciaOE_Max").focusout(function () {
        var min = $("#ComplacenciaOE_Min").val().replace(',', '.');
        var max = $("#ComplacenciaOE_Max").val().replace(',', '.');
        if ($.isNumeric(max) && $.isNumeric(min)) {
            var res = truncateDecimals(max - min, 2);
            $("#ComplacenciaOE_Res").val(res);
            $("#ComplacenciaOE_Res2").val(res);
        } else {
            $("#ComplacenciaOE_Res").val("");
            $("#ComplacenciaOE_Res2").val("");
        }
    });

    $("#atualizar_impedanciometria").on("click", function () {
        if (arguments[1] === undefined) {
            var resposta = confirm("Deseja atualizar esse registro?");
        } else {
            resposta = true;
        }
        if (resposta === true) {
            //DESABILITANDO CAMPOS
            $("#PressaoOMLD").prop("disabled", true);
            $("#ComplacenciaOD_Min").prop("disabled", true);
            $("#ComplacenciaOD_Max").prop("disabled", true);

            $("#PressaoOMLE").prop("disabled", true);
            $("#ComplacenciaOE_Min").prop("disabled", true);
            $("#ComplacenciaOE_Max").prop("disabled", true);

            var base_url = '<?php echo site_url(); ?>';
            var controller = '/Timpanometria';
            var action = 'timpanometriaJSON';

            //requisicao ajax enviando os parâmetros via POST
            $.ajax({
                url: base_url + controller + '/' + action,
                type: 'POST',
                cache: false,
                data: $('form').serialize(),
                dataType: 'json',
                success: function (res) {
                    //recuperando o resultado via json
                    //var dado = $.parseJSON(res);
                    //populando os valores  
                    if (res.OD[0].Qtde == 1) {
                        $("#PressaoOMLD").val(res.OD[0].Pressao);
                    } else {
                        $("#PressaoOMLD").val('');
                    }
                    $("#ComplacenciaOD_Min").val(res.OD[0].Minimo);
                    $("#ComplacenciaOD_Max").val(res.OD[0].Maximo);

                    if (res.OD[0].Resultado !== 0)
                        $('#ComplacenciaOD_Min').trigger('focusout');
                    else
                        $("#ComplacenciaOD_Res").val(res.OD[0].Resultado);
                    if (res.OE[0].Qtde == 1) {
                        $("#PressaoOMLE").val(res.OE[0].Pressao);
                    } else {
                        $("#PressaoOMLE").val('');
                    }
                    $("#ComplacenciaOE_Min").val(res.OE[0].Minimo);
                    $("#ComplacenciaOE_Max").val(res.OE[0].Maximo);
                    if (res.OE[0].Resultado !== 0)
                        $('#ComplacenciaOE_Min').trigger('focusout');
                    else
                        $("#ComplacenciaOE_Res").val(res.OE[0].Resultado);


                    //HABILITANDO CAMPOS
                    $("#PressaoOMLD").prop("disabled", false);
                    $("#ComplacenciaOD_Min").prop("disabled", false);
                    $("#ComplacenciaOD_Max").prop("disabled", false);

                    $("#PressaoOMLE").prop("disabled", false);
                    $("#ComplacenciaOE_Min").prop("disabled", false);
                    $("#ComplacenciaOE_Max").prop("disabled", false);

                }
            });


            return false;
        }
    });


<?php
if (($consulta[0]->Fechamento == 'N' ) && ($consulta[0]->Invalido == 'N' ) && ($impedanciometria[0]->Cod == 0 ) && (($timpanometria['OE'][0]->Cod > 0) || ($timpanometria['OD'][0]->Cod > 0) ))
    echo " $('#atualizar_impedanciometria').trigger('click',[ false ] );";
?>
//    $.validator.addMethod('number', function (value, element) {
//        return this.optional(element) || /^\d+(\.\d{0,3})?$/.test(value);
//    }, "Please enter a correct number, format xxxx.xxx");
//
//
//    $.validator.addMethod('Decimal', function (value, element) {
//        return this.optional(element) || /^[0-9,]+(\.\d{0,3})?$/.test(value);
//    }, "Please enter a correct number, format xxxx.xxx");

//   
//    // JQUERY ".Class" SELECTOR.
//    $(document).ready(function() {
//        $('.form-control').keypress(function (event) {
//            return isNumber(event, this)
//        });
//    });
//    // THE SCRIPT THAT CHECKS IF THE KEY PRESSED IS A NUMERIC OR DECIMAL VALUE.
//    function isNumber(evt, element) {
//
//        var charCode = (evt.which) ? evt.which : event.keyCode
//
//        if (
//            (charCode != 45 || $(element).val().indexOf(',') != -1) &&      // “-” CHECK MINUS, AND ONLY ONE.
//            (charCode != 46 || $(element).val().indexOf('.') != -1) &&      // “.” CHECK DOT, AND ONLY ONE.
//            (charCode < 48 || charCode > 57))
//            return false;
//
//        return true;
//    }    
//</script>


