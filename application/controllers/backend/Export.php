<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Worksheet\PageSetup;

class Export extends Backend_Controller{

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function __construct()
	{
			parent::__construct();
			//$this->load->model('Export_model');

			
	}

	public function index()
	{
			$id_event= $this->session->id_event;
			$id_role= $this->session->id_role;
			$data = array(	'title'		=> 'Dashboard',
							'data_tamu' => $this->M_main->data_tamu($id_event,$id_role),
							'data_tamu_row' => $this->M_main->data_tamu_row($id_event,$id_role),
							'data_event'=> $this->M_main->data_event($id_event,$id_role),
							'data_template_pesan'=> $this->M_main->data_pesan($id_event,$id_role),
							'calc_jml_undangan'=> $this->M_main->calc_jml_undangan($id_event,$id_role),
							'calc_undangan_hadir'=> $this->M_main->calc_undangan_hadir($id_event,$id_role),
							'calc_jml_tamu'=> $this->M_main->calc_jml_tamu($id_event,$id_role),
							'calc_tamu_hadir'=> $this->M_main->calc_tamu_hadir($id_event,$id_role),
							'calc_jml_sovenir'=> $this->M_main->calc_jml_sovenir($id_event,$id_role),
							'content' 	=> 'backend/dashboard/export');
			//var_dump($data['calc_undangan_hadir']);
			$this->load->view('backend/layouts/wrapper', $data);	
			
	}

	
	public function export(){

	// 	$id_event= $this->session->id_event;
	// 	$id_role= $this->session->id_role;
	// 	$username= $this->session->username;
		// Load PhpSpreadsheet
		$excel = new Spreadsheet();
		// Settingan awal fil excel
		$excel->getProperties()->setCreator('dgsign.id')
					 ->setLastModifiedBy('dgsign.id')
					 ->setTitle("Dgsign Data")
					 ->setSubject("Export Data")
					 ->setDescription("Data Tamu")
					 ->setKeywords("Data tamu");
		// Buat sebuah variabel untuk menampung pengaturan style dari header tabel
		$style_col = array(
		  'font' => array('bold' => true), // Set font nya jadi bold
		  'alignment' => array(
			'horizontal' => Alignment::HORIZONTAL_CENTER, // Set text jadi ditengah secara horizontal (center)
			'vertical' => Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
		  ),
		  'borders' => array(
			'top' => array('style'  => Border::BORDER_THIN), // Set border top dengan garis tipis
			'right' => array('style'  => Border::BORDER_THIN),  // Set border right dengan garis tipis
			'bottom' => array('style'  => Border::BORDER_THIN), // Set border bottom dengan garis tipis
			'left' => array('style'  => Border::BORDER_THIN) // Set border left dengan garis tipis
		  )
		);
		// Buat sebuah variabel untuk menampung pengaturan style dari isi tabel
		$style_row = array(
		  'alignment' => array(
			'vertical' => Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
		  ),
		  'borders' => array(
			'top' => array('style'  => Border::BORDER_THIN), // Set border top dengan garis tipis
			'right' => array('style'  => Border::BORDER_THIN),  // Set border right dengan garis tipis
			'bottom' => array('style'  => Border::BORDER_THIN), // Set border bottom dengan garis tipis
			'left' => array('style'  => Border::BORDER_THIN) // Set border left dengan garis tipis
		  )
		);
		$excel->setActiveSheetIndex(0)->setCellValue('A1', "DGSIGN EXEPORT DATA"); // Set kolom A1 dengan tulisan "DATA SISWA"
		$excel->getActiveSheet()->mergeCells('A1:E1'); // Set Merge Cell pada kolom A1 sampai E1
		$excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(TRUE); // Set bold kolom A1
		$excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(15); // Set font size 15 untuk kolom A1
		$excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER); // Set text center untuk kolom A1
		// Buat header tabel nya pada baris ke 3
		$excel->setActiveSheetIndex(0)->setCellValue('A3', "No"); // Set kolom A3 dengan tulisan "NO"
		$excel->setActiveSheetIndex(0)->setCellValue('B3', "ID"); // Set kolom A3 dengan tulisan "NO"
		$excel->setActiveSheetIndex(0)->setCellValue('C3', "Nama lengkap"); // Set kolom A3 dengan tulisan "NO"
		$excel->setActiveSheetIndex(0)->setCellValue('D3', "Alamat / Instansi / Jabatan"); // Set kolom B3 dengan tulisan "NIS"
		$excel->setActiveSheetIndex(0)->setCellValue('E3', "No. Handphone"); // Set kolom C3 dengan tulisan "NAMA"
		$excel->setActiveSheetIndex(0)->setCellValue('F3', "Jumlah Tamu Diundang"); // Set kolom D3 dengan tulisan "JENIS KELAMIN"
		$excel->setActiveSheetIndex(0)->setCellValue('G3', "Jumlah Tamu Datang"); // Set kolom E3 dengan tulisan "ALAMAT"
		$excel->setActiveSheetIndex(0)->setCellValue('H3', "VIP / Reguler"); // Set kolom E3 dengan tulisan "ALAMAT"
		$excel->setActiveSheetIndex(0)->setCellValue('I3', "Souvenir"); // Set kolom E3 dengan tulisan "ALAMAT"
		$excel->setActiveSheetIndex(0)->setCellValue('J3', "Kursi"); // Set kolom E3 dengan tulisan "ALAMAT"
		$excel->setActiveSheetIndex(0)->setCellValue('K3', "Jam Masuk"); // Set kolom E3 dengan tulisan "ALAMAT"
		$excel->setActiveSheetIndex(0)->setCellValue('L3', "Jam Keluar"); // Set kolom E3 dengan tulisan "ALAMAT"
		$excel->setActiveSheetIndex(0)->setCellValue('M3', "Selfie"); // Set kolom E3 dengan tulisan "ALAMAT"

		// Apply style header yang telah kita buat tadi ke masing-masing kolom header
		$excel->getActiveSheet()->getStyle('A3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('B3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('C3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('D3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('E3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('F3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('G3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('H3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('I3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('J3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('K3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('L3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('L3')->applyFromArray($style_col);
		// Panggil function view yang ada di SiswaModel untuk menampilkan semua data siswanya
		$siswa = $this->M_export->data_tamu($id_event,$id_role);
		$no = 1; // Untuk penomoran tabel, di awal set dengan 1
		$numrow = 4; // Set baris pertama untuk isi tabel adalah baris ke 4
		foreach($siswa as $data){ // Lakukan looping pada variabel siswa
		  $excel->setActiveSheetIndex(0)->setCellValue('A'.$numrow, $no);
		  $excel->setActiveSheetIndex(0)->setCellValue('B'.$numrow, $data->id); 
		  $excel->setActiveSheetIndex(0)->setCellValue('C'.$numrow, $data->nama);
		  $excel->setActiveSheetIndex(0)->setCellValue('D'.$numrow, $data->alamat);
		  $excel->setActiveSheetIndex(0)->setCellValue('E'.$numrow, $data->telepon);
		  $excel->setActiveSheetIndex(0)->setCellValue('F'.$numrow, $data->tamu);
		  $excel->setActiveSheetIndex(0)->setCellValue('G'.$numrow, $data->status_cekin);
		  $excel->setActiveSheetIndex(0)->setCellValue('H'.$numrow, $data->kategori);
		  $excel->setActiveSheetIndex(0)->setCellValue('I'.$numrow, $data->status_sovenir);
		  $excel->setActiveSheetIndex(0)->setCellValue('J'.$numrow, $data->seat);
		  $excel->setActiveSheetIndex(0)->setCellValue('K'.$numrow, $data->date_cekin);
		  $excel->setActiveSheetIndex(0)->setCellValue('L'.$numrow, $data->date_cekout);
		  $excel->setActiveSheetIndex(0)->setCellValue('m'.$numrow, $data->name_selfie);
		  // Apply style row yang telah kita buat tadi ke masing-masing baris (isi tabel)
		  $excel->getActiveSheet()->getStyle('A'.$numrow)->applyFromArray($style_row);
		  $excel->getActiveSheet()->getStyle('B'.$numrow)->applyFromArray($style_row);
		  $excel->getActiveSheet()->getStyle('C'.$numrow)->applyFromArray($style_row);
		  $excel->getActiveSheet()->getStyle('D'.$numrow)->applyFromArray($style_row);
		  $excel->getActiveSheet()->getStyle('E'.$numrow)->applyFromArray($style_row);
		  $excel->getActiveSheet()->getStyle('F'.$numrow)->applyFromArray($style_row);
		  $excel->getActiveSheet()->getStyle('G'.$numrow)->applyFromArray($style_row);
		  $excel->getActiveSheet()->getStyle('H'.$numrow)->applyFromArray($style_row);
		  $excel->getActiveSheet()->getStyle('I'.$numrow)->applyFromArray($style_row);
		  $excel->getActiveSheet()->getStyle('J'.$numrow)->applyFromArray($style_row);
		  $excel->getActiveSheet()->getStyle('K'.$numrow)->applyFromArray($style_row);
		  $excel->getActiveSheet()->getStyle('L'.$numrow)->applyFromArray($style_row);
		  $excel->getActiveSheet()->getStyle('m'.$numrow)->applyFromArray($style_row);
		  $no++; // Tambah 1 setiap kali looping
		  $numrow++; // Tambah 1 setiap kali looping
		}
		// Set width kolom
		$excel->getActiveSheet()->getColumnDimension('A')->setWidth(5); // Set width kolom A
		$excel->getActiveSheet()->getColumnDimension('B')->setWidth(25); // Set width kolom B
		$excel->getActiveSheet()->getColumnDimension('C')->setWidth(30); // Set width kolom C
		$excel->getActiveSheet()->getColumnDimension('D')->setWidth(30); // Set width kolom D
		$excel->getActiveSheet()->getColumnDimension('E')->setWidth(20); // Set width kolom E
		$excel->getActiveSheet()->getColumnDimension('F')->setWidth(20); // Set width kolom E
		$excel->getActiveSheet()->getColumnDimension('G')->setWidth(20); // Set width kolom E
		$excel->getActiveSheet()->getColumnDimension('H')->setWidth(20); // Set width kolom E
		$excel->getActiveSheet()->getColumnDimension('I')->setWidth(20); // Set width kolom E
		$excel->getActiveSheet()->getColumnDimension('J')->setWidth(20); // Set width kolom E
		$excel->getActiveSheet()->getColumnDimension('K')->setWidth(20); // Set width kolom E
		$excel->getActiveSheet()->getColumnDimension('L')->setWidth(20); // Set width kolom E
		$excel->getActiveSheet()->getColumnDimension('M')->setWidth(20); // Set width kolom E
		// Set height semua kolom menjadi auto (mengikuti height isi dari kolommnya, jadi otomatis)
		$excel->getActiveSheet()->getDefaultRowDimension()->setRowHeight(-1);
		// Set orientasi kertas jadi LANDSCAPE
		$excel->getActiveSheet()->getPageSetup()->setOrientation(PageSetup::ORIENTATION_LANDSCAPE);
		// Set judul file excel nya
		$excel->getActiveSheet(0)->setTitle("Laporan Data");
		$excel->setActiveSheetIndex(0);
		// Proses file excel
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment; filename="'.$username.'-dgsign.xls"'); // Set nama file excel nya
		header('Cache-Control: max-age=0');
		$write = new Xlsx($excel);
		$write->save('php://output');
	  }
	

}
