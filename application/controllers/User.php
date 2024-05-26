<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');
        is_logged_in();
    }
    public function index()
    {
        $data = [
            'user' => $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(),
            'foto' => $this->db->get_where('drivedata', ['email' => $this->session->userdata('email')])->result_array(),
        ];
        $user = $this->session->userdata('email');
        $data['title'] = 'Arsip';
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('user/index', array('error' => ''));
        $this->load->view('template/topbar_1', $data);
        $this->load->view('template/footer', $data);
    }

    public function upload()
    {
        $config['upload_path'] = './assets/File/';
        $config['allowed_types'] = 'gif|jpg|jpeg|php|png|pdf|doc|docx|xlsx|csv|xls';
        $config['max_size'] = 0;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('image')) {
            $data = [
                'user' => $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(),
                'error' => $this->upload->display_errors(),
                'foto' => $this->db->get_where('drivedata', ['email' => $this->session->userdata('email')])->result_array(),
            ];
            $user = $this->session->userdata('email');
            $data['title'] = 'Arsip';
            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar');
            $this->load->view('user/index', $data);
            $this->load->view('template/topbar_1', $data);
            $this->load->view('template/footer', $data);
        } else {
            $upload_data = $this->upload->data();
            $data = [
                'email' => $this->session->userdata('email'),
                'name_file' => password_hash($_FILES['image']['name'], PASSWORD_DEFAULT),
                'file' => $upload_data['file_name'],
                'date_created' => date('Y-m-d'),
            ];
            $this->User_model->uploadData($data);
            redirect('User');
        }
    }

    public function download($id_drive)
    {
        if (!empty($id_drive)) {
            $this->load->helper('download');
            $fileInfo = $this->User_model->getRows(array('id_drive' => $id_drive));
            $file = './assets/File/' . $fileInfo['file'];
            force_download($file, null);
        }
    }

    public function delete($id)
    {
        $this->User_model->hapusData($id);
        redirect('User');
    }
    ///-----surat masuk---/
    public function surat_masuk()
    {
        $data = [
            'user' => $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(),
            'foto' => $this->db->get_where('surat_masuk', ['email' => $this->session->userdata('email')])->result_array(),
        ];
        $user = $this->session->userdata('email');
        $data['title'] = 'Arsip';
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('user/surat_masuk', array('error' => ''));
        $this->load->view('template/topbar_1', $data);
        $this->load->view('template/footer', $data);
    }
    public function upload_suratmasuk()
    {
        $config['upload_path'] = './assets/File/';
        $config['allowed_types'] = 'gif|jpg|jpeg|png|pdf|doc|docx|xlsx|csv|xls|mp4|avi|zip';
        $config['max_size'] = 0;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('image')) {
            $data = [
                'user' => $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(),
                'error' => $this->upload->display_errors(),
                'foto' => $this->db->get_where('surat_masuk', ['email' => $this->session->userdata('email')])->result_array(),
            ];
            $user = $this->session->userdata('email');
            $data['title'] = 'Arsip';
            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar');
            $this->load->view('user/surat_masuk', $data);
            $this->load->view('template/topbar_1', $data);
            $this->load->view('template/footer', $data);
        } else {
            $upload_data = $this->upload->data();
            $data = [
                'email' => $this->session->userdata('email'),
                'name_file' => $_FILES['image']['name'],
                'file' => $upload_data['file_name'],
                'jenis' => $this->input->post('jenis'),
                'nomor' => $this->input->post('nomor'),
                'date_created' => date('Y-m-d'),
            ];
            $this->User_model->uploadSuratmasuk($data);
            redirect('user/surat_masuk');
        }
    }

    public function download_suratmasuk($id_surat)
    {
        if (!empty($id_surat)) {
            //load download helper
            $this->load->helper('download');

            //get file info from database
            $fileInfo = $this->User_model->getRows1(array('id_surat' => $id_surat));

            //file path
            $file = './assets/File/' . $fileInfo['file'];

            //download file
            force_download($file, null);
        }
    }
    public function delete_suratmasuk($id)
    {
        $this->User_model->hapusSuratmasuk($id);
        redirect('user/surat_masuk');
    }
//-----------surat keluar-----------
    public function surat_keluar()
    {
        $data = [
            'user' => $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(),
            'foto' => $this->db->get_where('surat_keluar', ['email' => $this->session->userdata('email')])->result_array(),
        ];
        $user = $this->session->userdata('email');
        $data['title'] = 'Arsip';
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('user/surat_keluar', array('error' => ''));
        $this->load->view('template/topbar_1', $data);
        $this->load->view('template/footer', $data);
    }
    public function upload_suratkeluar()
    {
        $config['upload_path'] = './assets/File/';
        $config['allowed_types'] = 'gif|jpg|jpeg|png|pdf|doc|docx|xlsx|csv|xls';
        $config['max_size'] = 0;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('image')) {
            $data = [
                'user' => $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(),
                'error' => $this->upload->display_errors(),
                'foto' => $this->db->get_where('surat_keluar', ['email' => $this->session->userdata('email')])->result_array(),
            ];
            $user = $this->session->userdata('email');
            $data['title'] = 'Arsip';
            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar');
            $this->load->view('user/surat_keluar', $data);
            $this->load->view('template/topbar_1', $data);
            $this->load->view('template/footer', $data);
        } else {
            $upload_data = $this->upload->data();
            $data = [
                'email' => $this->session->userdata('email'),
                'name_file' => $_FILES['image']['name'],
                'file' => $upload_data['file_name'],
                'jenis' => $this->input->post('jenis'),
                'nomor' => $this->input->post('nomor'),
                'date_created' => date('Y-m-d'),
            ];
            $this->User_model->uploadSuratkeluar($data);
            redirect('user/surat_keluar');
        }
    }

    public function download_suratkeluar($id_surat)
    {
        if (!empty($id_surat)) {
            //load download helper
            $this->load->helper('download');

            //get file info from database
            $fileInfo = $this->User_model->getRows2(array('id_surat' => $id_surat));

            //file path
            $file = './assets/File/' . $fileInfo['file'];

            //download file
            force_download($file, null);
        }
    }
    public function delete_suratkeluar($id)
    {
        $this->User_model->hapusSuratkeluar($id);
        redirect('user/surat_keluar');
    }
//------------------ SURAT KELUAR

    public function myprofile()
    {
        $data = [
            'user' => $this->db->get_where('user',
                ['email' => $this->session->userdata('email')])->row_array(),
        ];
        $data['title'] = 'Arsip';
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);

        $this->load->view('user/myprofile', array('error' => ''));
        $this->load->view('template/topbar_1', $data);
        $this->load->view('template/footer', $data);
    }

    public function update_profile()
    {
        $username = $this->input->post('username');
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $data = array(
            'username' => $username,
            'email' => $email,
            'password' => password_hash($password, PASSWORD_DEFAULT),
        );

        $this->User_model->update_profile($data);
        redirect('Auth');
    }
    public function mydrive()
    {
        $data = [
            'user' => $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(),
            'foto' => $this->db->get_where('folders', ['email' => $this->session->userdata('email')])->result_array(),
        ];
        $user = $this->session->userdata('email');
        $data['title'] = 'Arsip';
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('user/mydrive', array('error' => ''));
        $this->load->view('template/topbar_1', $data);
        $this->load->view('template/footer', $data);
    }
    public function delete_folder($id)
    {
        $this->User_model->hapusFolder($id);
        redirect('User/mydrive');
    }
    public function add_folder()
    {
        $email = $this->session->userdata('email');
        if (!$email) {
            echo 'User not logged in';
            return;
        }
        $nama_folder = $this->input->post('nama_folder');
        $date_created = date('Y-m-d H:i:s');

        $this->form_validation->set_rules('nama_folder', 'Folder Name', 'required');

        if ($this->form_validation->run() == false) {

            echo 'Validation Error';
        } else {
            $data = array(
                'email' => $email,
                'nama_folder' => $nama_folder,
                'date_created' => $date_created,
            );
            $this->User_model->add_folder($data);

            redirect('User/mydrive');
        }
    }
    public function folder($id_folder)
    {
        $data = [
            'user' => $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(),
        ];
        $data['folder'] = $this->User_model->get_folder_by_id($id_folder);
        $user = $this->session->userdata('email');
        $data['files'] = $this->User_model->get_files_in_folder($id_folder);

        $data['title'] = 'Arsip';
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('user/files', $data);
        $this->load->view('template/topbar_1', $data);
        $this->load->view('template/footer', $data);
    }public function deleteFile($id_drive)
    {
        $file = $this->User_model->getFileById($id_drive);

        if (!empty($file)) {
            $result = $this->User_model->deleteFile($id_drive);

            if ($result) {
                $id_folder = $file['id_folders'];

                if (!empty($id_folder)) {
                    redirect('User/folder/' . $id_folder);
                }
            }
        }

        redirect('User/folder');
    }

    public function upload_file($id_folder)
    {
        $config['upload_path'] = './assets/File/';
        $config['allowed_types'] = 'gif|jpg|jpeg|png|pdf|doc|docx|xlsx|csv|xls|mp4|avi|zip';
        $config['max_size'] = 90240;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('file')) {
            $error = array('error' => $this->upload->display_errors());
            print_r($error);
        } else {
            $upload_data = $this->upload->data();
            $data = array(
                'email' => $this->session->userdata('email'),
                'name_file' => $upload_data['file_name'], 
                'file' => $upload_data['full_path'], 
                'id_folders' => $id_folder,
                'date_created' => date('Y-m-d H:i:s'),
            );
            $this->User_model->upload_file($data);
            redirect('User/folder/' . $id_folder);
        }
    }

    public function downloadFile($id_drive)
    {
        $fileData = $this->User_model->getFileData($id_drive);

        if (!empty($fileData)) {
            header('Content-Type: application/octet-stream');
            header('Content-Disposition: attachment; filename="' . $fileData['name_file'] . '"');
            echo file_get_contents($fileData['file']);
            exit;
        } else {
            echo "File not found.";
        }
    }
 
    public function activate($user_id)
    {
        $this->db->where('id_user', $user_id);
        $this->db->update('user', ['is_active' => 1]);

        redirect('user/list_user');
    }
    public function unactivate($user_id)
    {
        $this->db->where('id_user', $user_id);
        $this->db->update('user', ['is_active' => 0]);

        redirect('user/list_user');
    }
    public function list_user()
    {
        $data = [
            'user' => $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(),
        ];
        $data['list_users'] = $this->db->get_where('user', ['level' => 2])->result_array();

        $data['title'] = 'Arsip';
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('user/list_user', $data);
        $this->load->view('template/topbar_1', $data);
        $this->load->view('template/footer', $data);
    }

    public function delete_user($user_id)
    {
        $user_to_delete = $this->db->get_where('user', ['id_user' => $user_id])->row_array();
        if (!$user_to_delete) {
            redirect('user/list_user');
            return;
        }
        $this->db->where('id_user', $user_id);
        $this->db->delete('user');
        redirect('user/list_user');
    }

}
