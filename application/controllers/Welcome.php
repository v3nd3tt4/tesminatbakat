<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

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
		$update_profil = $this->db->get_where('tb_status_kelengkapan', array('id_siswa' => $this->session->userdata('id_siswa'), 'kategori' => 'profil'));
		$update_password = $this->db->get_where('tb_status_kelengkapan', array('id_siswa' => $this->session->userdata('id_siswa'), 'kategori' => 'password'));
		$update_utbk = $this->db->get_where('tb_status_kelengkapan', array('id_siswa' => $this->session->userdata('id_siswa'), 'kategori' => 'utbk'));
		$update_rapor = $this->db->get_where('tb_status_kelengkapan', array('id_siswa' => $this->session->userdata('id_siswa'), 'kategori' => 'rapor'));
		$data = array(
			'page' => 'dashboard_stisla',
			'link' => 'dashboard',
			'status_update_profil' => $update_profil,
			'status_update_password' => $update_password,
			'status_update_utbk' => $update_utbk,
			'status_update_rapor' => $update_rapor
		);
		$this->load->view('template/wrapper', $data);
	}


}
