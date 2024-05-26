<?php

class User_model extends CI_Model
{
    public function getAllUser()
    {
        return $this->db->get('data')->result_array();
    }

    public function dataUser()
    {
        $data = [
            'nama' => $this->input->post('nama', true),
            'email' => $this->input->post('email', true),
        ];

        $this->db->insert('data', $data);
    }

    public function hapusData($id)
    {
        $this->db->delete('drivedata', ['id_drive' => $id]);
    }
    public function hapusFolder($id)
    {
        $this->db->delete('folders', ['id_folder' => $id]);
    }
    public function hapusSuratmasuk($id)
    {
        $this->db->delete('surat_masuk', ['id_surat' => $id]);
    }
    public function hapusSuratkeluar($id)
    {
        $this->db->delete('surat_keluar', ['id_surat' => $id]);
    }
    public function getData($id)
    {
        return $this->db->get_where('data', ['id' => $id])->row_array();
    }

    public function updateUser($id)
    {
        $data = [
            'nama' => $this->input->post('nama', true),
            'email' => $this->input->post('email', true),
        ];

        $this->db->update('data', $data);
    }

    public function uploadData($data)
    {
        return $this->db->insert('drivedata', $data);
    }
    public function uploadSuratmasuk($data)
    {
        return $this->db->insert('surat_masuk', $data);
    }
    public function uploadSuratkeluar($data)
    {
        return $this->db->insert('surat_keluar', $data);
    }

    public function getRows($params = array())
    {
        $user = $this->session->userdata('email');
        $this->db->select('*');
        $this->db->from('drivedata');
        $this->db->where('email', $user);

        if (array_key_exists('id_drive', $params) && !empty($params['id_drive'])) {
            $this->db->where('id_drive', $params['id_drive']);
            $query = $this->db->get();
            $result = ($query->num_rows() > 0) ? $query->row_array() : false;
        } else {
            if (array_key_exists('start', $params) && array_key_exists('limit', $params)) {
                $this->db->limit($params['limit'], $params['start']);
            } elseif (!array_key_exists('start', $params) && array_key_exists('limit', $params)) {
                $this->db->limit($params['limit']);
            }
            $query = $this->db->get();
            $result = ($query->num_rows() > 0) ? $query->result_array() : false;
        }
        return $result;
    }
    public function getRows1($params = array())
    {
        $user = $this->session->userdata('email');
        $this->db->select('*');
        $this->db->from('surat_masuk');
        $this->db->where('email', $user);

        if (array_key_exists('id_surat', $params) && !empty($params['id_surat'])) {
            $this->db->where('id_surat', $params['id_surat']);
            $query = $this->db->get();
            $result = ($query->num_rows() > 0) ? $query->row_array() : false;
        } else {
            if (array_key_exists('start', $params) && array_key_exists('limit', $params)) {
                $this->db->limit($params['limit'], $params['start']);
            } elseif (!array_key_exists('start', $params) && array_key_exists('limit', $params)) {
                $this->db->limit($params['limit']);
            }
            $query = $this->db->get();
            $result = ($query->num_rows() > 0) ? $query->result_array() : false;
        }
        return $result;
    }
    public function getRows2($params = array())
    {
        $user = $this->session->userdata('email');
        $this->db->select('*');
        $this->db->from('surat_keluar');
        $this->db->where('email', $user);

        if (array_key_exists('id_surat', $params) && !empty($params['id_surat'])) {
            $this->db->where('id_surat', $params['id_surat']);
            $query = $this->db->get();
            $result = ($query->num_rows() > 0) ? $query->row_array() : false;
        } else {
            if (array_key_exists('start', $params) && array_key_exists('limit', $params)) {
                $this->db->limit($params['limit'], $params['start']);
            } elseif (!array_key_exists('start', $params) && array_key_exists('limit', $params)) {
                $this->db->limit($params['limit']);
            }

            $query = $this->db->get();
            $result = ($query->num_rows() > 0) ? $query->result_array() : false;
        }
        return $result;
    }
    public function getRows3($params = array())
    {
        $email = 'mukhlis@gmail.com';
        $this->db->select('*');
        $this->db->from('surat_keluar');
        $this->db->where('email', $email);
        if (array_key_exists('id_surat', $params) && !empty($params['id_surat'])) {
            $this->db->where('id_surat', $params['id_surat']);
            $result = $this->db->get()->row_array();
        } else {
            if (array_key_exists('start', $params) && array_key_exists('limit', $params)) {
                $this->db->limit($params['limit'], $params['start']);
            } elseif (!array_key_exists('start', $params) && array_key_exists('limit', $params)) {
                $this->db->limit($params['limit']);
            }
            $result = $this->db->get()->result_array();
        }
        return $result;
    }
    public function getFileInFolder($params = array())
    {
        $user = $this->session->userdata('email');
        $this->db->select('*');
        $this->db->from('drivedata');
        $this->db->where('email', $user);

        if (array_key_exists('id_drive', $params) && !empty($params['id_drive'])) {
            $this->db->where('id_drive', $params['id_drive']);
            $query = $this->db->get();
            $result = ($query->num_rows() > 0) ? $query->row_array() : false;
        } else {
            if (array_key_exists('start', $params) && array_key_exists('limit', $params)) {
                $this->db->limit($params['limit'], $params['start']);
            } elseif (!array_key_exists('start', $params) && array_key_exists('limit', $params)) {
                $this->db->limit($params['limit']);
            }

            $query = $this->db->get();
            $result = ($query->num_rows() > 0) ? $query->result_array() : false;
        }
        return $result;
    }
    public function getFileById($id_drive)
    {
        return $this->db->get_where('drivedata', ['id_drive' => $id_drive])->row_array();
    }

    public function getFileData($id_drive)
    {
        $this->db->where('id_drive', $id_drive);
        return $this->db->get('drivedata')->row_array();
    }
    public function deleteFile($id_drive)
    {
        return $this->db->delete('drivedata', ['id_drive' => $id_drive]);
    }

    public function update_profile($data)
    {
        $email = $this->session->userdata('email');
        $this->db->where('email', $email);
        $this->db->update('user', $data);
    }
    public function getRows4($params = array())
    {
        $email = 'mukhlis@gmail.com';

        $this->db->select('*');
        $this->db->from('surat_masuk');
        $this->db->where('email', $email);
        if (array_key_exists('id_surat', $params) && !empty($params['id_surat'])) {
            $this->db->where('id_surat', $params['id_surat']);
            $result = $this->db->get()->row_array();
        } else {
            if (array_key_exists('start', $params) && array_key_exists('limit', $params)) {
                $this->db->limit($params['limit'], $params['start']);
            } elseif (!array_key_exists('start', $params) && array_key_exists('limit', $params)) {
                $this->db->limit($params['limit']);
            }
            $result = $this->db->get()->result_array();
        }
        return $result;
    }
    public function add_folder($data)
    {
        $this->db->insert('folders', $data);
        return $this->db->insert_id();
    }
    public function upload_file($data)
    {
        $this->db->insert('drivedata', $data);
    }
    public function get_folder_by_id($id_folder)
    {
        return $this->db->get_where('folders', ['id_folder' => $id_folder])->row_array();
    }

    public function get_files_in_folder($id_folder)
    {
        return $this->db->get_where('drivedata', ['id_folders' => $id_folder])->result_array();
    }

}
