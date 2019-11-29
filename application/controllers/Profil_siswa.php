<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profil_siswa extends CI_Controller {

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
		$get_data = $this->db->get('tb_agama');
		$data = array(
			'page' => 'agama/index',
			'link' => 'agama',
			'script' => 'agama/script',
			'data' => $get_data
		);
		$this->load->view('template/wrapper', $data);
	}
}