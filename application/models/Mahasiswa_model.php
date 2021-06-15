<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Mahasiswa_model extends CI_Model
{
    function get()
    {
        //SELECT * FROM tabel_mahasiswa
        return $this->db->get('tabel_mahasiswa');
    }

    function insert($data)
    {
        //insert data ke dalam tabel
        $this->db->insert('tabel_mahasiswa', $data);
    }

    function get_by_nrp($nrp)
    {
        //SELECT * FROM tabel_mahasiswa WHERE nrp=$nrp
        $this->db->where('nrp', $nrp);
        $this->db->from('tabel_mahasiswa');
        return $this->db->get();
    }

    function update($data, $where)
    {
        $this->db->where($where);
        $this->db->update('tabel_mahasiswa', $data);
    }

    function delete($nrp)
    {
        //delete data berdasarkan nrp
        $this->db->where('nrp', $nrp);
        $this->db->delete('tabel_mahasiswa');
    }
}