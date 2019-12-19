<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Setting_fasilitas extends CI_Controller {

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
		$data = $this->db->get("tb_setting_fasilitas");
		$data = array(
			'page' => 'fasilitas/index',
			'link' => 'fasilitas',
			'script' => 'fasilitas/script',
			'data' => $data
		);
		$this->load->view('template/wrapper', $data);
	}

	public function store(){
		$id_setting_fasilitas = $this->input->post('id_setting_fasilitas');
		$pecah = explode('|', $id_setting_fasilitas);
		$id = $pecah[0];
		$status = $pecah[1];

		if($status == 'enable'){
			$stat = 'disable';
		}else if($status == 'disable'){
			$stat = 'enable';
		}

		$simpan = $this->db->update('tb_setting_fasilitas', array('status' => $stat), array('id_setting_fasilitas' => $id));
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
}

