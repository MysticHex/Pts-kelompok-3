<?php
class Admin extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('film');
        $this->load->library('upload');
        date_default_timezone_set("Asia/Jakarta");
    }

    function insert_jadwal()
    {
        $this->form_validation->set_rules('slug', 'slug', 'required');
        $this->form_validation->set_rules('tgl', 'tanggal', 'required');
        $this->form_validation->set_rules('waktu', 'waktu', 'required');

        if ($this->form_validation->run() == true) {
            $data = [
                'slug' => $this->input->post('slug'),
                'tanggal_main' => $this->input->post('tgl'),
                'waktu_main' => $this->input->post('waktu')
            ];
            $this->film->insert_jadwal($data);
        }
    }

    function update_jadwal()
    {
        $this->form_validation->set_rules('slug', 'slug', 'required');
        $this->form_validation->set_rules('id', 'id', 'required');
        $this->form_validation->set_rules('tgl', 'tanggal', 'required');
        $this->form_validation->set_rules('waktu', 'waktu', 'required');
        $slug = $this->input->post('slug');

        if ($this->form_validation->run() == true) {
            $id_data = array('id' => $this->input->post('id'));
            $data = [
                'tanggal_main' => $this->input->post('tgl'),
                'waktu_main' => $this->input->post('waktu')
            ];
            $this->film->update_jadwal($id_data, $data, $slug);
        } else {
            $this->load->view('edit-jadwal', $slug);
        }
    }

    function delete($slug)
    {
        $data = array('slug' => $slug);
        $this->film->delete_film($data);
    }
    function hapus_jadwal($slug, $id)
    {
        $data = array('id' => $id);
        $this->film->delete_schedule($slug, $data);
    }
    function edit_jadwal($id)
    {
        $id_data = array("id" => $id);
        $data['jadwal'] = $this->film->find_schedule($id_data)->result();
        $this->load->view('edit-jadwal', $data);
    }
    function tambah_data()
    {
        $this->load->view('tambah-data');
    }

    function add_data()
    {
        $this->form_validation->set_rules('judul', 'judul', 'required');
        $this->form_validation->set_rules('durasi', 'durasi', 'required');
        $this->form_validation->set_rules('deskripsi', 'deskripsi', 'required');

        if ($this->form_validation->run() == true) {
            $gambar = $_FILES['teaser_imager'];

            $judul = strtolower($this->input->post('judul'));
            $exp = explode(" ", $judul);
            $slug = implode("-", $exp);
            $ext = pathinfo($gambar['name'], PATHINFO_EXTENSION);
            $new_file_name = $slug . "." . $ext;
            $path = "./asset/teaser/" . $new_file_name;

            move_uploaded_file($gambar['tmp_name'], $path);

            $data = [
                'nama_film' => $this->input->post('judul'),
                'slug' => $slug,
                'teaser' => $new_file_name,
                'deskripsi_film' => $this->input->post('deskripsi'),
                'durasi_film' => $this->input->post('durasi')
            ];
            $this->film->insert_film($data);
        }
    }
}
