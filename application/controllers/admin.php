<?php 

class admin extends CI_Controller {
    
    var $data;
    
    public function __construct() {
        parent::__construct();
    }
    
    public function index () {
        $this->data['css'] = 'login.css';
        
        if($_POST) {
            
            #Carregando a Model
            $this->load->model('admin_model');
            
            #Verificando o Login
            if ($this->admin_model->login($this->input->post('usuario'), $this->input->post('senha'))){
                redirect('painel');
            } else {
                $this->data['erro'] = "Usuário ou Senha inválido.";
            }
        }
        
        $this->load->view('admin/v_admin', $this->data);

    }
    
    public function sair (){
        $this->session->sess_destroy();
        redirect('admin');
    }
    
    public function cadastrar(){
        
        if($_POST){
            $this->load->model('admin_model');
        
            if($this->admin_model->verificaPermissao()){
                
                #Tratando a permissão
                if($this->input->post('permissao') == "sim")
                    $permissao = 1;
                else
                    $permissao = 0;
                
                #Gravando as informações do Administrador
                $this->load->library('encrypt');
                $dados = array(
                    'usuario' => $this->input->post('usuario'),
                    'senha' => $this->input->post('senha'),
                    'permissao' => $permissao
                );
                
                #Cadastrando!
                if ($this->admin_model->cadastrar($dados)){
                    $this->data['mensagem'] = "Administrador cadastrado com sucesso!";
                    $this->load->view('admin/v_cadastrarAdmin', $this->data);
                } else {
                    $this->data['erro'] = "Administrador com este nome de usuário, já cadastrado!";
                    $this->load->view('admin/v_cadastrarAdmin', $this->data);
                }
            }
            else{
                $this->data['erro'] = "Você não possui permissões administrativas";
                $this->load->view('admin/v_cadastrarAdmin', $this->data);
            }
        }
        else{
            $this->load->view('admin/v_cadastrarAdmin', $this->data);
        }
    }
    
    public function listar(){
        $this->load->model('admin_model');
        $this->data['query'] = $this->admin_model->listar();
        $this->load->view('admin/v_listarAdministradores', $this->data);
    }
    
    public function deletar($id_admin) {
        $this->load->model('admin_model');
        
        if($this->admin_model->deletar($id_admin)){
            $this->data['mensagem'] = "Administrador removido com sucesso!";
            $this->listar();
        }
        else{
            $this->data['erro'] = "Você não pode remover o seu cargo  de administrador!";
            $this->listar();
        }
    }
    
    public function mostrarEditar($id) {
        $this->load->model('admin_model');
        $data['query'] = $this->admin_model->buscaId($id);
        $this->load->view('admin/v_editarAdmin', $data);
    }
    
    public function editar($id_palavra){
        $this->load->model('admin_model');
        //$this->load->library('encrypt');
         if($_POST){
            
            $dados = array(    
                'usuario' => $this->input->post('usuario'),
                'senha' => $this->input->post('senha'),
                'permissao' => $this->input->post('permissao')
            );
            
            if($this->admin_model->editaAdmin($dados, $id_palavra)) {
                $this->data['mensagem'] = "Informações alteradas com sucesso!";
                $this->listar();
            }
        }
    }
    
}
