<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_login extends CI_Controller {

	public function index()
	{
		
		if($this->session->userdata('login')){
		    redirect(base_url('Principal'));
		   }else{
		   	
		   	$this->load->view('V_login');
		   }
	}
	public function login()
	{	
		if(!$this->session->userdata('login')){

		     redirect(base_url());
		   }else{
		   	$this->load->view('V_Principal');
		   }
		
	}
	public function loging()
  {
  	$user=$this->input->post('user');
    $pass=$this->input->post('pass');
  	$this->load->model('M_login');
  	if ($user==null && $pass == null) {
  		redirect(base_url());
  	}else{
  		$fila=$this->M_login->user($user);
      if ($fila != null) {
        $con= $fila -> pass_usuario;
        if ($con == $pass) {
           $data['user']=$user;
           $data['id']=$fila-> id_usuario;
           $data['login']=true;
           $this->session->set_userdata($data);
         echo ' <blockquote style="color:#17a2b8;border-color:#17a2b8;">
			     <i class="fas fa-terminal"></i> Redireccionando a la página principal.
			     <div class="progress" >
     			 	<div class="indeterminate"></div>
  				 </div>
			    </blockquote>
			  ';
          
          echo "<script>setTimeout(function(){window.location.href='".base_url('Principal')."'},2000);</script>";

        }else{
          echo "<b style='color:#900C3F;'></b>";
          echo ' <blockquote style="color:#dc3545;border-color:#dc3545;">
			    	<i class="fas fa-terminal"></i> Contraseña incorrecta.
			    	<p style="font-size: 12px;">Porfavor verifique los datos para poder continuar.</p>
			    </blockquote>
			  ';
        }
      }else{
        echo ' <blockquote style="color:#dc3545; border-color:#dc3545;">
			    	<i class="fas fa-terminal"></i> Usuario inexistente.
			    	<p style="font-size: 12px;">Porfavor verifique los datos para poder continuar.</p>
			    </blockquote>
			  ';
      }
  	}
    
    
  }
  public function logOut(){
  	$this->session->sess_destroy();
  	redirect(base_url());
  }
}
