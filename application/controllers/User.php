<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// Load library phpspreadsheet
require('./excel/vendor/autoload.php');

use PhpOffice\PhpSpreadsheet\Helper\Sample;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
// End load library phpspreadsheet

class User extends CI_Controller {

	public function __construct()
	{
        parent::__construct();
		$this->load->model('UserModel');
	}
	
	//<-Function which used in User Page ->
	public function addUser(){
		$data['username'] = $this->input->post('u_username'); 
		$data['password'] = md5($this->input->post('u_password'));
        $data['name'] = $this->input->post('u_name');
        $data['level'] = $this->input->post('u_level');

		$result = $this->UserModel->addUser($data);
		if($result){
		    redirect('page/data_user');
		}else{
		    redirect('page/data_user');
		}
	}
	
	public function deleteByID(){
		$user_id = $this->input->post('u_id');

        $result = $this->UserModel->deleteUser($user_id);
		if($result){
		    redirect('page/data_user');
		}else{
		    redirect('page/data_user');
		}
	}

	public function deleteAll(){
        $result = $this->UserModel->deleteAll();
		if($result){
            echo '<script>alert("Region already added");</script>';
		    redirect('page/data_user');
		}else{
            echo '<script>alert("Region already added");</script>';
		    redirect('page/data_user');
		}
	}

	public function updateUser(){
		$data['id_user'] = $this->input->post('u_id');
		$data['username'] = $this->input->post('u_username'); 
		$data['password'] = md5($this->input->post('u_password'));
        $data['name'] = $this->input->post('u_name');
        $data['level'] = $this->input->post('u_level');
		   
		$result = $this->UserModel->updateUser($data);
		$level = $this->session->userdata('level');

		if($result){
			$this->session->set_flashdata('success', 'Berhasil disimpan');
			if($level == 'admin'){
			  redirect('page/data_user');
			}
			else if($level == 'regular'){
			  redirect('page/profile');
			}

		}else{
		    redirect('page/data_user');
		}
	}

		// Export ke excel
		public function export()
		{
			$data=$this->db->get('user')->result();
			// Create new Spreadsheet object
			$spreadsheet = new Spreadsheet();
	
			// Set document properties
			$spreadsheet->getProperties()->setCreator('Rama - Abhin - Danar')
			->setLastModifiedBy('Rama')
			->setTitle('User Document')
			->setSubject('User Document')
			->setDescription('Test document for Office 2019 XLSX, generated using PHP classes.')
			->setKeywords('office 2019 openxml php')
			->setCategory('Test result file');
	
			// Add some data
			$spreadsheet->setActiveSheetIndex(0)
			->setCellValue('A1', 'No')
			->setCellValue('B1', 'User ID')
			->setCellValue('C1', 'Name')
			->setCellValue('D1', 'Username')
			->setCellValue('E1', 'Password')
			->setCellValue('F1', 'Level')
			;
	
			// Miscellaneous glyphs, UTF-8
			$i=2;
			$no=1; 
			
			foreach($data as $datas) {
	
			$spreadsheet->setActiveSheetIndex(0)
			->setCellValue('A'.$i, $no)
			->setCellValue('B'.$i, $datas->id_user)
			->setCellValue('C'.$i, $datas->name)
			->setCellValue('D'.$i, $datas->username)
			->setCellValue('E'.$i, $datas->password)
			->setCellValue('F'.$i, $datas->level);
	
			$no++;
			$i++;
			}
	
			// Rename worksheet
			$spreadsheet->getActiveSheet()->setTitle('User '.date('d-m-Y H'));
	
			// Set active sheet index to the first sheet, so Excel opens this as the first sheet
			$spreadsheet->setActiveSheetIndex(0);
	
			// Redirect output to a client’s web browser (Xlsx)
			header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
			header('Content-Disposition: attachment;filename="User.xlsx"');
			header('Cache-Control: max-age=0');
			// If you're serving to IE 9, then the following may be needed
			header('Cache-Control: max-age=1');
	
			// If you're serving to IE over SSL, then the following may be needed
			header('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
			header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT'); // always modified
			header('Cache-Control: cache, must-revalidate'); // HTTP/1.1
			header('Pragma: public'); // HTTP/1.0
	
			$writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
			$writer->save('php://output');
			exit;
		}

	//<-Function which used in User Page ->
}