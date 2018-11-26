<?php

class M_Evento extends CI_Model
{

	public function getNumEventos()
		{
			$number=$this->db->query('SELECT count(*) as numfila FROM tb_eventos')->row()->numfila;
			return intval($number);
		}
	public function getPafinacion($numero_por_pagina,$seg)
		{
				$this->db->order_by('codigo_evento ', 'ASC');
				return $this->db->get('tb_eventos',$numero_por_pagina,$seg);
		}
}
