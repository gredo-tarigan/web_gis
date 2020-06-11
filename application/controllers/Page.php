<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Page extends MY_Controller {

  public function __construct()
	{
    parent::__construct();
    $this->load->model('MapModel','MapModel');
    $this->load->model('MapPolygonModel','MapPolygonModel');
    $this->load->model('UserModel','UserModel');
  }

  public function v_home(){
    $level = $this->session->userdata('level');
    $result = $this->UserModel->get();

    $data['user'] = $result;

    if($level == 'admin'){
      $this->load->view('v_home', $data);
    }
    else if($level == 'operator'){
      $this->load->view('v_home_operator', $data);
    }
    else{
      $this->load->view('v_home_regular', $data);
    }
  }

  public function update_landmark($id){
    $result = $this->MapModel->getbyID($id);

    $data['id'] = $result->bangunan_id;
    $data['name'] = $result->bangunan_nama;
    $data['lat'] = $result->bangunan_lat;
    $data['long'] = $result->bangunan_long;
    $data['info'] = $result->keterangan;
    $data['photo'] = $result->gambar;

    $this->load->view('update_landmark', $data);
  }

  public function update_landmark_polygon($id){
    $result = $this->MapPolygonModel->getbyID($id);

    $data['id'] = $result->id_polygon;
    $data['name'] = $result->name_polygon;
    $data['coordinates'] = $result->coordinates;
    $data['info'] = $result->information;
    $data['photo'] = $result->photo;

    $this->load->view('update_landmark_polygon', $data);
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

  public function data_landmark_polygon(){
    $level = $this->session->userdata('level');
    $result = $this->MapPolygonModel->get();
    $data['landmark'] = $result;

    if($level == 'admin'){
      $this->load->view('data_landmark_polygon', $data);
    }
    else if($level == 'operator')
    {
      $this->load->view('data_landmark_polygon_operator', $data);
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
