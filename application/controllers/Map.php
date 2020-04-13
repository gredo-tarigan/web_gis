<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// Load library phpspreadsheet
require('./excel/vendor/autoload.php');

use PhpOffice\PhpSpreadsheet\Helper\Sample;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
// End load library phpspreadsheet

class Map extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('MapModel');
		$this->load->library('form_validation');
	}

	public function bangunan_json()
	{
		$data=$this->db->get('bangunan')->result();
		echo json_encode($data);
	}

	//<-Function which used in Map -> 
	public function addMarker(){
		$foto = $_FILES['l_foto'];
		if($foto == ''){

		}else{
			$config['upload_path']          = './assets/uploads/';
			$config['allowed_types']        = 'gif|jpg|png';
			
			$this->load->library('upload', $config);
			if ($this->upload->do_upload('l_foto')) {
				$foto = $this->upload->data("file_name");
			}else{
				echo "upload gagal";
			}
		}

		$data['bangunan_nama'] = $this->input->post('l_name');
		$data['bangunan_lat'] = $this->input->post('l_lat'); 
		$data['bangunan_long'] = $this->input->post('l_long');
		$data['keterangan'] = $this->input->post('l_info');
		$data['gambar'] = $foto;

		$result = $this->MapModel->addMarkers($data);
		if($result){
            echo '<script>alert("Region already added");</script>';
		    redirect('page/v_home');
		}else{
            echo '<script>alert("Region already added");</script>';
		    redirect('page/v_home');
		}
	}

	public function deleteMarker($bangunan_id){
        $result = $this->MapModel->deleteMarkers($bangunan_id);
		if($result){
            echo '<script>alert("Region already added");</script>';
		    redirect('page/v_home');
		}else{
            echo '<script>alert("Region already added");</script>';
		    redirect('page/v_home');
		}
	}

	public function updateMarker(){
		$foto = $_FILES['l_foto'];
		if($foto == ''){

		}else{
			$config['upload_path']          = './assets/uploads/';
			$config['allowed_types']        = 'gif|jpg|png';
			
			$this->load->library('upload', $config);
			if ($this->upload->do_upload('l_foto')) {
				$foto = $this->upload->data("file_name");
			}else{
				echo "upload gagal";
			}
		}

		$data['bangunan_id'] = $this->input->post('l_id');
		$data['bangunan_nama'] = $this->input->post('l_name');
		$data['bangunan_lat'] = $this->input->post('l_lat'); 
		$data['bangunan_long'] = $this->input->post('l_long');
		$data['keterangan'] = $this->input->post('l_info');
		$data['gambar'] = $foto;
		   
		$result = $this->MapModel->updateMarkers($data);
		if($result){
            $this->session->set_flashdata('success', 'Berhasil disimpan');
		    redirect('page/v_home');
		}else{
            echo '<script>alert("Region already added");</script>';
		    redirect('page/v_home'); 
		}
	}
	//<-Function which used in Map ->
	
	//<-Function which used in Landmark Page ->
	public function addMarker1(){
		$foto = $_FILES['l_foto'];
		if($foto == ''){

		}else{
			$config['upload_path']          = './assets/uploads/';
			$config['allowed_types']        = 'gif|jpg|png';
			
			$this->load->library('upload', $config);
			if ($this->upload->do_upload('l_foto')) {
				$foto = $this->upload->data("file_name");
			}else{
				echo "upload gagal";
			}
		}

		$data['bangunan_nama'] = $this->input->post('l_name');
		$data['bangunan_lat'] = $this->input->post('l_lat'); 
		$data['bangunan_long'] = $this->input->post('l_long');
		$data['keterangan'] = $this->input->post('l_info');
		$data['gambar'] = $foto;

		$result = $this->MapModel->addMarkers($data);
		if($result){
		    redirect('page/data_landmark');
		}else{
            echo '<script>alert("Region already added");</script>';
		    redirect('page/data_landmark');
		}
	}
	
	public function deleteByID(){
		$bangunan_id = $this->input->post('l_id');

        $result = $this->MapModel->deleteMarkers($bangunan_id);
		if($result){
            echo '<script>alert("Region already added");</script>';
		    redirect('page/data_landmark');
		}else{
            echo '<script>alert("Region already added");</script>';
		    redirect('page/data_landmark');
		}
	}

	public function deleteAll(){
        $result = $this->MapModel->deleteAll();
		if($result){
            echo '<script>alert("Region already added");</script>';
		    redirect('page/data_landmark');
		}else{
            echo '<script>alert("Region already added");</script>';
		    redirect('page/data_landmark');
		}
	}

	public function updateMarker1(){
		$foto = $_FILES['l_foto'];
		if($foto == ''){

		}else{
			$config['upload_path']          = './assets/uploads/';
			$config['allowed_types']        = 'gif|jpg|png';
			
			$this->load->library('upload', $config);
			if ($this->upload->do_upload('l_foto')) {
				$foto = $this->upload->data("file_name");
			}else{
				echo "upload gagal";
			}
		}

		$data['bangunan_id'] = $this->input->post('l_id');
		$data['bangunan_nama'] = $this->input->post('l_name');
		$data['bangunan_lat'] = $this->input->post('l_lat'); 
		$data['bangunan_long'] = $this->input->post('l_long');
		$data['keterangan'] = $this->input->post('l_info');
		$data['gambar'] = $foto;
		   
		$result = $this->MapModel->updateMarkers($data);
		if($result){
            $this->session->set_flashdata('success', 'Berhasil disimpan');
		    redirect('page/data_landmark');
		}else{
            echo '<script>alert("Region already added");</script>';
		    redirect('page/data_landmark');
		}
	}

	// Export ke excel
	public function export()
	{
		$data=$this->db->get('bangunan')->result();
		// Create new Spreadsheet object
		$spreadsheet = new Spreadsheet();

		// Set document properties
		$spreadsheet->getProperties()->setCreator('Rama - Abhin - Danar')
		->setLastModifiedBy('Rama')
		->setTitle('New Zealand GIS')
		->setSubject('New Zealand GIS Document')
		->setDescription('Test document for Office 2019 XLSX, generated using PHP classes.')
		->setKeywords('office 2019 openxml php')
		->setCategory('Test result file');

		// Add some data
		$spreadsheet->setActiveSheetIndex(0)
		->setCellValue('A1', 'No')
		->setCellValue('B1', 'Landmark ID')
		->setCellValue('C1', 'Landmark Name')
		->setCellValue('D1', 'Latitude')
		->setCellValue('E1', 'Longitude')
		->setCellValue('F1', 'Detail Information')
		;

		// Miscellaneous glyphs, UTF-8
		$i=2;
		$no=1; 
		
		foreach($data as $datas) {

		$spreadsheet->setActiveSheetIndex(0)
		->setCellValue('A'.$i, $no)
		->setCellValue('B'.$i, $datas->bangunan_id)
		->setCellValue('C'.$i, $datas->bangunan_nama)
		->setCellValue('D'.$i, $datas->bangunan_lat)
		->setCellValue('E'.$i, $datas->bangunan_long)
		->setCellValue('F'.$i, $datas->keterangan);

		$no++;
		$i++;
		}

		// Rename worksheet
		$spreadsheet->getActiveSheet()->setTitle('New Zealand '.date('d-m-Y H'));

		// Set active sheet index to the first sheet, so Excel opens this as the first sheet
		$spreadsheet->setActiveSheetIndex(0);

		// Redirect output to a client’s web browser (Xlsx)
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment;filename="New Zealand.xlsx"');
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
	//<-Function which used in Landmark Page ->
}