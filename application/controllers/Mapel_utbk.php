<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mapel_utbk extends CI_Controller {

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

	public function index()
	{
		$this->db->from('tb_mapel_utbk');
		$this->db->join('tb_kategori_utbk', 'tb_kategori_utbk.id_kategori_utbk = tb_mapel_utbk.id_kategori_utbk');

		$get_data = $this->db->get();

		$kategori_sma = $this->db->get('tb_kategori_utbk');
		$data = array(
			'page' => 'mapel_utbk/index',
			'link' => 'mapel_utbk',
			'script' => 'mapel_utbk/script',
			'data' => $get_data,
			'kategori_sma' => $kategori_sma
		);
		$this->load->view('template/wrapper', $data);
	}

	public function store(){
		$data = array(
			'nama_mapel_utbk' => $this->input->post('nama_mapel_utbk', true),
			'id_kategori_utbk' => $this->input->post('kategori_sma', true),
		);

		$simpan = $this->db->insert('tb_mapel_utbk', $data);
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
			'nama_mapel_utbk' => $this->input->post('nama_mapel_utbk', true),
			'id_kategori_utbk' => $this->input->post('kategori_sma', true),
		);

		$simpan = $this->db->update('tb_mapel_utbk', $data, array('id_mapel_utbk' => $this->input->post('id_mapel_utbk', true)));
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
			'id_mapel_utbk' => $this->input->post('id', true),
		);

		$delete = $this->db->delete('tb_mapel_utbk', $param);
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
			'id_mapel_utbk' => $this->input->post('id', true),
		);
		$get_data = $this->db->get_where('tb_mapel_utbk', $param);
		echo json_encode($get_data->row());
	}
}
