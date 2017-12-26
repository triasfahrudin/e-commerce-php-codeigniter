<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Web extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        date_default_timezone_set('Asia/Jakarta');

        $this->load->database();

        $this->load->library(array('cart', 'form_validation', 'alert', 'recaptcha', 'session', 'form_validation'));
        $this->load->helper(array('url', 'libs', 'form'));

    }

    public function _page_output($data = null)
    {
        $data['logged_in']      = $this->session->userdata('user_id');
        $data['produk_terbaru'] = $this->latest_product(4);
        $data['produk_pilihan'] = $this->produk_pilihan(4);
        $data['produk_diskon']  = $this->produk_diskon(4);
        $data['menus']          = $this->db->get_where('kategori', array('parent' => 0));
       
        $this->load->view('master.php', $data);
    }

    public function save_layout()
    {
        $display = $this->input->post('display');
        $sort    = $this->input->post('sort');
        $limit   = $this->input->post('limit');

        if (isset($display)) {
            $this->session->set_userdata('display_product', $display);
        }

        if (isset($sort)) {
            $this->session->set_userdata('sort_product', $sort);
        }

        if (isset($limit)) {
            $this->session->set_userdata('limit_product', $limit);
        }

    }

    public function addtocart()
    {
        $product_id = $this->input->post('product_id');
        $prod     = $this->db->get_where('produk', array('id' => $product_id))->row_array();
        /*
        <form method="post" action="">
        <input type="hidden" name="id" value="<?php echo $produk['id']?>">
        <input type="hidden" name="price" value="<?php echo $produk['harga']?>">
        <input type="hidden" name="name" value="<?php echo $produk['nama']?>">

        <div>Qty:
        <input type="text" name="qty" size="2" value="1">
         */

        // $id    = $this->input->post('id');
        // $qty   = $this->input->post('qty');
        // $price = $this->input->post('price');
        // $name  = $this->input->post('name');

        $data = array(
            'id'          => 'sku_' . $prod['id'],
            'qty'         => 1,
            'price'       => $prod['harga'],
            'name'        => $prod['nama'],
            'berat'       => $prod['berat'],
            'gambar'      => $this->produk_detail($product_id, 'gambar'),
            'link_produk' => site_url($this->produk_detail($prod['id'], 'kategori_slug') . '/' . $this->produk_detail($prod['id'], 'slug')),
        );

        $this->cart->insert($data);

        // redirect(site_url(), 'reload');

    }

    private function random_produk($limit)
    {
        $this->db->select('a.*,b.slug AS kategori_slug');
        $this->db->join('kategori b', 'a.kategori_id = b.id', 'left');
        $this->db->limit($limit);
        $this->db->order_by('RAND()');
        return $this->db->get('produk a');
    }

    private function latest_product($limit)
    {

        $this->db->select('a.*,b.slug AS kategori_slug');
        $this->db->join('kategori b', 'a.kategori_id = b.id', 'left');
        $this->db->limit($limit);
        $this->db->order_by('tgl_buat DESC');
        return $this->db->get("produk a");
    }

    private function produk_pilihan($limit)
    {
        $this->db->select('a.*,b.slug AS kategori_slug');
        $this->db->join('kategori b', 'a.kategori_id = b.id', 'left');
        $this->db->where('produk_pilihan', 'ya');
        $this->db->limit($limit);
        $this->db->order_by('RAND()');
        return $this->db->get('produk a');
    }

    private function produk_diskon($limit)
    {
        $this->db->select('a.*,b.slug AS kategori_slug');
        $this->db->join('kategori b', 'a.kategori_id = b.id', 'left');
        $this->db->where('status_harga', 'diskon');
        $this->db->limit($limit);
        $this->db->order_by('RAND()');
        return $this->db->get('produk a');
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

    public function populer_blog()
    {
        $this->db->limit(4);
        $this->db->order_by('dilihat DESC');
        return $this->db->get('blog');
    }

    private function _blog_archive($jenis = 'tahunsekarang')
    {
        if ($jenis === 'tahunsekarang') {
            $this->db->select("DATE_FORMAT(dibuat,'%M') AS bulan,COUNT(*) AS jml_artikel");
            $this->db->where('YEAR(dibuat) = YEAR(NOW())');
            $this->db->group_by('MONTH(dibuat)');
            return $this->db->get('blog');
        } else {
            //pertahun selain tahun sekarang
            $this->db->select("YEAR(dibuat) AS tahun,COUNT(*) AS jml_artikel");
            $this->db->where('YEAR(dibuat) <> YEAR(NOW())');
            return $this->db->get('blog');

        }
    }

    public function blog_archive()
    {

        //november.2017
        //2017

        $slug = $this->uri->segment(3);

        if (is_numeric($slug)) {
            //ex:2017

            $this->load->library('pagination');

            $url = site_url('web/blog-archive/' . $slug);

            $this->db->where('YEAR(dibuat)', $slug);
            $total_rows = $this->db->get('blog')->num_rows();

            $uri_segment = 4;
            $per_page    = 6;

            $config = $this->_paginate($url, $total_rows, $per_page, $uri_segment);
            $this->pagination->initialize($config);

            $awal  = $this->uri->segment(4, 0);
            $akhir = $config['per_page'];

            $this->db->where('YEAR(dibuat)', $slug);
            $this->db->limit($akhir, $awal);
            $this->db->order_by('dibuat DESC');
            $artikels = $this->db->get("blog");

            $data = array(
                'artikels'             => $artikels,
                'populer_blog'         => $this->populer_blog(),
                'blog_tahunsekarang'   => $this->_blog_archive('tahunsekarang'),
                'blog_tahunsebelumnya' => $this->_blog_archive('tahunsebelumnya'),
                'blog_kategori'        => $this->db->get('blog_kategori'),
                'page'                 => 'blog',
            );
            $this->_page_output($data);

        } else {
            //cek apakah ada "." pada slug
            $cek_dot = strpos($slug, ".");
            if ($cek_dot > 0) {

                $exp = explode(".", $slug);

                $bulan = $exp[0];
                $tahun = $exp[1];

                $this->load->library('pagination');

                $url = site_url('web/blog-archive/' . $slug);

                $this->db->where("DATE_FORMAT(dibuat,'%M')", $bulan);
                $this->db->where('YEAR(dibuat)', $tahun);
                $total_rows = $this->db->get('blog')->num_rows();

                $uri_segment = 4;
                $per_page    = 6;

                $config = $this->_paginate($url, $total_rows, $per_page, $uri_segment);
                $this->pagination->initialize($config);

                $awal  = $this->uri->segment(4, 0);
                $akhir = $config['per_page'];

                $this->db->where("DATE_FORMAT(dibuat,'%M')", $bulan);
                $this->db->where('YEAR(dibuat)', $tahun);

                $this->db->limit($akhir, $awal);
                $this->db->order_by('dibuat DESC');
                $artikels = $this->db->get("blog");

                $data = array(
                    'artikels'             => $artikels,
                    'populer_blog'         => $this->populer_blog(),
                    'blog_tahunsekarang'   => $this->_blog_archive('tahunsekarang'),
                    'blog_tahunsebelumnya' => $this->_blog_archive('tahunsebelumnya'),
                    'blog_kategori'        => $this->db->get('blog_kategori'),
                    'page'                 => 'blog',
                );
                $this->_page_output($data);
            } else {
                redirect(site_url('web'), 'reload');

            }
        }

    }

    public function blog_kategori()
    {
        $this->load->library('pagination');

        $slug = $this->uri->segment(3, 'no-slug');

        if ($slug === 'no-slug') {
            redirect(site_url('web'), 'reload');
        }

        $url = site_url('web/blog-kategori/' . $slug . '/');

        $cek_blog_kategori = $this->db->get_where('blog_kategori', array('slug' => $slug));
        if ($cek_blog_kategori->num_rows() == 0) {
            redirect(site_url('web'), 'reload');
        }

        $blog_kategori = $cek_blog_kategori->row_array();

        //1
        //1,
        //,1,
        //,1

        $this->db->where('kategori', $blog_kategori['id']);
        $this->db->or_like('kategori', $blog_kategori['id'] . ',', 'after');
        $this->db->or_like('kategori', ',' . $blog_kategori['id'] . ',', 'both');
        $this->db->or_like('kategori', ',' . $blog_kategori['id'], 'before');

        $total_rows  = $this->db->get('blog')->num_rows();
        $uri_segment = 4;
        $per_page    = 6;

        $config = $this->_paginate($url, $total_rows, $per_page, $uri_segment);
        $this->pagination->initialize($config);

        $awal  = $this->uri->segment($uri_segment, 0);
        $akhir = $config['per_page'];

        $this->db->limit($akhir, $awal);
        $this->db->order_by('dibuat DESC');

        $this->db->where('kategori', $blog_kategori['id']);
        $this->db->or_like('kategori', $blog_kategori['id'] . ',', 'after');
        $this->db->or_like('kategori', ',' . $blog_kategori['id'] . ',', 'both');
        $this->db->or_like('kategori', ',' . $blog_kategori['id'], 'before');

        $artikels = $this->db->get("blog");

        $data = array(
            'artikels'             => $artikels,
            'populer_blog'         => $this->populer_blog(),
            'blog_tahunsekarang'   => $this->_blog_archive('tahunsekarang'),
            'blog_tahunsebelumnya' => $this->_blog_archive('tahunsebelumnya'),
            'blog_kategori'        => $this->db->get('blog_kategori'),
            'page'                 => 'blog',
        );
        $this->_page_output($data);
    }

    public function blog()
    {

        $this->load->library('pagination');

        $url         = site_url('web/blog/');
        $total_rows  = $this->db->get('blog')->num_rows();
        $uri_segment = 3;
        $per_page    = 6;

        $config = $this->_paginate($url, $total_rows, $per_page, $uri_segment);
        $this->pagination->initialize($config);

        $awal  = $this->uri->segment(3, 0);
        $akhir = $config['per_page'];

        $this->db->limit($akhir, $awal);
        $this->db->order_by('dibuat DESC');
        $artikels = $this->db->get("blog");

        $data = array(
            'artikels'             => $artikels,
            'populer_blog'         => $this->populer_blog(),
            'blog_tahunsekarang'   => $this->_blog_archive('tahunsekarang'),
            'blog_tahunsebelumnya' => $this->_blog_archive('tahunsebelumnya'),
            'blog_kategori'        => $this->db->get('blog_kategori'),
            'page'                 => 'blog',
        );
        $this->_page_output($data);
    }

    public function add_blog_viewcount($slug)
    {
        // load cookie helper
        $this->load->helper('cookie');
        // this line will return the cookie which has slug name
        $check_visitor = $this->input->cookie(urldecode($slug), false);
        // this line will return the visitor ip address
        $ip = $this->input->ip_address();
        // if the visitor visit this article for first time then //
        //set new cookie and update article_views column  ..
        //you might be notice we used slug for cookie name and ip
        //address for value to distinguish between articles  views
        if ($check_visitor == false) {
            $cookie = array(
                "name"   => urldecode($slug),
                "value"  => "$ip",
                "expire" => time() + 7200,
                "secure" => false,
            );
            $this->input->set_cookie($cookie);
            // $this->news->update_counter(urldecode($slug));

            // return current article views
            $this->db->where('slug', urldecode($slug));
            $this->db->select('dilihat');
            $count = $this->db->get('blog')->row();
            // then increase by one
            $this->db->where('slug', urldecode($slug));
            $this->db->set('dilihat', ($count->dilihat + 1));
            $this->db->update('blog');
        }
    }

    public function baca_blog()
    {

        // $user_ip = getUserIP();
        $slug = $this->uri->segment(3, 'no-slug');

        if ($slug === 'no-slug') {
            redirect(site_url(), 'reload');
        }

        $cek_blog = $this->db->get_where('blog', array('slug' => $slug));
        if ($cek_blog->num_rows() == 0) {
            redirect(site_url(), 'reload');
        }

        // $blog = $cek_blog->row_array();
        //cek apakah user ini udah baca artikel ini hari ini
        $this->add_blog_viewcount($slug);

        $data = array(
            'blog_konten'          => $cek_blog->row_array(),
            'populer_blog'         => $this->populer_blog(),
            'blog_tahunsekarang'   => $this->_blog_archive('tahunsekarang'),
            'blog_tahunsebelumnya' => $this->_blog_archive('tahunsebelumnya'),
            'blog_kategori'        => $this->db->get('blog_kategori'),
            'page'                 => 'baca_blog',

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

    public function brands()
    {
        $this->load->library('pagination');
        // $display = $this->session->userdata('display_product');

        //jika belum ada default tampilan maka beri nilai default
        if (!isset($_SESSION['display_product'])
            || !isset($_SESSION['sort_product'])
            || !isset($_SESSION['limit_product'])) {
            //set default untuk tampilan
            $this->session->set_userdata('display_product', 'list');
            $this->session->set_userdata('sort_product', 'atoz');
            $this->session->set_userdata('limit_product', '15');
        }

        $display = $this->session->userdata('display_product');
        $sort    = $this->session->userdata('sort_product');
        $limit   = $this->session->userdata('limit_product');

        $order_by = "nama ASC";
        switch ($sort) {
            case 'atoz':
                $order_by = "nama ASC";
                break;

            case 'ztoa':
                $order_by = "nama DESC";
                break;

            case 'hightolow':
                $order_by = "harga DESC";
                break;

            case 'lowtohigh':
                $order_by = "harga ASC";
                break;
        }

        //
        $merk_slug = $this->uri->segment(2, 'noslug');
        // echo $merk_slug;
        // exit();

        $this->db->where('merk_slug', $merk_slug);
        $total_rows = $this->db->get('produk')->num_rows();

        if ($total_rows == 0) {
            redirect(site_url(), 'reload');
        }

        $url         = site_url('brands/' . $merk_slug . '/');
        $total_rows  = $total_rows;
        $uri_segment = 3;
        $per_page    = $limit;

        $config = $this->_paginate($url, $total_rows, $per_page, $uri_segment);
        $this->pagination->initialize($config);

        $awal  = $this->uri->segment(3, 0);
        $akhir = $config['per_page'];

        $this->db->select('a.*,b.slug AS kategori_slug');
        $this->db->join('kategori b', 'a.kategori_id = b.id', 'left');
        $this->db->where('merk_slug', $merk_slug);
        $this->db->limit($akhir, $awal);
        $this->db->order_by($order_by);
        $produk = $this->db->get("produk a");

        $data = array(
            'page'         => 'kategori_brands',
            'current_slug' => '-',
            'merk_slug'    => $merk_slug,
            'produk'       => $produk,
            'layout'       => array('display' => $display, 'sort' => $sort, 'limit' => $limit),
        );
        $this->_page_output($data);

    }

    public function produk_detail($id, $return_collumn)
    {
        $this->db->select('a.*,b.slug AS kategori_slug');
        $this->db->join('kategori b', 'a.kategori_id = b.id', 'left');
        $this->db->where('a.id', $id);
        $prod = $this->db->get('produk a')->row_array();
        //$prod = $this->db->get_where('produk',array('id' => $id))->row_array();
        return $prod[$return_collumn];
    }

    public function remove_item()
    {
        $rowid    = $this->uri->segment(3, 0);
        $redirect = $this->uri->segment(4, 'web');
        $data     = array(
            'rowid' => $rowid,
            'qty'   => 0,
        );

        $this->cart->update($data);

        redirect(site_url($redirect), 'reload');
    }

    public function updatecart(){

        $data = array(
                'rowid' => $this->input->post('rowid'),
                'qty'   => $this->input->post('qty')
        );

        $this->cart->update($data);

    }

    public function keranjang_belanja()
    {
        $data = array(
            'berat_total' => $this->berat_total(),
            'page' => 'keranjang_belanja',
        );
        $this->_page_output($data);
    }


    private function berat_total(){
        
        $btotal = 0;    
        foreach ($this->cart->contents() as $items):
            $btotal += ($items['berat'] * $items['qty']); 
        endforeach;    

        return $btotal;
    }

    public function beli()
    {

        // echo site_url($this->produk_detail(1, 'kategori_slug') . '/' . $this->produk_detail(1, 'slug'));
        if (!empty($_POST)) {
            /*
            $data = array(
            'id'      => 'sku_123ABC',
            'qty'     => 1,
            'price'   => 39.95,
            'name'    => 'T-Shirt',
            'options' => array('Size' => 'L', 'Color' => 'Red')
            );

            $this->cart->insert($data);
             */

            $id    = $this->input->post('id');
            $qty   = $this->input->post('qty');
            $price = $this->input->post('price');
            $name  = $this->input->post('name');
            $berat = $this->input->post('berat');

            $data = array(
                'id'          => 'sku_' . $id,
                'qty'         => $qty,
                'price'       => $price,
                'name'        => $name,
                'gambar'      => $this->produk_detail($id, 'gambar'),
                'link_produk' => site_url($this->produk_detail($id, 'kategori_slug') . '/' . $this->produk_detail($id, 'slug')),
                'berat'       => $berat  
            );

            $this->cart->insert($data);

            redirect(site_url('keranjang-belanja'), 'reload');

        }

        /*
        if(isset($display)){
        $this->session->set_userdata('display_product',$display);
        }

        if(isset($sort)){
        $this->session->set_userdata('sort_product',$sort);
        }

        if(isset($limit)){
        $this->session->set_userdata('limit_product',$limit);
        }
         */

        // $display = $this->session->userdata('display_product');

        // //jika belum ada default tampilan maka beri nilai default
        // if (!$display) {
        //     //set default untuk tampilan
        //     $this->session->set_userdata('display_product', 'list');
        //     $this->session->set_userdata('sort_product', 'atoz');
        //     $this->session->set_userdata('limit_product', '15');
        // }

        // $sort  = $this->session->userdata('sort_product');
        // $limit = $this->session->userdata('limit_product');

        //jika belum ada default tampilan maka beri nilai default
        if (!isset($_SESSION['display_product'])
            || !isset($_SESSION['sort_product'])
            || !isset($_SESSION['limit_product'])) {
            //set default untuk tampilan
            $this->session->set_userdata('display_product', 'list');
            $this->session->set_userdata('sort_product', 'atoz');
            $this->session->set_userdata('limit_product', '15');
        }

        $display = $this->session->userdata('display_product');
        $sort    = $this->session->userdata('sort_product');
        $limit   = $this->session->userdata('limit_product');

        $order_by = "nama ASC";
        switch ($sort) {
            case 'atoz':
                $order_by = "nama ASC";
                break;

            case 'ztoa':
                $order_by = "nama DESC";
                break;

            case 'hightolow':
                $order_by = "harga DESC";
                break;

            case 'lowtohigh':
                $order_by = "harga ASC";
                break;
        }

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
                $per_page    = $limit;

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
                $this->db->order_by($order_by);
                $produk = $this->db->get("produk a");

                $data = array(
                    'page'            => 'kategori',
                    'current_slug'    => $current_slug,
                    'produk'          => $produk,
                    'kategori_detail' => $this->db->get_where('kategori', array('slug' => $slug))->row_array(),
                    'layout'          => array('display' => $display, 'sort' => $sort, 'limit' => $limit),
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
                $per_page    = $limit;

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
                $this->db->order_by($order_by);
                $produk = $this->db->get("produk a");

                $data = array(
                    'page'            => 'kategori',
                    'current_slug'    => $current_slug,
                    'produk'          => $produk,
                    'kategori_detail' => $this->db->get_where('kategori', array('slug' => $slug))->row_array(),
                    'layout'          => array('display' => $display, 'sort' => $sort, 'limit' => $limit),
                );
                $this->_page_output($data);
            }

        }

    }

    public function login()
    {

        if (!empty($_POST)) {
            $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
            $this->form_validation->set_rules('password', 'Password', 'trim|required');

            if ($this->form_validation->run() == true) {
                $email    = $this->input->post('email');
                $password = md5($this->input->post('password'));

                $cek = $this->db->get_where('member', array('email' => $email, 'password' => $password));
                if ($cek->num_rows() > 0) {
                    $member = $cek->row_array();

                    $this->session->set_userdata(
                        array(
                            'user_id'          => $member['id'],
                            'user_email'       => $member['email'],
                            'user_namalengkap' => $member['nama_lengkap'],
                        )
                    );

                    redirect(site_url('member'));
                }

            }

        }
        $data = array(
            'page' => 'login',
        );
        $this->_page_output($data);
    }

    public function sukses_buat_akun_baru()
    {
        $email    = $this->uri->segment(3, 'no-email');
        $password = $this->uri->segment(4);

        if ($email === 'no-email') {
            redirect(site_url('web'), 'reload');
        }

        $email_decode    = base64url_decode($email);
        $password_decode = base64url_decode($password);

        $data = array(
            'page' => 'sukses_buat_akun_baru',
        );

        //send email to account

        $message = 'Terimakasih telah melakukan pendaftaran di&nbsp;&nbsp;' . site_url() . '<br>';
        $message .= 'Berikut ini adalah detail akun anda&nbsp;&nbsp;:&nbsp;&nbsp;<br>';
        $message .= 'Email Anda&nbsp;&nbsp;:&nbsp;&nbsp;' . $email_decode . '<br>';
        $message .= 'Password Anda &nbsp;&nbsp;:&nbsp;&nbsp;' . $password_decode . '<br>';
        $message .= '&nbsp;<br><br><hr>';
        $message .= 'tracking-code:&nbsp;' . generate_uuid();
        send_email($email_decode, 'Pendaftaran ' . site_url(), $message);

        $this->_page_output($data);
    }

    public function lupa_password()
    {

        if (!empty($_POST)) {
            $email = $this->input->post('email');

            $cek = $this->db->get_where('member', array('email' => $email));
            if ($cek->num_rows() == 0) {
                redirect(site_url(), 'reload');
            }

            $password = generateRandomString(6);

            $this->db->where('email', $email);
            $this->db->update('member',
                array(
                    'last_reset_password' => date("Y-m-d H:i:s"),
                )
            );

            $member = $this->db->get_where('member', array('email' => $email))->row_array();

            $message = 'Seseorang telah melakukan reset password akun anda di&nbsp;' . site_url() . '<br>';
            $message .= 'Jika anda tidak merasa melakukan hal ini, mohon hiraukan email ini<br>';
            $message .= 'Untuk memulai reset password, silahkan klik link dibawah ini :<br>';
            $message .= '<a href="' . site_url('web/reset-password/' . $member['reset_token']) . '">RESET PASSWORD</a>';
            $message .= '&nbsp;<br><br><hr>';
            $message .= 'tracking-code:&nbsp;' . generate_uuid();
            send_email($email, 'Reset Password ' . site_url(), $message);

            echo js_alert('Periksa email anda untuk langkah selanjutnya', site_url('web'));
        }

        $data = array(
            'page' => 'lupa_password',
        );
        $this->_page_output($data);
    }

    public function reset_password()
    {
        $reset_token = $this->uri->segment(3, 'no-reset-token');

        if ($reset_token === 'no-reset-token') {
            redirect(site_url(), 'reload');
        }

        if (!empty($_POST)) {

            $this->form_validation->set_rules('password', 'Password baru', 'trim|required');
            $this->form_validation->set_rules('ulangi', 'Ulangi password', 'trim|required|matches[password]');

            if ($this->form_validation->run() == true) {

                $pass   = $this->input->post('password');
                $ulangi = $this->input->post('ulangi');

                $this->db->where('reset_token', $reset_token);
                $this->db->update('member', array('password' => md5($pass)));

                echo js_alert('Password telah berubah, silahkan logon dengan password anda yang baru', site_url('web'));

            }
        }

        $data = array(
            'page' => 'reset_password',
        );

        $this->_page_output($data);

    }

    public function buat_akun()
    {
        if (!empty($_POST)) {
            $this->form_validation->set_rules('nama_lengkap', 'Nama lengkap', 'trim|required');
            $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[member.email]');
            $this->form_validation->set_rules('telp', 'Telp', 'trim|required');

            if ($this->form_validation->run() == true) {

                $nama_lengkap = $this->input->post('nama_lengkap');
                $email        = $this->input->post('email');
                $telp         = $this->input->post('telp');

                $password = generateRandomString(5);

                $this->db->insert('member', array(
                    'email'        => $email,
                    'nama_lengkap' => $nama_lengkap,
                    'telp'         => $telp,
                    'password'     => md5($password),
                )
                );

                $email_hash    = base64url_encode($email);
                $password_hash = base64url_encode($password);

                redirect(site_url('web/sukses-buat-akun-baru/' . $email_hash . '/' . $password_hash));
            }
        }

        $data = array(
            'page' => 'login',
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
