<?php 
class M_files extends CI_Model{

	function get_all_email(){
		$hsl=$this->db->query("SELECT file_id,kartu_tanda_penduduk,kartu_keluarga,nama_lengkap,tmpat_tgl_lahir,alamat,email,no_hp AS tanggal,alamat,email,no_hp FROM tbl_files ORDER BY file_id DESC");
		return $hsl;
	}
	function simpan_email($kartu_tanda_penduduk,$kartu_keluarga,$nama_lengkap,$tmpat_tgl_lahir,$alamat,$email,$no_hp){
		$hsl=$this->db->query("INSERT INTO tbl_files(kartu_tanda_penduduk,kartu_keluarga,nama_lengkap,tmpat_tgl_lahir,alamat,email,no_hp) VALUES ('$kartu_tanda_penduduk','$kartu_keluarga','$nama_lengkap','$tmpat_tgl_lahir','$alamat','$email','$no_hp')");
		return $hsl;
	}
	function update_email($file_id,$nama_lengkap,$tmpat_tgl_lahir,$alamat,$email,$no_hp){
		$hsl=$this->db->query("UPDATE tbl_files SET nama_lengkap='$nama',tmpat_tgl_lahir='$tempat',alamat='$alamat',email='$email',no_hp='$nohp' WHERE file_id='$kode'");
		return $hsl;
	}
	function update_file_tanpa_email($file_id,$nama_lengkap,$tmpat_tgl_lahir,$alamat,$email,$no_hp){
		$hsl=$this->db->query("UPDATE tbl_files SET nama_lengkap='$nama',tmpat_tgl_lahir='$tanggal',alamat='$alamat',email='$email',no_hp='$nohp' WHERE file_id='$kode'");
		return $hsl;
	}
	function hapus_email($id){
		$hsl=$this->db->query("DELETE FROM tbl_files WHERE file_id='$id'");
		return $hsl;
	}

	function get_file_email($id){
		$hsl=$this->db->query("SELECT file_id,nama_lengkap,tmpat_tgl_lahir,alamat,email,no_hp DATE_FORMAT(file_tanggal,'%d/%m/%Y') AS nama_lengkap,tmpat_tgl_lahir,alamat,email,no_hp FROM tbl_files WHERE file_id='$id'");
		return $hsl;
	}

	//Front-end
	function get_files_home(){
		$hsl=$this->db->query("SELECT file_id,nama_lengkap,tmpat_tgl_lahir,alamat,email,no_hpDATE_FORMAT(file_tanggal,'%d/%m/%Y') AS nama_lengkap,tmpat_tgl_lahir,alamat,email,no_hp FROM tbl_files ORDER BY file_id DESC limit 7");
		return $hsl;
	}
	
}