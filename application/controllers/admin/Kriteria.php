<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kriteria extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if(!$this->session->userdata('level')){
			$this->session->set_flashdata('pesan', 'Anda harus masuk terlebih dahulu!');
			redirect('home');
		} elseif($this->session->userdata('level') != 'Administrator') {
			redirect('home');
        }
	}

	public function index()
	{
		$data['title']		= 'Kriteria Gaji';
		$data['subtitle']	= 'Semua data kriteria gaji akan muncul disini';

		$data['kriteria']   = $this->m_model->get_desc('tb_kriteria');
		
		$this->load->view('admin/templates/header', $data);
		$this->load->view('admin/templates/sidebar');
		$this->load->view('admin/kriteria');
		$this->load->view('admin/templates/footer');
    }

    public function delete($id)
	{
		$where = array('id' => $id);

		$this->m_model->delete($where, 'tb_kriteria');
		$this->session->set_flashdata('pesan', 'Kriteria Gaji Berhasil Dihapus!');
		redirect('admin/kriteria');
	}

	public function insert()
	{
		date_default_timezone_set('Asia/Jayapura');

		$kriteria	= $_POST['kriteria'];
		$jenis		= $_POST['jenis'];
		$terdaftar	= date('Y-m-d H:i:s');

		$data = array(
			'kriteria' 	=> $kriteria,
			'jenis' 	=> $jenis,
			'terdaftar'	=> $terdaftar
		);

		$this->m_model->insert($data, 'tb_kriteria');
		$this->session->set_flashdata('pesan', 'Kriteria Gaji Berhasil Ditambahkan!');
		redirect('admin/kriteria');
	}

	public function update($id)
	{
		$kriteria	= $_POST['kriteria'];
		$jenis		= $_POST['jenis'];

		$data = array(
			'kriteria' 	=> $kriteria,
			'jenis' 	=> $jenis
		);

		$where = array('id' => $id);

		$this->m_model->update($where, $data, 'tb_kriteria');
		$this->session->set_flashdata('pesan', 'Kriteria Gaji Berhasil Diubah!');
		redirect('admin/kriteria');
	}
}