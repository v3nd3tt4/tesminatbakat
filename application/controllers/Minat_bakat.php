<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Minat_bakat extends CI_Controller {

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
        if($this->session->userdata('level') != 'siswa'){
            echo '<script>alert("Maaf, anda tidak diizinkan mengakses halaman ini")</script>';
            echo'<script>window.location.href="'.base_url().'";</script>';
        }            
	}

	public function index()
	{
		$data = array(
			'page' => 'user/minat_bakat/index',
			'link' => 'profil_siswa',
			'script' => 'user/minat_bakat/script',
		);
		$this->load->view('template/wrapper', $data);
	}

	public function riwayat()
	{
		$riwayat = $this->db->get_where('tb_riwayat_tes', array('id_siswa' => $this->session->userdata('id_siswa')));

		$data = array(
			'page' => 'user/minat_bakat/riwayat',
			'link' => 'minat_bakat',
			'script' => 'user/minat_bakat/script',
			'data_riwayat' => $riwayat
		);
		$this->load->view('template/wrapper', $data);
	}

	public function tes(){
		$soal = $this->db->query("select * from tb_pertanyaan order by rand()");
		$data = array(
			'page' => 'user/minat_bakat/tes',
			'link' => 'minat_bakat',
			'script' => 'user/minat_bakat/script',
			'data_soal' => $soal
		);
		$this->load->view('template/wrapper', $data);
	}
}