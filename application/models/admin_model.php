<?php

class admin_model extends CI_Model {
    
    public function __construct() {
        parent::__construct();
    }
    
     public function login ($usuario, $senha){
        $where['usuario'] = $usuario;
        $query = $this->db->get_where('admin', $where);
        
        if($query->num_rows){
            $this->load->library('encrypt');
            $dados_usuario = $query->row();
            
            if($this->encrypt->decode($dados_usuario->senha) == $senha){
                $this->set_session_data($dados_usuario);
                return true;   
            }
            else {
                return false;
            }
        } else{
            return false;
        }   
     }
     
     private function set_session_data($dados_usuario){
        $dados = array('id' => $dados_usuario->id, 'usuario' => $dados_usuario->usuario, 'permissao' => $dados_usuario->permissao);
        $this->session->set_userdata('admin', $dados);
    }
    
    public function verificaPermissao(){
        #Verificando se tem a permissão de adicionar adminsitradores
        $dados = $this->session->userdata('admin');
        
        if($dados['permissao'] == 1){
            return true;
        }
        else{
            return false;
        }
    }
    
    public function cadastrar($dados){       
        
        #Verificação se já existe algum admin com aquele usuario cadastrado.
        $query = $this->db->get_where('admin', array('usuario' => $dados['usuario']));
        
        if($query->num_rows()){
            return false;
        }
        else {
            $this->db->insert('admin', $dados); 
            return true;
        }
    }
    
    public function listar(){
        $query = $this->db->get('admin');
        return $query;
    }
    
    public function deletar($id_admin) {
        
        $id = $this->session->userdata('admin');
        
        if($id_admin == $id['id']){
            return false;
        }
        else{
            $this->db->delete('admin', array('id' => $id_admin));
            return true;
        }
    }
    
    
    public function buscaId($id){
        return $this->db->get_where('admin', array('id'=> $id));
    }
    
    public function editaAdmin($dados, $id_admin){
        $this->db->update('admin', $dados, array('id' => $id_admin));
        return true;
    }
}