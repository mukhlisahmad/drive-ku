<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }
    public function index()
    {
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email', [
            'valid_email' => 'emai dont valid',
        ]);
        $this->form_validation->set_rules('password', 'Password', 'required|trim');
        if ($this->form_validation->run() == false) {
            $data['title'] = 'Drive BEM UQ';
            $this->load->view('auth/signin', $data);
            $this->load->view('template/header');
            $this->load->view('template/footer');
        } else {
            //validasinya sukses
            $this->_login();
        }
    }

    private function _login()
    {
        // $id_user = $this->input->post('id_user');
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        // $user = $this->db->get_where('user', ['id_user' => $id_user])->row_array();
        $user = $this->db->get_where('user', ['email' => $email])->row_array();

        if ($user) {
            //usernya ada
            if ($user['is_active'] == 1) {
                //cek password
                if (password_verify($password, $user['password'])) {
                    $data = [
                        // 'id_user' => $user['id_user'],
                        'email' => $user['email'],
                        'username' => $user['username'],
                        'level' => $user['level'],
                    ];
                    $this->session->set_userdata($data);
                    redirect('user');
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger mt-2" role="alert" style="width: 280px; margin: auto;font-style: 11px">Wrong password !</div>');
                    redirect('auth');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger mt-2" role="alert" style="width: 280px; margin: auto;font-style: 11px">This email has not been activated !</div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger mt-2" role="alert" style="width: 280px; margin: auto;font-style: 11px">Email is not registred !</div>');
            redirect('auth');
        }
    }

    public function signup()
    {
        $this->form_validation->set_rules('username', 'Username', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', [
            'is_unique' => 'This email has already registered',
        ]);
        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[3]|matches[confirm]', [
            'matches' => 'Password don\'t match!',
            'min_length' => 'Password too short',
        ]);
        $this->form_validation->set_rules('confirm', 'Confirm', 'required|trim|matches[password]');
        $this->form_validation->set_rules('level', 'Level', 'required|numeric|in_list[2]', [
            'required' => 'Please select your level.',
            'numeric' => 'Invalid level.',
            'in_list' => 'Invalid level.',
        ]);

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Create Your Account';
            $this->load->view('auth/signup', $data);
            $this->load->view('template/header');
            $this->load->view('template/footer');
        } else {
            $data = [
                'username' => htmlspecialchars($this->input->post('username', true)),
                'email' => $this->input->post('email', true),
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                'is_active' => 0, // Set is_active menjadi 0
                'level' => $this->input->post('level'),
                'date_created' => time(),
            ];
            $this->db->insert('user', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success mt-2 mb-1" role="alert" style="width: 280px; margin: auto;font-style: 11px">Congratulation! Your account has been created. Please wait for admin confirmation.</div>');
            redirect('auth');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('email');

        $this->session->set_flashdata('message', '<div class="alert alert-success mt-2 mb-1" role="alert" style="width: 280px; margin: auto;font-style: 11px">You have been logged out !</div>');
        redirect('auth');
    }
}
