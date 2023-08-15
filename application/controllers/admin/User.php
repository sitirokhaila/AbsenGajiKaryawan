<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

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
		$data['title']		= 'Manajemen User';
		$data['subtitle']	= 'Semua user akan muncul disini';

		$data['cabang']     = $this->m_model->get_desc('tb_cabang');
		$data['jabatan']    = $this->m_model->get_desc('tb_jabatan');
		$data['user']       = $this->m_model->get_desc('tb_user');
		
		$this->load->view('admin/templates/header', $data);
		$this->load->view('admin/templates/sidebar');
		$this->load->view('admin/user');
		$this->load->view('admin/templates/footer');
    }

    public function delete($id)
	{
		$where = array('id' => $id);

		$this->m_model->delete($where, 'tb_user');
		$this->session->set_flashdata('pesan', 'Account berhasil dihapus');
		redirect('admin/user');
	}

	public function insert()
	{
		date_default_timezone_set('Asia/Jayapura');
		$nama		= $_POST['nama'];
		$telp		= $_POST['telp'];
		$email		= $_POST['email'];
		$username	= $_POST['username'];
		$password	= $_POST['password'];
		$idCabang	= $_POST['idCabang'];
		$idJabatan	= $_POST['idJabatan'];
		$foto		= 'no-image.png';
		$skin		= 'blue';
		$level		= $_POST['level'];
		$terdaftar	= date('Y-m-d H:i:s');

		$where = array('username' => $username);
		$cekUsername	= $this->m_model->get_where($where, 'tb_user');
		if(empty($cekUsername->num_rows())) {
			$options = [
				'cost' => 10,
			];
	
			$enkripPassword = password_hash($password, PASSWORD_BCRYPT, $options);
	
			$data = array(
				'nama' 		=> $nama,
				'telp' 		=> $telp,
				'email' 	=> $email,
				'username'	=> $username,
				'password'	=> $enkripPassword,
				'foto'		=> $foto,
				'skin'		=> $skin,
				'level'		=> $level,
				'idCabang'	=> $idCabang,
				'idJabatan'	=> $idJabatan,
				'terdaftar'	=> $terdaftar,
			);
	
			$this->m_model->insert($data, 'tb_user');
			$this->session->set_flashdata('pesan', 'Account berhasil dibuat!');
			redirect('admin/user');
		} else {
			$this->session->set_flashdata('pesanError', 'Username sudah ada!');
			redirect('admin/user');
		}
	}

	public function resetpassword($id)
	{
		$password = $_POST['password'];

		$where = array('id' => $id);

		$options = [
			'cost' => 10,
		];

		$enkripPassword = password_hash($password, PASSWORD_BCRYPT, $options);
	
		$data = array('password' => $enkripPassword);
		
		$this->m_model->update($where, $data, 'tb_user');
		$this->session->set_flashdata('pesan', 'Password berhasil Direset!');
		redirect('admin/user');
	}

	public function detail($id)
	{
		date_default_timezone_set('Asia/Jayapura');

		$data['title']		= 'Detail Karyawan';
		$data['subtitle']	= 'Semua data karyawan yang dipilih akan ditampilkan disini';

		$this->db->where('id', $id);
		$data['user']		= $this->m_model->get_desc('tb_user');
		$this->db->where('idUser', $id);
		$data['absensi']    = $this->m_model->get_desc('tb_absensi');
		$this->db->where('idKaryawan', $id);
		$data['gaji']    	= $this->m_model->get_desc('tb_gaji');
		$this->db->where('idKaryawan', $id);
		$data['gajian']    	= $this->m_model->get_desc('tb_gajian');
		$this->db->where('tahun', date('Y'));
		$this->db->ORDER_BY('bulan', 'ASC');
		$data['kewajiban'] 	= $this->db->get('tb_kewajiban');

		$data['idKaryawangrafik']	= $id;
		
		$this->load->view('admin/templates/header', $data);
		$this->load->view('admin/templates/sidebar');
		$this->load->view('admin/detailkaryawan');
		$this->load->view('admin/templates/footer');
	}

	public function update($id)
	{
		$nama		= $_POST['nama'];
		$telp		= $_POST['telp'];
		$email		= $_POST['email'];
		$idCabang	= $_POST['idCabang'];
		$idJabatan	= $_POST['idJabatan'];

		$data = array(
			'nama' 		=> $nama,
			'telp' 		=> $telp,
			'email' 	=> $email,
			'idCabang'	=> $idCabang,
			'idJabatan'	=> $idJabatan,
		);

		$where = array('id' => $id);

		$this->session->set_flashdata('pesan', 'Data user berhasil diubah');
		$this->m_model->update($where, $data, 'tb_user');
		redirect('admin/user');
	}
}