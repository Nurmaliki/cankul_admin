<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
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
        if ($this->session->userdata('data') != NULL) {
            redirect(base_url() . 'dashboard');
        }

        $this->load->view('login');
    }


    public function auth()
    {
        $p = (object) $_POST;
        $username = $p->username;
        $pw = $p->password;
        $data_user = $this->db->from('dashboard_user')->where('username', $username)->where('password', $pw)->get()->row();

        if ($data_user) {

            $this->session->set_userdata('data',    $data_user);
            redirect(base_url() . 'dashboard');
        } else {
            $this->session->set_flashdata('message_login', 'Username atau Password salah ');
            redirect(base_url() . 'login');
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect(base_url() . 'login');
    }
}
