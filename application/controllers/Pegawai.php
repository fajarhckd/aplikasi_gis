<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pegawai extends CI_Controller {

	function __construct(){
		parent::__construct();

		$this->load->model('M_pegawai');
	}
	
	public function index(){
		$data['data'] = $this->db->get('pegawai')->result_array();
		$this->load->view('pegawai',$data);
	}
	
	function tambah_data(){
		$data  = [
			"nama" => $this->input->post('nama',TRUE),
			"tanggal_lahir" => $this->input->post('tanggal_lahir',TRUE),
			"tempat_lahir" => $this->input->post('tempat_lahir',TRUE),
			"jk" => $this->input->post('jk',TRUE),
			"cita_cita" => $this->input->post('cita',TRUE),
		];

		$this->db->insert('pegawai',$data);
		
		redirect('pegawai');
	}

	function in_tambah(){
		$this->load->view('in_tambah_pegawai');
	}

	function tambah_map($id){
		$data['id'] = $id; 
		$this->load->view('in_tambah_map',$data);
	}

	function proses_tambah_peta(){
		$id = $this->input->post('id',TRUE);

		$data = [
			"latitude" => $this->input->post('lat',TRUE),
			"longitude" => $this->input->post('lng',TRUE)
		];

		$this->db->where('id',$id);
		$this->db->update('pegawai',$data);

		redirect('pegawai');
	}

	function view_map(){
		$data['data'] = $this->db->get('pegawai')->result_array();
		$this->load->view('view_map',$data);
	}

	function viewmarkerpegawai(){
		// get personil
        $id = $this->input->post('id');
        $this->db->where('id', $id);
		$data_pegawai = $this->db->get('pegawai');

		$cek = $data_pegawai->row_array();

        if (!$this->input->is_ajax_request()) {
			show_404();
		}else{
			if ($cek['latitude']!=null){
				$status = 'success';
				$msg = $data_pegawai->result();
			}else{
				$status = 'error';
				$msg = 'alamat tidak ditemukan';
				$data_pegawai = null;
			}
			$this->output->set_content_type('application/json')->set_output(json_encode(array('status'=>$status,'msg'=>$msg,'data_pegawai'=>$data_pegawai)));
		}
	}
	
}
