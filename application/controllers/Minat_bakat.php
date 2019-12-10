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
		// var_dump($this->input->post('submit', true));exit();
		$get_data = $this->db->get_where("tb_riwayat_tes", array('id_siswa' => $this->session->userdata('id_siswa')));
		if($get_data->num_rows() != 0){
			echo '<script>alert("Maaf, untuk saat ini tes hanya bisa dilakukan sebanyak 1 kali");</script>';
			echo '<script>location.href="'.base_url().'minat_bakat/riwayat"</script>';
			exit();
		}

		$soal = $this->db->query("select * from tb_pertanyaan order by rand()");
		$get_status = $this->db->get_where('tb_temporary_soal', array('id_siswa' => $this->session->userdata('id_siswa')));
		// var_dump($soal);exit();
		if($get_status->num_rows() == 0){
			$dt = array();
			$no=1;
			foreach ($soal->result() as $row_soal) {
				$dt[] = array(
					'id_siswa' => $this->session->userdata('id_siswa'),
					'id_pertanyaan' =>$row_soal->id_pertanyaan,
					'no_soal' => $no
				);
				$no++;
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

		if(isset($_POST['id_temporary_soal'])){
			$id_temporary_soal = $this->input->post('id_temporary_soal', true);
			$jawaban = $this->input->post('jawaban', true);
			$next_page=$page+1;
			if(!empty($jawaban)){
				$this->db->trans_begin();
				$this->db->update('tb_temporary_soal', array('jawaban' => $jawaban), array('id_temporary_soal' => $id_temporary_soal));
				if ($this->db->trans_status() === FALSE)
				{
				        $this->db->trans_rollback();
				        echo '<script>location.href="'.base_url().'minat_bakat/tes?halaman='.$next_page.'"</script>';
				}
				else
				{
				        $this->db->trans_commit();
				        echo '<script>location.href="'.base_url().'minat_bakat/tes?halaman='.$next_page.'"</script>';
				}
			}else{
				echo '<script>location.href="'.base_url().'minat_bakat/tes?halaman='.$next_page.'"</script>';
			}
		}

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

	public function selesai_tes(){
		$this->db->trans_begin();

		$jawaban = $this->input->post('jawaban', true);
		$id_temporary_soal = $this->input->post('id_temporary_soal', true);
		$this->db->update('tb_temporary_soal', array('jawaban' => $jawaban), array('id_temporary_soal' => $id_temporary_soal));

		$q = "SELECT tb_pertanyaan.`id_kategori_soal`, tb_temporary_soal.id_siswa, SUM(jawaban) AS skor FROM tb_temporary_soal JOIN tb_pertanyaan ON tb_pertanyaan.`id_pertanyaan` = tb_temporary_soal.`id_pertanyaan` WHERE id_siswa = '".$this->session->userdata('id_siswa')."' GROUP BY tb_pertanyaan.`id_kategori_soal` ORDER BY skor DESC ";
		$exe = $this->db->query($q);
		$total_skor = 0;
		if($exe->num_rows() != 0){			
			foreach ($exe->result() as $row) {
				$total_skor += $row->skor;
			}
		}else{
			exit();
		}
		// var_dump($exe->result()) ;
		$hasil_1 = $exe->result()[0]->id_kategori_soal;
		$hasil_2 = $exe->result()[1]->id_kategori_soal;
		$data = array(
			'id_siswa' => $this->session->userdata('id_siswa', true),
			'tgl_selesai' => date('Y-m-d H:i:s'),
			'status' => 'sudah', 
			'hasil_1' => $hasil_1,
			'hasil_2' => $hasil_2,
			'total_skor' => $total_skor
		);

		$this->db->insert('tb_riwayat_tes', $data);
		$this->db->delete('tb_temporary_soal', array('id_siswa' => $this->session->userdata('id_siswa')));
		if ($this->db->trans_status() === FALSE)
		{
		    $this->db->trans_rollback();
		    $return = array(
				'status' => 'failed',
				'text' => '<div class="alert alert-danger">Data gagal disimpan</div>'
			);
			echo json_encode($return);
		}
		else
		{
		    $this->db->trans_commit();
		    $return = array(
				'status' => 'success',
				'text' => '<div class="alert alert-success">Data berhasil disimpan</div>'
			);
			echo json_encode($return);
		}
	}
}