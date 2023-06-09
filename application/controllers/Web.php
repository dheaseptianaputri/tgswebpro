<?php
defined('BASEPATH') or exit('no direct script access allowed');

class Web extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->helper(array('url', 'form'));
    }

    public function index()
    {
        $data['judul'] = "Halaman Depan";
        $this->load->view('web/templates/v_header', $data);
        $this->load->view('web/v_index', $data);
        $this->load->view('web/templates/v_footer', $data);
    }

    public function about()
    {
        $data['judul'] = "Halaman About";
        $this->load->view('web/templates/v_header', $data);
        $this->load->view('web/v_about', $data);
        $this->load->view('web/templates/v_footer', $data);
    }

    public function form(){
        $data['judul'] = "Halaman Form";
        $this->load->view('web/templates/v_header', $data);
        $this->load->view('web/v_form', $data);
        $this->load->view('web/templates/v_footer', $data);
    }

    public function data()
    {

        $this->load->library('form_validation');

        $this->form_validation->set_rules(
            'kode',
            'Kode MTK',
            'required|numeric',
            array(
                'required' => 'Kode MTK Masih Kosong',
                'numeric' =>  'Kode MTK Tidak Valid, Harap Gunakan Angka!'
            )
        );
        $this->form_validation->set_rules(
            'nama',
            'Nama MTK',
            'required|min_length[3]',
            array(
                'required' => 'Nama MTK Masih Kosong',
                'min_length' => 'Nama MTK Tidak Boleh Kurang dari 3 Karakter!'
            )
        );
        $this->form_validation->set_rules(
            'sks',
            'SKS',
            'required',
            array(
                'required' => 'SKS Belum Dipilih'
            )
        );

        if ($this->form_validation->run() == FALSE) {
            // if validation fails, show form again with validation errors
            $data['judul'] = "Halaman Form";
            $this->load->view('web/templates/v_header', $data);
            $this->load->view('web/v_form', $data);
            $this->load->view('web/templates/v_footer', $data);
        } else {
            $data = [
                'kode' => $this->input->post('kode'),
                'nama' => $this->input->post('nama'),
                'sks' => $this->input->post('sks')
            ];

            $data['judul'] = "Halaman Form";
            $this->load->view('web/templates/v_header', $data);
            $this->load->view('web/v_data', $data);
            $this->load->view('web/templates/v_footer', $data);
        }
    }
}
