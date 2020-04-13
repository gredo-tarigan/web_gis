<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Page extends MY_Controller {

  public function __construct()
	{
    parent::__construct();
    $this->load->model('MapModel','MapModel');
    $this->load->model('UserModel','UserModel');
  }
  
  public function v_home(){
    $level = $this->session->userdata('level');
    if($level == 'admin'){
      $this->load->view('v_home');
    }
    else if($level == 'operator'){
      $this->load->view('v_home_operator');
    }
    else{
      $this->load->view('v_home_regular');
    }
  }

  public function update_landmark($id){
    $result = $this->MapModel->getbyID($id);

    $data['id'] = $result->bangunan_id;
    $data['name'] = $result->bangunan_nama;
    $data['lat'] = $result->bangunan_lat;
    $data['long'] = $result->bangunan_long;
    $data['info'] = $result->keterangan;

    $this->load->view('update_landmark', $data);
  }

  public function data_user(){
    $level = $this->session->userdata('level');
    $result = $this->UserModel->get();
    $data['user'] = $result;

    if($level == 'admin'){
    $this->load->view('data_user', $data);
    }
  }

  public function data_landmark(){
    $level = $this->session->userdata('level');
    $result = $this->MapModel->get();
    $data['landmark'] = $result;

    if($level == 'admin'){
      $this->load->view('data_landmark', $data);
    }
    else if($level == 'operator')
    {
      $this->load->view('data_landmark_operator', $data);
    }
  }

  public function profile(){
    $level = $this->session->userdata('level');
    $result = $this->UserModel->getbyID();
    $data['id'] = $result->id_user;
    $data['username'] = $result->username;
    $data['password'] = $result->password;
    $data['name'] = $result->name;
    $data['level'] = $result->level;

    if($level == 'regular'){
      $this->load->view('profile', $data);
    }
  }
}