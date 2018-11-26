<?php

class M_login extends CI_Model
{
	public function user($value='')
    {
      $this->db->where('nom_usuario',$value);
        $result= $this->db->get('tb_usuario');
        if ($result->num_rows()>0) {
          return $result->row();
        }else{
          return null;
        }
    }
}
