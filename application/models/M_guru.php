<?php 
class M_guru extends CI_Model{

	function get_all_guru(){
		$hsl=$this->db->query("SELECT * FROM tbl_guru");
		return $hsl;
	}

	function simpan_guru($NIP,$nama,$guru_jenkel,$tmp_lahir,$tgl_lahir,$mapel,$photo){
		$hsl=$this->db->query("INSERT INTO tbl_guru (NIP,nama_pegawai,alamat_pegawai,guru_jenkel,guru_tmp_lahir,guru_tgl_lahir,guru_mapel,guru_photo) VALUES ('$NIP','$nama','$jenkel','$tmp_lahir','$tgl_lahir','$mapel','$photo')");
		return $hsl;
	}
	function simpan_guru_tanpa_img($NIP,$nama,$guru_jenkel,$tmp_lahir,$tgl_lahir,$mapel){
		$hsl=$this->db->query("INSERT INTO tbl_guru (nama_pegawai,alamat_pegawai,guru_jenkel,guru_tmp_lahir,guru_tgl_lahir,guru_mapel) VALUES ('$nip','$nama','$jenkel','$tmp_lahir','$tgl_lahir','$mapel')");
		return $hsl;
	}

	function update_guru($kode,$nip,$nama,$jenkel,$tmp_lahir,$tgl_lahir,$mapel,$photo){
		$hsl=$this->db->query("UPDATE tbl_guru SET nama_pegawai='$nama',alamat_pegawai='$alamat',guru_jenkel='$jenkel',guru_tmp_lahir='$tmp_lahir',guru_tgl_lahir='$tgl_lahir',guru_mapel='$mapel',guru_photo='$photo' WHERE guru_id='$kode'");
		return $hsl;
	}
	function update_guru_tanpa_img($nip,$nama,$guru_jenkel,$tmp_lahir,$tgl_lahir,$mapel){
		$hsl=$this->db->query("UPDATE tbl_guru SET nama_pegawai='$nama',alamat_pegawai='$alamat',guru_jenkel='$jenkel',guru_tmp_lahir='$tmp_lahir',guru_tgl_lahir='$tgl_lahir',guru_mapel='$mapel' WHERE guru_id='$kode'");
		return $hsl;
	}
	function hapus_guru($kode){
		$hsl=$this->db->query("DELETE FROM tbl_guru WHERE guru_id='$kode'");
		return $hsl;
	}

	//front-end
	function guru(){
		$hsl=$this->db->query("SELECT * FROM tbl_guru");
		return $hsl;
	}
	function guru_perpage($offset,$limit){
		$hsl=$this->db->query("SELECT * FROM tbl_guru limit $offset,$limit");
		return $hsl;
	}

}