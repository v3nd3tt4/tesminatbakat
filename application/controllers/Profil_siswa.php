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
		$get_data = $this->db->get_where('tb_siswa', array('id_siswa' => $this->session->userdata('id_siswa')));

		$jk = $this->db->get('tb_jk');
		$agama = $this->db->get('tb_agama');
		$sekolah = $this->db->get('tb_sekolah');
		$kat_sma = $this->db->get('tb_kategori_sma');
		$kat_utbk = $this->db->get('tb_kategori_utbk');

		$data = array(
			'page' => 'user/profil_siswa/index',
			'link' => 'profil_siswa',
			'script' => 'user/profil_siswa/script',
			'data' => $get_data,
			'data_jk' => $jk,
			'data_agama' => $agama,
			'data_sekolah' => $sekolah,
			'data_sma' => $kat_sma,
			'data_utbk' => $kat_utbk
		);
		$this->load->view('template/wrapper', $data);
	}

	public function update(){
		$data = array(
			'nama_siswa' 		=> $this->input->post('nama_siswa', true),
			'tempat_lahir'		=> $this->input->post('tempat_lahir', true),
			'tgl_lahir'			=> date("Y-m-d", strtotime($this->input->post('tgl_lahir', true))),
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

	public function ganti_password(){
		$get_data = $this->db->get_where('tb_user', array('username' => $this->session->userdata('username')));
		$data = array(
			'page' => 'user/ganti_password/index',
			'link' => 'ganti_password',
			'script' => 'user/ganti_password/script',
			'data' => $get_data,
			
		);
		$this->load->view('template/wrapper', $data);
	}

	public function update_password(){
		$pass = $this->input->post('password');
		$confirm_pass = $this->input->post('confirm_password');
		// var_dump($_POST);exit();
		if($pass != $confirm_pass){
			$return = array(
				'status' => 'failed',
				'text' => '<div class="alert alert-danger">Password tidak cocok</div>'
			);
			echo json_encode($return);
			exit();
		}else{
			$update = $this->db->update('tb_user', array('password' => $pass), array('username' => $this->session->userdata('username')));
			if($update){
				$return = array(
					'status' => 'success',
					'text' => '<div class="alert alert-success">Password berhasil diganti</div>'
				);
				echo json_encode($return);
			}else{
				$return = array(
					'status' => 'failed',
					'text' => '<div class="alert alert-danger">Password gagal diganti</div>'
				);
				echo json_encode($return);
			}
		}
	}

	public function nilai_rapor(){
		$this->db->from('tb_mapel');
		$this->db->join('tb_siswa', 'tb_siswa.id_kategori_sma = tb_mapel.id_kategori_sma');
		$this->db->where(array('tb_siswa.id_siswa' => $this->session->userdata('id_siswa')));
		$get_data = $this->db->get();

		$status = $this->db->get_where('tb_status_pengisian_nilai', array('id_siswa' => $this->session->userdata('id_siswa'), 'kategori' => 'rapor'));

		$data = array(
			'page' => 'user/nilai_rapor/index',
			'link' => 'nilai_rapor',
			'script' => 'user/nilai_rapor/script',
			'data' => $get_data,
			'status' => $status
			
		);
		$this->load->view('template/wrapper', $data);
	}

	public function simpan_nilai_rapor(){
		$cek = $this->db->get_where('tb_status_pengisian_nilai', array('id_siswa' => $this->session->userdata('id_siswa'),'kategori' => 'rapor'));

		$data = array();
		foreach($this->input->post('mapel') as $key => $value){
			$data[] = array(
				'id_mapel' => $key,
				'id_siswa' => $this->session->userdata('id_siswa'),
				'nilai' => $value
			);
		}
		$this->db->trans_begin();

		if($cek->num_rows() == 0){
			$this->db->insert_batch('tb_nilai_mapel', $data);
			$this->db->insert('tb_status_pengisian_nilai', array('id_siswa'=>$this->session->userdata('id_siswa'), 'kategori' => 'rapor', 'status' => 'sudah', 'tgl_create' => date('Y-m-d H:i:s')));
		}else{
			$param = array();
			foreach($this->input->post('mapel') as $key => $value){
				$data = array(
					'id_mapel' => $key,
					'id_siswa' => $this->session->userdata('id_siswa'),
					'nilai' => $value
				);

				$param = array(
					'id_mapel' => $key,
					'id_siswa' => $this->session->userdata('id_siswa'),
				);
				$this->db->update('tb_nilai_mapel', $data, $param);
			}
			$this->db->update('tb_status_pengisian_nilai', array('status' => 'update', 'tgl_create' => date('Y-m-d H:i:s')),array('id_siswa'=>$this->session->userdata('id_siswa'), 'kategori' => 'rapor'));
			
		}

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

	public function nilai_utbk(){
		$this->db->from('tb_mapel_utbk');
		$this->db->join('tb_siswa', 'tb_siswa.id_kategori_utbk= tb_mapel_utbk.id_kategori_utbk');
		$this->db->where(array('tb_siswa.id_siswa' => $this->session->userdata('id_siswa')));
		$get_data = $this->db->get();

		$status = $this->db->get_where('tb_status_pengisian_nilai', array('id_siswa' => $this->session->userdata('id_siswa'), 'kategori' => 'utbk'));

		$data = array(
			'page' => 'user/nilai_utbk/index',
			'link' => 'nilai_utbk',
			'script' => 'user/nilai_utbk/script',
			'data' => $get_data,
			'status' => $status
			
		);
		$this->load->view('template/wrapper', $data);
	}

	public function simpan_nilai_utbk(){
		$cek = $this->db->get_where('tb_status_pengisian_nilai', array('id_siswa' => $this->session->userdata('id_siswa'),'kategori' => 'utbk'));

		$data = array();
		foreach($this->input->post('mapel') as $key => $value){
			$data[] = array(
				'id_mapel_utbk' => $key,
				'id_siswa' => $this->session->userdata('id_siswa'),
				'nilai' => $value
			);
		}
		$this->db->trans_begin();

		if($cek->num_rows() == 0){
			$this->db->insert_batch('tb_nilai_mapel_utbk', $data);
			$this->db->insert('tb_status_pengisian_nilai', array('id_siswa'=>$this->session->userdata('id_siswa'), 'kategori' => 'utbk', 'status' => 'sudah', 'tgl_create' => date('Y-m-d H:i:s')));
		}else{
			$param = array();
			foreach($this->input->post('mapel') as $key => $value){
				$data = array(
					'id_mapel_utbk' => $key,
					'id_siswa' => $this->session->userdata('id_siswa'),
					'nilai' => $value
				);

				$param = array(
					'id_mapel_utbk' => $key,
					'id_siswa' => $this->session->userdata('id_siswa'),
				);
				$this->db->update('tb_nilai_mapel_utbk', $data, $param);
			}
			$this->db->update('tb_status_pengisian_nilai', array('status' => 'update', 'tgl_create' => date('Y-m-d H:i:s')),array('id_siswa'=>$this->session->userdata('id_siswa'), 'kategori' => 'utbk'));
			
		}

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