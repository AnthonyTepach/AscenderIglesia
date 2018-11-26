<?php

class M_invitado extends CI_Model
{

		public function getNumInvitado()
		{
			$number=$this->db->query('SELECT count(*) as numfila FROM tb_inivitado')->row()->numfila;
			return intval($number);
		}
		public function getPafinacion($numero_por_pagina,$seg)
		{
				$this->db->order_by('codigo_invitado ', 'ASC');
				return $this->db->get('tb_inivitado',$numero_por_pagina,$seg);
		}

}
