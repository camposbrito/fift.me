<?php
$base_url = 'http://relatorios-exameauditivo-com-br.umbler.net/';
?>


<ul class="menu">
    <li><a target="_blank" href="<?= ($base_url . 'Audiometria.php?Consulta=' . ($id)); ?>" > Audiometria </a></li> 
    <?= ($this->session->userdata['adm'] == true) ? ' | ' : ''; ?>
    <?
    if ($this->session->userdata['adm'] == true) {
        ?>    
        <a target="_blank" href="<?= $base_url . ('index.php/report/audiometria/' . $consulta[0]->Cod . '/view/') ?>" > NOVO  </a>
    <? } ?>
    <?= ($this->session->userdata['adm'] == true) ? ' | ' : ''; ?>
    <?
    if ($this->session->userdata['adm'] == true) {
        ?>    
        <a target="_blank" href="<?= $base_url . ('index.php/report/audiometria/' . $consulta[0]->Cod . '/pdf/') ?>" > PDF  </a>
    <? } ?>
    <li><a target="_blank" href="<?= ($base_url . 'Impedanciometria.php?Consulta=' . ($id)); ?>">Impedanciometria</a></li> 
    <li><a target="_blank" href="<?= ($base_url . 'AudiometriaCampoLivre.php?Consulta=' . ($id)); ?>"> Audiometria Campo Livre </a></li>
    <li><a target="_blank" href="<?= ($base_url . 'AvaliacaoAudiometricaOcupacional.php?Consulta=' . ($id)); ?>">Avaliação Audiométrica Ocupacional </a></li>
    <li><a target="_blank" href="<?= ($base_url . '/AvaliacaoAudiometricaOcupacional2.php?Consulta=' . ($id)); ?>">Avaliação Audiométrica Ocupacional [NEW] </a></li>
    <li><a target="_blank" href="<?= ($base_url . 'AudiometriaInfantil.php?Consulta=' . ($id)); ?>">Audiometria Infantil </a></li> 
    <? if (($this->session->userdata['Empresa_Usuario'][0]->Descricao == 'CPAA') || ($this->session->userdata['adm'] == true)) { ?>
        <li><a target="_blank" href="<?= ($base_url . 'AvaliacaoAudiologicaInfantilv2.php?Consulta=' . ($id)); ?>">Avaliação Audiológica Infantil</a></li> 
        <li><a target="_blank" href="<?= ($base_url . 'AvaliacaoAudiologicaInfantilv3.php?Consulta=' . ($id)); ?>">Avaliação Audiológica Infantil [NEW]</a></li> 
        <li><a target="_blank" href="<?= ($base_url . 'AvaliacaoAudiologicaInfantilv4.php?Consulta=' . ($id)); ?>">Avaliação Audiológica Infantil [NEW 2]</a></li> 
    <? } ?>
</ul>