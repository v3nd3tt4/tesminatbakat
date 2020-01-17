<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Setting_admin extends CI_Controller {

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
		$data = $this->db->get_where("tb_user", array('level' => 'admin'));
		$data = array(
			'page' => 'set_admin/index',
			'link' => 'set_admin',
			'script' => 'set_admin/script',
			'data' => $data
		);
		$this->load->view('template/wrapper', $data);
	}

	public function hapus(){
		$id_user = $this->input->post('id_user', true);
		$hapus = $this->db->delete('tb_user', array('id_user' => $id_user));
		if($hapus){
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

	public function store(){
		$email = $this->input->post('email', true);
		$password = $this->input->post('password', true);
		$data = array(
			'username' => $email,
			'password' => $password,
			'level' => 'admin'

		);	
		$cek = $this->db->get_where('tb_user', array('username' => $email));
		if($cek->num_rows() > 0){
			$return = array(
				'status' => 'failed',
				'text' => '<div class="alert alert-danger">Email sudah digunakan</div>'
			);
			echo json_encode($return);
			exit();
		}

		$simpan = $this->db->insert('tb_user', $data);
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

	public function get_data(){
		$id_user = $this->input->post('id_user', true);
		$get = $this->db->get_where('tb_user', array('id_user' => $id_user));
		echo json_encode($get->row());
	}

	public function edit_password(){
		$email = $this->input->post('email', true);
		$password = $this->input->post('password', true);
		$confirm_password = $this->input->post('confirm_password', true);
		$id_user = $this->input->post('id_user', true);
		$data = array(
			'password' => $password,
		);	
		$cek = $this->db->get_where('tb_user', array('username' => $email));
		if($confirm_password != $password){
			$return = array(
				'status' => 'failed',
				'text' => '<div class="alert alert-danger">Password tidak cocok</div>'
			);
			echo json_encode($return);
			exit();
		}

		$simpan = $this->db->update('tb_user', $data, array('id_user' => $id_user));
		if($simpan){
			$return = array(
				'status' => 'success',
				'text' => '<div class="alert alert-success">Password berhasil diupdate</div>'
			);
			echo json_encode($return);
		}else{
			$return = array(
				'status' => 'failed',
				'text' => '<div class="alert alert-danger">Password gagal diupdate</div>'
			);
			echo json_encode($return);
		}
	}
}

