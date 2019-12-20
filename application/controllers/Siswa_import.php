<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Siswa_import extends CI_Controller {

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
		$data = array(
			'page' => 'siswa_import/index',
			'link' => 'siswa_import',
			'script' => 'siswa_import/script',
			
		);
		$this->load->view('template/wrapper', $data);
	}

	public function store(){
		$data = array(
			'nama_siswa' 		=> $this->input->post('nama_siswa', true),
			'tempat_lahir'		=> $this->input->post('tempat_lahir', true),
			'tgl_lahir'			=> date("Y-m-d", strtotime($this->input->post('tgl_lahir', true))),
			'id_jk'				=> $this->input->post('id_jk', true),
			'id_agama'			=> $this->input->post('id_agama', true),
			'id_sekolah'		=> $this->input->post('id_sekolah', true),
			'alamat'			=> $this->input->post('alamat', true),
			'nisn'				=> $this->input->post('nisn', true),
			'email'				=> $this->input->post('email', true),
			'no_hp'				=> $this->input->post('no_hp', true),
			'id_kategori_sma'	=> $this->input->post('id_kategori_sma', true),
			'id_kategori_utbk'	=> $this->input->post('id_kategori_utbk', true),
		);

		$simpan = $this->db->insert('tb_siswa', $data);
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

	// public function preview()
	// {
	// 	$data = array(
	// 		'page' => 'siswa_import/preview',
	// 		'link' => 'siswa_import',
	// 		'script' => 'siswa_import/script',
			
	// 	);
	// 	$this->load->view('template/wrapper', $data);
	// }

	public function preview(){
		include './assets/excel_reader2.php';

		$allowed = array('xls', 'xlsx');
		$ext = pathinfo($_FILES['filenya']['name'], PATHINFO_EXTENSION);
		if (!in_array($ext, $allowed)) {
		   	echo '<script>alert("file tidak didukung, harus berformat xls");</script>';
			echo '<script>location.href = "'.base_url().'siswa_import";</script>';
			exit();
		}
		
		$target = basename($_FILES['filenya']['name']) ;
		move_uploaded_file($_FILES['filenya']['tmp_name'], './assets/'.$target);

		// beri permisi agar file xls dapat di baca
		chmod('./assets/'.$_FILES['filenya']['name'],0777);
		// var_dump($target.'aa');exit();
		// mengambil isi file xls
		$data = new Spreadsheet_Excel_Reader('./assets/'.$_FILES['filenya']['name'],false);
		// menghitung jumlah baris data yang ada
		$jumlah_baris = $data->rowcount($sheet_index=0);
		 
		// jumlah default data yang berhasil di import
		$berhasil = 0;
		$isi=array();
		for ($i=2; $i<=$jumlah_baris; $i++){
		 
			// menangkap data dan memasukkan ke variabel sesuai dengan kolumnya masing-masing
			$isi[] = array(
				'nama'    	=> $data->val($i, 1),
				'email'  	=> $data->val($i, 2),
			);
			
		}
		
		// hapus kembali file .xls yang di upload tadi
		unlink('./assets/'.$_FILES['filenya']['name']);

		$data = array(
			'page' => 'siswa_import/preview',
			'link' => 'siswa_import',
			'script' => 'siswa_import/script',
			'data' => $isi
		);
		$this->load->view('template/wrapper', $data);
	}

	public function preview_old(){
		$csvFile = $_FILES['filenya']['tmp_name'];
        $csv = $this->readCSV($csvFile);
        // var_dump($csv);exit();
        $isi=array();
        for($i=0;$i<count($csv);$i++){
        	if($i!=0){
        		$isi[] = $csv[$i];
        	}
        }
        $data = array(
			'page' => 'siswa_import/preview',
			'link' => 'siswa_import',
			'script' => 'siswa_import/script',
			'data' => $isi
		);
		$this->load->view('template/wrapper', $data);
	}

	public function store_import(){
		$data_to_save = $this->input->post('data_to_save', true);
		$data = json_decode($data_to_save);

		$str = 'abcefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		
		$isi = array();
		$isi2 = array();

		$cek = 0;
		for($i=0;$i<count($data);$i++){
			$cek_email = $this->db->get_where('tb_siswa', array('email' => $data[$i]['4']));
			if($cek_email->num_rows() != 0){
				$cek++;
			}

    		if($i!=(count($data)-1)){
    			$acak = str_shuffle($str);
				$potong = substr($acak, 0, 6);

    			$isi[] = array(
    				'nama_siswa' 		=> $data[$i]['1'],
					'tempat_lahir'		=> $data[$i]['2'],
					'tgl_lahir'			=> date("Y-m-d", strtotime($data[$i]['3'])),
					'id_jk'				=> $data[$i]['6'],
					'id_agama'			=> $data[$i]['7'],
					'id_sekolah'		=> $data[$i]['8'],
					'alamat'			=> $data[$i]['11'],
					'nisn'				=> $data[$i]['0'],
					'email'				=> trim($data[$i]['4']),
					'no_hp'				=> $data[$i]['5'],
					'id_kategori_sma'	=> $data[$i]['9'],
					'id_kategori_utbk'	=> $data[$i]['10'],
    			);;

    			$isi2[] = array(
    				'username' => trims($data[$i]['4']),
    				'password' => $potong,
    				'level' => 'siswa'
    			);
    		}
    	}
    	if($cek > 0){
    		$return = array(
				'status' => 'failed',
				'text' => '<div class="alert alert-danger">Terdapat email yang sama</div>'
			);
			echo json_encode($return);
    	}else{
    		$this->db->trans_begin();
	    	$this->db->insert_batch('tb_siswa', $isi);
	    	$this->db->insert_batch('tb_user', $isi2);
	    	if ($this->db->trans_status() === FALSE)
			{
			        $this->db->trans_rollback();
			        $return = array(
						'status' => 'failed',
						'text' => '<div class="alert alert-danger">Data gagal diimport</div>'
					);
					echo json_encode($return);
			}
			else
			{
			        $this->db->trans_commit();
			        $return = array(
						'status' => 'success',
						'text' => '<div class="alert alert-success">Data berhasil diimport</div>'
					);
					echo json_encode($return);
			}
    	}
    	
	}

	public function store_import_new(){
		$data_to_save = $this->input->post('data_to_save', true);
		$data = json_decode($data_to_save);
		$cek = 0;
		// var_dump($data[0]->nama);exit();
		for($i=0;$i<count($data);$i++){
			$cek_email = $this->db->get_where('tb_siswa', array('email' => trim($data[$i]->email)));
			// var_dump($this->db->last_query());
			if($cek_email->num_rows() != 0){
				$cek++;
			}

    		// if($i!=(count($data)-1)){
    // 			$acak = str_shuffle($str);
				// $potong = substr($acak, 0, 6);

    			$isi[] = array(
    				'nama_siswa' 		=> $data[$i]->nama,
					// 'tempat_lahir'		=> $data[$i]['2'],
					// 'tgl_lahir'			=> date("Y-m-d", strtotime($data[$i]['3'])),
					// 'id_jk'				=> $data[$i]['6'],
					// 'id_agama'			=> $data[$i]['7'],
					// 'id_sekolah'		=> $data[$i]['8'],
					// 'alamat'			=> $data[$i]['11'],
					// 'nisn'				=> $data[$i]['0'],
					'email'				=> trim($data[$i]->email),
					// 'no_hp'				=> $data[$i]['5'],
					// 'id_kategori_sma'	=> $data[$i]['9'],
					// 'id_kategori_utbk'	=> $data[$i]['10'],
    			);;

    			$isi2[] = array(
    				'username' => trim($data[$i]->email),
    				'level' => 'siswa'
    			);
    		// }
    	}
    	// var_dump($cek);exit();
    	if($cek > 0){
    		$return = array(
				'status' => 'failed',
				'text' => '<div class="alert alert-danger">Terdapat email yang sudah terdaftar, mohon periksa kembali</div>'
			);
			echo json_encode($return);
    	}else{
    		$this->db->trans_begin();
	    	$this->db->insert_batch('tb_siswa', $isi);
	    	$this->db->insert_batch('tb_user', $isi2);
	    	if ($this->db->trans_status() === FALSE)
			{
			        $this->db->trans_rollback();
			        $return = array(
						'status' => 'failed',
						'text' => '<div class="alert alert-danger">Data gagal diimport</div>'
					);
					echo json_encode($return);
			}
			else
			{
			        $this->db->trans_commit();
			        $return = array(
						'status' => 'success',
						'text' => '<div class="alert alert-success">Data berhasil diimport</div>'
					);
					echo json_encode($return);
			}
    	}
	}

	public function readCSV($csvFile){
        $delimiter = $this->getFileDelimiter($csvFile); 
        $file_handle = fopen($csvFile, 'r');
        while (!feof($file_handle) ) {
            $line_of_text[] = fgetcsv($file_handle, 1024, $delimiter);
        }
        fclose($file_handle);
        return $line_of_text;
    } 

    public function getFileDelimiter($file, $checkLines = 2){
        $file = new SplFileObject($file);
        $delimiters = array(
          ',',
          '\t',
          ';',
          '|',
          ':'
        );
        $results = array();
        $i = 0;
         while($file->valid() && $i <= $checkLines){
            $line = $file->fgets();
            foreach ($delimiters as $delimiter){
                $regExp = '/['.$delimiter.']/';
                $fields = preg_split($regExp, $line);
                if(count($fields) > 1){
                    if(!empty($results[$delimiter])){
                        $results[$delimiter]++;
                    } else {
                        $results[$delimiter] = 1;
                    }   
                }
            }
           $i++;
        }
        $results = array_keys($results, max($results));
        return $results[0];
    }
  
}
