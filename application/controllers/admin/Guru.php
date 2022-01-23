<?php
class Guru extends CI_Controller{
	function __construct(){
		parent::__construct();
		if($this->session->userdata('masuk') !=TRUE){
            $url=base_url('administrator');
            redirect($url);
        };
		$this->load->model('m_guru');
		$this->load->model('m_pengguna');
		$this->load->library('upload');
	}


	function index(){
		$x['data']=$this->m_guru->get_all_guru();
		$this->load->view('admin/v_guru',$x);
	}
	
	function simpan_guru(){
				$config['upload_path'] = './assets/images/'; //path folder
	            $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
	            $config['encrypt_name'] = TRUE; //nama yang terupload nantinya

	            $this->upload->initialize($config);
	            if(!empty($_FILES['filefoto']['name']))
	            {
	                if ($this->upload->do_upload('filefoto'))
	                {
	                        $gbr = $this->upload->data();
	                        //Compress Image
	                        $config['image_library']='gd2';
	                        $config['source_image']='./assets/images/'.$gbr['file_name'];
	                        $config['create_thumb']= FALSE;
	                        $config['maintain_ratio']= FALSE;
	                        $config['quality']= '60%';
	                        $config['width']= 300;
	                        $config['height']= 300;
	                        $config['new_image']= './assets/images/'.$gbr['file_name'];
	                        $this->load->library('image_lib', $config);
	                        $this->image_lib->resize();

	                        $photo=$gbr['file_name'];
							$nama=strip_tags($this->input->post('xnama_pegawai'));
							$pegawai=strip_tags($this->input->post('xalamat_pegawai'));
							

							$this->m_guru->simpan_guru($nama,$alamat);
							echo $this->session->set_flashdata('msg','success');
							redirect('admin/guru');
					}else{
	                    echo $this->session->set_flashdata('msg','warning');
	                    redirect('admin/guru');
	                }
	                 
	            }else{
	            	$nama=strip_tags($this->input->post('xnama_pegawai'));
					$alamat=strip_tags($this->input->post('xalamat_pegawai'));
					

					$this->m_guru->simpan_guru_tanpa_img($nip,$nama,$jenkel,$tmp_lahir,$tgl_lahir,$mapel);
					echo $this->session->set_flashdata('msg','success');
					redirect('admin/guru');
				}
				
	}
	
	function update_guru(){
				
	            $config['upload_path'] = './assets/images/'; //path folder
	            $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
	            $config['encrypt_name'] = TRUE; //nama yang terupload nantinya

	            $this->upload->initialize($config);
	            if(!empty($_FILES['filefoto']['name']))
	            {
	                if ($this->upload->do_upload('filefoto'))
	                {
	                        $gbr = $this->upload->data();
	                        //Compress Image
	                        $config['image_library']='gd2';
	                        $config['source_image']='./assets/images/'.$gbr['file_name'];
	                        $config['create_thumb']= FALSE;
	                        $config['maintain_ratio']= FALSE;
	                        $config['quality']= '60%';
	                        $config['width']= 300;
	                        $config['height']= 300;
	                        $config['new_image']= './assets/images/'.$gbr['file_name'];
	                        $this->load->library('image_lib', $config);
	                        $this->image_lib->resize();
	                        $gambar=$this->input->post('gambar');
							$path='./assets/images/'.$gambar;
							unlink($path);

	                        $photo=$gbr['file_name'];
	                        $kode=$this->input->post('kode');
							$nama=strip_tags($this->input->post('xnama_pegawai'));
							$alamat=strip_tags($this->input->post('xalamat_pegawai'));
							

							$this->m_guru->update_guru($kode,$nama,$pegawai);
							echo $this->session->set_flashdata('msg','info');
							redirect('admin/guru');
	                    
	                }else{
	                    echo $this->session->set_flashdata('msg','warning');
	                    redirect('admin/guru');
	                }
	                
	            }else{
							$kode=$this->input->post('kode');
							$nama=strip_tags($this->input->post('xnama_pegawai'));
							$alamat=strip_tags($this->input->post('xalamat_pegawai'));
						
							$this->m_guru->update_guru_tanpa_img($kode,$nama,$alamat);
							echo $this->session->set_flashdata('msg','info');
							redirect('admin/guru');
	            } 

	}

	function hapus_guru(){
		$kode=$this->input->post('kode');
		$gambar=$this->input->post('gambar');
		$path='./assets/images/'.$gambar;
		unlink($path);
		$this->m_guru->hapus_guru($kode);
		echo $this->session->set_flashdata('msg','success-hapus');
		redirect('admin/guru');
	}

}