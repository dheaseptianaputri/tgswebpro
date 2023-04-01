<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Biodata extends CI_Controller {

    public function biodataku()
    {
        $this->load->view('biodata');
    }
    public function penjumlahan($nilai1, $nilai2)
    {
        echo $this->Model_aritmatika->penjumlahan($nilai1, $nilai2);
    }
}