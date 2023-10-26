<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ventas_model extends CI_Model {

   /* public function getAllVentas(){          
        $this->db->select("v.*, c.nombre as cliente");
        $this->db->from("ventas v");
        $this->db->join("cliente c", "c.id_cliente = v.id_cliente");    
        $this->db->where("v.eliminado","0");
        $resultados = $this->db->get();
        return $resultados->result(); 
    }*/


    public function getAllComprobantes(){          
        $resultados = $this->db->get("comprobante");
        return $resultados->result();
    }

    public function save($data)
    {        
        return $this->db->insert("ventas", $data);       
    }

    public function lastId(){
        return $this->db->insert_id();
    }

    public function getComprobante($id){
        $this->db->where("id_comprobante", $id);
        $resultados = $this->db->get("comprobante");
        return $resultados->row();
    }

    public function updateComprobante($idComprobante, $data){
        $this->db->where("id_comprobante",$idComprobante);
        $this->db->update("comprobante",$data);
    } 

    public function save_detalle($data){
        $this->db->insert('detalle',$data);
    }

    public function getAllVentas(){    
        $this->db->select("v.*, u.nombre as nombre");
        $this->db->from("ventas v");
        $this->db->join("usuario u", "u.id_usuario = v.id_cliente");    
        $resultados = $this->db->get();
        return $resultados->result();

        $resultados = $this->db->get("ventas");
        return $resultados->result();
    }

    public function updateVenta($id,$data)
    {        
        $this->db->where("id_venta", $id);     
        return $this->db->update("ventas", $data);     
    }

}