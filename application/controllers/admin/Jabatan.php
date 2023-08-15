<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jabatan extends CI_Controller {

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
		$data['title']		= 'Data Jabatan';
		$data['subtitle']	= 'Semua data jabatan akan muncul disini';

		$data['jabatan']   	= $this->m_model->get_desc('tb_jabatan');
		
		$this->load->view('admin/templates/header', $data);
		$this->load->view('admin/templates/sidebar');
		$this->load->view('admin/jabatan');
		$this->load->view('admin/templates/footer');
    }

    public function delete($id)
	{
		$where = array('id' => $id);

		$this->m_model->delete($where, 'tb_jabatan');
		$this->session->set_flashdata('pesan', 'Data jabatan Berhasil Dihapus!');
		redirect('admin/jabatan');
	}

	public function insert()
	{
		date_default_timezone_set('Asia/Jayapura');

		$jabatan			= $_POST['jabatan'];
		$terdaftar		= date('Y-m-d H:i:s');

		$data = array(
			'jabatan' 		=> $jabatan,
			'terdaftar'		=> $terdaftar
		);

		$this->m_model->insert($data, 'tb_jabatan');
		$this->session->set_flashdata('pesan', 'Data jabatan Berhasil Ditambahkan!');
		redirect('admin/jabatan');
	}

	public function update($id)
	{
		$jabatan			= $_POST['jabatan'];

		$data = array(
			'jabatan' 		=> $jabatan,
		);

		$where = array('id' => $id);

		$this->m_model->update($where, $data, 'tb_jabatan');
		$this->session->set_flashdata('pesan', 'Data jabatan Berhasil Diubah!');
		redirect('admin/jabatan');
	}
}