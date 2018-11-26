<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Eventos extends CI_Controller {

public function __construct()
  {
    parent::__construct();
    if(!$this->session->userdata('login')){
     redirect(base_url());
   	}
  }
  public function guardar_evento(){

		$datos['codigo_evento']=$this->input->post('txtcod');
		$datos['nom_evento']=$this->input->post('txtNom');
		$datos['fecha_evento']=$this->input->post('txtfecha');
		$datos['Lugar']=$this->input->post('txtlugar');
		$datos['horario']=$this->input->post('txthora');
		$datos['cupo']=$this->input->post('txtcupo');
		$datos['observaciones']=$this->input->post('txtdesc');

		$config['upload_path'] = 'upload/eventos/';
		$config['allowed_types'] = 'gif|jpg|png';
		$this->load->library('upload', $config);
		if(!$this->upload->do_upload()){
				/*Si al subirse hay algún error lo meto en un array para pasárselo a la vista*/
						$error=array('error' => $this->upload->display_errors());
					echo $this->upload->display_errors();
					return;
		}else{
				//Datos del fichero subido
				$datosI["img"]=$this->upload->data();
				$datos['imagen_evento']=$datosI["img"]["file_name"];
				$this->M_Eventos->nuevo_evento($datos);
				redirect('Ver_Eventos', 'refresh');
		}


	}
	public function consulta_eventos()
  {
  		 	$this->load->model('M_Evento');
  			$data['tipo']="eventos";
  			$data['cantidad']=$this->M_Evento->getNumEventos();
			$this->load->library('pagination');
			$config['base_url'] =base_url('Consulta_Eventos');
			$config['total_rows'] = $data['cantidad'];
			$config['per_page']=4;
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
			$data['consulta']= $this->M_Evento->getPafinacion($config['per_page'],$this->uri->segment('2'));
			$data['pagination_n']=$this->pagination->create_links();
			$this->load->view('Evento/V_Query_Evento',$data);
  }
}
