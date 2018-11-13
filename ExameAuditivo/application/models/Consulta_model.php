<?php

class Consulta_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    public function salvar() {
        $this->output->enable_profiler(false);
        $_Paciente = $this->paciente->get_paciente($this->input->post('Paciente'));
        $dados['Paciente'] = $this->input->post('Paciente');
        $dados['PacienteNome'] = $_Paciente[0]->Descricao;
        $dados['TipoExame'] = $this->input->post('tipoexame');
        $dados['Terceiro'] = $this->input->post('profissional1');
        $dados['Terceiro1'] = $this->input->post('profissional2');        
        $dados['Data'] = dataUS($this->input->post('dataConsulta'));            
        $dados['Fechamento'] = valueOfCheck($this->input->post('fechamento'));
        $dados['Invalido'] = valueOfCheck($this->input->post('invalido'));
        $dados['Classificacao'] = $this->input->post('classificacao');
        $dados['RRA'] = valueOfInteger($this->input->post('RRA'));
        $dados['Funcao'] = $_Paciente[0]->Funcao;
        $dados['Empresa'] = $_Paciente[0]->Empresa;
        $dados['EstadoCivil'] = $_Paciente[0]->EstadoCivil;
        if ($this->input->post('Chave') < 0) {
            $this->db->insert('consulta', $dados);
            $CodConsulta = $this->db->insert_id();
//            var_dump($this->input->post('tecnicasutilizadas'));
            if (count($this->input->post('tecnicasutilizadas')) > 0) {
                $this->tecnicasutilizadas_has_consulta->salvar_tecnicas($this->input->post('tecnicasutilizadas'), $CodConsulta);
            }
            return $CodConsulta;
        } else {
            $this->db->where('cod', $this->input->post('Chave'));
            $this->db->update('consulta', $dados);
            if (count($this->input->post('tecnicasutilizadas')) > 0) {
                $this->tecnicasutilizadas_has_consulta->salvar_tecnicas($this->input->post('tecnicasutilizadas'), $this->input->post('Chave'));
            }
            return $this->input->post('Chave');
        }
    }

    public function atualiza_status() {
        $data['fechamento'] = 'S';
        if (($this->session->userdata['adm'] == true) && ($this->session->userdata['Login'] != 'master')) {
            $this
                    ->db
                    ->where(' IFNULL(Fechamento,"N") <>', 'S')
                    ->where(' IFNULL(Invalido,"N")', 'N')
                    ->where('DATEDIFF(CURDATE(), Data) > ', 30)
                    ->update('consulta', $data);
        } else
            return true;
    }

    public function get_consultas_by_paciente($Paciente) {
        return $this
                        ->db
                        ->select('c.Cod, c.Data, p.cod AS Paciente, t1.Descricao as Profissional1, t2.Descricao as Profissional2, c.Fechamento, c.Invalido ')
                        ->join('consulta c', 'c.paciente = p.cod', 'INNER')
                        ->join('terceiro t1', 't1.Cod = c.terceiro', 'INNER')
                        ->join('terceiro t2', 't2.Cod = c.terceiro1', 'LEFT')
                        ->order_by('c.Data', 'DESC')
                        ->get_where('paciente p', array('p.cod  ' => $Paciente))
                        ->result();
    }

    public function get_consulta($consulta) {
        return $this->db->get_where('consulta', array('Cod' => $consulta))->result();
    }

}
