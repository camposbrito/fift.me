<?php

class Audiometrico_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    public function salvar() {

        $consulta_has_exameaudiometrico = $this->db->get_where('consulta_has_exameaudiometrico', array('consulta' => $this->input->post('Consulta')))->result();
        $dados['consulta'] = $this->input->post('Consulta');
        $dados['Equipamento'] = $this->input->post('equipamento');
        //consulta_has_exameaudiometrico
        if ($this->db->affected_rows() == 0) {
            $this->db->insert('consulta_has_exameaudiometrico', $dados);
            $codConsulta_meatoscopia = $this->db->insert_id();
        } else {
            $codConsulta_meatoscopia = $consulta_has_exameaudiometrico[0]->Cod;
            $this->db->where('cod', $codConsulta_meatoscopia);
            $this->db->update('consulta_has_exameaudiometrico', $dados);
        }
        unset($dados);
        //ExameAudiometrico
        foreach ($this->db->get('exameaudiometricofaixa')->result() as $faixa) {

            $dados['ExameAudiometricoFaixa'] = $faixa->Cod;
//            var_dump($faixa);
//            var_dump('Valor_025[' . $faixa->Cod . ']');
            $dados['Valor_025'] = trim(($this->input->post('Valor_025[' . $faixa->Cod . ']') != '')) ? $this->input->post('Valor_025[' . $faixa->Cod . ']') : null;
            $dados['Valor_050'] = trim(($this->input->post('Valor_050[' . $faixa->Cod . ']') != '')) ? $this->input->post('Valor_050[' . $faixa->Cod . ']') : null;
            $dados['Valor_1'] = trim(($this->input->post('Valor_1[' . $faixa->Cod . ']') != '')) ? $this->input->post('Valor_1[' . $faixa->Cod . ']') : null;
            $dados['Valor_2'] = trim(($this->input->post('Valor_2[' . $faixa->Cod . ']') != '')) ? $this->input->post('Valor_2[' . $faixa->Cod . ']') : null;
            $dados['Valor_3'] = trim(($this->input->post('Valor_3[' . $faixa->Cod . ']') != '')) ? $this->input->post('Valor_3[' . $faixa->Cod . ']') : null;
            $dados['Valor_4'] = trim(($this->input->post('Valor_4[' . $faixa->Cod . ']') != '')) ? $this->input->post('Valor_4[' . $faixa->Cod . ']') : null;
            $dados['Valor_5'] = trim(($this->input->post('Valor_5[' . $faixa->Cod . ']') != '')) ? $this->input->post('Valor_5[' . $faixa->Cod . ']') : null;
            $dados['Valor_6'] = trim(($this->input->post('Valor_6[' . $faixa->Cod . ']') != '')) ? $this->input->post('Valor_6[' . $faixa->Cod . ']') : null;
            $dados['Valor_7'] = trim(($this->input->post('Valor_7[' . $faixa->Cod . ']') != '')) ? $this->input->post('Valor_7[' . $faixa->Cod . ']') : null;
            $dados['Valor_8'] = trim(($this->input->post('Valor_8[' . $faixa->Cod . ']') != '')) ? $this->input->post('Valor_8[' . $faixa->Cod . ']') : null;
            $dados['Ausente_025'] = valueOfCheck($this->input->post('Ausente_025[' . $faixa->Cod . ']'));
            $dados['Ausente_050'] = valueOfCheck($this->input->post('Ausente_050[' . $faixa->Cod . ']'));
            $dados['Ausente_1'] = valueOfCheck($this->input->post('Ausente_1[' . $faixa->Cod . ']'));
            $dados['Ausente_2'] = valueOfCheck($this->input->post('Ausente_2[' . $faixa->Cod . ']'));
            $dados['Ausente_3'] = valueOfCheck($this->input->post('Ausente_3[' . $faixa->Cod . ']'));
            $dados['Ausente_4'] = valueOfCheck($this->input->post('Ausente_4[' . $faixa->Cod . ']'));
            $dados['Ausente_6'] = valueOfCheck($this->input->post('Ausente_6[' . $faixa->Cod . ']'));
            $dados['Ausente_8'] = valueOfCheck($this->input->post('Ausente_8[' . $faixa->Cod . ']'));
            $dados['Consulta_has_ExameAudiometrico'] = $codConsulta_meatoscopia;
            if ($this->input->post('CodExameAudiometrico[' . $faixa->Cod . ']') <= 0) {
                $this->db->insert('exameaudiometrico', $dados);
            } else {

                $this->db->where('cod', $this->input->post('CodExameAudiometrico[' . $faixa->Cod . ']'));
                $this->db->update('exameaudiometrico', $dados);
            }
        }
        //ldf
        unset($dados);
        $dados['Consulta'] = $this->input->post('Consulta');
        $dados['OE_dB'] = valueOfInteger($this->input->post('ldfOE_dB'));
        $dados['OD_dB'] = valueOfInteger($this->input->post('ldfOD_dB'));
        $dados['OE_Masc'] = valueOfCheck($this->input->post('ldfOE_Masc'));
        $dados['OD_Masc'] = valueOfCheck($this->input->post('ldfOD_Masc'));
        if ($this->input->post('codLdf') <= 0) {
            $this->db->insert('ldf', $dados);
        } else {

            $this->db->where('cod', $this->input->post('codLdf'));
            $this->db->update('ldf', $dados);
        }
        //lrf
        unset($dados);
        $dados['Consulta'] = valueOfInteger($this->input->post('Consulta'));
        $dados['OE_dB'] = valueOfInteger($this->input->post('lrfOE_dB'));
        $dados['OD_dB'] = valueOfInteger($this->input->post('lrfOD_dB'));
        $dados['OE_Masc'] = valueOfCheck($this->input->post('lrfOE_Masc'));
        $dados['OD_Masc'] = valueOfCheck($this->input->post('lrfOD_Masc'));
        if ($this->input->post('codLrf') <= 0) {
            $this->db->insert('lrf', $dados);
        } else {

            $this->db->where('cod', $this->input->post('codLrf'));
            $this->db->update('lrf', $dados);
        }
        //Iprf
        unset($dados);
        $dados['Consulta'] = $this->input->post('Consulta');
        $dados['OE_dB'] = valueOfInteger($this->input->post('iprfOE_dB'));
        $dados['OD_dB'] = valueOfInteger($this->input->post('iprfOD_dB'));

        $dados['OD_Dissil'] = valueOfInteger($this->input->post('iprfOD_Dissil'));
        $dados['OE_Dissil'] = valueOfInteger($this->input->post('iprfOE_Dissil'));
        $dados['OD_Mono'] = valueOfInteger($this->input->post('iprfOD_Mono'));
        $dados['OE_Mono'] = valueOfInteger($this->input->post('iprfOE_Mono'));

        $dados['OE_Masc'] = valueOfCheck($this->input->post('iprfOE_Masc'));
        $dados['OD_Masc'] = valueOfCheck($this->input->post('iprfOD_Masc'));
        if ($this->input->post('codIprf') <= 0) {
            $this->db->insert('iprf', $dados);
        } else {
            $this->db->where('cod', $this->input->post('codIprf'));
            $this->db->update('iprf', $dados);
        }
        //Mascaramento
        unset($dados);
        $dados['Consulta'] = $this->input->post('Consulta');
        $dados['VA'] = valueOfInteger($this->input->post('mascaramentoVA'));
        $dados['VOOD'] = valueOfInteger($this->input->post('mascaramentoVOOD'));

        $dados['VOOE'] = valueOfInteger($this->input->post('mascaramentoVOOE'));
        $dados['COR_VAR'] = $this->input->post('Cor');

        if ($this->input->post('codMascaramento') <= 0) {
            $this->db->insert('mascaramento', $dados);
        } else {
            $this->db->where('cod', $this->input->post('codMascaramento'));
            $this->db->update('mascaramento', $dados);
        }

//        var_dump($this->input->post());
        $this->output->enable_profiler(FALSE);
    }

    public function get_consulta_audiometrico($consulta) {
        $retorno = $this
                        ->db
                        ->select('f.Cod as CodFaixa, f.Descricao,e.cod as CodExameAudiometrico, e.*,ce.Equipamento')
                        ->join('exameaudiometrico e', 'e.ExameAudiometricoFaixa = f.Cod', 'LEFT')
                        ->join('consulta_has_exameaudiometrico ce', 'ce.Cod = e.Consulta_has_ExameAudiometrico', 'INNER')
                        ->order_by('f.cod')
                        ->get_where('exameaudiometricofaixa f ', array('ce.Consulta' => $consulta))->result();
        if ($this->db->affected_rows() > 0) {
            return $retorno;
        } else {
            return $this
                            ->db
                            ->select('f.Cod as CodFaixa, f.Descricao,e.cod as CodExameAudiometrico, e.*,ce.Equipamento')
                            ->join('consulta c', '1 = 1')
                            ->join('exameaudiometrico e', 'e.cod = -1 ', 'LEFT')
                            ->join('consulta_has_exameaudiometrico ce', 'ce.Consulta = c.cod ', 'LEFT')
                            ->order_by('f.cod')
                            ->get_where('exameaudiometricofaixa f ', array('c.Cod' => $consulta))
                            ->result();
        }
    }
    public function get_audiometricoJSON($consulta, $faixa) {

        $this->output->enable_profiler(false);
        $sql = "SELECT  f.Cod as CodFaixa, 
                        f.Descricao,
                        e.cod as CodExameAudiometrico,
                        ce.Equipamento,
                        Valor_050,
                        Valor_1,
                        Valor_2,
                        Valor_4 
                FROM    exameaudiometricofaixa f 
                INNER join exameaudiometrico e on  e.ExameAudiometricoFaixa = f.Cod
                INNER join consulta_has_exameaudiometrico ce on  ce.Cod = e.Consulta_has_ExameAudiometrico
                WHERE      ce.Consulta = ?
                AND        exameaudiometricofaixa = ?
                ORDER      BY f.cod";
        
        return $this->db->query($sql, array($consulta, $faixa))->result();
    }

    public function get_pacientes() {
        $pacientes = array(67, 305);
        $this->db->select('*');
        $this->db->where_in('Cod', $pacientes);
        $this->db->or_where('Cod >', 1325);
        return $this->db->get('paciente')->result();
    }

    public function get_paciente($Paciente) {
        return $this->db->get_where('paciente', array('cod' => $Paciente))->result();
    }

}
