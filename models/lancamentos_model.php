<?php

class Lancamentos_Model extends Model {

    public function __construct() {
        parent::__construct();
    }
    
	public function listaLancamento() 
    {    
        $sql='SELECT
                t2.descricao as tipo_desc,
                t.descricao as fluxo_desc,
                l.sequencia,
                date_format(l.`data`, "%d/%m/%Y") as `data`,
                tipo,
                valor,
                fluxo,
                obs
            from
                lancamento l
            join tipofluxo t on
                t.codigo = l.fluxo
            join tipolancamento t2 on
                t2.sequencia = l.tipo';
        $result=$this->db->select($sql);	
		 echo(json_encode($result));
    }

    public function selTipFlux()
    {
        $sql="SELECT
              codigo as fluxo, descricao as fluxo_desc
              from
              tipofluxo";
        $result=$this->db->select($sql);
        echo(json_encode($result));
    }

    public function selTipLanc()
    {
      $sql="SELECT
            sequencia as tipo, descricao as tipo_desc
            from
            tipolancamento";
      $result=$this->db->select($sql);
      echo(json_encode($result));  
    }

    public function insert() 
    {
        $x=file_get_contents('php://input');
        $x=json_decode($x);
        $Val=$x->txtVal;
        $Obs=$x->txtObs;
        $TipLanc=$x->txtTipLanc;
        $TipFlux=$x->txtTipFlux;
        
        $result=$this->db->insert('fluxo_caixa.lancamento', array('valor'=>$Val, 'obs'=>$Obs, 'tipo'=>$TipLanc, 'fluxo'=>$TipFlux));
        if($result){
            $msg=array("codigo"=>1,"texto"=>"Registro inserido com sucesso.");
        }
        else{
            $msg=array("codigo"=>0,"texto"=>"Erro ao inserir.");
        }
        echo(json_encode($msg));
        
    }
	
	public function del() 
    {  
        
		//o codigo deve ser um inteiro
        $Seq=(int)$_GET['id'];
        $msg=array("codigo"=>0,"texto"=>"Erro ao excluir.");
		if($Seq>0){                     
            $result=$this->db->delete('fluxo_caixa.lancamento',"sequencia='$Seq'");
            if($result){
                    $msg=array("codigo"=>1,"texto"=>"Registro excluído com sucesso.");
            }
        }
        echo(json_encode($msg));        
	}
	
	public function loadData($id) 
    {  
		//o codigo deve ser um inteiro
		$cod=(int)$id;		
        $result=$this->db->select('SELECT
                t2.descricao as tipo_desc,
                t.descricao as fluxo_desc,
                l.sequencia,
                date_format(l.`data`, "%d/%m/%Y") as `data`,
                tipo,
                valor,
                fluxo,
                obs
            from
                lancamento l
            join tipofluxo t on
                t.codigo = l.fluxo
            join tipolancamento t2 on
                t2.sequencia = l.tipo
            where 
                l.sequencia = :seq;
            ',array(':seq'=> $cod) );
		$result = json_encode($result);
		echo($result);
	}
	
	
	public function save() 
    {
        $x=file_get_contents('php://input');
        $x=json_decode($x);
        $Val=(int)$x->txtVal;
        $Obs=$x->txtObs;
        $Seq=$x->txtseq;
        $msg=array("codigo"=>0,"texto"=>"Erro ao atualizar.");
		if($Val>0){
                $dadosSave=array('obs'=>$Obs, 'valor'=> $Val);
                        
            $result=$this->db->update('fluxo_caixa.lancamento', $dadosSave,"sequencia=$Seq", "valor='$Val'");
            if($result){
                    $msg=array("codigo"=>1,"texto"=>"Registro atualizado com sucesso.");
                }
        }
        echo(json_encode($msg));
	   
    }
}