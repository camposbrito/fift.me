<!-- Modal -->
<?php
//    echo $this->router->class.'/';;;;
    //    echo $this->router->method.'/';
    //    echo $this->router->directory;
?>
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content--> 
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Atual - lavanderia - <?= $this->session->userdata('lavanderia'); ?></h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" method="post" action="<?= base_url() ?>login/trocar">
                    <input type="hidden" name="controller" id="controller" value="<?= $this->router->fetch_class() . '/' . $this->router->fetch_method() ?>"
                           <p>
                        <!-- Select Basic -->
                    <div class="form-group">
                        <label class="col-md-2 control-label" for="selectbasic"></label>
                        <div class="col-md-6"> 
                            
                            <select id="lavanderia" name="lavanderia" class="form-control">
                                <option value="<?= $this->session->userdata('BlocoA');?>" <?= ($this->session->userdata('lavanderia') == $this->session->userdata('BlocoA')) ? "selected=selected" : "" ?>>Lavanderia <?=$this->session->userdata('BlocoA');?></option>
                                <option value="<?= $this->session->userdata('BlocoB');?>" <?= ($this->session->userdata('lavanderia') == $this->session->userdata('BlocoB')) ? "selected=selected" : "" ?> >Lavanderia <?=$this->session->userdata('BlocoB');?></option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <button id="bCancel" name="bCancel" class="btn btn-danger" type="button"  data-dismiss="modal">Cancelar</button>
                            <button id="singlebutton" name="singlebutton" class="btn btn-primary">Alternar</button>
                        </div>
                    </div>

                    <!-- Button -->
                    <div class="form-group">
                        <label class="col-md-8 control-label" for="singlebutton"></label>

                    </div>


                </form>

                <p></p>
            </div>
            <!--            <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                        </div>-->
        </div>

      </div> 
</div>    
<div class="modal fade" id="myModalSenha" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <!--            <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Atual - lavanderia - <?= $this->session->userdata('lavanderia'); ?></h4>
                        </div>-->
            <div class="modal-body">
                <form class="form-horizontal" method="post" action="<?= base_url() ?>login/trocarSenha">
                    <input type="hidden" name="controller" id="controller" value="<?= $this->router->fetch_class() . '/' . $this->router->fetch_method() ?>">
                    <form class="form-horizontal">
                        <fieldset>

                            <!-- Form Name -->
                            <legend>Alterar senha </legend>

                            <!-- Password input-->
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="CurrPass">Senha atual</label>
                                <div class="col-md-4">
                                    <input id="CurrPass" name="CurrPass" type="password" placeholder="" class="form-control input-md" required="">

                                </div>
                            </div>

                            <!-- Password input-->
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="NewPass">Nova senha</label>
                                <div class="col-md-4">
                                    <input id="NewPass" name="NewPass" type="password" placeholder="" class="form-control input-md" required="">

                                </div>
                            </div>

                            <!-- Password input-->
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="NewPassRepeat">Confirme a senha</label>
                                <div class="col-md-4">
                                    <input id="NewPassRepeat" name="NewPassRepeat" type="password" placeholder="" class="form-control input-md" required="">

                                </div>
                            </div>

                            <!-- Button (Double) -->
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="bCancel"></label>
                                <div class="col-md-8">
                                    <button id="bCancel" name="bCancel" class="btn btn-danger" type="button"  data-dismiss="modal">Cancelar</button>
                                    <button id="bGodkend" name="bGodkend" class="btn btn-success">Confirmar</button>
                                </div>
                            </div>

                        </fieldset>
                    </form>



                </form>

                <p></p>
            </div>
            <!--            <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                        </div>-->
        </div>

    </div>
</div> 
<!-- jQuery -->
<!--    <script type="text/javascript"
 src="http://cdnjs.cloudflare.com/ajax/libs/jquery/1.8.3/jquery.min.js">
</script> -->
<script src="<?= base_url(); ?>assets/js/vendor/jquery.min.js"></script>
<script type="text/javascript" src="<?= base_url(); ?>assets/js/bootstrap-datetimepicker.js" charset="UTF-8"></script>
<script type="text/javascript" src="<?= base_url(); ?>assets/js/locales/bootstrap-datetimepicker.pt-BR.js" charset="UTF-8"></script>
    <!--<script type="text/javascript"-->
<!--src="http://netdna.bootstrapcdn.com/twitter-bootstrap/2.2.2/js/bootstrap.min.js">-->
<!--</script>-->
<!-- <script type="text/javascript" -->
        <!--src="http://tarruda.github.com/bootstrap-datetimepicker/assets/js/bootstrap-datetimepicker.min.js">-->
<!-- </script> -->
<!-- <script type="text/javascript" -->
        <!--src="http://tarruda.github.com/bootstrap-datetimepicker/assets/js/bootstrap-datetimepicker.pt-BR.js">-->
<!-- </script> -->




<script type= 'text/javascript' src="<?php echo base_url(); ?>assets/js/jquery.dataTables.min.js"></script>
<script type= 'text/javascript' src="<?php echo base_url(); ?>assets/js/dataTables.bootstrap.min.js"></script>
<script type= 'text/javascript'>
  function forceInputUppercase(e)
  {
    var start = e.target.selectionStart;
    var end = e.target.selectionEnd;
    e.target.value = e.target.value.toUpperCase();
    e.target.setSelectionRange(start, end);
  }
    // alert('1');
  document.getElementById("rfid").addEventListener("keyup", forceInputUppercase, false);
  document.getElementById("nome").addEventListener("keyup", forceInputUppercase, false);  

</script>
<script type= 'text/javascript'>
    // $(document).ready(function () {
    //      $('#cd-grid').DataTable({
    //         "processing": true,
    //         "serverSide": true,
    //         "ajax": "<?php echo base_url(); ?>log/cd_list"

    //          });
    //     }); 
   
    var table;

    $(document).ready(function () {

        //datatables 
        table = $('#table').DataTable({
            "processing": true, //Feature control the processing indicator.
            "serverSide": true, //Feature control DataTables' server-side processing mode.
            "bJQueryUI": true,
            "sPaginationType": "full_numbers",
            "iDisplayStart ": 10,
            
            "order": [/*{
                "col":"Cod",
                "dir":"desc"
            }*/], //Initial no order.
            "aDataSort":true,
            // Load data for the table's content from an Ajax source
            "ajax": {
                "url": "<?php echo site_url('log/ajax_list') ?>",
                "type": "POST"
            },
            //Set column definition initialisation properties.
            "columnDefs": [
                {
                    "targets": [0], //first column / numbering column
                    "orderable": false, //set not orderable
                },{
                    "targets": [3], //first column / numbering column
                    "orderable": false, //set not orderable
                }
            ],
        });

    });
</script> 

<!-- Bootstrap Core JavaScript -->
<script src="<?= base_url(); ?>assets/js/bootstrap.min.js"></script> 
<!-- Just to make our placeholder images work. Don't actually copy the next line! -->
<script src="<?= base_url(); ?>assets/js/vendor/holder.min.js"></script>
<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script src="<?= base_url(); ?>assets/js/ie10-viewport-bug-workaround.js"></script>


    <!--<script src="<?= base_url(); ?>assets/js/bootstrap-datepicker.js"></script>-->
    <!--<script src="<?= base_url(); ?>assets/js/bootstrap-datepicker.min.js"></script>-->

    <!--<script src="<?= base_url(); ?>assets/js/locales/bootstrap-datepicker.pt-BR.min.js"></script>-->
<!-- Morris Charts JavaScript -->
<?php if (isset($LogMaquinas)) { ?>
    <script src="<?= base_url(); ?>assets/js/morris/raphael.min.js"></script>    
    <script src="<?= base_url(); ?>assets/js/morris/morris.min.js"></script>
    <?php
    foreach ($LogMaquinas[$this->session->userdata('lavanderia')] as $log) {
        $morris[$this->session->userdata('lavanderia')][$log->data][$log->id]['Equipamento'] = $log->maquina;
        $morris[$this->session->userdata('lavanderia')][$log->data][$log->id]['Quantidade'] = $log->tempoTotal;

        if (!isset($morrisLegenda[$log->id])) {
            $morrisLegenda[$this->session->userdata('lavanderia')][$log->id] = $log->maquina;
        }
    }
    $ykey = '';
    $labels = '';
    if (isset($morrisLegenda)) {
        foreach ($morrisLegenda[$this->session->userdata('lavanderia')] as $key => $value) {
            $ykey .= '\'' . $key . '\'' . ',';
            $labels .= '\'' . $value . '\'' . ',';
        }
    }
    ?>


    <script type="text/javascript">

            // Area Chart
            Morris.Area({
                element: 'morris-area-chart-<?= $this->session->userdata('lavanderia'); ?>',
                data: [
    <?php
    foreach ($morris[$this->session->userdata('lavanderia')] as $key => $log) {
        echo "{";
        echo "period:'" . $key . "',";
        foreach ($log as $keyLog => $value) {
            echo $keyLog . ": " . $value['Quantidade'];
            echo ',';
        }
        echo "},";
    }
    ?>
                ],
                xkey: 'period',
                ykeys: [<?= $ykey; ?>],
                labels: [<?= $labels; ?>],
                pointSize: 2,
                hideHover: 'auto',
                resize: true
            });


            Morris.Donut({
                element: 'morris-donut-chart-<?= $this->session->userdata('lavanderia'); ?>',
                formatter: function (y, data) {
                    return 'R$ ' + y.toFixed(2)
                },
                data: [
    <?php
    foreach ($utilizacaoTotalizador[$this->session->userdata('lavanderia')] as $value) {
        echo '{label: "' . $value->apto . '", value: ' . $value->preco . '},';
    }
    ?>

                ]
            });
            /*
             * Play with this code and it'll update in the panel opposite.
             *
             * Why not try some of the options above?
             */
            Morris.Line({
                element: 'line-example',
                data: [
    <?php
//    { y: '2006', a: 100, b: 90, c: 75,  d: 65 ,e: 50,  f: 40 },
    foreach ($utilizacaoAptoTotalizador as $value) {
        echo "{y:'" . $value->Data . "' ,sum:" . $value->sum . ",min:" . $value->min . ",avg:" . $value->avg . ",max:" . $value->max . "},";
    }
    ?>
                ],
                xkey: 'y',
                ykeys: ['max', 'avg', 'min'],
                //dateFormat:function (y) { return new Date(y).toString(); },
                labels: ['Máxima', 'Média', 'Mínimo'],
            });
    </script>
<?php } ?>

<script type="text/javascript">


    $('#ref').datetimepicker({
        language: 'pt-BR',
        weekStart: 1,
        todayBtn: 1,
        format: "mm/yyyy",
        autoclose: 1,
        todayHighlight: 1,
        startView: 3,
        minView: 3,
        maxView: 4,
        endDate: "<?php
$Date = date('Y-m-d');
echo date('m/Y', strtotime($Date . ' + 2 months'));
?>",
        forceParse: 0
    });
    var dateToday = new Date();
    $('.date').datetimepicker({
        language: 'pt-BR',
        format: "dd/mm/yyyy",
        autoclose: 1,
        todayHighlight: 1,
        startView: 2,
        minView: 2,
        maxView: 4,
        forceParse: 0
    });

    $('#DataI').datetimepicker({
        language: 'pt-BR',
        format: "dd/mm/yyyy",
        autoclose: 1,
        todayHighlight: 1,
        startView: 2,
        minView: 2,
        maxView: 4,
        forceParse: 0
    });

    $('#DataF').datetimepicker({
        language: 'pt-BR',
        weekStart: 1,
        todayBtn: 1,
        format: "dd/mm/yyyy",
        autoclose: 1,
        todayHighlight: 1,
        startView: 2,
        minView: 2,
        maxView: 4,
        numberOfMonths: 1,
        forceParse: 0
    });
    $('#hora_inicio').datetimepicker({
        language: 'pt-BR',
        weekStart: 1,
        todayBtn: 1,
        format: "hh:ii",
        autoclose: 1,
        todayHighlight: 1,
        startView: 1,
        minView: 0,
        maxView: 1,
        forceParse: 0
    });

    $('#hora_fim').datetimepicker({
        language: 'pt-BR',
        weekStart: 1,
        todayBtn: 1,
        format: "hh:ii",
        autoclose: 1,
        todayHighlight: 1,
        startView: 1,
        minView: 0,
        maxView: 1,
        forceParse: 0,
    });

    $('input[type=radio]').on('change', function () {
        $(this).closest("form").submit();
          
        $(this).closest("form").find(':input:not(:disabled)').prop( "disabled", true );
        $('#table-utilizacao-loading').fadeIn();
        $('#table-utilizacao').fadeOut();   
        $('#table-ajax-loading').fadeIn();
        $('#table-ajax').fadeOut();  
  
   

    });

    $("form").submit(function( event ) {
        
        // $("form").find(':button:not(:disabled)').prop( "disabled", true );
        // $("form").find(':check:not(:disabled)').prop( "disabled", true );
        $('#table-utilizacao-loading').fadeIn();
        $('#table-utilizacao').fadeOut();   
        $('#table-ajax-loading').fadeIn();
        $('#table-ajax').fadeOut();            
    });

    $('#accordion a').click(function () {
        
      if($(this).hasClass("panelisopen")){
          $(this).removeClass("panelisopen");
      } else {
          var href = this.hash;
          var depId = href.replace("#collapse",""); 

          $(this).addClass("panelisopen");
          var controller = '<?=base_url();?>Resumo?'; 	
          var dataString = 'depId='+ depId + '&dep=1&do=getDepUsers';
          $.getJSON(controller + dataString, function(data) {
              $('#depUsers'+depId).html(data);
          });
      }
  });
</script> 

</body>

</html>


