<?php

class promocao_model extends CI_Model {
    
    public function __construct() {
        parent::__construct();
    }
    
     
    
    public function cadastrar($dados){       
        
        if($this->db->insert('promocao', $dados)){
            return true;
        }
        else {
            return false;
        }
    }
    
    public function listar(){
        $query = $this->db->get('promocao');
        return $query;
    }
    
    public function deletar($banner_id) {
        
        $id = $this->session->userdata('admin');
        
        if($this->db->delete('promocao', array('banner_id' => $banner_id))){
            return true;
        }
        else{           
            return false;
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