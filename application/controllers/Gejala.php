<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Gejala extends Operator_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->halaman = 'gejala';
    }

    public function index($page = null)
    {
        $gejalaa     = $this->gejala->getAll();                                         //nama gejala ambil dari model
        $halaman    = $this->halaman;
        $main_view  = 'gejala/index';
        $this->load->view('template', compact('halaman', 'main_view', 'gejalaa'));
    }

    public function create()
    {
        if (!$_POST) {
            $input = (object) $this->gejala->getDefaultValues();
        } else {
            $input = (object) $this->input->post(null, true);
        }

        if (!$this->gejala->validate()) {
            $halaman     = $this->halaman;
            $main_view   = 'gejala/form_new';                                           //nama gejala ambil dari folder view
            $form_action = 'gejala/create';                                             //nama gejala ambil dari controller

            $this->load->view('template', compact('halaman', 'main_view', 'form_action', 'input'));
            return;
        }

        if ($this->gejala->insert($input)) {
            $this->session->set_flashdata('success', 'Data gejala berhasil disimpan.');
        } else {
            $this->session->set_flashdata('error', 'Data gejala gagal disimpan.');
        }

        redirect('gejala');
    }

    public function edit($id = null)
    {
        $gejala = $this->gejala->where('id', $id)->get();
        if (!$gejala) {
            $this->session->set_flashdata('warning', 'Data gejala tidak ada.');
            redirect('gejala');
        }

        if (!$_POST) {
            $input = (object) $gejala;                                                //mengambil data hasil select dan menampilkan object
        } else {
            $input = (object) $this->input->post(null, true);
        }

        if (!$this->gejala->validate()) {
            $halaman     = $this->halaman;
            $main_view   = 'gejala/form';
            $form_action = "gejala/edit/$id";

            $this->load->view('template', compact('halaman', 'main_view', 'form_action', 'input'));
            return;
        }

        if ($this->gejala->where('id', $id)->update($input)) {
            $this->session->set_flashdata('success', 'Data gejala berhasil diupdate.');
        } else {
            $this->session->set_flashdata('error', 'Data gejala gagal diupdate.');
        }

        redirect('gejala');
    }

    public function delete($id = null)
    {
        $gejala = $this->gejala->where('id', $id)->get();
        if (!$gejala) {
            $this->session->set_flashdata('warning', 'Data gejala tidak ada.');
            redirect('gejala');
        }

        if ($this->gejala->where('id', $id)->delete()) {
            $this->session->set_flashdata('success', 'Data gejala berhasil dihapus.');
        } else {
            $this->session->set_flashdata('error', 'Data gejala gagal dihapus.');
        }

        redirect('gejala');
    }


    /*
    |-----------------------------------------------------------------
    | Callback
    |-----------------------------------------------------------------
    */
    public function alpha_numeric_coma_dash_dot_space($str)
    {
        if ( !preg_match('/^[a-zA-Z0-9 .,\-]+$/i',$str) )
        {
            $this->form_validation->set_message('alpha_numeric_coma_dash_dot_space', 'Hanya boleh berisi huruf, spasi, tanda hubung(-), titik(.) dan koma(,).');
            return false;
        }
    }

    public function nama_gejala_unik()
    {
        $nama_gejala = $this->input->post('nama_gejala');
        $id_gejala   = $this->input->post('id_gejala');

        $this->gejala->where('nama_gejala', $nama_gejala);
        !$id_gejala || $this->gejala->where('id_gejala !=', $id_gejala);
        $gejala = $this->gejala->get();

        if (count($gejala)) {
            $this->form_validation->set_message('nama_gejala_unik', '%s sudah digunakan.');
            return false;
        }
        return true;
    }
}
