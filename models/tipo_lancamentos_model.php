<?php

class Tipo_Lancamentos_Model extends Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function listaTipoLancamento()
    {
        $sql = "SELECT * from fluxo_caixa.tipolancamento";
        $result = $this->db->select($sql);
        echo (json_encode($result));
    }

    public function insert()
    {
        $x = file_get_contents('php://input');
        $x = json_decode($x);
        $Desc = $x->txtDesc;

        $result = $this->db->insert('tipolancamento', array('descricao' => $Desc));
        if ($result) {
            $msg = array("codigo" => 1, "texto" => "Registro inserido com sucesso.");
        } else {
            $msg = array("codigo" => 0, "texto" => "Erro ao inserir.");
        }
        echo (json_encode($msg));
    }

    public function del()
    {

        //o codigo deve ser um inteiro
        $seq = (int)$_GET['id'];
        $msg = array("codigo" => 0, "texto" => "Erro ao excluir.");
        if ($seq > 0) {
            $result = $this->db->delete('fluxo_caixa.tipolancamento', "sequencia='$seq'");
            if ($result) {
                $msg = array("codigo" => 1, "texto" => "Registro excluído com sucesso.");
            }
        }
        echo (json_encode($msg));
    }

    public function loadData($id)
    {
        //o codigo deve ser um inteiro
        $cod = (int)$id;
        $result = $this->db->select('SELECT sequencia, descricao from fluxo_caixa.tipolancamento where sequencia = :seq', array(":seq" => $cod));
        $result = json_encode($result);
        echo ($result);
    }


    public function save()
    {
        $x = file_get_contents('php://input');
        $x = json_decode($x);
        $seq = $x -> txtseq;
        $Desc = $x->txtDesc;
        $msg = array("codigo" => 0, "texto" => "Erro ao atualizar.");
        if ($seq > 0) {
            $dados_save = array('descricao'=> $Desc);
            $result = $this->db->update('fluxo_caixa.tipolancamento', $dados_save, "sequencia='$seq'");
            if ($result) {
                $msg = array("codigo" => 1, "texto" => "Registro atualizado com sucesso.");
            }
        }
        echo (json_encode($msg));
    }
}
