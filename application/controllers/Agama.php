<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Agama extends CI_Controller {

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

	public function store(){
		$data = array(
			'nama_agama' => $this->input->post('nama_agama', true),
		);

		$simpan = $this->db->insert('tb_agama', $data);
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
			'nama_agama' => $this->input->post('nama_agama', true),
		);

		$simpan = $this->db->update('tb_agama', $data, array('id_agama' => $this->input->post('id_agama', true)));
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
			'id_agama' => $this->input->post('id', true),
		);

		$delete = $this->db->delete('tb_agama', $param);
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
			'id_agama' => $this->input->post('id', true),
		);
		$get_data = $this->db->get_where('tb_agama', $param);
		echo json_encode($get_data->row());
	}
}
