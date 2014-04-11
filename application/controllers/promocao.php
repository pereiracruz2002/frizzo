<?php 

class promocao extends CI_Controller {
    
    var $data;
    
    public function __construct() {
        parent::__construct();
    }
    
    public function index () {
        $this->data['css'] = 'login.css';
        
        $this->load->view('admin/v_promocao', $this->data);

    }
    

    
    public function cadastrar(){
        
        if($this->input->post()){
            $this->load->model('promocao_model');
            $this->load->model('admin_model');
        
            if($this->admin_model->verificaPermissao()){
                
              
                    $savePromocao = $this->input->post();
                
                #Cadastrando!
                if ($this->promocao_model->cadastrar($savePromocao)){
                    $banner_id = $this->promocao_model->cadastrar($savePromocao);
                    $this->uploadImagem($banner_id);
                    $this->data['mensagem'] = "Promoção cadastrado com sucesso!";
                    $this->load->view('v_cadastrarPromocao', $this->data);
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
            $this->load->view('admin/v_cadastrarPromocao', $this->data);
        }

    }
    
    public function listar(){
        $this->load->model('promocao_model');
        $this->data['query'] = $this->promocao_model->listar();
        $this->load->view('admin/v_listarPromocao', $this->data);
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


    public function uploadImagem($promocao_id) 
    {
        $this->load->model('promocao_model','promocao');
        $save['promocao_id'] = $this->uploads();
        if($save['promocao_id']){
          $save['promocao_id'] = $promocao_id;
          $this->data['imagem_produto_id'] = $this->produto->novaImagem($save);
        }
        
        $this->load->view('produtos/upload_imagens', $this->data);
    }

    public function uploads()
    {
        $this->load->model('promocao_model', 'promocao');

        $config['upload_path'] = base_url().'../uploads/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '100000';
        $config['max_width']  = '263';
        $config['max_height']  = '191';
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('imagem')){
            return false;
        }else{
            $this->upload_data = $this->upload->data();
            $this->data['item']['imagem_id'] = $this->imagem->save($dados);
            return $this->data['item']['imagem_id'];
        }
    }
    
}
