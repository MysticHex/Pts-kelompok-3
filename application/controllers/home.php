<?php
class home extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('pts_model');
        $this->load->model('film');
        $this->load->helper('url');
        $this->pts_model->cek_login();
        date_default_timezone_set("Asia/Jakarta");
    }

    function index()
    {
        $data['film'] = $this->film->tampil_data()->result();
        $this->load->view('index', $data);
    }

    function logout()
    {
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('role');
        $this->session->unset_userdata('is_login');
        redirect('pts/login');
    }

    function user()
    {
        $username=$this->session->userdata('username');
        $data['row']=$this->pts_model->rows($username);
        $this->load->view('user',$data);
    }

    function book($slug)
    {
        $data['slug'] = $slug;
        $query = ['slug' => $slug];
        $data['book'] = $this->film->book($query)->result();
        $data['film'] = $this->film->jadwal($query)->result();
        $this->load->view('book', $data);
    }

    function list_jadwal($slug)
    {
        $data['slug'] = $slug;
        $query = ['slug' => $slug];
        $data['book'] = $this->film->book($query)->result();
        $data['film'] = $this->film->jadwal_lengkap($query)->result();
        $this->load->view('list-jadwal', $data);
    }

    function booking()
    {
        $this->form_validation->set_rules('user', 'user', 'required');
        $this->form_validation->set_rules('slug', 'slug', 'required');
        $this->form_validation->set_rules('tgl', 'tgl', 'required');
        $this->form_validation->set_rules('nama_film', 'nama_film', 'required');
        $this->form_validation->set_rules('waktu', 'waktu', 'required');
        $this->form_validation->set_rules('kursi', 'kursi', 'required');

        $usn = $this->input->post('user');
        $nama_film = $this->input->post('nama_film');
        $kursi = $this->input->post('kursi');
        $jadwal = $this->input->post('tgl');
        $waktu = $this->input->post('waktu');
        $slug = $this->input->post('slug');

        if ($this->form_validation->run() == true) {

            $key = array('slug' => $slug);
            $data = [
                'username' => $usn,
                'film' => $nama_film,
                'kursi' => $kursi,
                'jadwal' => $jadwal,
                'waktu' => $waktu
            ];
            $this->pts_model->book($data, $key);
            redirect('home/index');
        } else {
            redirect('home/book/' . $slug);
        }
    }

    function tiket_aktif()
    {
        $user = $this->session->userdata('username');
        $data['aktif'] = $this->film->active_tickets($user)->result();

        $this->load->view('tiket-aktif', $data);
    }
    function tiket()
    {
        $user = $this->session->userdata('username');
        $data['aktif'] = $this->film->tickets($user)->result();

        $this->load->view('tiket', $data);
    }
    function admin()
    {
        if ($this->session->userdata['role'] == 0) {
            $data['film'] = $this->film->tampil_data()->result();
            $this->load->view('admin', $data);
        } else {
            redirect('home/index');
        }
    }
    function tambah_jadwal($slug){
        $query = ['slug' => $slug];
        $data['slug'] = $slug;
        $data['book'] = $this->film->book($query)->result();
        $this->load->view('tambah-jadwal',$data);
    }
}
