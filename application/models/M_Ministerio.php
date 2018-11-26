<?php

class M_Ministerio extends CI_Model
{

	public function getNumMinisterio()
		{
			$number=$this->db->query('SELECT count(*) as numfila FROM tb_ministerios')->row()->numfila;
			return intval($number);
		}
	public function getPafinacion($numero_por_pagina,$seg)
		{
				$this->db->order_by('codigo_ministerio ', 'ASC');
				return $this->db->get('tb_ministerios',$numero_por_pagina,$seg);
		}
	public function getMinisterios()
	{
		$this->db->order_by('nom_minsterio', 'ASC');
        return $this->db->get('tb_ministerios');
	}
	public function getNomMinisteriosById($value)
	{
		$consulta=$this->db->query('SELECT nom_minsterio as nombre FROM tb_ministerios WHERE id_ministerio='.$value)->row()->nombre;
		return $consulta;
	}
	function asignarMinisterio($data)
	{
		$this->db->insert('tb_asignar_ministerio',$data);
	}
	public function getAsignaciones($id){
		$this->db->select('tb_ministerios.id_ministerio, nom_minsterio , nom_miembro,apat_miembro,amat_miembro,codigo_miembro,nom_imagen, tb_miembros.id_miembro');
		$this->db->from('tb_miembros');
		$this->db->join('tb_asignar_ministerio','tb_miembros.id_miembro = tb_asignar_ministerio.id_miembro','inner');
		$this->db->join('tb_ministerios','tb_asignar_ministerio.id_ministerio = tb_ministerios.id_ministerio','inner');
		$this->db->where('tb_ministerios.id_ministerio', $id);
		return $this->db->get();

	}

}