<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Invitado extends CI_Controller {

	public function __construct()
  {
    parent::__construct();
    if(!$this->session->userdata('login')){
     redirect(base_url());
   	}
  }

  public function loadForms(){
		$this->load->view('Invitado/V_Form_Invitado');
	}

   public function GuardarInvitado()
	{

            $da['codigo_invitado']=$this->input->post('txtcod');
			$da['nom_invitado']=$this->input->post('txtNom');
			$da['apat_inivtado']=$this->input->post('txtapat');
			$da['amat_invitado']=$this->input->post('txtamat');
			$da['fnaci_invitado']=$this->input->post('txtfNac');
			$da['edad_invitado']=$this->input->post('txtedad');
			$da['sexo_invitado']=$this->input->post('txtsexo');
			$da['estado_civil_i']=$this->input->post('txtcivil');
			$da['Lada_inivitado']=$this->input->post('txtlada');
			$da['telefono_inivtado']=$this->input->post('txttel');
			$da['movil_invitado']=$this->input->post('txtmovil');
			$da['email_invitado']=$this->input->post('txtemail');
			$da['domicilio_invitado']=$this->input->post('txtdom');
			$da['num_invitado']=$this->input->post('txtnum');
			$da['ciudad_invitado']=$this->input->post('txtciudad');
			$da['pais_invitado']=$this->input->post('txtpais');
			$da['iglesia']=$this->input->post('txtclas');

			$da['fecha_ingreso_mimebro']=date('Y') .'-'. date('m') . '-' . date('d') ;
			$da['hospedaje']=$this->input->post('txtminis');

			$config['upload_path'] = 'upload/invitados/';
			$config['allowed_types'] = 'gif|jpg|png';
			$this->load->library('upload', $config);
			if(!$this->upload->do_upload()){
					/*Si al subirse hay algún error lo meto en un array para pasárselo a la vista*/
							$error=array('error' => $this->upload->display_errors());
							if ($da['sexo_invitado']=="Mujer") {
									$da['nom_imagen']="mujer.png";
							}else if($da['sexo_invitado']=="Hombre"){
									$da['nom_imagen']="hombre.png";
							}
							$this->M_Registro->nuevo_miembro($da);

							redirect('C_Registro/consulta_miembros', 'refresh');
						echo $this->upload->display_errors();
						return;
			}else{
					//Datos del fichero subido
					$datosI["img"]=$this->upload->data();
					$da['nom_imagen']=$datosI["img"]["file_name"];
					$this->M_Registro->nuevo_invitado($da);
					redirect('C_Registro/consulta_invitado', 'refresh');
			}

	}

public function consulta_invitados()
  {
  		 $this->load->model('M_invitado');
  			$data['tipo']="invitados";
  			$data['cantidad']=$this->M_invitado->getNumInvitado();
			$this->load->library('pagination');
			$config['base_url'] =base_url('Consulta_Invitados');
			$config['total_rows'] = $this->M_invitado->getNumInvitado();
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
			$data['consulta']= $this->M_invitado->getPafinacion($config['per_page'],$this->uri->segment('2'));
			$data['pagination_n']=$this->pagination->create_links();
			$this->load->view('Invitado/V_Query_Invitado',$data);
  }
}
