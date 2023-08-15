<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gaji extends CI_Controller {

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
		$data['title']		= 'Perhitungan Gaji';
		$data['subtitle']	= 'Semua data perhitungan gaji akan muncul disini';

		$this->db->where('level', 'Karyawan');
		$data['user']   	= $this->m_model->get_desc('tb_user');
		
		$this->load->view('admin/templates/header', $data);
		$this->load->view('admin/templates/sidebar');
		$this->load->view('admin/gaji');
		$this->load->view('admin/templates/footer');
    }

	public function setting($id)
	{
		$data['title']		= 'Setting Gaji';
		$data['subtitle']	= 'Semua data gaji karyawan yang dipilih akan muncul disini';

		$this->db->where('id', $id);
		$data['user']   	= $this->m_model->get_desc('tb_user');
		$data['kriteria']   = $this->db->query('SELECT * FROM tb_kriteria WHERE id NOT IN (SELECT idKriteria FROM tb_gaji WHERE idKaryawan="'.$id.'" ) ');
		$this->db->where('idKaryawan', $id);
		$data['gaji']   	= $this->m_model->get_desc('tb_gaji');
		
		$this->load->view('admin/templates/header', $data);
		$this->load->view('admin/templates/sidebar');
		$this->load->view('admin/settinggaji');
		$this->load->view('admin/templates/footer');
	}

    public function delete($id, $idKaryawan)
	{
		$where = array('id' => $id);

		$this->m_model->delete($where, 'tb_gaji');
		$this->session->set_flashdata('pesan', 'Gaji karyawan berhasil dihapus');
		redirect("admin/gaji/setting/$idKaryawan");
	}

	public function insert($idKaryawan)
	{
		date_default_timezone_set('Asia/Jayapura');

		$idKaryawan		= $idKaryawan;
		$idKriteria		= $_POST['idKriteria'];
		$nominal		= $_POST['nominal'];
		$terdaftar		= date('Y-m-d H:i:s');

		$data = array(
			'idKaryawan' 	=> $idKaryawan,
			'idKriteria' 	=> $idKriteria,
			'nominal' 		=> $nominal,
			'terdaftar'		=> $terdaftar
		);

		$this->m_model->insert($data, 'tb_gaji');
		$this->session->set_flashdata('pesan', 'Gaji Berhasil Ditambahkan pada karyawan!');
		redirect("admin/gaji/setting/$idKaryawan");
	}

	public function update($idKaryawan, $id)
	{
		date_default_timezone_set('Asia/Jayapura');

		$nominal	= $_POST['nominal'];
		$terdaftar	= date('Y-m-d H:i:s');

		$data = array(
			'nominal' 	=> $nominal,
			'terdaftar'	=> $terdaftar
		);

		$where = array('id' => $id);

		$this->m_model->update($where, $data, 'tb_gaji');
		$this->session->set_flashdata('pesan', 'Gaji Berhasil Diubah!');
		redirect("admin/gaji/setting/$idKaryawan");
	}

	public function kirimgaji($idKaryawan)
	{
		date_default_timezone_set('Asia/Jayapura');

		foreach ($_POST['idGaji'] as $id) {
			$where = array('id' => $id);
			foreach ($this->m_model->get_where($where, 'tb_gaji')->result() as $dGji) {
				$data = array(
					'idKaryawan' 	=> $idKaryawan,
					'idKriteria' 	=> $dGji->idKriteria,
					'nominal' 		=> $dGji->nominal,
				);

				$this->m_model->insert($data, 'tb_kirimgaji');
			}
		}

		//Simpan Alpa
		$this->db->where('bulan', date('m'));
		$this->db->where('tahun', date('Y'));
		if(empty($this->db->get('tb_kewajiban')->num_rows())) {
			$biayaAlpa = 0;
			echo '<div class="label label-danger">Belum Disetting</div>';
		} else {
			$this->db->where('bulan', date('m', strtotime($_POST['tanggal'])));
			$this->db->where('tahun', date('Y', strtotime($_POST['tanggal'])));
			foreach ($this->db->get('tb_kewajiban')->result() as $dKjw) {
				$jumlahKewajiban = $dKjw->jumlah;
				$totalAbsen = $this->db->query('SELECT id FROM tb_absensi WHERE MONTH(tanggal)="'.date('m', strtotime($_POST['tanggal'])).'" AND YEAR(tanggal)="'.date('Y', strtotime($_POST['tanggal'])).'" AND idUser="'.$idKaryawan.'"');
				$jumlahAlpa = $jumlahKewajiban - $totalAbsen->num_rows();
				$biayaAlpa  = $jumlahAlpa * 25000;
				$dataSimpanalpa = array(
					'idKaryawan' 	=> $idKaryawan,
					'idKriteria' 	=> 0,
					'nominal' 		=> $biayaAlpa,
					'keterangan' 	=> 'Alpa'
				);

				$this->m_model->insert($dataSimpanalpa, 'tb_kirimgaji');
			}
		}

		//Simpan Terlambat
		$terlambat = $this->db->query('SELECT id FROM tb_absensi WHERE MONTH(tanggal)="'.date('m', strtotime($_POST['tanggal'])).'" AND YEAR(tanggal)="'.date('Y', strtotime($_POST['tanggal'])).'" AND idUser="'.$idKaryawan.'" AND status="Terlambat"');
		$biayaTerlambat = $terlambat->num_rows() * 5000;
		$dataSimpanterlambat = array(
			'idKaryawan' 	=> $idKaryawan,
			'idKriteria' 	=> 0,
			'nominal' 		=> $biayaTerlambat,
			'keterangan' 	=> 'Terlambat'
		);

		$this->m_model->insert($dataSimpanterlambat, 'tb_kirimgaji');

		$insertTanggalGaji = array(
			'idkaryawan' 	=> $idKaryawan,
			'idAdmin' 		=> $this->session->userdata('id'),
			'tanggal' 		=> $_POST['tanggal'],
			'terdaftar'		=> date('Y-m-d H:i:s')
		);

		$this->m_model->insert($insertTanggalGaji, 'tb_gajian');

		//get ID gajian
		foreach ($this->m_model->get_where($insertTanggalGaji, 'tb_gajian')->result() as $dGajian) {
			$where = array('idGajian' => 0);
			$dataUpdate = array('idGajian' => $dGajian->id);

			$this->m_model->update($where, $dataUpdate, 'tb_kirimgaji');
		}

		$this->session->set_flashdata('pesan', 'Data gaji berhasil dikirim!');
		redirect('admin/gaji');
	}
}