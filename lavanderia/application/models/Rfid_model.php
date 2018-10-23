<?php

class Rfid_model extends Generic_Model {

    function __construct() {
        parent::__construct();
        $this->tabela = 'rfid';
        $this->load->model('apartamento_model', 'apto');
    }
 
    public function save() {
        $operacao = $this->input->post('operacao');
        if ($operacao == 'alterar') {
            $tag = $this->input->post('tag');
            $admin = $this->input->post('admin');
            $excluir = $this->input->post('excluir');
            $apto = $this->input->post('apto');                      
            foreach ($this->input->post('nome') as $key => $value) {
                $data['nome'] = $value;
                $data['tag'] = $tag[$key];
                $data['admin'] = 0;
                $_excluir = 0;
                if (isset($admin[$key])) {
                    $data['admin'] = $admin[$key];
                }
                if (isset($excluir[$key])) {
                    $_excluir = $excluir[$key];
                }
                //===========================================================================
                $apto_id = $this->input->post('apto');
                $_apto = $this->apto->get($apto_id);            
                $_rfid = $this->get($key);      
                if ($_excluir == 1)
                {
                    $this->Log_model->save('Excluindo TAG <b>'.$_rfid[0]->tag.'</b> do apartamento <b>' . $_apto[0]->nome . '</b> ' . $this->session->userdata('lavanderia'));                    
                    $this->dBLavanderia->delete($this->tabela, array('id' => $key));
                    // $this->Log_model->save('Não é possível atualizar o RFID <b>'.$_rfid[0]->tag.'</b> para <b>'.$data['tag'].'</b> do apartamento <b>' . $_apto[0]->nome . '</b>'. $this->session->userdata('lavanderia'). '('.$data['tag'].')  pois, há um vinculo no apartamento '.$vinculo[0]->apto. ' ' );
                }
                else //Atualizar
                {
                   
                    $vinculo = $this->getVinculo($apto_id, $_rfid[0]->tag);
                    
                    if ((count($vinculo)>0) and ($vinculo[0]->apto <> ''))
                    {
                        $this->Log_model->save('Não é possível atualizar o RFID <b>'.$_rfid[0]->tag.'</b> para <b>'.$data['tag'].'</b> do apartamento <b>' . $_apto[0]->nome . '</b>'. $this->session->userdata('lavanderia'). '('.$data['tag'].')  pois, há um vinculo no apartamento '.$vinculo[0]->apto. ' ' );
                        $this->session->set_flashdata('msg', 'Não é possível atualizar o RFID <b>'.$_rfid[0]->tag.'</b> para <b>'.$data['tag'].'</b> do apartamento <b>' . $_apto[0]->nome . '</b>'. $this->session->userdata('lavanderia'). '('.$data['tag'].')  pois, há um vinculo no apartamento '.$vinculo[0]->apto. ' ' );                    
                    }
                    else
                    {
                        if ($_rfid[0]->tag <> $data['tag']){
                            $this->Log_model->save('Atualizando o RFID <b>'.$_rfid[0]->tag.'</b> para <b>'.$data['tag'].'</b> do apartamento <b>' . $_apto[0]->nome . '</b> ' . $this->session->userdata('lavanderia'). '('.$data['tag'].')' );                    
                        }
                        if ($_rfid[0]->nome <> $data['nome']){
                            $this->Log_model->save('Atualizando o Nome <b>'.$_rfid[0]->nome.'</b> para <b>'.$data['nome'].'</b> do apartamento <b>' . $_apto[0]->nome . '</b> ' . $this->session->userdata('lavanderia'). '('.$data['tag'].')');                    
                        }
                        if ($_rfid[0]->admin <> $data['admin']){
                            $this->Log_model->save('Atualizando o Admin <b>'.$_rfid[0]->admin.'</b> para <b>'.$data['admin'].'</b> do apartamento <b>' . $_apto[0]->nome . '</b> ' . $this->session->userdata('lavanderia'). '('.$data['tag'].')');                    
                        }
                        //===========================================================================
                        $this->dBLavanderia->where(array('id' => $key))->update($this->tabela, $data);
                    }
                }
            }
        } else if ($operacao == 'inserir') {
            $data['apto_id'] = $this->input->post('apto');
            $data['nome'] = $this->input->post('nome');
            $data['tag'] = $this->input->post('rfid');
            $data['admin'] = 0;
            $this->dBLavanderia->insert($this->tabela, $data);
            $apto = $this->apto->get($data['apto_id']);            
            $this->Log_model->save('Inserindo o RFID <b>'.$data['tag'].'</b> para o apartamento <b>' . $apto[0]->nome . '</b> ' . $this->session->userdata('lavanderia') );    
        }
    }

    public function Ativos() {
        return $this->dBLavanderia
                        ->select("COUNT(1) Qtde")
                        ->get_where('apto a', "a.habilitado = '1'")
                        ->result();
    }

    public function index($Cod = null) {
        return $this->dBLavanderia
                        ->select('r.*, a.nome apto')
                        ->join('apto a', 'a.id = r.apto_id')
                        ->where('apto_id', $Cod)
                        ->order_by('(r.nome)')
                        ->get($this->tabela . ' r')
                        ->result();
        $this->output->enable_profiler(TRUE);
    }

    public function find($Cod = null) {
        return $this->dBLavanderia
                        ->where('Cod', $Cod)
                        ->get($this->tabela)
                        ->result();
    }
    public function getVinculo($apto_id, $tag) {
        return $this->dBLavanderia
                        ->select('r.*, a.nome apto')
                        ->join('apto a', 'a.id = r.apto_id')
                        ->where('r.apto_id <> ', $apto_id)
                        ->where('r.tag', $tag)
                        ->get($this->tabela . ' r')
                        ->result();
    }

  
     public function get($Cod) {
        return $this->dBLavanderia->where('id', $Cod)->get($this->tabela)->result();
    }

}
