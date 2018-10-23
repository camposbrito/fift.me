 <div id="page-wrapper">

  <div class="container-fluid">

    <!-- Page Heading -->
    <div class="row">
      <div class="col-lg-12">
        <h1 class="page-header">
MONDRIAN <small>Home Studio</small>
</h1>
        <ol class="breadcrumb">
          <li class="active">
            <i class="fa fa-dashboard"></i> Lavanderia
            <?= $this->session->userdata('lavanderia'); ?> > <small>Registro de Operações</small>
          </li>
        </ol>
      </div>
    </div>

    <div class="row">
      <div class="col-lg-12">
        <!--table id="cd-grid" class="display" cellspacing="0" width="100%">
          <thead>
            <tr>
              <th class="col-lg-2">Data</th>
              <th class="col-lg-4">Mensagem</th>
              <th class="col-lg-2">IP</th>
              <th class="col-lg-2">Browser</th>
              <th class="col-lg-1 ">Usuário</th>
            </tr>
          </thead>

          <tfoot>
            <tr>
              <th class="col-lg-2">Data</th>
              <th class="col-lg-4">Mensagem</th>
              <th class="col-lg-2">IP</th>
              <th class="col-lg-2">Browser</th>
              <th class="col-lg-1 ">Usuário</th>
            </tr>
          </tfoot>
        </table-->
        <table id="table" class="table table-striped table-hover table-condensed" cellspacing="0" width="100%">
          <thead>
            <tr>
              <th >Cod</th>
              <th >Data</th>
              <th >Mensagem</th>
              <th >IP</th>
              <th >Browser</th>
              <th >Usuário</th>
            </tr>
          </thead>
          <tbody>
          </tbody>
          <tfoot>
            <tr>
              <th>Cod</th>
              <th>Data</th>
              <th>Mensagem</th>
              <th>IP</th>
              <th>Browser</th>
              <th>Usuário</th>
            </tr>
          </tfoot>
        </table>
      </div>
      <!--</div>-->

      <!--<div class="col-lg-1"> </div>-->

      <div class="col-lg-12">
        <div class="clearfix">
          <p>
        </div>
        <di class="table-responsive">
          <!--                    <table class="table table-bordered table-hover table-striped">
<thead>
<tr>
<th class="col-lg-2">Data</th>
<th class="col-lg-4">Mensagem</th>
<th class="col-lg-2">IP</th>
<th class="col-lg-2">Browser</th>
<th class="col-lg-1 ">Usuário</th>

</tr>
</thead>
<tbody>
<?php
// foreach ($log as $key => $value) {
//     echo '<tr>';
//     echo '<td>' . dataHoraBR($value->Data) . '</td>';
//     echo '<td>' . $value->Mensagem . '</td>';
//     echo '<td>' . $value->IP . '</td>';
//     echo '<td>' . $value->browser . '</td>';
//     echo '<td>' . $value->Usuario . '</td>';
    
    
    
    
//     echo '</tr>';
// }
//                                        _debug($lavanderiaA);
// ?>
</tbody>
</table>-->

        <!--</di v>-->

        <!--                                <div class="text-right">
<a href="#">View All Transactions <i class="fa fa-arrow-circle-right"></i></a>
</div>-->
      </div>
    </div>
  </div>

  <!--<div class="col-lg-1"> </div>-->

</div>
<?php echo '<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds.' . (ENVIRONMENT === 'development' ? 'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '') . '</p>' ?>
  </div>
  <!-- /.row -->

  </div>
  <!-- /.container-fluid -->



  </div>