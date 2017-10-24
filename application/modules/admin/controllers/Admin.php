<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends MX_Controller
{
    private $user_id;

    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');

        $this->load->database();
        $this->load->helper(array('url', 'libs','alert'));
        $this->load->library(array('form_validation', 'session','alert','breadcrumbs'));

        $this->breadcrumbs->load_config('default');
        // $this->load->model('Admin_model','admin_m');

        $level = $this->session->userdata('user_level');
        if($level !== 'admin'){
          redirect(site_url('web'),'reload');
        }

        $this->output->set_header('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT');
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, no-transform, max-age=0, post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');
        $this->output->set_header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
    }


    public function _page_output($output = null)
    {
        $this->load->view('master.php', (array) $output);
    }

    public function index()
    {
        $this->breadcrumbs->push('Dashboard', '/admin');

        $data['page_name'] = 'beranda';
        $data['page_title'] = 'Beranda';
        $this->_page_output($data);
    }

    public function kategori(){
      try {
        $this->load->library(array('grocery_CRUD'));
        $crud = new Grocery_CRUD();

        $crud->set_table('kategori');
        $crud->set_subject('Kategori Produk');
        $crud->where('parent','0');
        $crud->order_by('nama', 'ASC');


        $crud->field_type('slug', 'hidden');
        $this->breadcrumbs->push('Dashboard', '/admin');
        $this->breadcrumbs->push('Kategori Produk', '/admin/kategori');

        // $crud->set_relation('parent','kategori','nama');
        $crud->field_type('parent', 'hidden', 0);
        $crud->columns('nama','sub kategori');

        $crud->callback_column('sub kategori', function($value,$row){
          $count_item = $this->db->get_where('kategori',array('parent' => $row->id))->num_rows();
          return '<a href="' . site_url('admin/sub-kategori-produk/' . $row->id) .'">Kelola (' . $count_item . ' items)</a>';
        });

        $state = $crud->getState();
        if ($state === 'edit') {
          $this->breadcrumbs->push('Ubah', '/admin/kategori/edit');
        } elseif($state === 'add') {
          $this->breadcrumbs->push('Tambah', '/admin/kategori/add');
        }


        $extra = array('page_title' => 'Kategori Produk');
        $output = $crud->render();

        $output = array_merge((array) $output, $extra);

        $this->_page_output($output);
      } catch (Exception $e) {
          show_error($e->getMessage().' --- '.$e->getTraceAsString());
      }
    }

    public function sub_kategori_produk($parent){
      try {

        $kategori = $this->db->get_where('kategori',array('id' => $parent))->row_array();

        $this->load->library(array('grocery_CRUD'));
        $crud = new Grocery_CRUD();

        $crud->set_table('kategori');
        $crud->set_subject('Sub Kategori Produk');
        $crud->order_by('nama', 'ASC');
        $crud->where('parent',$parent);

        $crud->field_type('slug', 'hidden');
        $this->breadcrumbs->push('Dashboard', '/admin');
        $this->breadcrumbs->push('Kategori Produk', '/admin/kategori');
        $this->breadcrumbs->push($kategori['nama'], '/admin/sub-kategori-produk/' . $parent);

        // $crud->set_relation('parent','kategori','nama');
        $crud->field_type('parent', 'hidden', $parent);
        $crud->columns('nama');

        $state = $crud->getState();
        if ($state === 'edit') {
          $this->breadcrumbs->push('Ubah', '/admin/sub-kategori-produk/' . $parent . '/edit');
        } elseif($state === 'add') {
          $this->breadcrumbs->push('Tambah', '/admin/sub-kategori-produk/'. $parent .'/add');
        }


        $extra = array('page_title' => 'Sub Kategori Produk');
        $output = $crud->render();

        $output = array_merge((array) $output, $extra);

        $this->_page_output($output);
      } catch (Exception $e) {
          show_error($e->getMessage().' --- '.$e->getTraceAsString());
      }
    }

    // public function upload_gambar_cover_produk($produk_id){
    //   if (!empty($_FILES['img']['name'])) {
    //
    //       $config = array(
    //         'upload_path'   => './uploads/gambar_produk',
    //         'allowed_types' => 'jpeg|jpg|png|bmp',
    //         'encrypt_name'  => true
    //
    //       );
    //
    //       $this->load->library('upload', $config);
    //
    //       if (!$this->upload->do_upload('img')) {
    //         echo '<script>
    //                 alert("ERROR ! Gambar gagal diunggah!");
    //                 window.location = "' . site_url('admin/produk') . '";
    //               </script>';
    //       } else {
    //           $success = $this->upload->data();
    //           $gambar =  $success['file_name'];
    //
    //           $this->db->where('id', $produk_id);
    //           $this->db->update('produk', array('gambar' => $gambar));
    //
    //           redirect('admin/produk');
    //       }
    //   }
    // }

    public function produk(){
      try {
          $this->load->library(array('grocery_CRUD'));
          $crud = new Grocery_CRUD();

          $crud->set_table('produk');
          $crud->set_subject('Produk');
          $crud->order_by('nama', 'ASC');

          $state = $crud->getState();

          $crud->required_fields('kategori_id','nama', 'merk', 'harga', 'rincian');
          $crud->columns('nama', 'kategori_id', 'harga','galeri');
          // $crud->set_relation('kategori_id', 'kategori', 'nama');

          $kategori = array();
          $this->db->where('parent <>',0);
          $kat = $this->db->get('kategori');
          foreach ($kat->result_array() as $k) {
            $kategori[$k['id']] = $k['nama'];
          }

          $crud->field_type('kategori_id','dropdown',$kategori);
          $crud->display_as('kategori_id', 'Kategori Produk');

          // $crud->callback_column('gambar_utama',function($value, $row){
          //
          //   $link  = '<a class="fancybox" rel="ligthbox-' . $row->id . '" href="' . site_url('uploads/gambar_produk/' . $row->gambar) . '">';
          //   $link .= 'Lihat cover';
          //   $link .= '</a>';
          //
          //   $form   = form_open_multipart('admin/upload_gambar_cover_produk/' . $row->id);
          //   $form  .= '<input class="upload" name="img" onchange="this.form.submit()" type="file">';
          //   $form  .= form_close();
          //
          //   if(empty($row->gambar)){
          //     return $form;
          //   }else{
          //     return $link . $form;
          //   }
          //
          //
          // });

          $crud->set_field_upload('gambar', 'uploads/gambar_produk');

          $crud->callback_column('harga', function($value,$row){
            return format_rupiah($row->harga);
          });
          // $crud->callback_column('sold', array($this, '_sold'));

          $crud->callback_column('galeri',function($value, $row){
            return '<a href="'. site_url('admin/galeri-produk/'.$row->id).'">Kelola</a>';
          });


          $crud->field_type('slug', 'readonly');

          $this->breadcrumbs->push('Dashboard', '/admin');
          $this->breadcrumbs->push('Produk', '/admin/produk');


          if ($state === 'edit') {
              $this->breadcrumbs->push('Ubah', '/manage/produk/edit');
          } elseif ($state === 'add') {
              $this->breadcrumbs->push('Tambah', '/manage/produk/add');
          }

          $extra = array(
            'page_title' => 'Produk',
          );

          $output = $crud->render();

          $output = array_merge((array) $output, $extra);

          $this->_page_output($output);
      } catch (Exception $e) {
          show_error($e->getMessage().' --- '.$e->getTraceAsString());
      }
    }

    public function galeri_produk($produk_id){
        try {
            $this->load->library('image_CRUD');
            $image_crud = new image_CRUD();

            $image_crud->set_table('gambar_produk');

            $image_crud->set_primary_key_field('id');
            $image_crud->set_url_field('gambar');

            $image_crud->set_relation_field('produk_id');
            $image_crud->set_image_path('uploads/gambar_produk/galeri');

            $this->breadcrumbs->push('Dashboard', '/admin');
            $this->breadcrumbs->push('Produk', '/admin/produk');
            $this->breadcrumbs->push('Galeri Produk', '/admin/galeri-produk/'.$produk_id);

            $extra = array(
              'page_title' => 'Data Gambar ',
            );

            $output = $image_crud->render();

            $output = array_merge((array) $output, $extra);

            $this->_page_output($output);
        } catch (Exception $e) {
            show_error($e->getMessage().' --- '.$e->getTraceAsString());
        }
    }


    //<admin_user>
    public function member()
    {
        try {
            $this->load->library('grocery_CRUD');
            $crud = new Grocery_CRUD();

            $crud->set_table('member');
            $crud->set_subject('Data member');

            $crud->columns('nama_lengkap', 'username','jk','telp','email','transaksi');

            $crud->callback_column('transaksi',function($value, $row){
              $member = $this->db->get_where('member',array('id' => $row->id))->row_array();
              return '<a href="'. site_url('admin/transaction-history/'.$member['username']).'">Daftar Transaksi</a>';
            });


            $crud->unset_read_fields('password');

            $this->breadcrumbs->push('Dashboard', '/admin');
            $this->breadcrumbs->push('Data member', '/admin/member');

            $state = $crud->getState();
            if ($state === 'edit') {
              $this->breadcrumbs->push('Ubah', '/admin/member/edit');
            } elseif($state === 'add') {
              $this->breadcrumbs->push('Tambah', '/admin/member/add');
            }

            $crud->display_as('jk', 'Gender');

            $crud->unset_add();
            $crud->unset_edit();
            $crud->unset_delete();


            $extra = array('page_title' => 'Data Member');
            $output = $crud->render();

            $output = array_merge((array) $output, $extra);

            $this->_page_output($output);
        } catch (Exception $e) {
            show_error($e->getMessage().' --- '.$e->getTraceAsString());
        }
    }
    //</admin_user>

    public function transaction_history(){
      $username = $this->uri->segment(3);

      try {
          $this->load->library('grocery_CRUD');
          $crud = new Grocery_CRUD();

          $crud->set_table('view_penjualan');
          $crud->set_primary_key('id');
          $crud->set_subject('Data penjualan');
          $crud->where('username',$username);

          $crud->columns('tgl_pemesanan', 'status','subtotal','ongkir','detail');

          $crud->callback_column('detail',function($value, $row){
            return '<a href="'. site_url('admin/detail-transaction-history/'.$row->id).'">Lihat</a>';
          });



          $this->breadcrumbs->push('Dashboard', '/admin');
          $this->breadcrumbs->push('Data member', '/admin/member');

          $state = $crud->getState();
          if ($state === 'edit') {
            $this->breadcrumbs->push('Ubah', '/admin/member/edit');
          } elseif($state === 'add') {
            $this->breadcrumbs->push('Tambah', '/admin/member/add');
          }


          $crud->unset_add();
          $crud->unset_edit();
          $crud->unset_delete();

          $extra = array('page_title' => 'Data Penjualan');
          $output = $crud->render();

          $output = array_merge((array) $output, $extra);

          $this->_page_output($output);
      } catch (Exception $e) {
          show_error($e->getMessage().' --- '.$e->getTraceAsString());
      }
    }

    public function encrypt_password_callback($post_array, $primary_key = null)
    {
        $post_array['password'] = md5($post_array['password']);
        return $post_array;
    }

    public function user()
    {
        try {
            $this->load->library('grocery_CRUD');
            $crud = new Grocery_CRUD();

            $crud->set_table('user');
            $crud->set_subject('Data User');

            $crud->add_fields(array('level','username','password','email'));
            $crud->edit_fields(array('level','username','email'));

            $crud->required_fields('level', 'username', 'password');
            $crud->callback_before_insert(array($this, 'encrypt_password_callback'));

            $crud->columns('username', 'level');
            $crud->unique_fields(array('username','email'));

            $crud->unset_read_fields('password');

            $this->breadcrumbs->push('Dashboard', '/admin');
            $this->breadcrumbs->push('Settings', '/admin/settings');
            $this->breadcrumbs->push('Data User', '/admin/user');

            $extra = array('page_title' => 'Data User');
            $output = $crud->render();

            $output = array_merge((array) $output, $extra);

            $this->_page_output($output);
        } catch (Exception $e) {
            show_error($e->getMessage().' --- '.$e->getTraceAsString());
        }
    }

    public function stok_opname()
    {
        try {
            $this->load->library('grocery_CRUD');
            $crud = new Grocery_CRUD();

            $crud->set_table('stok_opname');
            $crud->set_subject('Data Stok Opname');
            $crud->order_by('tgl','DESC');

            $crud->required_fields('produk_id', 'stok', 'tgl');
            $crud->columns('produk_id', 'stok','tgl');

            $crud->set_relation('produk_id','produk','nama');
            $crud->display_as('produk_id','Produk');

            $this->breadcrumbs->push('Dashboard', '/admin');
            $this->breadcrumbs->push('Data Stok Opname', '/admin/stok-opname');

            $extra = array('page_title' => 'Data Stok Opname');
            $output = $crud->render();

            $output = array_merge((array) $output, $extra);

            $this->_page_output($output);
        } catch (Exception $e) {
            show_error($e->getMessage().' --- '.$e->getTraceAsString());
        }
    }

    public function settings(){

      $this->breadcrumbs->push('Dashboard', '/admin');
      $this->breadcrumbs->push('Settings', '/admin/settings');

      $data['page_name'] = 'settings';
      $this->_page_output($data);
    }

    public function slider_images()
    {
        try {
            $this->load->library('image_CRUD');
            // $this->load->model('Basecrud_m');

            $image_crud = new image_CRUD();

            $image_crud->set_table('slider_images');

            $image_crud->set_primary_key_field('id');
            $image_crud->set_url_field('file_name');

            $image_crud->set_image_path('uploads/slider');
            $image_crud->set_title_field('keterangan');

            $this->breadcrumbs->push('Dashboard', '/admin');
            $this->breadcrumbs->push('Settings', '/admin/settings');
            $this->breadcrumbs->push('Slider', '/admin/slider_images');


            $extra = array(
              'page_title' => 'Gambar slider',
            );

            $output = $image_crud->render();

            $output = array_merge((array) $output, $extra);

            $this->_page_output($output);
        } catch (Exception $e) {
            show_error($e->getMessage().' --- '.$e->getTraceAsString());
        }
    }


}
