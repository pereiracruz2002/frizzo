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
        
        if($_POST){
            $this->load->model('promocao_model');
            $this->load->model('admin_model');
        
            if($this->admin_model->verificaPermissao()){
                    
                    $dados = array(
                    'nome' => $this->input->post('nome'),
                    'link' => $this->input->post('link'),
                    'ativo' => $this->input->post('ativo')
                );

                #Cadastrando!
                if ($this->promocao_model->cadastrar($dados)){
                    $id = $this->db->insert_id();
                    $this->uploadImagem($id);
                    $this->data['mensagem'] = "Promoção cadastrado com sucesso!";
                    $this->load->view('admin/v_cadastrarPromocao', $this->data);
                } else {
                    $this->data['erro'] = "Falha ao cadastrar esta promoção!";
                    $this->load->view('admin/v_cadastrarPromocao', $this->data);
                }
            }
            else{
                $this->data['erro'] = "Você não possui permissões administrativas";
                $this->load->view('admin/v_cadastrarPromocao', $this->data);
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
    
    public function deletar($promocao_id) {
        $this->load->model('promocao_model');
        
        if($this->promocao_model->deletar($promocao_id)){
            $this->data['mensagem'] = "Promoção removida com sucesso!";
            $this->listar();
        }
        else{
            $this->data['erro'] = "Você não pode remover a imagem!";
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
        $name = $this->uploads();
        if($name){
            $data = array(
               'src' => $name["file_name"]
            );
        $this->db->where('banner_id', $promocao_id);
        $this->db->update('promocao', $data); 
        }
        
        //$this->load->view('produtos/upload_imagens', $this->data);
    }

    public function uploads()
    {
        $this->load->model('promocao_model', 'promocao');

        $config['upload_path'] = 'uploads/';
        $config['allowed_types'] = 'gif|jpg|png';
        //$config['max_size'] = '100000';
        //$config['max_width']  = '800';
        //$config['max_height']  = '600';
        $data['upload_data'] = '';
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('imagem')){
             $data = array('msg' => $this->upload->display_errors());
             var_dump($data);
            exit();
            return false;
        }else{
            return $data['upload_data'] = $this->upload->data();
        }
    }
    
}
