<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pedidos extends CI_Controller {

	public function __construct(){
        parent::__construct();
        $this->load->model('Producto_model');
		$this->load->model('Ventas_model');
		$this->load->model('Usuario_model');
    }

	public function index()
	{
		$lista = array(
			'productos'=> $this->Producto_model->getAllproductos(),
			'comprobantes'=> $this->Ventas_model->getAllComprobantes(),
			'clientes'=> $this->Usuario_model->getAllClientes(),
		);
		$this->load->view('layouts/header');
		$this->load->view('layouts/aside');
		$this->load->view('pedidos/store', $lista);
      //  $this->load->view('pedidos/tabla');
		$this->load->view('layouts/footer');			
	}

	public function payment()
	{

		$this->load->view('layouts/header');
		$this->load->view('layouts/aside');
		$this->load->view('pedidos/payment');
		$this->load->view('layouts/footer');			
	}
	public function report()
	{

		$this->load->view('layouts/header');
		$this->load->view('layouts/aside');
		$this->load->view('pedidos/reporte');
		$this->load->view('layouts/footer');			
	}


	public function agregarventa()
	{
		$id_comprobante = $this->input->post("idcomprobante");
		$serie = $this->input->post("serie");
		$num_documento = $this->input->post("numero");	
		$idcliente = $this->input->post("idcliente");
		$fecha = $this->input->post("fecha");	
		$subtotal = $this->input->post("subtotal");	
		$total = $this->input->post("txttotal");		

		$id_usuario = $this->session->userdata("id_usuario");		

		$productos_id = $this->input->post("idcodigo");		
		$precios =      $this->input->post("precios");
		$cantidades =   $this->input->post("cantidad");
		$importes =     $this->input->post("txt_subtotal");

		//echo 'sub'.$subtotal.'* total:'.$total.'* idcliente'.$idcliente.'* serie'.$serie.'* num_docu:'.$num_documento.'* id_usuario:'.$id_usuario.'* id_comprobante:'.$id_comprobante;
			
		$data = array(
			'fecha_creacion' => date('Y-m-d H:i:s'),
			'eliminado' => "0",
			'id_comprobante'=> $id_comprobante,
			'serie'=> $serie,
			'num_documento'=> $num_documento,
			'id_cliente'=> $idcliente,
			'fecha_entrega'=> $fecha,			
			'subtotal'=> "0",	
			'total'=> $total,	
			'id_usuario'=> $id_usuario					
		);

		if($this->Ventas_model->save($data)){

			$idVenta= $this->Ventas_model->lastId();
			$this->update_Comprobante($id_comprobante);
			$this->save_detalle($productos_id,$idVenta,$precios,$cantidades,$importes);
			redirect(base_url()."pedidos/payment");

		}else{
			redirect(base_url()."pedidos");		}

	}

	protected function update_Comprobante($idComprobante)
	{
		$comprobanteActual = $this->Ventas_model->getComprobante($idComprobante);
		$data = array(
			'cantidad' => $comprobanteActual->cantidad + 1, 
		);

		$this->Ventas_model->updateComprobante($idComprobante,$data);
	}

	protected function save_detalle($productos,$idVenta,$precios,$cantidades,$importes){
        for($i=0; $i<count($productos);$i++){
            $data = array(
                'id_producto' => $productos[$i],
                'id_venta' => $idVenta,
                'precio' => $precios[$i],
                'cantidad' => $cantidades[$i],
                'importe' => $importes[$i],
				'fecha_creacion' => date('Y-m-d H:i:s'),				
				'eliminado' => "0"
            );
            $this->Ventas_model->save_detalle($data);		
        }

    }


}