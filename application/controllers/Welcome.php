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

		$jk = $this->db->get('tb_jk');
		$agama = $this->db->get('tb_agama');
		$sekolah = $this->db->get('tb_sekolah');
		$kat_sma = $this->db->get('tb_kategori_sma');
		$kat_utbk = $this->db->get('tb_kategori_utbk');

		$this->db->from('tb_siswa');
		$this->db->join('tb_user', 'tb_user.username = tb_siswa.email', 'left');
		$this->db->where(array('id_siswa' => $this->session->userdata('id_siswa')));
		$get_data = $this->db->get();

		$data = array(
			'page' => 'dashboard_stisla',
			'link' => 'dashboard',
			'script' => 'script',
			'status_update_profil' => $update_profil,
			'status_update_password' => $update_password,
			'status_update_utbk' => $update_utbk,
			'status_update_rapor' => $update_rapor,
			'data_jk' => $jk,
			'data_agama' => $agama,
			'data_sekolah' => $sekolah,
			'data_sma' => $kat_sma,
			'data_utbk' => $kat_utbk,
			'data' => $get_data,
		);
		$this->load->view('template/wrapper', $data);
	}


}
