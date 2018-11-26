<?php

class M_Miembro extends CI_Model
{

		public function getNumMiembros()
		{
			$number=$this->db->query('SELECT count(*) as numfila FROM tb_miembros')->row()->numfila;
			return intval($number);
		}
		public function getPafinacion($numero_por_pagina,$seg)
		{		

				$this->db->order_by('codigo_miembro', 'ASC');
				return $this->db->get('tb_miembros',$numero_por_pagina,$seg);
		}
		function nuevo_miembro($data)
	{
		$this->db->insert('tb_miembros',$data);
	}
	
	public function getMaxId()
		{
			$number=$this->db->query('SELECT MAX(id_miembro) as num from tb_miembros')->row()->num;
			return intval($number);
		}
		function get_miembro($id){
			$this->db->select('*,TIMESTAMPDIFF(YEAR,fnaci_miembro,CURDATE()) AS edad_s');
			$this->db->order_by('codigo_miembro', 'ASC');
       		 $this->db->where('id_miembro', $id);
       		return $this->db->get('tb_miembros');
    }

    public function busqueda($buscador,$tipo) {
    	$this->db->order_by('codigo_miembro', 'ASC');
    	if ($tipo == "Nombre") {
    		# code...
    		 $this->db->like('nom_miembro', $buscador);
             return  $this->db->get('tb_miembros');
    	} else if($tipo == "Código") {
    		# code...
             $this->db->like('codigo_miembro', $buscador);
             return  $this->db->get('tb_miembros');
    	}else if($tipo == "Ministerio"){
             $this->db->like('Ministerio_miembro', $buscador);
             return  $this->db->get('tb_miembros');
    	}  
    }

    public function cantidadNombres($busqueda,$tipo)
		{
			if ($tipo == "Nombre") {
				$query = $this->db->query('SELECT count(*) as numfila FROM tb_miembros WHERE nom_miembro like"%'.$busqueda.'%"')->row()->numfila;
			return intval($query);
			}else if($tipo == "Código") {
				$query = $this->db->query('SELECT count(*) as numfila FROM tb_miembros WHERE codigo_miembro like"%'.$busqueda.'%"')->row()->numfila;
				return intval($query);
			}else if($tipo == "Ministerio"){
				$query = $this->db->query('SELECT count(*) as numfila FROM tb_miembros WHERE Ministerio_miembro like"%'.$busqueda.'%"')->row()->numfila;
				return intval($query);
			}
		}

  
}