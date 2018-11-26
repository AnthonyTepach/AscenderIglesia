<?php

class M_Membresia extends CI_Model
{
	  public function construct() {
        parent::__construct();
    }


 
    public function totalM($a) {
			$number=$this->db->query('select count(id_miembro) as CM from tb_miembros where sexo_miembro ="'.$a.'"')->row()->CM;
    	   return intval($number);
    }
     public function totalI($a) {
			 $number=$this->db->query('select count(id_invitado) as CI from tb_inivitado where sexo_invitado ="'.$a.'"')->row()->CI;
     	return intval($number);

    }
  
public function CantidadPorEdadM($e1,$e2){
    $this->db->select('COUNT(*) as rango_edad  FROM tb_miembros WHERE TIMESTAMPDIFF(YEAR,fnaci_miembro,CURDATE()) BETWEEN "'.$e1.'" AND "'.$e2.'"');
    $number= $this->db->get()->row()->rango_edad;
    return intval($number);
    }
    public function CantidadPorEdadI($e1,$e2){
        $this->db->select('COUNT(*) as rango_edad  FROM tb_inivitado WHERE TIMESTAMPDIFF(YEAR,fnaci_invitado,CURDATE()) BETWEEN "'.$e1.'" AND "'.$e2.'"');
        $number= $this->db->get()->row()->rango_edad;
                return intval($number);
    }

	public function getEdadM($eda1,$eda2){
		$number=	$this->db->query("Select * FROM tb_miembros WHERE TIMESTAMPDIFF(YEAR,fnaci_miembro,CURDATE()) BETWEEN $eda1 AND $eda2 ");
		 return $number;
	 }
    public function getEdadI($eda1,$eda2){
	    $number=$this->db->query("Select * FROM tb_inivitado WHERE TIMESTAMPDIFF(YEAR,fnaci_invitado,CURDATE()) BETWEEN $eda1 AND $eda2 ");
		return $number;
	}
	 public function getSexM($sex){
 		$number=$this->db->query("select * FROM tb_miembros WHERE sexo_miembro='$sex'");
        return $number;
	 }

	 public function getSexI($sex){
	 	$number=$this->db->query("select * FROM tb_inivitado WHERE sexo_invitado= '$sex' ");
	 	 return $number;
	 }
    public function AdultoM(){
         $this->db->select('COUNT(*) as adulto  FROM tb_miembros WHERE edad_miembro BETWEEN 31 AND 100 ');
				 $number= $this->db->get()->row()->adulto;
 				return intval($number);
    }
//0-4 bebes
//5-12 niños
//13-17 alolecentes
//18-30 jovenes
//31-mas adultos
}
