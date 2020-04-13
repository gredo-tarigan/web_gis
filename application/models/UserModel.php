<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class UserModel extends CI_Model {
    
    public function get(){
        $result = $this->db->get('user')->result();
        return $result;
    }

    public function getbyUsername($username){
        $this->db->where(['username' => $username]);
        $result = $this->db->get('user')->row();
        return $result;
    }

    public function getbyID(){
        $id = $this->session->userdata('id');
        $this->db->where(['id_user' => $id]);
        $result = $this->db->get('user')->row();
        return $result;
    }

    public function addUser($data){
        $result = $this->db->insert('user',$data);
        return $result;
    }

    public function updateUser($data){
        $result = $this->db->update('user', $data, array('id_user' => $data['id_user']));
        return $result;
    }

    public function deleteUser($id){
        $result = $this->db->delete('user', array('id_user' => $id)); 
        return $result;
    }

    public function deleteAll(){
        $result = $this->db->truncate('user'); 
        return $result;
    }

    public function register($data)
    {
        $result = $this->db->insert('user',$data);
        return $result;
    }
}