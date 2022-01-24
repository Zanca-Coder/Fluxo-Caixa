<?php

class Lancamentos extends Controller {

    function __construct() {
        parent::__construct();
        //Auth::autentica();
        $this->view->js = array('lancamentos/lancamento.js');
    }
    
    function index() {
        $this->view->title = 'Lançamento';
		$this->view->render('header');
        $this->view->render('lancamentos/index');
		$this->view->render('footer');
    }
     function insert()
    {
        $this->model->insert();
    }
    
	function listaLancamento()
    {
        $this->model->listaLancamento();
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
    function selTipLanc()
    {
        $this->model->selTipLanc();
    }
    function selTipFlux()
    {
        $this->model->selTipFlux();
    }
}