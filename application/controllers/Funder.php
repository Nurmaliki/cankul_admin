<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Funder extends CI_Controller
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

        $funder = $this->db
            ->select('
                funder_details.id,	
                funder_details.funder_id,	
                funder_details.first_name,	
                funder_details.last_name,	
                funder_details.gender,	
                funder_details.address,	
                funder_details.kecamatan,	
                funder_details.kelurahan,	
                funder_details.phone,	
                funder_details.title,	
                funder_details.nationality,	
                funder_details.province,	
                funder_details.city,	
                funder_details.rt,	
                funder_details.rw,	
                funder_details.mother_name,	
                funder_details.marital_status,	
                funder_details.last_education,	
                funder_details.job_field,	
                funder_details.job_title,	
                funder_details.funds_source,	
                funder_details.monthly_income,	
                funder_details.email_status,	
                funder_details.profile_status,	
                funder.email
            ')
            ->from('funder')
            ->join('funder_details', 'funder_details.funder_id=funder.id')
            ->get()
            ->result();
        $data = [
            'funder' => $funder
        ];
        $this->load->view('layout/header');
        $this->load->view('funder/data', $data);
        $this->load->view('layout/footer');
    }
}
