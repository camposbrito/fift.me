<div class="col-sm-12 col-sm-offset-0 col-md-12 col-md-offset-0 main">

    <div id="pagination" class="center-block col-sm-12 col-sm-offset-0 col-md-12 col-md-offset-0 ">
        <ul class="tsc_pagination">

            <!-- Show pagination links -->
            <?php
            if (count($links) > 0)
                foreach ($links as $link) {
                    echo "<li>" . $link . "</li>";
                }
            ?> 
        </ul>
    </div> 

    <div class=" col-sm-12 col-sm-offset-0 col-md-12 col-md-offset-0 ">
        <table class="table   col-md-12 ">
            <tr>            
                <th class ="col-sm-1">Cód.</th>
                <th class ="col-sm-4">Nome</th>
                <th class ="col-sm-1">Data Nasc.</th>                    
                <th class ="col-sm-1">Últ. Consulta</th> 
                <th class ="col-sm-2">Últ. Profissional</th>
                <th  class ="col-sm-3"><a href="<?= base_url('index.php/Paciente/cadastro/') ?>" class="btn btn-sm btn-primary pull-right">Cadastrar</a> </th>            
            </tr>
            <?php
            $datestring = '%d/%m/%Y %h:%i';
            foreach ($pacientes as $paci) {
                ?>
                <tr>
                    <td><?= $paci->Cod; ?></td>
                    <td><?= $paci->Descricao; ?></td>
                    <td><?= dataBR($paci->DataNascimento); ?></td>           
                        <td><?= dataBR($paci->UltimaConsulta); ?></td>      
                        <td><?= $paci->Terceiro ?> <?= $paci->Terceiro1 == '' ? '' : ' / ' ?> <?= $paci->Terceiro1 ?> </td>
                    <td class="col-md-12 col-sm-12 right text-right">
                        <a href="<?= base_url('index.php/Consulta/' . $paci->Cod) ?>" class="btn btn-sm btn-info btn btn-sm btn-info btn-group"  >Consultas</a>                        
                        <a href="<?= base_url('index.php/Paciente/alterar/' . $paci->Cod) ?>" class="btn btn-sm btn-primary btn-group" >Alterar</a> 
                        <a href="<?= base_url('index.php/Paciente/excluir/' . $paci->Cod) ?>" class="btn btn-sm btn-danger btn-group" onclick="return confirm('Deseja remover esse paciente?')">Excluir</a> 
                    </td>
                </tr>
            <?php } ?>
        </table>

    </div>


    <div id="pagination"class=" col-sm-12 col-sm-offset-0 col-md-12 col-md-offset-0 ">
        <ul class="tsc_pagination">

            <!-- Show pagination links -->
            <?php
            if (count($links) > 0)
                foreach ($links as $link) {
                    echo "<li>" . $link . "</li>";
                }
            ?>
        </ul>
    </div>

</div>
<script>
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

</script>