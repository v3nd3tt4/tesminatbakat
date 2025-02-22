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
		$this->db->order_by("id_siswa", "DESC");
		
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

	function get_data_siswa()
    {
    	$this->load->model('M_data_siswa');
        $list = $this->M_data_siswa->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $field) {
        	
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $field->nama_siswa;
            $row[] = $field->email;
            $row[] = $field->s_rapor;
            $row[] = $field->s_rapor_rasi;
            $row[] = $field->s_utbk;
            $row[] = $field->s_utbk_rasi;
            $row[] = empty($field->password)?'<button class="btn btn-sm btn-danger">belum diset</button>':$field->password;
 			$row[] = '<button class="btn btn-danger btn-sm btn-hapus" id="'.$field->id_siswa.'"><i class="fas fa-trash"></i> Hapus</button>
    				<button class="btn btn-info btn-sm btn-edit" id="'.$field->id_siswa.'"><i class="fas fa-eye"></i> Detail</button>
    				<a href="'.base_url().'siswa/nilai_rapor_new/'.$field->id_siswa.'" class="btn btn-warning btn-sm" id="'.$field->id_siswa.'"><i class="fas fa-book"></i> Rapor</a>
    				<a href="'.base_url().'siswa/nilai_utbk_new/'.$field->id_siswa.'" class="btn btn-success btn-sm" id="'.$field->id_siswa.'"><i class="fas fa-book-open"></i> UTBK</a>
    				<!-- <a href="'.base_url().'siswa/riwayat_tes/'.$field->id_siswa.'" class="btn btn-primary btn-sm" id="'.$field->id_siswa.'"><i class="fas fa-pencil-alt"></i> Tes Minat Bakat</a> -->
    				<button class="btn btn-light btn-sm btn-token" id="'.$field->id_siswa.'"><i class="fas fa-key"></i> Generate Password/Token</button>';
            $data[] = $row;
        }
 
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->M_data_siswa->count_all(),
            "recordsFiltered" => $this->M_data_siswa->count_filtered(),
            "data" => $data,
        );
        //output dalam format JSON
        echo json_encode($output);
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
			// 'id_sekolah'		=>  $this->input->post('id_sekolah', true),
			'sekolah'		=>  $this->input->post('sekolah', true),
			'alamat'			=>  $this->input->post('alamat', true),
			'nisn'				=>  $this->input->post('nisn', true),
			'email'				=>  $this->input->post('email', true),
			'no_hp'				=> $this->input->post('no_hp', true),
			'id_kategori_sma'	=>  $this->input->post('id_kategori_sma', true),
			'id_kategori_utbk'	=>  $this->input->post('id_kategori_utbk', true),
			'sekolah' => $this->input->post('sekolah', true),
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

		$status_isi_nilai = $this->db->get_where('tb_status_pengisian_nilai', array('id_siswa' => $id_siswa, 'kategori' => 'rapor'));
		$status_tes = $this->db->get_where('tb_riwayat_tes', array('id_siswa' => $id_siswa, 'status' => 'sudah'));
		$data = array(
			'page' => 'siswa/nilai_rapor_new',
			'link' => 'siswa',
			'data_riwayat' => $row_data,
			'data_siswa' => $data_siswa,
			'status_isi_nilai' => $status_isi_nilai,
			'status_tes' => $status_tes,
		);
		$this->load->view('template/wrapper', $data);
	}

	public function nilai_utbk_new($id_siswa){
		$data_siswa = $this->db->get_where('tb_siswa', array('id_siswa' => $id_siswa));
		$row_data = $this->db->order_by('tgl_isi', 'DESC')->get_where('tb_riwayat_isi_utbk', array('id_siswa' => $id_siswa));
		$status_isi_nilai = $this->db->get_where('tb_status_pengisian_nilai', array('id_siswa' => $id_siswa, 'kategori' => 'utbk'));
		$status_tes = $this->db->get_where('tb_riwayat_tes', array('id_siswa' => $id_siswa, 'status' => 'sudah'));
		$data = array(
			'page' => 'siswa/nilai_utbk_new',
			'link' => 'siswa',
			'data_riwayat' => $row_data,
			'data_siswa' => $data_siswa,
			'status_isi_nilai' => $status_isi_nilai,
			'status_tes' => $status_tes,
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
			'tgl_create' => date('Y-m-d H:i:s'),
		);
		$simpan = $this->db->update('tb_status_pengisian_nilai', $data, array('id_siswa' => $this->input->post('id_siswa', true),'kategori' => 'utbk', 'id_riwayat_isi_rapor' => $this->input->post('id_riwayat_isi_utbk', true)));
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

		$get_test_terakhir = $this->db->query("select * from tb_riwayat_tes where id_siswa = '$id_siswa' order by id_riwayat_tes DESC limit 1");
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
			'get_test_terakhir' => $get_test_terakhir
		);
		$this->load->view('template/wrapper', $data);
	}

	public function isi_riwayat_utbk($id_riwayat_isi_utbk, $id_siswa){
		$row_data = $this->db->order_by('tgl_isi', 'DESC')->get_where('tb_riwayat_isi_utbk', array('id_siswa' => $id_siswa, 'id_riwayat_isi_utbk' => $id_riwayat_isi_utbk));

		$this->db->from('tb_nilai_mapel_utbk');
		$this->db->join('tb_mapel_utbk', 'tb_mapel_utbk.id_mapel_utbk = tb_nilai_mapel_utbk.id_mapel_utbk');
		$this->db->where(array('tb_nilai_mapel_utbk.id_siswa' => $id_siswa, 'tb_nilai_mapel_utbk.id_riwayat_isi_utbk' => $id_riwayat_isi_utbk));
		$data1 = $this->db->get();

		$utbk = $this->db->get_where('tb_kategori_utbk', array('id_kategori_utbk' => $data1->row()->id_kategori_utbk));

		$cek_pendukung = $this->db->get_where('tb_pendukung_utbk', array('id_siswa' => $id_siswa, 'id_riwayat_isi_utbk' => $id_riwayat_isi_utbk));

		$status = $this->db->get_where('tb_status_pengisian_nilai', array('id_siswa' => $id_siswa, 'kategori' => 'utbk', 'id_riwayat_isi_rapor' => $id_riwayat_isi_utbk));

		$get_test_terakhir = $this->db->query("select * from tb_riwayat_tes where id_siswa = '$id_siswa' order by id_riwayat_tes DESC limit 1");

		$data = array(
			'page' => 'siswa/riwayat_detail_utbk',
			'link' => 'siswa',
			'script' => 'siswa/script',
			'data_riwayat' => $row_data, 
			'data' => $data1,
			'utbk' => $utbk,
			'data_pendukung_utbk' => $cek_pendukung, 
			'status' => $status, 
			'id_siswa' => $id_siswa,
			'id_riwayat_isi_utbk' => $id_riwayat_isi_utbk,
			'get_test_terakhir' => $get_test_terakhir
		);
		$this->load->view('template/wrapper', $data);
	}

	public function riwayat_tes($id_siswa){
		$data_siswa = $this->db->get_where('tb_siswa', array('id_siswa' => $id_siswa));
		$riwayat = $this->db->get_where('tb_riwayat_tes', array('id_siswa' => $id_siswa));

		$data = array(
			'page' => 'siswa/riwayat_minat_bakat',
			'link' => 'siswa',
			'script' => 'siswa/script',
			'data_riwayat' => $riwayat,
			'data_siswa' => $data_siswa
		);
		$this->load->view('template/wrapper', $data);
	}

	public function lihat_semua(){
		$this->db->from('tb_siswa');
		$this->db->join('tb_jk', 'tb_jk.id_jk = tb_siswa.id_jk', 'left');
		$this->db->join('tb_agama', 'tb_agama.id_agama = tb_siswa.id_agama', 'left');
		$this->db->join('tb_kategori_sma', 'tb_kategori_sma.id_kategori_sma = tb_siswa.id_kategori_sma', 'left');
		// $this->db->order_by("id_siswa", "DESC");
		$data_siswa = $this->db->get();
		$data = array(
			'data_siswa' => $data_siswa
		);
		$this->load->view('siswa/lihat_semua', $data);
	}

	public function lihat_semua_rapor(){
		$this->db->from('tb_nilai_mapel');
		$this->db->join('tb_mapel', 'tb_mapel.id_mapel = tb_nilai_mapel.id_mapel', 'left');
		$this->db->join('tb_siswa', 'tb_siswa.id_siswa = tb_nilai_mapel.id_siswa', 'left');
		// $this->db->order_by("id_siswa", "DESC");
		$data_rapor = $this->db->get();
		$data = array(
			'data_rapor' => $data_rapor
		);
		$this->load->view('siswa/lihat_semua_rapor', $data);
	}

	public function lihat_semua_utbk(){
		$this->db->from('tb_nilai_mapel_utbk');
		$this->db->join('tb_mapel', 'tb_mapel.id_mapel = tb_nilai_mapel_utbk.id_mapel_utbk', 'left');
		$this->db->join('tb_siswa', 'tb_siswa.id_siswa = tb_nilai_mapel_utbk.id_siswa', 'left');
		// $this->db->order_by("id_siswa", "DESC");
		$data_rapor = $this->db->get();
		$data = array(
			'data_rapor' => $data_rapor
		);
		$this->load->view('siswa/lihat_semua_utbk', $data);
	}

	public function lihat_semua_hasil_tes(){
		$this->db->from('tb_riwayat_tes');
		$this->db->join('tb_siswa', 'tb_siswa.id_siswa = tb_riwayat_tes.id_siswa', 'left');
		// $this->db->order_by("id_siswa", "DESC");
		$data_rapor = $this->db->get();
		$data = array(
			'data_rapor' => $data_rapor
		);
		$this->load->view('siswa/lihat_semua_hasil_tes', $data);
	}

	public function hapus_semua_data(){
		$password = $this->input->post('password', true);
		$cek=$this->db->get_where('tb_user', array('username' => $this->session->userdata('username')));
		if($cek->row()->password != $password){
			$return = array(
				'status' => 'failed',
				'text' => '<div class="alert alert-danger">Password tidak cocok</div>'
			);
			echo json_encode($return);
		}else{
			$this->db->trans_begin();

			$this->db->truncate('tb_siswa');
			$this->db->truncate('tb_user');
			$this->db->truncate('tb_status_pengisian_nilai');
			$this->db->truncate('tb_temporary_soal');
			$this->db->truncate('tb_nilai_mapel');
			$this->db->truncate('tb_nilai_mapel_utbk');
			$this->db->truncate('tb_pendukung_rapor');
			$this->db->truncate('tb_pendukung_utbk');
			$this->db->truncate('tb_riwayat_isi_rapor');
			$this->db->truncate('tb_riwayat_isi_utbk');
			$this->db->truncate('tb_riwayat_tes');
			$this->db->truncate('tb_status_kelengkapan');
			$this->db->insert('tb_user', array('username' => 'admin@mail.com', 'password'=>'adminku', 'level' => 'admin'));

			if ($this->db->trans_status() === FALSE)
			{
					$this->db->trans_rollback();
					$return = array(
						'status' => 'failed',
						'text' => '<div class="alert alert-danger">Terjadi kesalahan</div>'
					);
					echo json_encode($return);
			}
			else
			{
					$this->db->trans_commit();
					$return = array(
						'status' => 'success',
						'text' => '<div class="alert alert-success">Semua data berhasil dihapus</div>'
					);
					echo json_encode($return);
			}

			
		}
	}

	public function backupdb($host='localhost',$user='root',$pass='Wahanagerak123@',$name='db_minat_bakat',       $tables=false, $backup_name=false){
		set_time_limit(3000); $mysqli = new mysqli($host,$user,$pass,$name); $mysqli->select_db($name); $mysqli->query("SET NAMES 'utf8'");
		$queryTables = $mysqli->query('SHOW TABLES'); while($row = $queryTables->fetch_row()) { $target_tables[] = $row[0]; }	if($tables !== false) { $target_tables = array_intersect( $target_tables, $tables); } 
		$content = "SET SQL_MODE = \"NO_AUTO_VALUE_ON_ZERO\";\r\nSET time_zone = \"+00:00\";\r\n\r\n\r\n/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;\r\n/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;\r\n/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;\r\n/*!40101 SET NAMES utf8 */;\r\n--\r\n-- Database: `".$name."`\r\n--\r\n\r\n\r\n";
		foreach($target_tables as $table){
			if (empty($table)){ continue; } 
			$result	= $mysqli->query('SELECT * FROM `'.$table.'`');  	$fields_amount=$result->field_count;  $rows_num=$mysqli->affected_rows; 	$res = $mysqli->query('SHOW CREATE TABLE '.$table);	$TableMLine=$res->fetch_row(); 
			$content .= "\n\n".$TableMLine[1].";\n\n";   $TableMLine[1]=str_ireplace('CREATE TABLE `','CREATE TABLE IF NOT EXISTS `',$TableMLine[1]);
			for ($i = 0, $st_counter = 0; $i < $fields_amount;   $i++, $st_counter=0) {
				while($row = $result->fetch_row())	{ //when started (and every after 100 command cycle):
					if ($st_counter%100 == 0 || $st_counter == 0 )	{$content .= "\nINSERT INTO ".$table." VALUES";}
						$content .= "\n(";    for($j=0; $j<$fields_amount; $j++){ $row[$j] = str_replace("\n","\\n", addslashes($row[$j]) ); if (isset($row[$j])){$content .= '"'.$row[$j].'"' ;}  else{$content .= '""';}	   if ($j<($fields_amount-1)){$content.= ',';}   }        $content .=")";
					//every after 100 command cycle [or at last line] ....p.s. but should be inserted 1 cycle eariler
					if ( (($st_counter+1)%100==0 && $st_counter!=0) || $st_counter+1==$rows_num) {$content .= ";";} else {$content .= ",";}	$st_counter=$st_counter+1;
				}
			} $content .="\n\n\n";
		}
		$content .= "\r\n\r\n/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;\r\n/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;\r\n/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;";
		$backup_name = $backup_name ? $backup_name : $name.'___('.date('H-i-s').'_'.date('d-m-Y').').sql';
		ob_get_clean(); header('Content-Type: application/octet-stream');  header("Content-Transfer-Encoding: Binary");  header('Content-Length: '. (function_exists('mb_strlen') ? mb_strlen($content, '8bit'): strlen($content)) );    header("Content-disposition: attachment; filename=\"".$backup_name."\""); 
		echo $content; exit;
	}
}
