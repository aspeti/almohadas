<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reporte_model extends CI_Model {

    public function getAllVentas(){          
        $this->db->select("v.*, c.nombre as cliente");
        $this->db->from("ventas v");
        $this->db->join("usuario c", "c.id_usuario = v.id_cliente");    
        $this->db->where("v.eliminado","0");
        $this->db->order_by("v.id_venta", "ASC");
        $resultados = $this->db->get();
        return $resultados->result(); 
    }


    public function getAllVentasByDate($fecha_inicio,$fecha_fin){
        $this->db->select("v.*, c.nombre as cliente");
        $this->db->from("ventas v");
        $this->db->join("usuario c", "c.id_usuario = v.id_cliente");    
        $this->db->where("v.eliminado","0");
        $this->db->where('v.fecha_creacion >=', $fecha_inicio);
        $this->db->where('v.fecha_creacion <=', $fecha_fin); 
        $this->db->order_by("v.id_venta", "ASC");
        //$this->db->group_by("v.id_venta");      

        $resultados = $this->db->get();

        if($resultados->num_rows()>0){
            return $resultados->result();
        }else{
            return false;
        }   
    }

    public function getVentaByID($id){          
        $this->db->select("v.*, c.nombre as cliente, c.ci as ci");
        $this->db->from("ventas v");
        $this->db->join("usuario c", "c.id_usuario = v.id_cliente");    
        $this->db->where("v.eliminado","0");
        $this->db->where("v.id_venta", $id);
        $this->db->order_by("v.id_venta", "ASC");
        $resultados = $this->db->get();
        return $resultados->row(); 
    }

    public function getAllVentaByUserId($id){          
        $this->db->select("v.*, c.nombre as cliente, c.ci as ci");
        $this->db->from("ventas v");
        $this->db->join("usuario c", "c.id_usuario = v.id_cliente");    
        $this->db->where("v.eliminado","0");
        $this->db->where("v.id_usuario", $id);
        $this->db->order_by("v.id_venta", "ASC");
        $resultados = $this->db->get();
        return $resultados->row(); 
    }

    public function getAllDetalleById($id){          
        $this->db->select("d.*, p.nombre as producto");
        $this->db->from("detalle d");
        $this->db->join("producto p", "d.id_producto = p.id_producto");    
        $this->db->where("d.id_venta", $id);
        $resultados = $this->db->get();
        return $resultados->result();
        

    }

    

    public function getAllEstadisticas(){          
        $this->db->select("p.nombre as paquete, COUNT(d.cantidad) as cantidad, SUM(d.precio) as total");
        $this->db->from("detalle d");
        $this->db->join("producto p", "d.id_producto = p.id_producto");
        $this->db->where("d.eliminado", "0");
        $this->db->group_by("d.id_producto");
        $resultados = $this->db->get();
        return $resultados->result();
    }


}