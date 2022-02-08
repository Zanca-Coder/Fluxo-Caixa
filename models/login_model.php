<?php

class Login_Model extends Model
{
    public function __construct()
    {
        parent::__construct();
        // logout
        Session::init();
        Session::destroy();
    }

    public function ver()
    {
        $dados = array(':nome' => $_POST['txtNome'], ':senha' => $_POST['txtSenha']);
        $result = $this->db->select("SELECT
                                        *
                                    from
                                        usuario
                                    join nivelusuario on
                                        usuario.nivel = nivelusuario.codigo
                                    where
                                        nome = :nome
                                        and senha = :senha;", $dados);

        $count = count($result);

        if ($count > 0) {
            // login
            Session::init();
            Session::set('nome', $result[0]->nome);
            Session::set('id', $result[0]->id);
            Session::set('nivel', $result);
            Session::set('logado', true);
            echo ("OK");
        } else {
            echo ("Dados Incorretos.");
        }
    }   
}
