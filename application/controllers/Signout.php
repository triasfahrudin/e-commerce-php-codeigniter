<?php defined('BASEPATH') or exit('No direct script access allowed');

class Signout extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->load->database();
        $this->load->helper('url');
        $this->load->library('session');

    }

    public function index()
    {
        // $this->session->sess_destroy();
        /*
        'user_id'           => $user['id'],
        'user_username'     => $user['username'],
        'user_level'        => $user['level']
         */
        $this->session->unset_userdata('user_id');
        $this->session->unset_userdata('user_username');
        $this->session->unset_userdata('user_level');

        redirect(site_url('web'), 'reload');
    }
}
