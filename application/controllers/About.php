<?php
class About extends CI_Controller{
	function __construct(){
		parent::__construct();
	}
	function index(){
		$x['tot_guru']=$this->db->get('tbl_guru')->num_rows();
		$x['tot_files']=$this->db->get('tbl_files')->num_rows();
		$this->load->view('depan/v_about',$x);
	}
}
