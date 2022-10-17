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
}
