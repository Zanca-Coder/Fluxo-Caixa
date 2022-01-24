<?php

class Tipo_Lancamentos extends Controller
{

    function __construct()
    {
        parent::__construct();
        //Auth::autentica();
        $this->view->js = array('tipo_lancamentos/tipo_lancamento.js');
    }

    function index()
    {
        $this->view->title = 'Tipo de Lançamentos';
        $this->view->render('header');
        $this->view->render('tipo_lancamentos/index_tipo');
        $this->view->render('footer');
    }
    function insert()
    {
        $this->model->insert();
    }

    function listaTipoLancamento()
    {
        $this->model->listaTipoLancamento();
    }

    function del()
    {
        $this->model->del();
    }

    function loadData($id)
    {
        $this->model->loadData($id);
    }

    function save()
    {
        $this->model->save();
    }
}
