<?php

class M_Familia extends CI_Model
{

	public function getNumFamilia()
		{
			$number=$this->db->query('SELECT count(*) as numfila FROM tb_familia')->row()->numfila;
			return intval($number);
		}
	public function getPafinacion($numero_por_pagina,$seg)
		{
				$this->db->order_by('id_fam ', 'ASC');
				return $this->db->get('tb_familia',$numero_por_pagina,$seg);
		}
}
