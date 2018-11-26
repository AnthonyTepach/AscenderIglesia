<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Menus extends CI_Controller {

public function __construct()
  {
    parent::__construct();
    if(!$this->session->userdata('login')){
     redirect(base_url());
   	}
  }

  public function menu_registro(){
  	$this->load->view('Menus/V_Registro_persona');
  }
  public function menu_estadisticas(){
    
  	$this->load->view('Menus/V_Estadisticas');
  }

  public function sexo_viewG(){
    $this->load->model('M_Membresia');
    $data['totalHM']=$this->M_Membresia->totalM("Hombre");
    $data['totalMM']=$this->M_Membresia->totalM("Mujer");
    $data['totalHI']=$this->M_Membresia->totalI("Hombre");
    $data['totalMI']=$this->M_Membresia->totalI("Mujer");
    $this->load->view('Estadisticas/V_Graficas_Sexo',$data);
  }
  public function edad_viewG()
  {
    # code...
    $this->load->model('M_Membresia');
    //Miembros
    $data['bebeM']=$this->M_Membresia->CantidadPorEdadM(0,4);
    $data['ninoM']=$this->M_Membresia->CantidadPorEdadM(5,12);
    $data['adolM']=$this->M_Membresia->CantidadPorEdadM(13,17);
    $data['jovenM']=$this->M_Membresia->CantidadPorEdadM(18,30);
    $data['adultM']=$this->M_Membresia->CantidadPorEdadM(31,100);
    //Invitado
     $data['bebeI']=$this->M_Membresia->CantidadPorEdadI(0,4);
    $data['ninoI']=$this->M_Membresia->CantidadPorEdadI(5,12);
    $data['adolI']=$this->M_Membresia->CantidadPorEdadI(13,17);
    $data['jovenI']=$this->M_Membresia->CantidadPorEdadI(18,30);
    $data['adultI']=$this->M_Membresia->CantidadPorEdadI(31,100);
    $this->load->view('Estadisticas/V_Graficas_Edad',$data);
  }
}
