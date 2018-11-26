<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Miembro extends CI_Controller {

	/**public function __construct()
  	{
	    parent::__construct();
	    if(!$this->session->userdata('login')){
	     redirect(base_url());
	   	}else{
	   		$this->load->model('M_Miembro');
	   		$this->load->model('M_Ministerio');
	   	}
  }**/

	public function index()
	{
		$this->load->view('Miembro/V_QueryMiembro');
	}
	public function loadForms(){
		$this->load->model('M_Ministerio');
		$data['consulta']=$this->M_Ministerio->getMinisterios();
		$this->load->view('Miembro/V_Form_Miembro',$data);
	}
	public function loadModal($value='')
  {
  		$this->load->model('M_Miembro');
		$data['consulta']=$this->M_Miembro->get_miembro($value);
		$this->load->view('Miembro/V_Modal_Miembro',$data);
  }

	 public function consulta_miembros()
  {
  		 $this->load->model('M_Miembro');
  			$data['tipo']="miembros";
  			$data['cantidad']=$this->M_Miembro->getNumMiembros();
			$this->load->library('pagination');
			$config['base_url'] =base_url('Consulta_Miembros');
			$config['total_rows'] = $this->M_Miembro->getNumMiembros();
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
			$data['consulta']= $this->M_Miembro->getPafinacion($config['per_page'],$this->uri->segment('2'));
			$data['pagination_n']=$this->pagination->create_links();
			$this->load->view('Miembro/V_QueryMiembro',$data);
  }
  public function GuardarMiembro()
	{

			$da['codigo_miembro']=$this->input->post('codigo_miembro');
			$da['nom_miembro']=$this->input->post('nom_miembro');
			$da['apat_miembro']=$this->input->post('apat_miembro');
			$da['amat_miembro']=$this->input->post('amat_miembro');
			$da['fnaci_miembro']=$this->input->post('fnaci_miembro');
			$da['edad_miembro']=$this->input->post('edad_miembro');
			$da['sexo_miembro']=$this->input->post('sexo_miembro');
			$da['estado_civil_m']=$this->input->post('estado_civil_m');
			$da['Estado_miembro']=$this->input->post('Estado_miembro');
			$da['colonia_m']=$this->input->post('colonia_m');
			$da['cp_m']=$this->input->post('cp_m');
			$da['Lada_miembro']=$this->input->post('Lada_miembro');
			$da['telefono_miembro']=$this->input->post('telefono_miembro');
			$da['movil_miembro']=$this->input->post('movil_miembro');
			$da['email_miembro']=$this->input->post('email_miembro');
			$da['domicilio_miembro']=$this->input->post('domicilio_miembro');
			$da['num_miembro']=$this->input->post('num_miembro');
			$da['ciudad_miembro']=$this->input->post('ciudad_miembro');
			$da['pais_miembro']=$this->input->post('pais_miembro');
			$da['Clasificacion_miembro']=$this->input->post('Clasificacion_miembro');
			$info['id_min']=$this->input->post('Ministerio_miembro');
			$info['tech']=0;
			if ($info['id_min']==null) {
				# code...
				$info['query']=$this->M_Ministerio->getNomMinisteriosById($info['tech']);
			}
			else{
				$info['query']=$this->M_Ministerio->getNomMinisteriosById($info['id_min']);
			}

			
			
			$ParaMinisterio['id_ministerio']=$info['id_min'];
			$da['Ministerio_miembro']=$info['query'];
			$da['fecha_ingreso_mimebro']=date('Y') .'-'. date('m') . '-' . date('d') ;

			$config['upload_path'] = 'upload/miembros/';
			$config['allowed_types'] = 'gif|jpg|png';
			$this->load->library('upload', $config);
			if(!$this->upload->do_upload()){
					/*Si al subirse hay algún error lo meto en un array para pasárselo a la vista*/
							$error=array('error' => $this->upload->display_errors());
							if ($da['sexo_miembro']=="Mujer") {
									$da['nom_imagen']="mujer.png";
							}else if($da['sexo_miembro']=="Hombre"){
									$da['nom_imagen']="hombre.png";
							}
							$this->M_Miembro->nuevo_miembro($da);
							if ($ParaMinisterio['id_ministerio']!=null) {
								# code...
								$ParaMinisterio['id_miembro']=$this->M_Miembro->getMaxId();
								$this->M_Ministerio->asignarMinisterio($ParaMinisterio);
							}
							
							redirect('Consulta_Miembros', 'refresh');

			}else{
					//Datos del fichero subido
					$datosI["img"]=$this->upload->data();
					$da['nom_imagen']=$datosI["img"]["file_name"];
					$this->M_Miembro->nuevo_miembro($da);
					if ($ParaMinisterio['id_ministerio']!=null) {
								# code...
								$ParaMinisterio['id_miembro']=$this->M_Miembro->getMaxId();
								$this->M_Ministerio->asignarMinisterio($ParaMinisterio);
							}
					redirect('Consulta_Miembros', 'refresh');
			}

  }
  public function loadBusqueda()
  {
  	$this->load->view('Menus/V_Buscar');
  }

   public function Busquedad()
  {
  			$this->load->model('M_Miembro');
  			$busq['ti']=$this->input->post('type');
  			$busq['bus']=$this->input->post('busqueda');
  			$data['cantidad']=$this->M_Miembro->cantidadNombres($busq['bus'],$busq['ti']);
  			$data['consulta']=$this->M_Miembro->busqueda($busq['bus'],$busq['ti']);
  			$this->load->view('Miembro/V_Busqueda_Miembro',$data);	
  }


  public function hs781sfa1bsdf56bg4ef54bge56r4g89er4($value='')
  {
  	$this->load->model('M_Miembro');
  	$data['consulta']=$this->M_Miembro->get_miembro($value);
  	$this->load->view('Miembro/V_Busqueda_Miembro2',$data);	
  }
}
