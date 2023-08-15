<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gajian extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if(!$this->session->userdata('level')){
			$this->session->set_flashdata('pesan', 'Anda harus masuk terlebih dahulu!');
			redirect('home');
		}
	}

	public function index()
	{
		$data['title']		= 'Data Gajian';
		$data['subtitle']	= 'Semua data gajian akan muncul disini';

		if($this->session->userdata('level') == 'Karyawan') {
			$this->db->where('idKaryawan', $this->session->userdata('id'));
		}
		$data['gajian']   	= $this->m_model->get_desc('tb_gajian');
		
		$this->load->view('admin/templates/header', $data);
		$this->load->view('admin/templates/sidebar');
		$this->load->view('admin/gajian');
		$this->load->view('admin/templates/footer');
    }

	public function detail($id, $idKaryawan)
	{
		$data['title']		= 'Detail Gaji Karyawan';
		$data['subtitle']	= 'Semua gaji karyawan yang dipilih akan muncul disini';

		$this->db->where('id', $idKaryawan);
		$data['user']   	= $this->m_model->get_desc('tb_user');
		$this->db->where('idGajian', $id);
		$this->db->where('idKriteria !=', 0);
		$data['kirimgaji']  = $this->m_model->get_desc('tb_kirimgaji');
		$this->db->where('idGajian', $id);
		$this->db->where('idKriteria', 0);
		$data['pengurangangaji']  = $this->m_model->get_desc('tb_kirimgaji');

		$data['idGajian'] 		= $id;
		$data['idKaryawan'] 	= $idKaryawan;
		
		$this->load->view('admin/templates/header', $data);
		$this->load->view('admin/templates/sidebar');
		$this->load->view('admin/detailgaji');
		$this->load->view('admin/templates/footer');
	}

	public function delete($id)
	{
		$where = array('id' => $id);
		$kirimwhere = array('idGajian' => $id);

		$this->m_model->delete($where, 'tb_gajian');
		$this->m_model->delete($kirimwhere, 'tb_kirimgaji');
		$this->session->set_flashdata('pesan', 'Gajian berhasil dihapus');
		redirect('admin/gajian');
	}

	public function cetak($id, $idKaryawan)
	{
		$data['title']	= 'Cetak Gaji';

		$this->db->where('id', $id);
		$data['gajian']	= $this->m_model->get_desc('tb_gajian');
		$this->db->where('idGajian', $id);
		$this->db->where('idKriteria !=', 0);
		$data['kirimgaji']	= $this->m_model->get_desc('tb_kirimgaji');
		$this->db->where('idGajian', $id);
		$this->db->where('idKriteria', 0);
		$data['pengurangangaji']	= $this->m_model->get_desc('tb_kirimgaji');
		$this->db->where('id', $idKaryawan);
		$data['user']		= $this->m_model->get_desc('tb_user');

		$data['idGajian']	= $id;

		$this->load->view('admin/cetakgaji', $data);
	}

	public function rekap()
	{
		$data['title']	= 'Rekap Gajian';

		$dariTanggal	= date('Y-m-d', strtotime($_POST['dariTanggal']));
		$sampaiTanggal	= date('Y-m-d', strtotime($_POST['sampaiTanggal']));

		$data['gajian']		= $this->db->query('SELECT * FROM tb_gajian WHERE tanggal BETWEEN "'.$dariTanggal.'" AND "'.$sampaiTanggal.'" ');
		$data['tglAwal'] 	= $_POST['dariTanggal'];
		$data['tglAkhir'] 	= $_POST['sampaiTanggal'];

		$this->load->view('admin/cetakgajian', $data);
	}
}