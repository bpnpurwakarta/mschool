<?php
class Home extends CI_Controller{
	function __construct(){
		parent::__construct();
		
		$this->load->model('m_galeri');
		$this->load->model('m_pengumuman');
		$this->load->model('m_files');
		
		
	}
	function index(){
			
			$x['pengumuman']=$this->m_pengumuman->get_pengumuman_home();
			$x['tot_guru']=$this->db->get('tbl_guru')->num_rows();
			$x['tot_files']=$this->db->get('tbl_files')->num_rows();
			$this->load->view('depan/v_home',$x);
	}

}
