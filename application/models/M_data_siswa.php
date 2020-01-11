<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class M_data_siswa extends CI_Model {

    var $table = 'tb_siswa'; //nama tabel dari database
    var $column_order = array(null, 'nama_siswa','email','password', 's_rapor', 's_rapor_rasi', 's_utbk', 's_utbk_rasi', 'id_siswa'); //field yang ada di table user
    var $column_search = array('nama_siswa','password', 's_rapor', 's_rapor_rasi', 's_utbk', 's_utbk_rasi'); //field yang diizin untuk pencarian 
    var $order = array('id_siswa' => 'DESC'); // default order 
 
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
 
    private function _get_datatables_query()
    {
         
        // $this->db->from($this->table);
        $this->db->from('v_data_siswa');
        // $this->db->join('tb_jk', 'tb_jk.id_jk = tb_siswa.id_jk', 'left');
        // $this->db->join('tb_agama', 'tb_agama.id_agama = tb_siswa.id_agama', 'left');
        // $this->db->join('tb_sekolah', 'tb_sekolah.id_sekolah = tb_siswa.id_sekolah', 'left');
        // $this->db->join('tb_user', 'tb_siswa.email = tb_user.username', 'left');
        // $this->db->order_by("id_siswa", "DESC");
        
        // $get_data = $this->db->get();
 
        $i = 0;
     
        foreach ($this->column_search as $item) // looping awal
        {
            if($_POST['search']['value']) // jika datatable mengirimkan pencarian dengan metode POST
            {
                 
                if($i===0) // looping awal
                {
                    $this->db->group_start(); 
                    $this->db->like($item, $_POST['search']['value']);
                }
                else
                {
                    $this->db->or_like($item, $_POST['search']['value']);
                }
 
                if(count($this->column_search) - 1 == $i) 
                    $this->db->group_end(); 
            }
            $i++;
        }
         
        if(isset($_POST['order'])) 
        {
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } 
        else if(isset($this->order))
        {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }
 
    function get_datatables()
    {
        $this->_get_datatables_query();
        if($_POST['length'] != -1)
        $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }
 
    function count_filtered()
    {
        $this->_get_datatables_query();
        $query = $this->db->get();
        return $query->num_rows();
    }
 
    public function count_all()
    {
        $this->db->from('v_data_siswa');
        // $this->db->join('tb_jk', 'tb_jk.id_jk = tb_siswa.id_jk', 'left');
        // $this->db->join('tb_agama', 'tb_agama.id_agama = tb_siswa.id_agama', 'left');
        // $this->db->join('tb_sekolah', 'tb_sekolah.id_sekolah = tb_siswa.id_sekolah', 'left');
        // $this->db->join('tb_user', 'tb_siswa.email = tb_user.username', 'left');
        return $this->db->count_all_results();
    }
 
}