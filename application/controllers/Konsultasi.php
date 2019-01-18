<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Konsultasi extends MY_Controller
{
	public function __construct()
    {
        parent::__construct();
        $this->halaman = 'konsultasi';
    }

    protected function isLogin()
    {
        $isLogin = $this->session->userdata('is_login');
        if (!$isLogin) {
            redirect(base_url());
        }
    }

	public function index($page = null)
	{
        //$gejalaa    = $this->db->where('kd_gejala', 'G01')->get('kelas')->result();
        $gejalaa    = $this->db->get('kelas')->result();
        $halaman    = $this->halaman;
        $main_view  = 'konsultasi/index';
		$this->load->view('template', compact('halaman', 'main_view', 'gejalaa'));
	}

    public function proses($page = null)
    {
        $answer = $this->input->post('G01');
        $kode = $this->input->post('kd_gejala');

        echo $answer;
        echo $kode;

       /* if($answer=='yes'&& $kode=='G01'){
            $gejalaa    = $this->db->where('kd_gejala', 'G02')->get('kelas')->result();
            $halaman    = $this->halaman;
            $main_view  = 'konsultasi/index';
            $this->load->view('template', compact('halaman', 'main_view', 'gejalaa'));
            
        }else{
            $gejalaa    = $this->db->where('kd_gejala', 'G03')->get('kelas')->result();
            $halaman    = $this->halaman;
            $main_view  = 'konsultasi/index';
            $this->load->view('template', compact('halaman', 'main_view', 'gejalaa'));
        }*/
    }

    public function proses1($page = null)
    {
        $answer = $this->input->post('answer');
        $kode = $this->input->post('kd_gejala');

        if($answer=='yes'&& $kode=='G01'){
            $gejalaa    = $this->db->where('kd_gejala', 'G02')->get('kelas')->result();
            $halaman    = $this->halaman;
            $main_view  = 'konsultasi/index';
            $this->load->view('template', compact('halaman', 'main_view', 'gejalaa'));
            
        }else{
            $gejalaa    = $this->db->where('kd_gejala', 'G03')->get('kelas')->result();
            $halaman    = $this->halaman;
            $main_view  = 'konsultasi/index';
            $this->load->view('template', compact('halaman', 'main_view', 'gejalaa'));
        }
    }

    /*
    |-----------------------------------------------------------------
    | Callback
    |-----------------------------------------------------------------
    */
    public function isbn_unik()
    {
        $isbn     = $this->input->post('isbn', true);
        $id_judul = $this->input->post('id_judul', true);

        $this->judul->where('isbn', $isbn);
        !$id_judul || $this->judul->where('id_judul !=', $id_judul);
        $judul = $this->judul->get();

        if (count($judul)) {
            $this->form_validation->set_message('isbn_unik', '%s sudah digunakan.');
            return false;
        }
        return true;
    }

}
