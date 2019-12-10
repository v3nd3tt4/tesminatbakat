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
		$get_status = $this->db->get_where('tb_temporary_soal', array('id_siswa' => $this->session->userdata('id_siswa')));
		// var_dump($soal);exit();
		if($get_status->num_rows() == 0){
			$dt = array();
			foreach ($soal->result() as $row_soal) {
				$dt[] = array(
					'id_siswa' => $this->session->userdata('id_siswa'),
					'id_pertanyaan' =>$row_soal->id_pertanyaan
				);
			}
			$save_soal = $this->db->insert_batch('tb_temporary_soal', $dt);
			
		}
		$halaman = 1; //batasan halaman
		$page = isset($_GET['halaman'])? (int)$_GET["halaman"]:1;
		$mulai = ($page>1) ? ($page * $halaman) - $halaman : 0;

		$q1 = "select * from tb_temporary_soal left join tb_pertanyaan on tb_pertanyaan.id_pertanyaan=tb_temporary_soal.id_pertanyaan where id_siswa = '".$this->session->userdata('id_siswa')."' LIMIT $mulai, $halaman";
		$q2 = "select * from tb_temporary_soal where id_siswa = '".$this->session->userdata('id_siswa')."'";

		
		$query = $this->db->query($q1);
		$sql = $this->db->query($q2);
		$total = $sql->num_rows();
		$pages = ceil($total/$halaman); 

		$data = array(
			'page' => 'user/minat_bakat/tes',
			'link' => 'minat_bakat',
			'script' => 'user/minat_bakat/script',
			'data_soal' => $query, 
			'pages' => $pages, 
			'hal' => $page,
			'tot_hal' => $total
		);
		$this->load->view('template/wrapper', $data);
	}
}