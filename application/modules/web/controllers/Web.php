<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Web extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        date_default_timezone_set('Asia/Jakarta');

        $this->load->database();

        $this->load->library(array('form_validation', 'alert', 'recaptcha', 'session','form_validation'));
        $this->load->helper(array('url', 'libs','form'));
    }

    public function _page_output($data = null)
    {
        $data['logged_in'] = $this->session->userdata('user_id');
        $data['produk_terbaru'] = $this->latest_product(4);
        $data['menus']          = $this->db->get_where('kategori', array('parent' => 0));
        $this->load->view('master.php', $data);
    }

    private function random_produk($limit)
    {
        $this->db->limit($limit);
        $this->db->order_by('RAND()');
        return $this->db->get('produk');
    }

    private function latest_product($limit)
    {

        $this->db->select('a.*,b.slug AS kategori_slug');
        $this->db->join('kategori b', 'a.kategori_id = b.id', 'left');
        $this->db->limit($limit);
        $this->db->order_by('tgl_buat DESC');
        return $this->db->get("produk a");
    }

    public function index()
    {
        $data = array(
            'random_produk' => $this->random_produk(10),
            'slides'        => $this->db->get('slider_images'),
            'page'          => 'beranda',
        );
        $this->_page_output($data);
    }

    public function flatten(array $array)
    {
        $return = array();
        array_walk_recursive($array, function ($a) use (&$return) {$return[] = $a;});
        return $return;
    }

    private function _paginate($base_url, $total_rows, $per_page, $uri_segment)
    {
        $config = array(
            'base_url'    => $base_url,
            'total_rows'  => $total_rows,
            'per_page'    => $per_page,
            'uri_segment' => $uri_segment,
        );

        /*
        <div class="pagination">
        <a class="prev page-numbers" href="#"><span class="icon-text">◂</span>Previous Page</a>
        <a class="page-numbers" href="#">1</a>
        <span class="page-numbers current">2</span>
        <a class="page-numbers" href="#">3</a>
        <a class="page-numbers" href="#">4</a>
        <a class="page-numbers" href="#">5</a>
        <a class="page-numbers" href="#">6</a>
        <a class="next page-numbers" href="#">Next Page<span class="icon-text">▸</span></a>
        </div>

         */
        // $config['anchor_class'] = 'class="page-numbers" ';
        $config['attributes'] = array('class' => 'page-numbers');

        $config['first_link']      = 'First';
        $config['first_tag_open']  = '';
        $config['first_tag_close'] = '';

        $config['last_link']      = 'Last';
        $config['last_tag_open']  = '';
        $config['last_tag_close'] = '';

        $config['next_link']      = '&raquo;';
        $config['next_tag_open']  = '';
        $config['next_tag_close'] = '';

        $config['prev_link']      = '&laquo;';
        $config['prev_tag_open']  = '';
        $config['prev_tag_close'] = '';

        $config['cur_tag_open']  = '<a class="active">';
        $config['cur_tag_close'] = '</a>';

        $config['num_tag_open']  = '';
        $config['num_tag_close'] = '';

        return $config;
    }

    public function beli()
    {

        $slug = $this->uri->segment(1);
        $kat  = $this->db->get_where('kategori', array('slug' => $slug))->row_array();

        $current_slug = "";

        $this->load->library('pagination');
        $total_rows = 0;

        $produk = null;

        if ($kat['parent'] == 0) {
            $current_slug = $kat['slug'];

            //jika uri segment 2 adalah slug maka berarti detail produk
            $uri2       = $this->uri->segment(2, 'noslug');
            $cek_produk = $this->db->get_where('produk', array('slug' => $uri2));
            if ($cek_produk->num_rows() > 0) {
                //ini adalah request detail produk
                $data = array(
                    'current_slug' => $current_slug,
                    'page'         => 'produk',
                    'produk'       => $this->db->get_where('produk', array('slug' => $uri2))->row_array(),
                );

                $this->_page_output($data);
            } else {
                $this->db->select('id');
                $kat_id = $this->db->get_where("kategori", array('parent' => $kat['id']));

                $this->db->where_in('kategori_id', $this->flatten($kat_id->result_array()));
                $total_rows = $this->db->get('produk')->num_rows();

                $url         = site_url($slug . '/');
                $total_rows  = $total_rows;
                $uri_segment = 2;
                $per_page    = 12;

                $config = $this->_paginate($url, $total_rows, $per_page, $uri_segment);
                $this->pagination->initialize($config);

                $awal  = $this->uri->segment(4, 0);
                $akhir = $config['per_page'];

                $this->db->select('id');
                $kat_id = $this->db->get_where("kategori", array('parent' => $kat['id']));

                $this->db->select('a.*,b.slug AS kategori_slug');
                $this->db->join('kategori b', 'a.kategori_id = b.id', 'left');
                $this->db->where_in('a.kategori_id', $this->flatten($kat_id->result_array()));
                $this->db->limit($akhir, $awal);
                $this->db->order_by('nama ASC');
                $produk = $this->db->get("produk a");

                $data = array(
                    'page'            => 'kategori',
                    'current_slug'    => $current_slug,
                    'produk'          => $produk,
                    'kategori_detail' => $this->db->get_where('kategori', array('slug' => $slug))->row_array(),
                );
                $this->_page_output($data);
            }

        } else {
            $sub          = $this->db->get_where('kategori', array('id' => $kat['parent']))->row_array();
            $current_slug = $sub['slug'];

            $uri2       = $this->uri->segment(2, 'noslug');
            $cek_produk = $this->db->get_where('produk', array('slug' => $uri2));
            if ($cek_produk->num_rows() > 0) {
                //ini adalah request detail produk
                $data = array(
                    'current_slug' => $current_slug,
                    'page'         => 'produk',
                    'produk'       => $this->db->get_where('produk', array('slug' => $uri2))->row_array(),
                );

                $this->_page_output($data);
            } else {
                $total_rows = $this->db->get_where('produk', array('kategori_id' => $kat['id']))->num_rows();

                $url         = site_url($slug . '/');
                $total_rows  = $total_rows;
                $uri_segment = 2;
                $per_page    = 12;

                $config = $this->_paginate($url, $total_rows, $per_page, $uri_segment);
                $this->pagination->initialize($config);

                $awal  = $this->uri->segment(4, 0);
                $akhir = $config['per_page'];

                // $this->db->limit($akhir,$awal);
                // $this->db->order_by('nama ASC');

                // $produk = $this->db->get_where('produk',array('kategori_id' => $kat['id']));
                $this->db->select('a.*,b.slug AS kategori_slug');
                $this->db->join('kategori b', 'a.kategori_id = b.id', 'left');
                $this->db->where('a.kategori_id', $kat['id']);
                $this->db->limit($akhir, $awal);
                $this->db->order_by('nama ASC');
                $produk = $this->db->get("produk a");

                $data = array(
                    'page'            => 'kategori',
                    'current_slug'    => $current_slug,
                    'produk'          => $produk,
                    'kategori_detail' => $this->db->get_where('kategori', array('slug' => $slug))->row_array(),
                );
                $this->_page_output($data);
            }

        }

    }


    public function login(){

        if(!empty($_POST)){
            $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
            $this->form_validation->set_rules('password', 'Password', 'trim|required');

            if ($this->form_validation->run() == true) {
                $email = $this->input->post('email');
                $password = md5($this->input->post('password'));

                $cek = $this->db->get_where('member',array('email' => $email,'password' => $password));
                if($cek->num_rows() > 0){
                    $member = $cek->row_array();

                    $this->session->set_userdata(
                        array(
                            'user_id'          => $member['id'] ,
                            'user_email'       => $member['email'],
                            'user_namalengkap' => $member['nama_lengkap']
                        )
                    );
                    
                    redirect(site_url());
                }

            }
            
        }
        $data = array(            
            'page'          => 'login',
        );
        $this->_page_output($data);
    }

    public function buat_akun(){
        if (!empty($_POST)) {
            $this->form_validation->set_rules('nama_lengkap', 'Nama lengkap', 'trim|required');
            $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
            $this->form_validation->set_rules('telp', 'Telp', 'trim|required');

            if ($this->form_validation->run() == true) {
                
                $nama_lengkap = $this->input->post('nama_lengkap');
                $email = $this->input->post('email');
                $telp = $this->input->post('telp');

                redirect(site_url('web/sukses-buat-akun-baru'));
            }
        }

        $data = array(            
            'page'          => 'login',
        );
        $this->_page_output($data);   
    }

    // public function produk(){
    //   $slug = $this->uri->segment(2);
    //   $data = array(
    //     'page' => 'produk',
    //     'produk' => $this->db->get_where('produk',array('slug' => $slug))->row_array()
    //   );
    //
    //   $this->_page_output($data);
    // }
}
