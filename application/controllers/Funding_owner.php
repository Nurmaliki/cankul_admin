<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Funding_owner extends CI_Controller
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

        $funding_owner = $this->db
            ->from('funding_owner')
            ->get()
            ->result();
        $data = [
            'funding_owner' => $funding_owner
        ];
        $this->load->view('layout/header');
        $this->load->view('funding_owner/data', $data);
        $this->load->view('layout/footer');
    }
}
