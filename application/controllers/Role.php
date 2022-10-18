<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Role extends CI_Controller
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

        $role = $this->db
            ->select('
               *
            ')
            ->from('role')
            ->get()
            ->result();
        $data = [
            'role' => $role
        ];
        $this->load->view('layout/header');
        $this->load->view('role/data', $data);
        $this->load->view('layout/footer');
    }


    public function add()
    {
        if (!($this->session->userdata('data') != NULL)) {
            redirect(base_url() . 'login');
        }


        $this->load->view('layout/header');
        $this->load->view('user/add',);
        $this->load->view('layout/footer');
    }

    public function add_action()
    {
        if (!($this->session->userdata('data') != NULL)) {
            redirect(base_url() . 'login');
        }
        $p = (object)$_POST;
        $data = [
            'role_name'      => $p->role_name,
            'role_menu_access'       => $p->role_menu_access,
        ];
        $role = $this->db->insert('role', $data);
        if ($role) {
            $this->session->set_flashdata('message_role', 'Sukses save');
            redirect(base_url() . 'role');
        } else {
            $this->session->set_flashdata('message_role', 'Gagal save');
            redirect(base_url() . 'role/add');
        }
    }

    public function edit($id)
    {
        if (!($this->session->userdata('data') != NULL)) {
            redirect(base_url() . 'login');
        }


        $role = $this->db
            ->select('
               *
            ')
            ->from('role')
            ->where('id', $id)
            ->get()
            ->row();
        $data = [
            'role' => $role
        ];
        $this->load->view('layout/header');
        $this->load->view('role/edit', $data);
        $this->load->view('layout/footer');
    }


    public function edit_action($id)
    {
        if (!($this->session->userdata('data') != NULL)) {
            redirect(base_url() . 'login');
        }
        $p = (object)$_POST;
        $data = [
            'role_name'      => $p->role_name,
            'role_menu_access'       => $p->role_menu_access,
        ];
        $role = $this->db->update('role', $data)->where('id', $id);
        if ($role) {
            $this->session->set_flashdata('message_role', 'Sukses save');
            redirect(base_url() . 'role');
        } else {
            $this->session->set_flashdata('message_role', 'Gagal save');
            redirect(base_url() . 'role/add');
        }
    }
}
