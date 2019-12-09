<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Siswa extends CI_Controller {

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
		$this->db->from('tb_siswa');
		$this->db->join('tb_jk', 'tb_jk.id_jk = tb_siswa.id_jk', 'left');
		$this->db->join('tb_agama', 'tb_agama.id_agama = tb_siswa.id_agama', 'left');
		$this->db->join('tb_sekolah', 'tb_sekolah.id_sekolah = tb_siswa.id_sekolah', 'left');
		$this->db->join('tb_user', 'tb_siswa.email = tb_user.username', 'left');
		$get_data = $this->db->get();

		$jk = $this->db->get('tb_jk');
		$agama = $this->db->get('tb_agama');
		$sekolah = $this->db->get('tb_sekolah');
		$kat_sma = $this->db->get('tb_kategori_sma');
		$kat_utbk = $this->db->get('tb_kategori_utbk');
		$data = array(
			'page' => 'siswa/index',
			'link' => 'siswa',
			'script' => 'siswa/script',
			'data' => $get_data,
			'data_jk' => $jk,
			'data_agama' => $agama,
			'data_sekolah' => $sekolah,
			'data_sma' => $kat_sma,
			'data_utbk' => $kat_utbk
		);
		$this->load->view('template/wrapper', $data);
	}

	public function generate_token(){
		// var_dump($_POST);exit();
		$get_email=$this->db->get_where('tb_siswa', array('id_siswa' => $this->input->post('id', true)));
		// $str = 'abcefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$str = '0123456789';
		$acak = str_shuffle($str);
		$potong = substr($acak, 0, 6);
		$simpan = $this->db->update('tb_user', array('password'=>$potong), array('username' => $get_email->row()->email));
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

	public function store(){
		$data = array(
			'nama_siswa' 		=> $this->input->post('nama_siswa', true),
			'tempat_lahir'		=> $this->input->post('tempat_lahir', true),
			'tgl_lahir'			=> $this->input->post('tgl_lahir', true),
			'id_jk'				=> $this->input->post('id_jk', true),
			'id_agama'			=>  $this->input->post('id_agama', true),
			'id_sekolah'		=>  $this->input->post('id_sekolah', true),
			'alamat'			=>  $this->input->post('alamat', true),
			'nisn'				=>  $this->input->post('nisn', true),
			'email'				=>  $this->input->post('email', true),
			'no_hp'				=> $this->input->post('no_hp', true),
			'id_kategori_sma'	=>  $this->input->post('id_kategori_sma', true),
			'id_kategori_utbk'	=>  $this->input->post('id_kategori_utbk', true),
		);

		$str = 'abcefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$acak = str_shuffle($str);
		$potong = substr($acak, 0, 6);

		$data2 = array(
			'username' => $this->input->post('email', true),
			'password' => $potong,
			'level' => 'siswa'
		);

		$this->db->trans_begin();


		$this->db->insert('tb_siswa', $data);
		$this->db->insert('tb_user', $data2);
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

	public function update(){
		$data = array(
			'nama_siswa' 		=> $this->input->post('nama_siswa', true),
			'tempat_lahir'		=> $this->input->post('tempat_lahir', true),
			'tgl_lahir'			=> $this->input->post('tgl_lahir', true),
			'id_jk'				=> $this->input->post('id_jk', true),
			'id_agama'			=>  $this->input->post('id_agama', true),
			'id_sekolah'		=>  $this->input->post('id_sekolah', true),
			'alamat'			=>  $this->input->post('alamat', true),
			'nisn'				=>  $this->input->post('nisn', true),
			'email'				=>  $this->input->post('email', true),
			'no_hp'				=> $this->input->post('no_hp', true),
			'id_kategori_sma'	=>  $this->input->post('id_kategori_sma', true),
			'id_kategori_utbk'	=>  $this->input->post('id_kategori_utbk', true),
		);

		$simpan = $this->db->update('tb_siswa', $data, array('id_siswa' => $this->input->post('id_siswa', true)));
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
			'id_siswa' => $this->input->post('id', true),
		);

		$delete = $this->db->delete('tb_siswa', $param);
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
			'id_siswa' => $this->input->post('id', true),
		);
		$get_data = $this->db->get_where('tb_siswa', $param);
		echo json_encode($get_data->row());
	}

	public function nilai_rapor($id_siswa){
		$this->db->from('tb_mapel');
		$this->db->join('tb_siswa', 'tb_siswa.id_kategori_sma = tb_mapel.id_kategori_sma');
		$this->db->where(array('tb_siswa.id_siswa' => $id_siswa));
		$get_data = $this->db->get();

		$status = $this->db->get_where('tb_status_pengisian_nilai', array('id_siswa' => $id_siswa, 'kategori' => 'rapor'));

		$cek_pendukung = $this->db->get_where('tb_pendukung_rapor', array('id_siswa' => $id_siswa));
		$data = array(
			'page' => 'siswa/nilai_rapor',
			'link' => 'siswa',
			'script' => 'siswa/script',
			'data' => $get_data,
			'id_siswa' => $id_siswa,
			'status' => $status,
			'data_pendukung_rapor' => $cek_pendukung
			
		);
		$this->load->view('template/wrapper', $data);
	}

	public function nilai_rapor_new($id_siswa){
		$data_siswa = $this->db->get_where('tb_siswa', array('id_siswa' => $id_siswa));
		$row_data = $this->db->order_by('tgl_isi', 'DESC')->get_where('tb_riwayat_isi_rapor', array('id_siswa' => $id_siswa));
		$data = array(
			'page' => 'siswa/nilai_rapor_new',
			'link' => 'siswa',
			'data_riwayat' => $row_data,
			'data_siswa' => $data_siswa
		);
		$this->load->view('template/wrapper', $data);
	}

	public function simpan_rasionalisasi_rapor(){
		$data = array(
			'rasionalisasi' => $this->input->post('rasionalisasi', true),
			'status' => 'rasionalisasi',
			'tgl_create' => date('Y-m-d H:i:s')
		);
		$simpan = $this->db->update('tb_status_pengisian_nilai', $data, array('id_siswa' => $this->input->post('id_siswa', true), 'id_riwayat_isi_rapor' => $this->input->post('id_riwayat_isi_rapor', true),'kategori' => 'rapor'));
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

	public function nilai_utbk($id_siswa){
		$this->db->from('tb_mapel_utbk');
		$this->db->join('tb_siswa', 'tb_siswa.id_kategori_utbk = tb_mapel_utbk.id_kategori_utbk');
		$this->db->where(array('tb_siswa.id_siswa' => $id_siswa));
		$get_data = $this->db->get();

		$status = $this->db->get_where('tb_status_pengisian_nilai', array('id_siswa' => $id_siswa, 'kategori' => 'utbk'));

		$cek_pendukung = $this->db->get_where('tb_pendukung_utbk', array('id_siswa' => $id_siswa));

		$data = array(
			'page' => 'siswa/nilai_utbk',
			'link' => 'siswa',
			'script' => 'siswa/script',
			'data' => $get_data,
			'id_siswa' => $id_siswa,
			'status' => $status,
			'data_pendukung_utbk' => $cek_pendukung
			
		);
		$this->load->view('template/wrapper', $data);
	}

	public function simpan_rasionalisasi_utbk(){
		$data = array(
			'rasionalisasi' => $this->input->post('rasionalisasi', true),
			'status' => 'rasionalisasi',
			'tgl_create' => date('Y-m-d H:i:s')
		);
		$simpan = $this->db->update('tb_status_pengisian_nilai', $data, array('id_siswa' => $this->input->post('id_siswa', true),'kategori' => 'utbk'));
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

	public function isi_riwayat($id_riwayat_isi_rapor, $id_siswa){
		$row_data = $this->db->get_where('tb_riwayat_isi_rapor', array('id_siswa' => $id_siswa, 'id_riwayat_isi_rapor' => $id_riwayat_isi_rapor));

		$this->db->from('tb_mapel');
		$this->db->join('tb_siswa', 'tb_siswa.id_kategori_sma = tb_mapel.id_kategori_sma');
		$this->db->where(array('tb_siswa.id_siswa' => $id_siswa));
		$get_data = $this->db->get();

		$status = $this->db->get_where('tb_status_pengisian_nilai', array('id_siswa' => $id_siswa, 'kategori' => 'rapor', 'id_riwayat_isi_rapor' => $id_riwayat_isi_rapor));

		$cek_pendukung = $this->db->get_where('tb_pendukung_rapor', array('id_siswa' => $id_siswa, 'id_riwayat_isi_rapor' => $id_riwayat_isi_rapor));

		$status = $this->db->get_where('tb_status_pengisian_nilai', array('id_siswa' => $id_siswa, 'kategori' => 'rapor', 'id_riwayat_isi_rapor' => $id_riwayat_isi_rapor));
		// var_dump($this->db->last_query());exit();
		$data = array(
			// 'page' => 'user/nilai_rapor/index',
			'page' => 'siswa/riwayat_detail',
			'link' => 'siswa',
			'script' => 'siswa/script',
			'data' => $get_data,
			'status' => $status,
			'data_pendukung_rapor' => $cek_pendukung,
			'data_riwayat' => $row_data, 
			'id_riwayat_isi_rapor' => $id_riwayat_isi_rapor, 
			'id_siswa' => $id_siswa,
			'status' => $status,
		);
		$this->load->view('template/wrapper', $data);
	}
}
