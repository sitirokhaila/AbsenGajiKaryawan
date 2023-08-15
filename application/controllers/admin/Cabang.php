<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cabang extends CI_Controller {

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
		$data['title']		= 'Data Cabang';
		$data['subtitle']	= 'Semua data cabang akan muncul disini';

		$data['cabang']   	= $this->m_model->get_desc('tb_cabang');
		
		$this->load->view('admin/templates/header', $data);
		$this->load->view('admin/templates/sidebar');
		$this->load->view('admin/cabang');
		$this->load->view('admin/templates/footer');
    }

    public function delete($id)
	{
		$where = array('id' => $id);

		$this->m_model->delete($where, 'tb_cabang');
		$this->session->set_flashdata('pesan', 'Data cabang Berhasil Dihapus!');
		redirect('admin/cabang');
	}

	public function insert()
	{
		date_default_timezone_set('Asia/Jayapura');

		$cabang			= $_POST['cabang'];
		$terdaftar		= date('Y-m-d H:i:s');

		$data = array(
			'cabang' 		=> $cabang,
			'terdaftar'		=> $terdaftar
		);

		$this->m_model->insert($data, 'tb_cabang');
		$this->session->set_flashdata('pesan', 'Data cabang Berhasil Ditambahkan!');
		redirect('admin/cabang');
	}

	public function update($id)
	{
		$cabang			= $_POST['cabang'];

		$data = array(
			'cabang' 		=> $cabang,
		);

		$where = array('id' => $id);

		$this->m_model->update($where, $data, 'tb_cabang');
		$this->session->set_flashdata('pesan', 'Data cabang Berhasil Diubah!');
		redirect('admin/cabang');
	}

	public function detail($id)
	{
		date_default_timezone_set('Asia/Jayapura');

		$data['title']		= 'Detail Data Cabang';
		$data['subtitle']	= 'Semua data cabang yang dipilih akan muncul disini';

		$this->db->where('id', $id);
		$data['cabang']   	= $this->m_model->get_desc('tb_cabang');
		$this->db->where('level', 'Karyawan');
		$this->db->where('idCabang', $id);
		$data['user']   		= $this->m_model->get_desc('tb_user');
		$data['terlambat']  	= $this->db->query('SELECT DISTINCT(idUser) FROM tb_absensi WHERE idUser IN (SELECT id FROM tb_user WHERE idCabang="'.$id.'") AND status="Terlambat" AND MONTH(tanggal)="'.date('m').'" AND YEAR(tanggal)="'.date('Y').'"');
		$data['tidakhadir']		= $this->db->query('SELECT nama, idJabatan FROM tb_user WHERE id NOT IN (SELECT idUser FROM tb_absensi WHERE idCabang="'.$id.'" AND tanggal="'.date('Y-m-d').'") AND level="Karyawan" AND idCabang="'.$id.'"');
		$data['idCabangGrafik']	= $id;

		$this->load->view('admin/templates/header', $data);
		$this->load->view('admin/templates/sidebar');
		$this->load->view('admin/detailcabang');
		$this->load->view('admin/templates/footer');
	}
}