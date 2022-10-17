<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Campaign extends CI_Controller
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

        $campaign = $this->db
            ->select('          
                beneficiary_details.beneficiary_id,	
                beneficiary_details.first_name,	
                beneficiary_details.last_name,	
                beneficiary_details.gender,	
                beneficiary_details.address,	
                beneficiary_details.kecamatan,	
                beneficiary_details.kelurahan,	
                beneficiary_details.phone,	
                beneficiary_details.title,	
                beneficiary_details.nationality,	
                beneficiary_details.province,	
                beneficiary_details.city,	
                beneficiary_details.rt,	
                beneficiary_details.rw,	
                beneficiary_details.mother_name,	
                beneficiary_details.marital_status,	
                beneficiary_details.last_education,	
                beneficiary_details.job_field,	
                beneficiary_details.job_title,	
                beneficiary_details.funds_source,	
                beneficiary_details.monthly_income,	
                beneficiary_details.email_status,	
                beneficiary_details.profile_status,	
                beneficiary.email,

                campaign.id,	
                campaign.name AS campaign_name,	
                campaign.description,	
                campaign.return_percentage,	
                campaign.date_start,	
                campaign.date_end,		
                campaign.company_id,	
                campaign.target,	
                campaign.status,
                beneficiary_company.name AS company_name,	
                beneficiary_company.region,	
                beneficiary_company.youtube,	
                beneficiary_company.overview,	
            ')
            ->from('campaign')
            ->join('beneficiary', 'campaign.beneficiary_id=beneficiary.id')
            ->join('beneficiary_details', 'beneficiary_details.beneficiary_id=beneficiary.id')
            ->join('beneficiary_company', 'beneficiary_company.id=campaign.company_id')
            ->get()
            ->result();
        $data = [
            'campaign' => $campaign
        ];
        $this->load->view('layout/header');
        $this->load->view('campaign/data', $data);
        $this->load->view('layout/footer');
    }
}
