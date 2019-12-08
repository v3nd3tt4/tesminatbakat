<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pertanyaan extends CI_Controller {

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
	
	public function __construct(){
		parent::__construct();
        if($this->session->userdata('level') != 'admin'){
            echo '<script>alert("Maaf, anda tidak diizinkan mengakses halaman ini")</script>';
            echo'<script>window.location.href="'.base_url().'";</script>';
        }            
	}

	public function kategori()
	{
		$get_data = $this->db->get('tb_kategori_pertanyaan');
		$data = array(
			'page' => 'pertanyaan/kategori/index',
			'link' => 'kategori_pertanyaan',
			'script' => 'pertanyaan/kategori/script',
			'data' => $get_data
		);
		$this->load->view('template/wrapper', $data);
	}

	public function isi(){
		$get_data = $this->db->get('tb_kategori_pertanyaan');
		$data = array(
			'page' => 'pertanyaan/isi/index',
			'link' => 'isi_pertanyaan',
			'script' => 'pertanyaan/isi/script',
			'data' => $get_data
		);
		$this->load->view('template/wrapper', $data);
	}

	public function preview_buat_soal($id_kategori_soal){
		$get_kategori = $this->db->get_where('tb_kategori_pertanyaan', array('id_kategori_soal' => $id_kategori_soal));
		$get_soal = $this->db->get_where('tb_pertanyaan', array('id_kategori_soal' => $id_kategori_soal));
		$data = array(
			'page' => 'pertanyaan/isi/pertanyaan',
			'link' => 'isi_pertanyaan',
			'script' => 'pertanyaan/isi/script',
			'data_kategori' => $get_kategori,
			'data_soal' => $get_soal,
			'id_kategori_soal' => $id_kategori_soal
		);
		$this->load->view('template/wrapper', $data);
	}

	public function store(){
		$data = array(
			'nama_kategori' => $this->input->post('nama_kategori', true),
			'keterangan' => $this->input->post('keterangan', true),
		);

		$simpan = $this->db->insert('tb_kategori_pertanyaan', $data);
		if($simpan){
			$return = array(
				'status' => 'success',
				'text' => '<div class="alert alert-success">Data berhasil disimpan</div>'
			);
			echo json_encode($return);
		}else{
			$return = array(
				'status' => 'failed',
				'text' => '<div class="alert alert-danger">Data gagal disimpan</div>'
			);
			echo json_encode($return);
		}
	}

	public function store_pertanyaan(){
		$data = array(
			'pertanyaan' => $this->input->post('pertanyaan', true),
			'id_kategori_soal' => $this->input->post('id_kategori_soal', true),
			'tgl_create' => date('Y-m-d H:i:s')
		);

		$simpan = $this->db->insert('tb_pertanyaan', $data);
		if($simpan){
			$return = array(
				'status' => 'success',
				'text' => '<div class="alert alert-success">Data berhasil disimpan</div>'
			);
			echo json_encode($return);
		}else{
			$return = array(
				'status' => 'failed',
				'text' => '<div class="alert alert-danger">Data gagal disimpan</div>'
			);
			echo json_encode($return);
		}
	}

	public function update(){
		$data = array(
			'nama_kategori' => $this->input->post('nama_kategori_pertanyaan', true),
			'keterangan' => $this->input->post('keterangan', true),
		);

		$simpan = $this->db->update('tb_kategori_pertanyaan', $data, array('id_kategori_soal' => $this->input->post('id_kategori_pertanyaan', true)));
		if($simpan){
			$return = array(
				'status' => 'success',
				'text' => '<div class="alert alert-success">Data berhasil diupdate</div>'
			);
			echo json_encode($return);
		}else{
			$return = array(
				'status' => 'failed',
				'text' => '<div class="alert alert-danger">Data gagal diupdate</div>'
			);
			echo json_encode($return);
		}
	}

	public function update_pertanyaan(){
		$data = array(
			'pertanyaan' => $this->input->post('pertanyaan', true),
			'tgl_create' => date('Y-m-d H:i:s')
		);

		$simpan = $this->db->update('tb_pertanyaan', $data, array('id_pertanyaan' => $this->input->post('id_pertanyaan', true)));
		
		if($simpan){
			$return = array(
				'status' => 'success',
				'text' => '<div class="alert alert-success">Data berhasil diupdate</div>'
			);
			echo json_encode($return);
		}else{
			$return = array(
				'status' => 'failed',
				'text' => '<div class="alert alert-danger">Data gagal diupdate</div>'
			);
			echo json_encode($return);
		}
	}

	public function remove(){
		$param = array(
			'id_kategori_soal' => $this->input->post('id', true),
		);

		$delete = $this->db->delete('tb_kategori_pertanyaan', $param);
		if($delete){
			$return = array(
				'status' => 'success',
				'text' => '<div class="alert alert-success">Data berhasil dihapus</div>'
			);
			echo json_encode($return);
		}else{
			$return = array(
				'status' => 'failed',
				'text' => '<div class="alert alert-danger">Data gagal dihapus</div>'
			);
			echo json_encode($return);
		}
	}

	public function remove_pertanyaan(){
		$param = array(
			'id_pertanyaan' => $this->input->post('id', true),
		);

		$delete = $this->db->delete('tb_pertanyaan', $param);
		if($delete){
			$return = array(
				'status' => 'success',
				'text' => '<div class="alert alert-success">Data berhasil dihapus</div>'
			);
			echo json_encode($return);
		}else{
			$return = array(
				'status' => 'failed',
				'text' => '<div class="alert alert-danger">Data gagal dihapus</div>'
			);
			echo json_encode($return);
		}
	}

	public function get_data(){
		$param = array(
			'id_kategori_soal' => $this->input->post('id', true),
		);
		$get_data = $this->db->get_where('tb_kategori_pertanyaan', $param);
		echo json_encode($get_data->row());
	}

	public function get_data_pertanyaan(){
		$param = array(
			'id_pertanyaan' => $this->input->post('id', true),
		);
		$get_data = $this->db->get_where('tb_pertanyaan', $param);
		echo json_encode($get_data->row());
	}
}
