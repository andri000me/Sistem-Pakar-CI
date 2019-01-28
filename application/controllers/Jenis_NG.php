<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Jenis_NG extends Operator_Controller
{
	public function __construct()
    {
        parent::__construct();
        $this->halaman = 'jenis_ng';
    }

	public function index($page = null)
	{
        $jenisng    = $this->jenis_ng->getAll();                                     //jenis_ng berasal dari model
        $halaman    = $this->halaman;
        $main_view  = 'jenisng/index';

        $this->load->view('template', compact('halaman', 'main_view', 'jenisng'));
	}

	public function create()
	{
        if (!$_POST) {
            $input = (object) $this->jenis_ng->getDefaultValues();                  
        } else {
            $input = (object) $this->input->post(null, true);
        }

        if (!$this->jenis_ng->validate()) {
            $halaman     = $this->halaman;
            $main_view   = 'jenisng/form_new';                                      //jenisng berasal dari folder view
            $form_action = 'jenis_ng/create';                                       //jenis_ng berasal dari nama controller

            $this->load->view('template', compact('halaman', 'main_view', 'form_action', 'input'));
            return;
        }

        if ($this->jenis_ng->insert($input)) {
            $this->session->set_flashdata('success', 'Data siswa berhasil disimpan.');
        } else {
            $this->session->set_flashdata('error', 'Data siswa gagal disimpan.');
        }

        redirect('jenis_ng');
	}

	public function edit($id = null)
	{
        $jenisng = $this->jenis_ng->where('id', $id)->get();
        if (!$jenisng) {                                                                    
            $this->session->set_flashdata('warning', 'Data siswa tidak ada.');
            redirect('jenis_ng');
        }

        if (!$_POST) {
            $input = (object) $jenisng;                                               //mengambil data hasil select dan menampilkan object
        } else {
            $input = (object) $this->input->post(null, true);
        }

        if (!$this->jenis_ng->validate()) {
            $halaman     = $this->halaman;
            $main_view   = 'jenisng/form';
            $form_action = "jenis_ng/edit/$id";

            $this->load->view('template', compact('halaman', 'main_view', 'form_action', 'input'));
            return;
        }

        if ($this->jenis_ng->where('id', $id)->update($input)) {
            $this->session->set_flashdata('success', 'Data siswa berhasil diupdate.');
        } else {
            $this->session->set_flashdata('error', 'Data siswa gagal diupdate.');
        }

        redirect('jenis_ng');
	}

	public function delete($id = null)
	{
		$jenis_ng = $this->jenis_ng->where('id', $id)->get();
        if (!$jenis_ng) {
            $this->session->set_flashdata('warning', 'Data siswa tidak ada.');
            redirect('jenis_ng');
        }

        if ($this->jenis_ng->where('id', $id)->delete()) {
			$this->session->set_flashdata('success', 'Data siswa berhasil dihapus.');
		} else {
            $this->session->set_flashdata('error', 'Data siswa gagal dihapus.');
        }

		redirect('jenis_ng');
	}

    /*
    |-----------------------------------------------------------------
    | Callback
    |-----------------------------------------------------------------
    */
    public function alpha_coma_dash_dot_space($str)
    {
        if ( !preg_match('/^[a-zA-Z .,\-]+$/i',$str) )
        {
            $this->form_validation->set_message('alpha_coma_dash_dot_space', 'Hanya boleh berisi huruf, spasi, tanda hubung(-), titik(.) dan koma(,).');
            return false;
        }
    }

    public function nis_unik()
    {
        $nis      = $this->input->post('nis');
        $id = $this->input->post('id');

        $this->siswa->where('nis', $nis);
        !$id || $this->siswa->where('id !=', $id);
        $siswa = $this->siswa->get();

        if (count($siswa)) {
            $this->form_validation->set_message('nis_unik', '%s sudah digunakan.');
            return false;
        }
        return true;
    }
}
