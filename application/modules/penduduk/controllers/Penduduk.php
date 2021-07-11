<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Penduduk extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('Penduduk_model');
		$this->load->model('agama/Agama_model');
		$this->load->model('klasifikasi/Klasifikasi_model');
		$this->load->model('kartu_keluarga/Kartu_keluarga_model');
		$this->load->library('form_validation');        
		$this->load->library('datatables');
	}

	public function index()
	{
		$data['judul'] = 'Data Penduduk';

		$this->load->view('templates/header', $data);
		$this->load->view('penduduk/penduduk_list', $data);
		$this->load->view('templates/footer', $data);
	} 

	public function json() {
		header('Content-Type: application/json');
		echo $this->Penduduk_model->json();
	}

	public function read($id) 
	{
		$row = $this->Penduduk_model->get_by_id($id);
		if ($row) {
			$data = array(
				'id_penduduk' => $row->id_penduduk,
				'nik' => $row->nik,
				'nama_penduduk' => $row->nama_penduduk,
				'tempat_lahir' => $row->tempat_lahir,
				'tanggal_lahir' => $row->tanggal_lahir,
				'jk' => $row->jk,
				'golongan_darah' => $row->golongan_darah,
				'pekerjaan' => $row->pekerjaan,
				'pendidikan' => $row->pendidikan,
				'status_perkawinan' => $row->status_perkawinan,
				'kewarganegaraan' => $row->kewarganegaraan,
				'nama_agama' => $row->nama_agama,
				'nama_klasifikasi' => $row->nama_klasifikasi,
				'no_kartu_keluarga' => $row->no_kartu_keluarga,
				'foto' => $row->foto,
				'username' => $row->username,
				'password' => $row->password,
				'status' => $row->status,
			);

			$data['judul'] = 'Detail Penduduk';

			$this->load->view('templates/header', $data);
			$this->load->view('penduduk/penduduk_read', $data);
			$this->load->view('templates/footer', $data);
		} else {
			$this->session->set_flashdata('error', 'Data tidak ditemukan');
			redirect(site_url('penduduk'));
		}
	}

	public function create() 
	{
		$data = array(
			'button' => 'Create',
			'action' => site_url('penduduk/create_action'),
			'id_penduduk' => set_value('id_penduduk'),
			'nik' => set_value('nik'),
			'nama_penduduk' => set_value('nama_penduduk'),
			'tempat_lahir' => set_value('tempat_lahir'),
			'tanggal_lahir' => set_value('tanggal_lahir'),
			'jk' => set_value('jk'),
			'golongan_darah' => set_value('golongan_darah'),
			'pekerjaan' => set_value('pekerjaan'),
			'pendidikan' => set_value('pendidikan'),
			'status_perkawinan' => set_value('status_perkawinan'),
			'kewarganegaraan' => set_value('kewarganegaraan'),
			'id_agama' => set_value('id_agama'),
			'id_klasifikasi' => set_value('id_klasifikasi'),
			'id_kartu_keluarga' => set_value('id_kartu_keluarga'),
			'foto' => set_value('foto'),
			'username' => set_value('username'),
			'password' => set_value('password'),
			'status' => set_value('status'),
		);

		$data['judul'] = 'Tambah Penduduk';
		$data['agama'] = $this->Agama_model->get_all();
		$data['klasifikasi'] = $this->Klasifikasi_model->get_all();
		$data['kartu_keluarga'] = $this->Kartu_keluarga_model->get_all();

		$this->load->view('templates/header', $data);
		$this->load->view('penduduk/penduduk_form', $data);
		$this->load->view('templates/footer', $data);
	}

	public function create_action() 
	{
		$this->_rules();

		if ($this->form_validation->run() == FALSE) {
			$this->create();
		} else {
			$data = array(
				'nik' => $this->input->post('nik',TRUE),
				'nama_penduduk' => $this->input->post('nama_penduduk',TRUE),
				'tempat_lahir' => $this->input->post('tempat_lahir',TRUE),
				'tanggal_lahir' => $this->input->post('tanggal_lahir',TRUE),
				'jk' => $this->input->post('jk',TRUE),
				'golongan_darah' => $this->input->post('golongan_darah',TRUE),
				'pekerjaan' => $this->input->post('pekerjaan',TRUE),
				'pendidikan' => $this->input->post('pendidikan',TRUE),
				'status_perkawinan' => $this->input->post('status_perkawinan',TRUE),
				'kewarganegaraan' => $this->input->post('kewarganegaraan',TRUE),
				'id_agama' => $this->input->post('id_agama',TRUE),
				'id_klasifikasi' => $this->input->post('id_klasifikasi',TRUE),
				'id_kartu_keluarga' => $this->input->post('id_kartu_keluarga',TRUE),
				'foto' =>  _upload('foto', 'penduduk/create', 'penduduk'),
				'username' => $this->input->post('username',TRUE),
				'password' => $this->input->post('password',TRUE),
				'status' => $this->input->post('status',TRUE),
			);

			$this->Penduduk_model->insert($data);
			$this->session->set_flashdata('success', 'Ditambah');
			redirect(site_url('penduduk'));
		}
	}

	public function update($id) 
	{
		$row = $this->Penduduk_model->get_by_id($id);

		if ($row) {
			$data = array(
				'button' => 'Update',
				'action' => site_url('penduduk/update_action'),
				'id_penduduk' => set_value('id_penduduk', $row->id_penduduk),
				'nik' => set_value('nik', $row->nik),
				'nama_penduduk' => set_value('nama_penduduk', $row->nama_penduduk),
				'tempat_lahir' => set_value('tempat_lahir', $row->tempat_lahir),
				'tanggal_lahir' => set_value('tanggal_lahir', $row->tanggal_lahir),
				'jk' => set_value('jk', $row->jk),
				'golongan_darah' => set_value('golongan_darah', $row->golongan_darah),
				'pekerjaan' => set_value('pekerjaan', $row->pekerjaan),
				'pendidikan' => set_value('pendidikan', $row->pendidikan),
				'status_perkawinan' => set_value('status_perkawinan', $row->status_perkawinan),
				'kewarganegaraan' => set_value('kewarganegaraan', $row->kewarganegaraan),
				'id_agama' => set_value('id_agama', $row->id_agama),
				'id_klasifikasi' => set_value('id_klasifikasi', $row->id_klasifikasi),
				'id_kartu_keluarga' => set_value('id_kartu_keluarga', $row->id_kartu_keluarga),
				'foto' => set_value('foto', $row->foto),
				'username' => set_value('username', $row->username),
				'password' => set_value('password', $row->password),
				'status' => set_value('status', $row->status),
			);

			$data['judul'] = 'Ubah Penduduk';
			$data['agama'] = $this->Agama_model->get_all();
			$data['klasifikasi'] = $this->Klasifikasi_model->get_all();
			$data['kartu_keluarga'] = $this->Kartu_keluarga_model->get_all();

			$this->load->view('templates/header', $data);
			$this->load->view('penduduk/penduduk_form', $data);
			$this->load->view('templates/footer', $data);

		} else {
			$this->session->set_flashdata('error', 'Data tidak ditemukan');
			redirect(site_url('penduduk'));
		}
	}

	public function update_action() 
	{
		$this->_rules();

		if ($this->form_validation->run() == FALSE) {
			$this->update($this->input->post('id_penduduk', TRUE));
		} else {
			$data = array(
				'nik' => $this->input->post('nik',TRUE),
				'nama_penduduk' => $this->input->post('nama_penduduk',TRUE),
				'tempat_lahir' => $this->input->post('tempat_lahir',TRUE),
				'tanggal_lahir' => $this->input->post('tanggal_lahir',TRUE),
				'jk' => $this->input->post('jk',TRUE),
				'golongan_darah' => $this->input->post('golongan_darah',TRUE),
				'pekerjaan' => $this->input->post('pekerjaan',TRUE),
				'pendidikan' => $this->input->post('pendidikan',TRUE),
				'status_perkawinan' => $this->input->post('status_perkawinan',TRUE),
				'kewarganegaraan' => $this->input->post('kewarganegaraan',TRUE),
				'id_agama' => $this->input->post('id_agama',TRUE),
				'id_klasifikasi' => $this->input->post('id_klasifikasi',TRUE),
				'id_kartu_keluarga' => $this->input->post('id_kartu_keluarga',TRUE),
				'username' => $this->input->post('username',TRUE),
				'password' => $this->input->post('password',TRUE),
				'status' => $this->input->post('status',TRUE),
			);

			if ($_FILES['foto']['name']) {
				$data['foto'] = _upload('foto', 'penduduk/update/' . $this->input->post('id_penduduk'), 'penduduk');
				delImage('penduduk', $this->input->post('id_penduduk'), 'foto');
			}

			$this->Penduduk_model->update($this->input->post('id_penduduk', TRUE), $data);
			$this->session->set_flashdata('success', 'Diubah');
			redirect(site_url('penduduk'));
		}
	}

	public function delete($id) 
	{
		delImage('penduduk', $id, 'foto');
		$row = $this->Penduduk_model->get_by_id($id);

		if ($row) {
			$this->Penduduk_model->delete($id);
			$this->session->set_flashdata('success', 'Dihapus');
			redirect(site_url('penduduk'));
		} else {
			$this->session->set_flashdata('error', 'Data tidak ditemukan');
			redirect(site_url('penduduk'));
		}
	}

	public function _rules() 
	{
		$this->form_validation->set_rules('nik', 'nik', 'trim|required');
		$this->form_validation->set_rules('nama_penduduk', 'nama penduduk', 'trim|required');
		$this->form_validation->set_rules('tempat_lahir', 'tempat lahir', 'trim|required');
		$this->form_validation->set_rules('tanggal_lahir', 'tanggal lahir', 'trim|required');
		$this->form_validation->set_rules('jk', 'jk', 'trim|required');
		$this->form_validation->set_rules('golongan_darah', 'golongan darah', 'trim|required');
		$this->form_validation->set_rules('pekerjaan', 'pekerjaan', 'trim|required');
		$this->form_validation->set_rules('pendidikan', 'pendidikan', 'trim|required');
		$this->form_validation->set_rules('status_perkawinan', 'status perkawinan', 'trim|required');
		$this->form_validation->set_rules('kewarganegaraan', 'kewarganegaraan', 'trim|required');
		$this->form_validation->set_rules('id_agama', 'id agama', 'trim|required|numeric');
		$this->form_validation->set_rules('id_klasifikasi', 'id klasifikasi', 'trim|required|numeric');
		$this->form_validation->set_rules('username', 'username', 'trim|required');
		$this->form_validation->set_rules('password', 'password', 'trim|required');
		$this->form_validation->set_rules('status', 'status', 'trim|required|numeric');

		$this->form_validation->set_rules('id_penduduk', 'id_penduduk', 'trim');
		$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
	}

	public function excel()
	{
		$this->load->helper('exportexcel');
		$namaFile = "penduduk.xls";
		$judul = "penduduk";
		$tablehead = 0;
		$tablebody = 1;
		$nourut = 1;
        //penulisan header
		header("Pragma: public");
		header("Expires: 0");
		header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
		header("Content-Type: application/force-download");
		header("Content-Type: application/octet-stream");
		header("Content-Type: application/download");
		header("Content-Disposition: attachment;filename=" . $namaFile . "");
		header("Content-Transfer-Encoding: binary ");

		xlsBOF();

		$kolomhead = 0;
		xlsWriteLabel($tablehead, $kolomhead++, "No");
		xlsWriteLabel($tablehead, $kolomhead++, "Nik");
		xlsWriteLabel($tablehead, $kolomhead++, "Nama Penduduk");
		xlsWriteLabel($tablehead, $kolomhead++, "Tempat Lahir");
		xlsWriteLabel($tablehead, $kolomhead++, "Tanggal Lahir");
		xlsWriteLabel($tablehead, $kolomhead++, "Jk");
		xlsWriteLabel($tablehead, $kolomhead++, "Golongan Darah");
		xlsWriteLabel($tablehead, $kolomhead++, "Pekerjaan");
		xlsWriteLabel($tablehead, $kolomhead++, "Pendidikan");
		xlsWriteLabel($tablehead, $kolomhead++, "Status Perkawinan");
		xlsWriteLabel($tablehead, $kolomhead++, "Kewarganegaraan");
		xlsWriteLabel($tablehead, $kolomhead++, "Agama");
		xlsWriteLabel($tablehead, $kolomhead++, "Klasifikasi");
		xlsWriteLabel($tablehead, $kolomhead++, "No Kartu Keluarga");
		xlsWriteLabel($tablehead, $kolomhead++, "Username");
		xlsWriteLabel($tablehead, $kolomhead++, "Password");
		xlsWriteLabel($tablehead, $kolomhead++, "Status");

		foreach ($this->Penduduk_model->get_all() as $data) {
			$kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
			xlsWriteNumber($tablebody, $kolombody++, $nourut);
			xlsWriteLabel($tablebody, $kolombody++, $data->nik);
			xlsWriteLabel($tablebody, $kolombody++, $data->nama_penduduk);
			xlsWriteLabel($tablebody, $kolombody++, $data->tempat_lahir);
			xlsWriteLabel($tablebody, $kolombody++, $data->tanggal_lahir);
			xlsWriteLabel($tablebody, $kolombody++, $data->jk);
			xlsWriteLabel($tablebody, $kolombody++, $data->golongan_darah);
			xlsWriteLabel($tablebody, $kolombody++, $data->pekerjaan);
			xlsWriteLabel($tablebody, $kolombody++, $data->pendidikan);
			xlsWriteLabel($tablebody, $kolombody++, $data->status_perkawinan);
			xlsWriteLabel($tablebody, $kolombody++, $data->kewarganegaraan);
			xlsWriteLabel($tablebody, $kolombody++, $data->nama_agama);
			xlsWriteLabel($tablebody, $kolombody++, $data->nama_klasifikasi);
			xlsWriteLabel($tablebody, $kolombody++, $data->no_kartu_keluarga);
			xlsWriteLabel($tablebody, $kolombody++, $data->username);
			xlsWriteLabel($tablebody, $kolombody++, $data->password);
			xlsWriteNumber($tablebody, $kolombody++, $data->status == '1' ? 'Aktif' : 'Tidak Aktif');

			$tablebody++;
			$nourut++;
		}

		xlsEOF();
		exit();
	}

	public function word()
	{
		header("Content-type: application/vnd.ms-word");
		header("Content-Disposition: attachment;Filename=penduduk.doc");

		$data = array(
			'penduduk_data' => $this->Penduduk_model->get_all(),
			'start' => 0
		);

		$this->load->view('penduduk/penduduk_doc',$data);
	}

}

/* End of file Penduduk.php */
/* Location: ./application/controllers/Penduduk.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2021-07-11 12:17:36 */
                        /* http://harviacode.com */