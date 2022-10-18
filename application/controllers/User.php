<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     *	- or -
     * 		http://example.com/index.php/welcome/index
     *	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */
    public function index()
    {
        if (!($this->session->userdata('data') != NULL)) {
            redirect(base_url() . 'login');
        }

        $user = $this->db
            ->select('
               *
            ')
            ->from('dashboard_user')
            ->join('role', 'role.id=dashboard_user.role_id')
            ->get()
            ->result();
        $data = [
            'user' => $user
        ];
        $this->load->view('layout/header');
        $this->load->view('user/data', $data);
        $this->load->view('layout/footer');
    }


    public function add()
    {
        if (!($this->session->userdata('data') != NULL)) {
            redirect(base_url() . 'login');
        }

        $user = $this->db
            ->select('
               *
            ')
            ->from('dashboard_user')
            ->join('role', 'role.id=dashboard_user.role_id')
            ->get()
            ->result();
        $data = [
            'user' => $user
        ];
        $this->load->view('layout/header');
        $this->load->view('user/add', $data);
        $this->load->view('layout/footer');
    }

    public function add_action()
    {
        if (!($this->session->userdata('data') != NULL)) {
            redirect(base_url() . 'login');
        }
        $p = (object)$_POST;
        $data = [
            'username'      => $p->username,
            'password'      => $p->password,
            'role_id'       => $p->role_id,
            'created_at'    => date('Y-m-d H:i:s'),
        ];
        $user = $this->db->insert('dashboard_user',$data);
        if ($user) {
            $this->session->set_flashdata('message_user', 'Sukses save');
            redirect(base_url() . 'user');
        } else {
            $this->session->set_flashdata('message_user', 'Gagal save');
            redirect(base_url() . 'user/add');
        }
        
    }

    public function edit($id)
    {
        if (!($this->session->userdata('data') != NULL)) {
            redirect(base_url() . 'login');
        }

        $user = $this->db
            ->select('
               *
            ')
            ->from('dashboard_user')
            ->join('role', 'role.id=dashboard_user.role_id')
            ->where('id',$id)
            ->get()
            ->row();
        $data = [
            'user' => $user
        ];
        $this->load->view('layout/header');
        $this->load->view('user/edit', $data);
        $this->load->view('layout/footer');
    }


    public function edit_action($id)
    {
        if (!($this->session->userdata('data') != NULL)) {
            redirect(base_url() . 'login');
        }
        $p = (object)$_POST;
        $data = [
            'username'      => $p->username,
            'password'      => $p->password,
            'role_id'       => $p->role_id,
            // 'created_at'    => date('Y-m-d H:i:s'),
        ];
        $user = $this->db->update('dashboard_user',$data)->where('id',$id);
        if ($user) {
            $this->session->set_flashdata('message_user', 'Sukses save');
            redirect(base_url() . 'user');
        } else {
            $this->session->set_flashdata('message_user', 'Gagal save');
            redirect(base_url() . 'user/add');
        }
        
    }
}
