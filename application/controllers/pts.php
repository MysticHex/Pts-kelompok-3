<?php

class pts extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('pts_model');
        $this->load->helper('url');
    }

    function index(){
        $this->load->view('login');
    }
    function login()
    {
        $this->form_validation->set_rules('usn', 'Username', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        
        $username = $this->input->post('usn');
        $password = $this->input->post('password');

        $data = [
            'usn' => $username,
            'pw' => $password
        ];
        if ($this->form_validation->run() == false) {
            $this->load->view('login');
        } else {
            $this->pts_model->login($data);
        }
    }

    function register()
    {
        $this->form_validation->set_rules('usn', 'username', 'required|trim|is_unique[user.username]', [
            'is_unique' => "Username already registered!"
        ]);
        $this->form_validation->set_rules('pw', 'Password', 'required|trim|matches[pwc]', [
            'matches' => "Password doesnt match"
        ]);
        $this->form_validation->set_rules('pwc', 'Password', 'required|trim|matches[pw]', [
            'matches' => "Password doesnt match"
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('register');
        } else {
            $data = [
                'username' => $this->input->post('usn'),
                'password' => password_hash($this->input->post('pw'), PASSWORD_DEFAULT)
            ];

            $this->pts_model->register($data);
        }
    }
}
