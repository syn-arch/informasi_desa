<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Kartu_keluarga extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Kartu_keluarga_model');
        $this->load->model('penduduk/Penduduk_model');
        $this->load->library('form_validation');        
        $this->load->library('datatables');
    }

    public function index()
    {
        $data['judul'] = 'Data Kartu Keluarga';

        $this->load->view('templates/header', $data);
        $this->load->view('kartu_keluarga/kartu_keluarga_list', $data);
        $this->load->view('templates/footer', $data);
    } 

    public function json() {
        header('Content-Type: application/json');
        echo $this->Kartu_keluarga_model->json();
    }

    public function read($id) 
    {
        $row = $this->Kartu_keluarga_model->get_by_id($id);
        if ($row) {
            $data = array(
              'id_kartu_keluarga' => $row->id_kartu_keluarga,
              'no_kartu_keluarga' => $row->no_kartu_keluarga,
              'alamat' => $row->alamat,
              'desa' => $row->desa,
              'kecamatan' => $row->kecamatan,
              'kabupaten' => $row->kabupaten,
              'kode_pos' => $row->kode_pos,
              'provinsi' => $row->provinsi,
              'rt' => $row->rt,
              'rw' => $row->rw,
              'kepala_keluarga' => $row->nama_penduduk,
              'status' => $row->status,
          );

            $data['judul'] = 'Detail Kartu_keluarga';

            $this->load->view('templates/header', $data);
            $this->load->view('kartu_keluarga/kartu_keluarga_read', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $this->session->set_flashdata('error', 'Data tidak ditemukan');
            redirect(site_url('kartu_keluarga'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('kartu_keluarga/create_action'),
            'id_kartu_keluarga' => set_value('id_kartu_keluarga'),
            'no_kartu_keluarga' => set_value('no_kartu_keluarga'),
            'alamat' => set_value('alamat'),
            'desa' => set_value('desa'),
            'kecamatan' => set_value('kecamatan'),
            'kabupaten' => set_value('kabupaten'),
            'kode_pos' => set_value('kode_pos'),
            'provinsi' => set_value('provinsi'),
            'rt' => set_value('rt'),
            'rw' => set_value('rw'),
            'kepala_keluarga' => set_value('kepala_keluarga'),
            'status' => set_value('status'),
        );

        $data['judul'] = 'Tambah Kartu Keluarga';
        $data['penduduk'] = $this->Penduduk_model->get_all();

        $this->load->view('templates/header', $data);
        $this->load->view('kartu_keluarga/kartu_keluarga_form', $data);
        $this->load->view('templates/footer', $data);
    }

    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
              'no_kartu_keluarga' => $this->input->post('no_kartu_keluarga',TRUE),
              'alamat' => $this->input->post('alamat',TRUE),
              'desa' => $this->input->post('desa',TRUE),
              'kecamatan' => $this->input->post('kecamatan',TRUE),
              'kabupaten' => $this->input->post('kabupaten',TRUE),
              'kode_pos' => $this->input->post('kode_pos',TRUE),
              'provinsi' => $this->input->post('provinsi',TRUE),
              'rt' => $this->input->post('rt',TRUE),
              'rw' => $this->input->post('rw',TRUE),
              'kepala_keluarga' => $this->input->post('kepala_keluarga',TRUE),
              'status' => $this->input->post('status',TRUE),
          );

            $this->Kartu_keluarga_model->insert($data);
            $this->session->set_flashdata('success', 'Ditambah');
            redirect(site_url('kartu_keluarga'));
        }
    }

    public function update($id) 
    {
        $row = $this->Kartu_keluarga_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('kartu_keluarga/update_action'),
                'id_kartu_keluarga' => set_value('id_kartu_keluarga', $row->id_kartu_keluarga),
                'no_kartu_keluarga' => set_value('no_kartu_keluarga', $row->no_kartu_keluarga),
                'alamat' => set_value('alamat', $row->alamat),
                'desa' => set_value('desa', $row->desa),
                'kecamatan' => set_value('kecamatan', $row->kecamatan),
                'kabupaten' => set_value('kabupaten', $row->kabupaten),
                'kode_pos' => set_value('kode_pos', $row->kode_pos),
                'provinsi' => set_value('provinsi', $row->provinsi),
                'rt' => set_value('rt', $row->rt),
                'rw' => set_value('rw', $row->rw),
                'kepala_keluarga' => set_value('kepala_keluarga', $row->kepala_keluarga),
                'status' => set_value('status', $row->status),
            );

            $data['judul'] = 'Ubah Kartu Keluarga';
            $data['penduduk'] = $this->Penduduk_model->get_all();

            $this->load->view('templates/header', $data);
            $this->load->view('kartu_keluarga/kartu_keluarga_form', $data);
            $this->load->view('templates/footer', $data);

        } else {
            $this->session->set_flashdata('error', 'Data tidak ditemukan');
            redirect(site_url('kartu_keluarga'));
        }
    }

    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_kartu_keluarga', TRUE));
        } else {

            $data = array(
                'no_kartu_keluarga' => $this->input->post('no_kartu_keluarga',TRUE),
                'alamat' => $this->input->post('alamat',TRUE),
                'desa' => $this->input->post('desa',TRUE),
                'kecamatan' => $this->input->post('kecamatan',TRUE),
                'kabupaten' => $this->input->post('kabupaten',TRUE),
                'kode_pos' => $this->input->post('kode_pos',TRUE),
                'provinsi' => $this->input->post('provinsi',TRUE),
                'rt' => $this->input->post('rt',TRUE),
                'rw' => $this->input->post('rw',TRUE),
                'kepala_keluarga' => $this->input->post('kepala_keluarga',TRUE),
                'status' => $this->input->post('status',TRUE),
            );

            $this->Kartu_keluarga_model->update($this->input->post('id_kartu_keluarga', TRUE), $data);
            $this->session->set_flashdata('success', 'Diubah');
            redirect(site_url('kartu_keluarga'));
        }
    }

    public function delete($id) 
    {
        $row = $this->Kartu_keluarga_model->get_by_id($id);

        if ($row) {
            $this->Kartu_keluarga_model->delete($id);
            $this->session->set_flashdata('success', 'Dihapus');
            redirect(site_url('kartu_keluarga'));
        } else {
            $this->session->set_flashdata('error', 'Data tidak ditemukan');
            redirect(site_url('kartu_keluarga'));
        }
    }

    public function _rules() 
    {
     $this->form_validation->set_rules('no_kartu_keluarga', 'no kartu keluarga', 'trim|required');
     $this->form_validation->set_rules('alamat', 'alamat', 'trim|required');
     $this->form_validation->set_rules('desa', 'desa', 'trim|required');
     $this->form_validation->set_rules('kecamatan', 'kecamatan', 'trim|required');
     $this->form_validation->set_rules('kabupaten', 'kabupaten', 'trim|required');
     $this->form_validation->set_rules('kode_pos', 'kode pos', 'trim|required');
     $this->form_validation->set_rules('provinsi', 'provinsi', 'trim|required');
     $this->form_validation->set_rules('rt', 'rt', 'trim|required');
     $this->form_validation->set_rules('rw', 'rw', 'trim|required');
     $this->form_validation->set_rules('status', 'status', 'trim|required');

     $this->form_validation->set_rules('id_kartu_keluarga', 'id_kartu_keluarga', 'trim');
     $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
 }

 public function excel()
 {
    $this->load->helper('exportexcel');
    $namaFile = "kartu_keluarga.xls";
    $judul = "kartu_keluarga";
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
    xlsWriteLabel($tablehead, $kolomhead++, "No Kartu Keluarga");
    xlsWriteLabel($tablehead, $kolomhead++, "Alamat");
    xlsWriteLabel($tablehead, $kolomhead++, "Desa");
    xlsWriteLabel($tablehead, $kolomhead++, "Kecamatan");
    xlsWriteLabel($tablehead, $kolomhead++, "Kabupaten");
    xlsWriteLabel($tablehead, $kolomhead++, "Kode Pos");
    xlsWriteLabel($tablehead, $kolomhead++, "Provinsi");
    xlsWriteLabel($tablehead, $kolomhead++, "Rt");
    xlsWriteLabel($tablehead, $kolomhead++, "Rw");
    xlsWriteLabel($tablehead, $kolomhead++, "Kepala Keluarga");
    xlsWriteLabel($tablehead, $kolomhead++, "Status");

    foreach ($this->Kartu_keluarga_model->get_all() as $data) {
        $kolombody = 0;

                //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
        xlsWriteNumber($tablebody, $kolombody++, $nourut);
        xlsWriteLabel($tablebody, $kolombody++, $data->no_kartu_keluarga);
        xlsWriteLabel($tablebody, $kolombody++, $data->alamat);
        xlsWriteLabel($tablebody, $kolombody++, $data->desa);
        xlsWriteLabel($tablebody, $kolombody++, $data->kecamatan);
        xlsWriteLabel($tablebody, $kolombody++, $data->kabupaten);
        xlsWriteLabel($tablebody, $kolombody++, $data->kode_pos);
        xlsWriteLabel($tablebody, $kolombody++, $data->provinsi);
        xlsWriteLabel($tablebody, $kolombody++, $data->rt);
        xlsWriteLabel($tablebody, $kolombody++, $data->rw);
        xlsWriteLabel($tablebody, $kolombody++, $data->nama_penduduk);
        xlsWriteLabel($tablebody, $kolombody++, $data->status == '1' ? 'Aktif' : 'Tidak Aktif');

        $tablebody++;
        $nourut++;
    }

    xlsEOF();
    exit();
}
public function word()
{

    header("Content-type: application/vnd.ms-word");
    header("Content-Disposition: attachment;Filename=kartu_keluarga.doc");

    $data = array(
        'kartu_keluarga_data' => $this->Kartu_keluarga_model->get_all(),
        'start' => 0
    );

    $this->load->view('kartu_keluarga/kartu_keluarga_doc', $data);
}

}

/* End of file Kartu_keluarga.php */
/* Location: ./application/controllers/Kartu_keluarga.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2021-07-11 12:17:31 */
                        /* http://harviacode.com */