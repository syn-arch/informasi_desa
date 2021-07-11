<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Kartu_keluarga_model extends CI_Model
{

    public $table = 'kartu_keluarga';
    public $id = 'kartu_keluarga.id_kartu_keluarga';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // datatables
    function json() {
        $this->datatables->select('kartu_keluarga.id_kartu_keluarga,no_kartu_keluarga,alamat,desa,kecamatan,kabupaten,kode_pos,provinsi,rt,rw,nama_penduduk,kartu_keluarga.status');
        $this->datatables->from('kartu_keluarga');
        //add this line for join
        $this->datatables->join('penduduk', 'kartu_keluarga.kepala_keluarga = penduduk.id_penduduk');
        $this->datatables->add_column('action', 
            '<a href="'  . site_url('kartu_keluarga/read/$1') . '" class="btn btn-info"><i class="fa fa-eye"></i></a> 
            <a href="'  . site_url('kartu_keluarga/update/$1') . '" class="btn btn-warning"><i class="fa fa-edit"></i></a> 
            <a data-href="'  . site_url('kartu_keluarga/delete/$1') . '" class="btn btn-danger hapus-data"><i class="fa fa-trash"></i></a>', 'id_kartu_keluarga');
        return $this->datatables->generate();
    }

    // get all
    function get_all()
    {
        $this->db->select('*, kartu_keluarga.status, kartu_keluarga.id_kartu_keluarga');
        $this->db->join('penduduk', 'kartu_keluarga.kepala_keluarga = penduduk.id_penduduk');
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->select('*, kartu_keluarga.status, kartu_keluarga.id_kartu_keluarga');
        $this->db->join('penduduk', 'kartu_keluarga.kepala_keluarga = penduduk.id_penduduk');
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }
    
    // get total rows
    function total_rows($q = NULL) {
        $this->db->select('*, kartu_keluarga.status, kartu_keluarga.id_kartu_keluarga');
        $this->db->like('kartu_keluarga.id_kartu_keluarga', $q);
        $this->db->or_like('no_kartu_keluarga', $q);
        $this->db->or_like('alamat', $q);
        $this->db->or_like('desa', $q);
        $this->db->or_like('kecamatan', $q);
        $this->db->or_like('kabupaten', $q);
        $this->db->or_like('kode_pos', $q);
        $this->db->or_like('provinsi', $q);
        $this->db->or_like('rt', $q);
        $this->db->or_like('rw', $q);
        $this->db->or_like('kepala_keluarga', $q);
        $this->db->or_like('status', $q);
        $this->db->from($this->table);
        $this->db->join('penduduk', 'id_penduduk');
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->select('*, kartu_keluarga.status, kartu_keluarga.id_kartu_keluarga');
        $this->db->order_by($this->id, $this->order);
        $this->db->like('kartu_keluarga.id_kartu_keluarga', $q);
        $this->db->or_like('no_kartu_keluarga', $q);
        $this->db->or_like('alamat', $q);
        $this->db->or_like('desa', $q);
        $this->db->or_like('kecamatan', $q);
        $this->db->or_like('kabupaten', $q);
        $this->db->or_like('kode_pos', $q);
        $this->db->or_like('provinsi', $q);
        $this->db->or_like('rt', $q);
        $this->db->or_like('rw', $q);
        $this->db->or_like('kepala_keluarga', $q);
        $this->db->or_like('status', $q);
        $this->db->limit($limit, $start);
        $this->db->join('penduduk', 'id_penduduk');
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

/* End of file Kartu_keluarga_model.php */
/* Location: ./application/models/Kartu_keluarga_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2021-07-11 12:17:31 */
/* http://harviacode.com */