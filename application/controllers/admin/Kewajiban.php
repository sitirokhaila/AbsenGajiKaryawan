<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kewajiban extends CI_Controller {

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
		$data['title']		= 'Data Kewajiban Absen';
		$data['subtitle']	= 'Semua data kewajiban absen akan muncul disini';

		$data['kewajiban']   	= $this->m_model->get_desc('tb_kewajiban');
		
		$this->load->view('admin/templates/header', $data);
		$this->load->view('admin/templates/sidebar');
		$this->load->view('admin/kewajibanabsen');
		$this->load->view('admin/templates/footer');
    }

    public function delete($id)
	{
		$where = array('id' => $id);

		$this->m_model->delete($where, 'tb_kewajiban');
		$this->session->set_flashdata('pesan', 'Data kewajiban absen Berhasil Dihapus!');
		redirect('admin/kewajiban');
	}

	public function insert()
	{
		date_default_timezone_set('Asia/Jayapura');

		$bulan		= $_POST['bulan'];
		$tahun		= $_POST['tahun'];
		$jumlah		= $_POST['jumlah'];
		$terdaftar	= date('Y-m-d H:i:s');

		$data = array(
			'bulan' 		=> $bulan,
			'tahun' 		=> $tahun,
			'jumlah' 		=> $jumlah,
			'terdaftar'		=> $terdaftar
		);

		$this->m_model->insert($data, 'tb_kewajiban');
		$this->session->set_flashdata('pesan', 'Data kewajiban absen Berhasil Ditambahkan!');
		redirect('admin/kewajiban');
	}

	public function update($id)
	{
		$bulan		= $_POST['bulan'];
		$tahun		= $_POST['tahun'];
		$jumlah		= $_POST['jumlah'];

		$data = array(
			'bulan' 		=> $bulan,
			'tahun' 		=> $tahun,
			'jumlah' 		=> $jumlah
		);

		$where = array('id' => $id);

		$this->m_model->update($where, $data, 'tb_kewajiban');
		$this->session->set_flashdata('pesan', 'Data kewajiban absen Berhasil Diubah!');
		redirect('admin/kewajiban');
	}
}