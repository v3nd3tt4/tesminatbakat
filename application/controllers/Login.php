<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

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
	public function index()
	{
		$data = array(
			'page' => 'dashboard_stisla',
			'link' => 'dashboard'
		);
		$this->load->view('login', $data);
	}

	public function proses(){
		$username = $this->input->post('email', true);
		$password = $this->input->post('password', true);
		$this->db->from('tb_user');
		$this->db->join('tb_siswa', 'tb_siswa.email = tb_user.username');
		$this->db->where(array('username' => $username, 'password' => $password));
		$get = $this->db->get();
		if($get->num_rows() != 0){
			$sess = array(
				'username' => $username,
				'is_login' => true,
				'nama' => $get->row()->nama_siswa,
				'id_siswa' => $get->row()->id_siswa,
				'nisn' => $get->row()->nisn,
				'level' => $get->row()->level
			);
			$this->session->set_userdata($sess);
			echo '<script>alert("login berhasil");window.location.href = "'.base_url().'welcome";</script>';
		}else{
			echo '<script>alert("Username atau password salah");window.location.href = "'.base_url().'login";</script>';
		}
	}

	public function logout(){
		$this->session->sess_destroy();
		echo '<script>alert("Berhasil logout");window.location.href = "'.base_url().'login";</script>';
	}
}