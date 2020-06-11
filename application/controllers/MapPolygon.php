<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// Load library phpspreadsheet
require('./excel/vendor/autoload.php');

use PhpOffice\PhpSpreadsheet\Helper\Sample;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
// End load library phpspreadsheet

class MapPolygon extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('MapPolygonModel');
		$this->load->library('form_validation');
		$this->load->library('pdf');
	}

	public function getPolygon(){
		$data=$this->db->get('bangunan_polygon')->result();
		echo json_encode($data);
	}

    //<-Function which used in Map -> 
	public function addPolygon(){
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

		$data['name_polygon'] = $this->input->post('l_name');
		$data["coordinates"] = $this->input->post('coordinates');
		$data['information'] = $this->input->post('l_info');
		$data['photo'] = $foto;

		$result = $this->MapPolygonModel->addPolygon($data);
		if($result){
            echo '<script>alert("Region already added");</script>';
		    redirect('page/v_home');
		}else{
            echo '<script>alert("Region already added");</script>';
		    redirect('page/v_home');
		}
	}

	public function deletePolygon($polygon_id){
        $result = $this->MapPolygonModel->deletePolygon($polygon_id);
		if($result){
            echo '<script>alert("Region already added");</script>';
		    redirect('page/v_home');
		}else{
            echo '<script>alert("Region already added");</script>';
		    redirect('page/v_home');
		}
	}

	public function updatePolygon(){
        $foto = $_FILES['l_foto'];
		if($foto['name'] == ''){
			$data['id_polygon'] = $this->input->post('l_id');
			$data['name_polygon'] = $this->input->post('l_name');
			$data["coordinates"] = $this->input->post('coordinates');
			$data['information'] = $this->input->post('l_info');
			   
			$result = $this->MapPolygonModel->updatePolygon($data);
			if($result){
				$this->session->set_flashdata('success', 'Berhasil disimpan');
				redirect('page/v_home');
			}else{
				echo '<script>alert("Region already added");</script>';
				redirect('page/v_home'); 
			}

		}else{
			$config['upload_path']          = './assets/uploads/';
			$config['allowed_types']        = 'gif|jpg|png';
			
			$this->load->library('upload', $config);
			if ($this->upload->do_upload('l_foto')) {
				$foto = $this->upload->data("file_name");
			}else{
				echo "upload gagal";
			}

			$data['id_polygon'] = $this->input->post('l_id');
			$data['name_polygon'] = $this->input->post('l_name');
			$data["coordinates"] = $this->input->post('coordinates');
			$data['information'] = $this->input->post('l_info');
			$data['photo'] = $foto;
			   
			$result = $this->MapPolygonModel->updatePolygon($data);
			if($result){
				$this->session->set_flashdata('success', 'Berhasil disimpan');
				redirect('page/v_home');
			}else{
				echo '<script>alert("Region already added");</script>';
				redirect('page/v_home'); 
			}
		}
	}
	//<-Function which used in Map ->
	
	//<-Function which used in Polygon Page ->
	public function addPolygon1(){
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

		$data['name_polygon'] = $this->input->post('l_name');
		$data["coordinates"] = $this->input->post('coordinates');
		$data['information'] = $this->input->post('l_info');
		$data['photo'] = $foto;

		$result = $this->MapPolygonModel->addPolygon($data);
		if($result){
		    redirect('page/data_landmark_polygon');
		}else{
            echo '<script>alert("Region already added");</script>';
		    redirect('page/data_landmark_polygon');
		}
	}
	
	public function deleteByID(){
		$polygon_id = $this->input->post('l_id');

        $result = $this->MapPolygonModel->deletePolygon($polygon_id);
		if($result){
            echo '<script>alert("Region already added");</script>';
		    redirect('page/data_landmark_polygon');
		}else{
            echo '<script>alert("Region already added");</script>';
		    redirect('page/data_landmark_polygon');
		}
	}

	public function deleteAll(){
        $result = $this->MapPolygonModel->deleteAll();
		if($result){
            echo '<script>alert("Region already added");</script>';
		    redirect('page/data_landmark_polygon');
		}else{
            echo '<script>alert("Region already added");</script>';
		    redirect('page/data_landmark_polygon_polygon');
		}
	}

	public function updatePolygon1(){
        $foto = $_FILES['l_foto'];
		if($foto['name'] == ''){
			$data['id_polygon'] = $this->input->post('l_id');
			$data['name_polygon'] = $this->input->post('l_name');
			$data["coordinates"] = $this->input->post('coordinates');
			$data['information'] = $this->input->post('l_info');
			   
			$result = $this->MapPolygonModel->updatePolygon($data);
			if($result){
				$this->session->set_flashdata('success', 'Berhasil disimpan');
				redirect('page/data_landmark_polygon');
			}else{
				echo '<script>alert("Region already added");</script>';
				redirect('page/data_landmark_polygon'); 
			}

		}else{
			$config['upload_path']          = './assets/uploads/';
			$config['allowed_types']        = 'gif|jpg|png';
			
			$this->load->library('upload', $config);
			if ($this->upload->do_upload('l_foto')) {
				$foto = $this->upload->data("file_name");
			}else{
				echo "upload gagal";
			}

			$data['id_polygon'] = $this->input->post('l_id');
			$data['name_polygon'] = $this->input->post('l_name');
			$data["coordinates"] = $this->input->post('coordinates');
			$data['information'] = $this->input->post('l_info');
			$data['photo'] = $foto;
			   
			$result = $this->MapPolygonModel->updatePolygon($data);
			if($result){
				$this->session->set_flashdata('success', 'Berhasil disimpan');
				redirect('page/data_landmark_polygon');
			}else{
				echo '<script>alert("Region already added");</script>';
				redirect('page/data_landmark_polygon'); 
			}
		}
	}

	// Export ke excel
	public function export()
	{
		$data=$this->db->get('bangunan_polygon')->result();
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
		->setCellValue('B1', 'Polygon ID')
		->setCellValue('C1', 'Polygon Name')
		->setCellValue('D1', 'Coordinates')
		->setCellValue('E1', 'Detail Information')
		->setCellValue('F1', 'Photo')
		;

		// Miscellaneous glyphs, UTF-8
		$i=2;
		$no=1; 
		
		foreach($data as $datas) {

		$spreadsheet->setActiveSheetIndex(0)
		->setCellValue('A'.$i, $no)
		->setCellValue('B'.$i, $datas->id_polygon)
		->setCellValue('C'.$i, $datas->name_polygon)
		->setCellValue('D'.$i, $datas->coordinates)
		->setCellValue('E'.$i, $datas->information)
		->setCellValue('F'.$i, $datas->photo);

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

	function exportPDF(){
		$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
        $pdf->setPrintFooter(false);
        $pdf->setPrintHeader(false);
        $pdf->SetAutoPageBreak(true, PDF_MARGIN_BOTTOM);
        $pdf->AddPage('');
        $pdf->Write(0, 'New Zealand Polygon', '', 0, 'L', true, 0, false, false, 0);
        $pdf->SetFont('');
		
		$data = $this->db->get('bangunan_polygon')->result();

		$html = '
		<html>
			<head>
				<style>
				table, th, td {
				border: 1px solid black;
				}
				</style>
			</head>
			<body>
				<table>
				<tr>
					<th>Id Polygon</th>
					<th>Name</th>
					<th>Coordinates</th>
					<th>Detail Information</th>
					<th>Photo</th>
				</tr>
		';

		foreach($data as $landmarks) {
			$html .= '
			<tr>
				<td>'. $landmarks->id_polygon .'</td>
				<td>'. $landmarks->name_polygon .'</td>
				<td>'. $landmarks->coordinates .'</td>
				<td>'. $landmarks->information .'</td>
				<td><img src="./assets/uploads/'. $landmarks->photo .'" alt="maptime logo gif" width="100px" height="70px"/></td>
			</tr>';
		}
		
		$html .= '</table>
			</body>
		</html>
		';
		$pdf->writeHTML($html, true, false, true, false, '');
		
        $pdf->Output('Nez-Zealand-Polygon.pdf', 'I');
    }
	//<-Function which used in Landmark Page ->
}