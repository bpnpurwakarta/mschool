<?php
class Download extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('m_files');
		$this->load->helper('download');
	}
	function index(){
		$x['data']=$this->m_files->get_all_email();
		$this->load->view('depan/v_download',$x);
	}

	function proses(){
		$id=$this->uri->segment(3);
		$get_db=$this->m_files->get_file_email($id);
		$q=$get_db->row_array();
		$file=$q['file_data'];
		$path='./assets/files/'.$file;
		$data = file_get_contents($path);
		$name = $file;
		force_download($name, $data);
	}
	function pendaftaran(){
		// var_dump($this->input->post());die;
		$kartu_tanda_penduduk=htmlspecialchars($this->input->post('kartu_tanda_penduduk',TRUE),ENT_QUOTES);
      	$kartu_keluarga=htmlspecialchars($this->input->post('kartu_keluarga',TRUE),ENT_QUOTES);
      	$nama_lengkap=htmlspecialchars($this->input->post('nama_lengkap',TRUE),ENT_QUOTES);
    	$tmpat_tgl_lahir=htmlspecialchars($this->input->post('tmpat_tgl_lahir',TRUE),ENT_QUOTES);
      	$alamat=htmlspecialchars($this->input->post('alamat',TRUE),ENT_QUOTES);
      	$email=htmlspecialchars($this->input->post('email',TRUE),ENT_QUOTES);
      	$no_hp=htmlspecialchars($this->input->post('no_hp',TRUE),ENT_QUOTES);
      	$this->m_files->simpan_email($kartu_tanda_penduduk,$kartu_keluarga,$nama_lengkap,$tmpat_tgl_lahir,$alamat,$email,$no_hp);
      echo $this->session->set_flashdata('krm','<p><strong> NB: </strong> Terima Kasih Telah Menghubungi Kami.</p>');
      redirect('download/index');
	}

// 		function simpan(){

// 		}
}