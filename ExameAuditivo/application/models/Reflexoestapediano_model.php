<?php

class Reflexoestapediano_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    public function salvar() {
        $dados['Consulta_Cod'] = valueOfInteger($this->input->post('Consulta'));
        $dados['ReflexoEstapedianoFaixa'] = valueOfInteger($this->input->post('Faixa500'));
        $dados['LimiarTonal_OD'] = valueOfInteger($this->input->post('LimiarTonal_OD500'));
        $dados['NivelReflexo_OD'] = valueOfInteger($this->input->post('NivelReflexo_OD500'));
        $dados['Dif_OD'] = valueOfInteger($this->input->post('Dif_OD500'));
        $dados['TD_OD'] = valueOfInteger($this->input->post('TD_OD500'));
        $dados['Ipsi_Lateral_OD'] = valueOfInteger($this->input->post('Ipsi_Lateral_OD500'));
        $dados['LimiarTonal_OE'] = valueOfInteger($this->input->post('LimiarTonal_OE500'));
        $dados['NivelReflexo_OE'] = valueOfInteger($this->input->post('NivelReflexo_OE500'));
        $dados['Dif_OE'] = valueOfInteger($this->input->post('Dif_OE500'));
        $dados['TD_OE'] = valueOfInteger($this->input->post('TD_OE500'));
        $dados['Ipsi_Lateral_OE'] = valueOfInteger($this->input->post('Ipsi_Lateral_OE500'));
        $dados['LimiarTonal_OD_ausente'] = valueOfCheck($this->input->post('LimiarTonal_OD_ausente500'));
        $dados['NivelReflexo_OD_ausente'] = valueOfCheck($this->input->post('NivelReflexo_OD_ausente500'));
        $dados['Dif_OD_ausente'] = valueOfCheck($this->input->post('Dif_OD_ausente500'));
        $dados['TD_OD_ausente'] = valueOfCheck($this->input->post('TD_OD_ausente500'));
        $dados['Ipsi_Lateral_OD_ausente'] = valueOfCheck($this->input->post('Ipsi_Lateral_OD_ausente500'));
        $dados['LimiarTonal_OE_ausente'] = valueOfCheck($this->input->post('LimiarTonal_OE_ausente500'));
        $dados['NivelReflexo_OE_ausente'] = valueOfCheck($this->input->post('NivelReflexo_OE_ausente500'));
        $dados['Dif_OE_ausente'] = valueOfCheck($this->input->post('Dif_OE_ausente500'));
        $dados['TD_OE_ausente'] = valueOfCheck($this->input->post('TD_OE_ausente500'));
        $dados['Ipsi_Lateral_OE_ausente'] = valueOfCheck($this->input->post('Ipsi_Lateral_OE_ausente500'));
        $dados['LimiarTonal_OD_NaoFeito'] = valueOfCheck($this->input->post('LimiarTonal_OD_NaoFeito500'));
        $dados['NivelReflexo_OD_NaoFeito'] = valueOfCheck($this->input->post('NivelReflexo_OD_NaoFeito500'));
        $dados['Dif_OD_NaoFeito'] = valueOfCheck($this->input->post('Dif_OD_NaoFeito500'));
        $dados['TD_OD_NaoFeito'] = valueOfCheck($this->input->post('TD_OD_NaoFeito500'));
        $dados['Ipsi_Lateral_OD_NaoFeito'] = valueOfCheck($this->input->post('Ipsi_Lateral_OD_NaoFeito500'));
        $dados['LimiarTonal_OE_NaoFeito'] = valueOfCheck($this->input->post('LimiarTonal_OE_NaoFeito500'));
        $dados['NivelReflexo_OE_NaoFeito'] = valueOfCheck($this->input->post('NivelReflexo_OE_NaoFeito500'));
        $dados['Dif_OE_NaoFeito'] = valueOfCheck($this->input->post('Dif_OE_NaoFeito500'));
        $dados['TD_OE_NaoFeito'] = valueOfCheck($this->input->post('TD_OE_NaoFeito500'));
        $dados['Ipsi_Lateral_OE_NaoFeito'] = valueOfCheck($this->input->post('Ipsi_Lateral_OE_NaoFeito500'));
        if ($this->input->post('codReflexoestapediano500') <= 0) {
            $this->db->insert('reflexoestapediano', $dados);
        } else {
            $this->db->where('cod', $this->input->post('codReflexoestapediano500'));
            $this->db->update('reflexoestapediano', $dados);
        }

        $dados['Consulta_Cod'] = valueOfInteger($this->input->post('Consulta'));
        $dados['ReflexoEstapedianoFaixa'] = valueOfInteger($this->input->post('Faixa1000'));
        $dados['LimiarTonal_OD'] = valueOfInteger($this->input->post('LimiarTonal_OD1000'));
        $dados['NivelReflexo_OD'] = valueOfInteger($this->input->post('NivelReflexo_OD1000'));
        $dados['Dif_OD'] = valueOfInteger($this->input->post('Dif_OD1000'));
        $dados['TD_OD'] = valueOfInteger($this->input->post('TD_OD1000'));
        $dados['Ipsi_Lateral_OD'] = valueOfInteger($this->input->post('Ipsi_Lateral_OD1000'));
        $dados['LimiarTonal_OE'] = valueOfInteger($this->input->post('LimiarTonal_OE1000'));
        $dados['NivelReflexo_OE'] = valueOfInteger($this->input->post('NivelReflexo_OE1000'));
        $dados['Dif_OE'] = valueOfInteger($this->input->post('Dif_OE1000'));
        $dados['TD_OE'] = valueOfInteger($this->input->post('TD_OE1000'));
        $dados['Ipsi_Lateral_OE'] = valueOfInteger($this->input->post('Ipsi_Lateral_OE1000'));
        $dados['LimiarTonal_OD_ausente'] = valueOfCheck($this->input->post('LimiarTonal_OD_ausente1000'));
        $dados['NivelReflexo_OD_ausente'] = valueOfCheck($this->input->post('NivelReflexo_OD_ausente1000'));
        $dados['Dif_OD_ausente'] = valueOfCheck($this->input->post('Dif_OD_ausente1000'));
        $dados['TD_OD_ausente'] = valueOfCheck($this->input->post('TD_OD_ausente1000'));
        $dados['Ipsi_Lateral_OD_ausente'] = valueOfCheck($this->input->post('Ipsi_Lateral_OD_ausente1000'));
        $dados['LimiarTonal_OE_ausente'] = valueOfCheck($this->input->post('LimiarTonal_OE_ausente1000'));
        $dados['NivelReflexo_OE_ausente'] = valueOfCheck($this->input->post('NivelReflexo_OE_ausente1000'));
        $dados['Dif_OE_ausente'] = valueOfCheck($this->input->post('Dif_OE_ausente1000'));
        $dados['TD_OE_ausente'] = valueOfCheck($this->input->post('TD_OE_ausente1000'));
        $dados['Ipsi_Lateral_OE_ausente'] = valueOfCheck($this->input->post('Ipsi_Lateral_OE_ausente1000'));
        $dados['LimiarTonal_OD_NaoFeito'] = valueOfCheck($this->input->post('LimiarTonal_OD_NaoFeito1000'));
        $dados['NivelReflexo_OD_NaoFeito'] = valueOfCheck($this->input->post('NivelReflexo_OD_NaoFeito1000'));
        $dados['Dif_OD_NaoFeito'] = valueOfCheck($this->input->post('Dif_OD_NaoFeito1000'));
        $dados['TD_OD_NaoFeito'] = valueOfCheck($this->input->post('TD_OD_NaoFeito1000'));
        $dados['Ipsi_Lateral_OD_NaoFeito'] = valueOfCheck($this->input->post('Ipsi_Lateral_OD_NaoFeito1000'));
        $dados['LimiarTonal_OE_NaoFeito'] = valueOfCheck($this->input->post('LimiarTonal_OE_NaoFeito1000'));
        $dados['NivelReflexo_OE_NaoFeito'] = valueOfCheck($this->input->post('NivelReflexo_OE_NaoFeito1000'));
        $dados['Dif_OE_NaoFeito'] = valueOfCheck($this->input->post('Dif_OE_NaoFeito1000'));
        $dados['TD_OE_NaoFeito'] = valueOfCheck($this->input->post('TD_OE_NaoFeito1000'));
        $dados['Ipsi_Lateral_OE_NaoFeito'] = valueOfCheck($this->input->post('Ipsi_Lateral_OE_NaoFeito1000'));
        if ($this->input->post('codReflexoestapediano1000') <= 0) {
            $this->db->insert('reflexoestapediano', $dados);
        } else {
            $this->db->where('cod', $this->input->post('codReflexoestapediano1000'));
            $this->db->update('reflexoestapediano', $dados);
        }

        $dados['Consulta_Cod'] = valueOfInteger($this->input->post('Consulta'));
        $dados['ReflexoEstapedianoFaixa'] = valueOfInteger($this->input->post('Faixa2000'));
        $dados['LimiarTonal_OD'] = valueOfInteger($this->input->post('LimiarTonal_OD2000'));
        $dados['NivelReflexo_OD'] = valueOfInteger($this->input->post('NivelReflexo_OD2000'));
        $dados['Dif_OD'] = valueOfInteger($this->input->post('Dif_OD2000'));
        $dados['TD_OD'] = valueOfInteger($this->input->post('TD_OD2000'));
        $dados['Ipsi_Lateral_OD'] = valueOfInteger($this->input->post('Ipsi_Lateral_OD2000'));
        $dados['LimiarTonal_OE'] = valueOfInteger($this->input->post('LimiarTonal_OE2000'));
        $dados['NivelReflexo_OE'] = valueOfInteger($this->input->post('NivelReflexo_OE2000'));
        $dados['Dif_OE'] = valueOfInteger($this->input->post('Dif_OE2000'));
        $dados['TD_OE'] = valueOfInteger($this->input->post('TD_OE2000'));
        $dados['Ipsi_Lateral_OE'] = valueOfInteger($this->input->post('Ipsi_Lateral_OE2000'));
        $dados['LimiarTonal_OD_ausente'] = valueOfCheck($this->input->post('LimiarTonal_OD_ausente2000'));
        $dados['NivelReflexo_OD_ausente'] = valueOfCheck($this->input->post('NivelReflexo_OD_ausente2000'));
        $dados['Dif_OD_ausente'] = valueOfCheck($this->input->post('Dif_OD_ausente2000'));
        $dados['TD_OD_ausente'] = valueOfCheck($this->input->post('TD_OD_ausente2000'));
        $dados['Ipsi_Lateral_OD_ausente'] = valueOfCheck($this->input->post('Ipsi_Lateral_OD_ausente2000'));
        $dados['LimiarTonal_OE_ausente'] = valueOfCheck($this->input->post('LimiarTonal_OE_ausente2000'));
        $dados['NivelReflexo_OE_ausente'] = valueOfCheck($this->input->post('NivelReflexo_OE_ausente2000'));
        $dados['Dif_OE_ausente'] = valueOfCheck($this->input->post('Dif_OE_ausente2000'));
        $dados['TD_OE_ausente'] = valueOfCheck($this->input->post('TD_OE_ausente2000'));
        $dados['Ipsi_Lateral_OE_ausente'] = valueOfCheck($this->input->post('Ipsi_Lateral_OE_ausente2000'));
        $dados['LimiarTonal_OD_NaoFeito'] = valueOfCheck($this->input->post('LimiarTonal_OD_NaoFeito2000'));
        $dados['NivelReflexo_OD_NaoFeito'] = valueOfCheck($this->input->post('NivelReflexo_OD_NaoFeito2000'));
        $dados['Dif_OD_NaoFeito'] = valueOfCheck($this->input->post('Dif_OD_NaoFeito2000'));
        $dados['TD_OD_NaoFeito'] = valueOfCheck($this->input->post('TD_OD_NaoFeito2000'));
        $dados['Ipsi_Lateral_OD_NaoFeito'] = valueOfCheck($this->input->post('Ipsi_Lateral_OD_NaoFeito2000'));
        $dados['LimiarTonal_OE_NaoFeito'] = valueOfCheck($this->input->post('LimiarTonal_OE_NaoFeito2000'));
        $dados['NivelReflexo_OE_NaoFeito'] = valueOfCheck($this->input->post('NivelReflexo_OE_NaoFeito2000'));
        $dados['Dif_OE_NaoFeito'] = valueOfCheck($this->input->post('Dif_OE_NaoFeito2000'));
        $dados['TD_OE_NaoFeito'] = valueOfCheck($this->input->post('TD_OE_NaoFeito2000'));
        $dados['Ipsi_Lateral_OE_NaoFeito'] = valueOfCheck($this->input->post('Ipsi_Lateral_OE_NaoFeito2000'));
        if ($this->input->post('codReflexoestapediano2000') <= 0) {
            $this->db->insert('reflexoestapediano', $dados);
        } else {
            $this->db->where('cod', $this->input->post('codReflexoestapediano2000'));
            $this->db->update('reflexoestapediano', $dados);
        }
        $dados['Consulta_Cod'] = valueOfInteger($this->input->post('Consulta'));
        $dados['ReflexoEstapedianoFaixa'] = valueOfInteger($this->input->post('Faixa4000'));
        $dados['LimiarTonal_OD'] = valueOfInteger($this->input->post('LimiarTonal_OD4000'));
        $dados['NivelReflexo_OD'] = valueOfInteger($this->input->post('NivelReflexo_OD4000'));
        $dados['Dif_OD'] = valueOfInteger($this->input->post('Dif_OD4000'));
        $dados['TD_OD'] = valueOfInteger($this->input->post('TD_OD4000'));
        $dados['Ipsi_Lateral_OD'] = valueOfInteger($this->input->post('Ipsi_Lateral_OD4000'));
        $dados['LimiarTonal_OE'] = valueOfInteger($this->input->post('LimiarTonal_OE4000'));
        $dados['NivelReflexo_OE'] = valueOfInteger($this->input->post('NivelReflexo_OE4000'));
        $dados['Dif_OE'] = valueOfInteger($this->input->post('Dif_OE4000'));
        $dados['TD_OE'] = valueOfInteger($this->input->post('TD_OE4000'));
        $dados['Ipsi_Lateral_OE'] = valueOfInteger($this->input->post('Ipsi_Lateral_OE4000'));
        $dados['LimiarTonal_OD_ausente'] = valueOfCheck($this->input->post('LimiarTonal_OD_ausente4000'));
        $dados['NivelReflexo_OD_ausente'] = valueOfCheck($this->input->post('NivelReflexo_OD_ausente4000'));
        $dados['Dif_OD_ausente'] = valueOfCheck($this->input->post('Dif_OD_ausente4000'));
        $dados['TD_OD_ausente'] = valueOfCheck($this->input->post('TD_OD_ausente4000'));
        $dados['Ipsi_Lateral_OD_ausente'] = valueOfCheck($this->input->post('Ipsi_Lateral_OD_ausente4000'));
        $dados['LimiarTonal_OE_ausente'] = valueOfCheck($this->input->post('LimiarTonal_OE_ausente4000'));
        $dados['NivelReflexo_OE_ausente'] = valueOfCheck($this->input->post('NivelReflexo_OE_ausente4000'));
        $dados['Dif_OE_ausente'] = valueOfCheck($this->input->post('Dif_OE_ausente4000'));
        $dados['TD_OE_ausente'] = valueOfCheck($this->input->post('TD_OE_ausente4000'));
        $dados['Ipsi_Lateral_OE_ausente'] = valueOfCheck($this->input->post('Ipsi_Lateral_OE_ausente4000'));
        $dados['LimiarTonal_OD_NaoFeito'] = valueOfCheck($this->input->post('LimiarTonal_OD_NaoFeito4000'));
        $dados['NivelReflexo_OD_NaoFeito'] = valueOfCheck($this->input->post('NivelReflexo_OD_NaoFeito4000'));
        $dados['Dif_OD_NaoFeito'] = valueOfCheck($this->input->post('Dif_OD_NaoFeito4000'));
        $dados['TD_OD_NaoFeito'] = valueOfCheck($this->input->post('TD_OD_NaoFeito4000'));
        $dados['Ipsi_Lateral_OD_NaoFeito'] = valueOfCheck($this->input->post('Ipsi_Lateral_OD_NaoFeito4000'));
        $dados['LimiarTonal_OE_NaoFeito'] = valueOfCheck($this->input->post('LimiarTonal_OE_NaoFeito4000'));
        $dados['NivelReflexo_OE_NaoFeito'] = valueOfCheck($this->input->post('NivelReflexo_OE_NaoFeito4000'));
        $dados['Dif_OE_NaoFeito'] = valueOfCheck($this->input->post('Dif_OE_NaoFeito4000'));
        $dados['TD_OE_NaoFeito'] = valueOfCheck($this->input->post('TD_OE_NaoFeito4000'));
        $dados['Ipsi_Lateral_OE_NaoFeito'] = valueOfCheck($this->input->post('Ipsi_Lateral_OE_NaoFeito4000'));
        if ($this->input->post('codReflexoestapediano4000') <= 0) {
            $this->db->insert('reflexoestapediano', $dados);
        } else {
            $this->db->where('cod', $this->input->post('codReflexoestapediano4000'));
            $this->db->update('reflexoestapediano', $dados);
        }
//        var_dump($this->input->post());
//        $this->output->enable_profiler(false);
    }

    public function getReflexoEstapediano($Consulta) {
        return $this
                        ->db->select('rf.cod AS CodFaixa, r.*')->join('reflexoestapediano r', 'r.ReflexoEstapedianoFaixa = rf.Cod and consulta_cod =' . $Consulta, 'left')
                        ->order_by('faixa')
                        ->get('reflexoestapedianofaixa rf')
                        ->result();
    }

}
