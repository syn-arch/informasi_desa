<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Klasifikasi extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Klasifikasi_model');
        $this->load->library('form_validation');        
        $this->load->library('datatables');
    }

    public function index()
    {
        $data['judul'] = 'Data Klasifikasi';

        $this->load->view('templates/header', $data);
        $this->load->view('klasifikasi/klasifikasi_list', $data);
        $this->load->view('templates/footer', $data);
    } 

    public function json() {
        header('Content-Type: application/json');
        echo $this->Klasifikasi_model->json();
    }

    public function read($id) 
    {
        $row = $this->Klasifikasi_model->get_by_id($id);
        if ($row) {
            $data = array(
              'id_klasifikasi' => $row->id_klasifikasi,
              'nama_klasifikasi' => $row->nama_klasifikasi,
          );

            $data['judul'] = 'Detail Klasifikasi';

            $this->load->view('templates/header', $data);
            $this->load->view('klasifikasi/klasifikasi_read', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $this->session->set_flashdata('error', 'Data tidak ditemukan');
            redirect(site_url('klasifikasi'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('klasifikasi/create_action'),
            'id_klasifikasi' => set_value('id_klasifikasi'),
            'nama_klasifikasi' => set_value('nama_klasifikasi'),
        );

        $data['judul'] = 'Tambah Klasifikasi';

        $this->load->view('templates/header', $data);
        $this->load->view('klasifikasi/klasifikasi_form', $data);
        $this->load->view('templates/footer', $data);
    }

    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
              'nama_klasifikasi' => $this->input->post('nama_klasifikasi',TRUE),
          );

            $this->Klasifikasi_model->insert($data);
            $this->session->set_flashdata('success', 'Ditambah');
            redirect(site_url('klasifikasi'));
        }
    }

    public function update($id) 
    {
        $row = $this->Klasifikasi_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('klasifikasi/update_action'),
                'id_klasifikasi' => set_value('id_klasifikasi', $row->id_klasifikasi),
                'nama_klasifikasi' => set_value('nama_klasifikasi', $row->nama_klasifikasi),
            );

            $data['judul'] = 'Ubah Klasifikasi';

            $this->load->view('templates/header', $data);
            $this->load->view('klasifikasi/klasifikasi_form', $data);
            $this->load->view('templates/footer', $data);

        } else {
            $this->session->set_flashdata('error', 'Data tidak ditemukan');
            redirect(site_url('klasifikasi'));
        }
    }

    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_klasifikasi', TRUE));
        } else {
            $data = array(
              'nama_klasifikasi' => $this->input->post('nama_klasifikasi',TRUE),
          );

            $this->Klasifikasi_model->update($this->input->post('id_klasifikasi', TRUE), $data);
            $this->session->set_flashdata('success', 'Diubah');
            redirect(site_url('klasifikasi'));
        }
    }

    public function delete($id) 
    {
        $row = $this->Klasifikasi_model->get_by_id($id);

        if ($row) {
            $this->Klasifikasi_model->delete($id);
            $this->session->set_flashdata('success', 'Dihapus');
            redirect(site_url('klasifikasi'));
        } else {
            $this->session->set_flashdata('error', 'Data tidak ditemukan');
            redirect(site_url('klasifikasi'));
        }
    }

    public function _rules() 
    {
       $this->form_validation->set_rules('nama_klasifikasi', 'nama klasifikasi', 'trim|required');

       $this->form_validation->set_rules('id_klasifikasi', 'id_klasifikasi', 'trim');
       $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
   }

   public function excel()
   {
    $this->load->helper('exportexcel');
    $namaFile = "klasifikasi.xls";
    $judul = "klasifikasi";
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
    xlsWriteLabel($tablehead, $kolomhead++, "Nama Klasifikasi");

    foreach ($this->Klasifikasi_model->get_all() as $data) {
        $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
        xlsWriteNumber($tablebody, $kolombody++, $nourut);
        xlsWriteLabel($tablebody, $kolombody++, $data->nama_klasifikasi);

        $tablebody++;
        $nourut++;
    }

    xlsEOF();
    exit();
}

public function word()
{
    header("Content-type: application/vnd.ms-word");
    header("Content-Disposition: attachment;Filename=klasifikasi.doc");

    $data = array(
        'klasifikasi_data' => $this->Klasifikasi_model->get_all(),
        'start' => 0
    );

    $this->load->view('klasifikasi/klasifikasi_doc',$data);
}

}

/* End of file Klasifikasi.php */
/* Location: ./application/controllers/Klasifikasi.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2021-07-11 12:16:33 */
                        /* http://harviacode.com */