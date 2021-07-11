<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Penduduk_model extends CI_Model
{

    public $table = 'penduduk';
    public $id = 'id_penduduk';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // datatables
    function json() {
        $this->datatables->select('id_penduduk,
            nik,
            nama_penduduk,
            tempat_lahir,
            tanggal_lahir,
            jk,
            golongan_darah,
            pekerjaan,
            pendidikan,
            status_perkawinan,
            kewarganegaraan,
            nama_agama,
            nama_klasifikasi,
            no_kartu_keluarga,
            foto,
            username,
            password,
            penduduk.status');
        $this->datatables->from('penduduk');
        //add this line for join
        $this->datatables->join('agama', 'id_agama');
        $this->datatables->join('klasifikasi', 'id_klasifikasi');
        $this->datatables->join('kartu_keluarga', 'id_kartu_keluarga', 'left');
        $this->datatables->add_column('action', 
            '<a href="'  . site_url('penduduk/read/$1') . '" class="btn btn-info"><i class="fa fa-eye"></i></a> 
            <a href="'  . site_url('penduduk/update/$1') . '" class="btn btn-warning"><i class="fa fa-edit"></i></a> 
            <a data-href="'  . site_url('penduduk/delete/$1') . '" class="btn btn-danger hapus-data"><i class="fa fa-trash"></i></a>', 'id_penduduk');
        return $this->datatables->generate();
    }

    // get all
    function get_all()
    {
        $this->db->select('*, penduduk.status');
        $this->db->order_by($this->id, $this->order);
        $this->db->join('agama', 'id_agama');
        $this->db->join('klasifikasi', 'id_klasifikasi');
        $this->db->join('kartu_keluarga', 'id_kartu_keluarga', 'left');
        return $this->db->get($this->table)->result();
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->select('*, penduduk.status');
        $this->db->where($this->id, $id);
        $this->db->join('agama', 'id_agama');
        $this->db->join('klasifikasi', 'id_klasifikasi');
        $this->db->join('kartu_keluarga', 'id_kartu_keluarga', 'left');
        return $this->db->get($this->table)->row();
    }
    
    // get total rows
    function total_rows($q = NULL) {
        $this->db->select('*, penduduk.status');
        $this->db->like('id_penduduk', $q);
        $this->db->or_like('nik', $q);
        $this->db->or_like('nama_penduduk', $q);
        $this->db->or_like('tempat_lahir', $q);
        $this->db->or_like('tanggal_lahir', $q);
        $this->db->or_like('jk', $q);
        $this->db->or_like('golongan_darah', $q);
        $this->db->or_like('pekerjaan', $q);
        $this->db->or_like('pendidikan', $q);
        $this->db->or_like('status_perkawinan', $q);
        $this->db->or_like('kewarganegaraan', $q);
        $this->db->or_like('id_agama', $q);
        $this->db->or_like('id_klasifikasi', $q);
        $this->db->or_like('id_kartu_keluarga', 'left', $q);
        $this->db->or_like('foto', $q);
        $this->db->or_like('username', $q);
        $this->db->or_like('password', $q);
        $this->db->or_like('status', $q);
        $this->db->from($this->table);
        $this->db->join('agama', 'id_agama');
        $this->db->join('klasifikasi', 'id_klasifikasi');
        $this->db->join('kartu_keluarga', 'id_kartu_keluarga', 'left');
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->select('*, penduduk.status');
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id_penduduk', $q);
        $this->db->or_like('nik', $q);
        $this->db->or_like('nama_penduduk', $q);
        $this->db->or_like('tempat_lahir', $q);
        $this->db->or_like('tanggal_lahir', $q);
        $this->db->or_like('jk', $q);
        $this->db->or_like('golongan_darah', $q);
        $this->db->or_like('pekerjaan', $q);
        $this->db->or_like('pendidikan', $q);
        $this->db->or_like('status_perkawinan', $q);
        $this->db->or_like('kewarganegaraan', $q);
        $this->db->or_like('id_agama', $q);
        $this->db->or_like('id_klasifikasi', $q);
        $this->db->or_like('id_kartu_keluarga', 'left', $q);
        $this->db->or_like('foto', $q);
        $this->db->or_like('username', $q);
        $this->db->or_like('password', $q);
        $this->db->or_like('status', $q);
        $this->db->limit($limit, $start);
        $this->db->join('agama', 'id_agama');
        $this->db->join('klasifikasi', 'id_klasifikasi');
        $this->db->join('kartu_keluarga', 'id_kartu_keluarga', 'left');
        return $this->db->get($this->table)->result();
    }

    // insert data
    function insert($data)
    {
        $this->db->insert($this->table, $data);
    }

    // update data
    function update($id, $data)
    {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }

    // delete data
    function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }

}

/* End of file Penduduk_model.php */
/* Location: ./application/models/Penduduk_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2021-07-11 12:17:36 */
/* http://harviacode.com */