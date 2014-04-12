<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sistema extends CI_Controller {

	public function index()
	{
		if($this->input->post('senha')){
			$data['senha'] = $this->input->post('senha'); 
			if(!empty($senha_anterior))
				$senha_anterior[]= $this->input->post('senha');  
			else
				$senha_anterior[] = $this->input->post('senha'); 

		}else{
			$data['senha'] = "****";
		}

		$this->load->model('promocao_model');
		$data['promocao'] = $this->promocao_model->listar()->result();
		$this->load->view('sistema',$data);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */