<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Mahasiswa extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        //load helper
        $this->load->helper('url');
        $this->load->helper('form');
        //load library  
        $this->load->library('form_validation');
        //load model 
        $this->load->model('mahasiswa_model');
    }

    public function index()
    {
        //ambil data dari database
        $getData = $this->mahasiswa_model->get();

        $data = [
            'mahasiswa' => $getData->result_array(),
            'jumlah_data' => $getData->num_rows()
        ];

        //menampilkan view
        $this->load->view('mahasiswa/index', $data);
    }

    public function create()
    {
        //rule validasi
        $validation_rules = [
            [
                'field' => 'nrp',
                'label' => 'NRP',
                'rules' => 'required'
            ],
            [
                'field' => 'nama',
                'label' => 'Nama',
                'rules' => 'required'
            ],
            [
                'field' => 'alamat',
                'label' => 'Alamat',
                'rules' => 'required'
            ],
            [
                'field' => 'telp',
                'label' => 'Telp',
                'rules' => 'required'
            ],
            [
                'field' => 'angkatan',
                'label' => 'Angkatan',
                'rules' => 'required'
            ],
            [
                'field' => 'departemen',
                'label' => 'Departemen',
                'rules' => 'required'
            ],
            [
                'field' => 'fakultas',
                'label' => 'Fakultas',
                'rules' => 'required'
            ]
        ];

        //set rule validasi
        $this->form_validation->set_rules($validation_rules);

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('mahasiswa/add');
        } else {

            //data mahasiswa
            $mahasiswa = [
                'nrp' => $this->input->post('nrp'),
                'nama' => $this->input->post('nama'),
                'alamat' => $this->input->post('alamat'),
                'telp' => $this->input->post('telp'),
                'angkatan' => $this->input->post('angkatan'),
                'departemen' => $this->input->post('departemen'),
                'fakultas' => $this->input->post('fakultas')
            ];

            $this->mahasiswa_model->insert($mahasiswa);

            $data['msg']  =  'Data berhasil disimpan';

            $this->load->view('mahasiswa/notifikasi', $data);
        }
    }

    public function edit($nrp = '')
    {
        //Cek apakah ada parameter $nrp
        if ('' == $nrp) {
            //jika tidak ada, maka alihkan ke halaman daftar mahasiswa
            redirect('mahasiswa');
        }
        //ambil data mahasisa berdasarkan nrp
        $data['mahasiswa'] =  $this->mahasiswa_model->get_by_nrp($nrp)->row_array();
        //load form edit
        $this->load->view('mahasiswa/edit', $data);
    }

    public function update()
    {
        //cek apakah tombol update ditekan
        if ($this->input->post('update')) {
            $nrp = $this->input->post('nrp');

            //rule validasi
            $validation_rules = [
                [
                    'field' => 'nrp',
                    'label' => 'NRP',
                    'rules' => 'required'
                ],
                [
                    'field' => 'nama',
                    'label' => 'Nama',
                    'rules' => 'required'
                ],
                [
                    'field' => 'alamat',
                    'label' => 'Alamat',
                    'rules' => 'required'
                ],
                [
                    'field' => 'telp',
                    'label' => 'Telp',
                    'rules' => 'required'
                ],
                [
                    'field' => 'angkatan',
                    'label' => 'Angkatan',
                    'rules' => 'required'
                ],
                [
                    'field' => 'departemen',
                    'label' => 'Departemen',
                    'rules' => 'required'
                ],
                [
                    'field' => 'fakultas',
                    'label' => 'Fakultas',
                    'rules' => 'required'
                ]
            ];

            //set rule validasi
            $this->form_validation->set_rules($validation_rules);

            if ($this->form_validation->run() === false) {
                redirect('mahasiswa/edit/' . $nrp);
            }

            $where['nrp'] = $nrp;

            //data mahasiswa
            $mahasiswa = [
                'nrp' => $this->input->post('nrp'),
                'nama' => $this->input->post('nama'),
                'alamat' => $this->input->post('alamat'),
                'telp' => $this->input->post('telp'),
                'angkatan' => $this->input->post('angkatan'),
                'departemen' => $this->input->post('departemen'),
                'fakultas' => $this->input->post('fakultas')
            ];

            //update data
            $this->mahasiswa_model->update($mahasiswa, $where);

            $data['msg'] = 'Data berhasil diperbaharui';
            $this->load->view('mahasiswa/notifikasi', $data);
        } else {
            echo "<h3 style='color:red;'>Forbidden access</h3>";
        }
    }

    public function hapus($nrp = '')
    {
        //cek apakah parameter nrp ada
        if ('' == $nrp) {
            //jika tidak, tampilkan error
            return show_404();
        }
        //hapus data
        $this->mahasiswa_model->delete($nrp);

        $data['msg']  =  'Data berhasil dihapus';
        $this->load->view('mahasiswa/notifikasi', $data);
    }
}