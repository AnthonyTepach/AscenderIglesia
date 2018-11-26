<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Familia extends CI_Controller {

public function __construct()
  {
    parent::__construct();
    if(!$this->session->userdata('login')){
     redirect(base_url());
   	}
  }
   public function consulta_familias()
  {
  		 $this->load->model('M_Familia');
  			$data['tipo']="familias";
  			$data['cantidad']=$this->M_Familia->getNumFamilia();
			$this->load->library('pagination');
			$config['base_url'] =base_url('Consulta_Familias');
			$config['total_rows'] =$data['cantidad'];
			$config['per_page']=8;
			$config['uri_segment']=2;
			$config['num_links']=4;
			$config['full_tag_open'] = '<ul class="pagination">';
			$config['full_tag_close'] = '</ul>';
			$config['num_tag_open'] = '<li class="waves-effect">';
			$config['num_tag_close'] = '</li>';
			$config['cur_tag_open'] = '<li class="active" style="background-color: #007bff;"><a href="#!">';
			$config['cur_tag_close'] = '</a></li>';
			$config['prev_link'] = ' <span style="font-size:13px;"><i class="fas fa-angle-left"></i> Anterior</span> ';
			$config['next_link'] = ' <span style="font-size:13px;">Siguiente <i class="fas fa-angle-right"></i></span> ';
			$config['first_link'] = ' <span style="font-size:13px;"><i class="fas fa-angle-double-left"></i> Inicio</span> '; //primer link
		    $config['last_link'] = ' <span style="font-size:13px;">Final <i class="fas fa-angle-double-right"></i></span> '; //último link
			$this->pagination->initialize($config);
			$data['consulta']= $this->M_Familia->getPafinacion($config['per_page'],$this->uri->segment('2'));
			$data['pagination_n']=$this->pagination->create_links();
			$this->load->view('Familia/V_QueryFamilia',$data);
  }
}
