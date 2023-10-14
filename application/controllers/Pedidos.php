<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pedidos extends CI_Controller {

	public function __construct(){
        parent::__construct();
        $this->load->model('Producto_model');
		//$this->load->model('Categorias_model');
    }

	public function index()
	{
		$lista = array(
			'productos'=> $this->Producto_model->getAllproductos(),
			//'categorias'=> $this->Categorias_model->getAllCategorias(),
		);
		$this->load->view('layouts/header');
		$this->load->view('layouts/aside');
		$this->load->view('pedidos/store', $lista);
      //  $this->load->view('pedidos/tabla');
		$this->load->view('layouts/footer');			
	}


}