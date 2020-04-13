<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Auth extends CI_Controller {
  public function __construct(){
    parent::__construct();
    $this->load->model('UserModel');
  }

  public function index(){
    if($this->session->userdata('authenticated')) // Jika user sudah login (Session authenticated ditemukan)
      redirect('page/v_home'); // Redirect ke page welcome
    else{
      redirect('home/login');
    }
  }

  public function login(){
    $username = $this->input->post('username'); // Ambil isi dari inputan username pada form login
    $password = md5($this->input->post('password')); // Ambil isi dari inputan password pada form login dan encrypt dengan md5 md5($this->input->post('password'));
    $user = $this->UserModel->getbyUsername($username); // Panggil fungsi get yang ada di UserModel.php
    if(empty($user)){ // Jika hasilnya kosong / user tidak ditemukan
      $this->session->set_flashdata('message', 'Username tidak ditemukan'); // Buat session flashdata
      redirect('auth'); // Redirect ke halaman login
    }else{
      if($password == $user->password){ // Jika password yang diinput sama dengan password yang didatabase
        $session = array(
          'authenticated'=>true, // Buat session authenticated dengan value true
          'id'=>$user->id_user,
          'username'=>$user->username,  // Buat session username
          'nama'=>$user->name, // Buat sesfsion authenticated
          'level'=>$user->level
        );
        $this->session->set_userdata($session); // Buat session sesuai $session
          
        redirect('page/v_home'); // Redirect ke halaman welcome
      }else{
        $this->session->set_flashdata('message', 'Password salah'); // Buat session flashdata
        redirect('auth'); // Redirect ke halaman login
      }
    }
  }

  public function register(){
    $data['username'] = $this->input->post('username');
    $data['password'] = md5($this->input->post('password')); 
    $data['name'] = $this->input->post('name');
    
    $result = $this->UserModel->register($data);
    if($result){
        echo '<script language="javascript">alert("Success!")</script>';
        redirect('auth'); // Redirect ke halaman login
    }else{
        echo '<script language="javascript">alert("Failed!")</script>';
        redirect('home/register'); // Redirect ke halaman register
    }
  }
  
  public function logout(){
    $this->session->sess_destroy(); // Hapus semua session
    redirect('auth'); // Redirect ke halaman login
  }
}