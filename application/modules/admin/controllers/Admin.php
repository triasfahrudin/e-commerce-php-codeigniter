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
        $this->load->helper(array('url', 'libs', 'alert'));
        $this->load->library(array('form_validation', 'session', 'alert', 'breadcrumbs'));

        $this->breadcrumbs->load_config('default');
        // $this->load->model('Admin_model','admin_m');

        $level = $this->session->userdata('user_level');
        if ($level !== 'admin') {
            redirect(site_url('web'), 'reload');
        }

        $this->output->set_header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT');
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

        $data['page_name']  = 'beranda';
        $data['page_title'] = 'Beranda';
        $this->_page_output($data);
    }

    public function kategori()
    {
        try {
            $this->load->library(array('grocery_CRUD'));
            $crud = new Grocery_CRUD();

            $crud->set_table('kategori');
            $crud->set_subject('Kategori Produk');
            $crud->where('parent', '0');
            $crud->order_by('nama', 'ASC');

            $crud->field_type('slug', 'hidden');
            $this->breadcrumbs->push('Dashboard', '/admin');
            $this->breadcrumbs->push('Kategori Produk', '/admin/kategori');

            // $crud->set_relation('parent','kategori','nama');
            $crud->field_type('parent', 'hidden', 0);
            $crud->columns('nama', 'sub kategori');

            $crud->callback_column('sub kategori', function ($value, $row) {
                $count_item = $this->db->get_where('kategori', array('parent' => $row->id))->num_rows();
                return '<a href="' . site_url('admin/sub-kategori-produk/' . $row->id) . '">Kelola (' . $count_item . ' items)</a>';
            });

            $state = $crud->getState();
            if ($state === 'edit') {
                $this->breadcrumbs->push('Ubah', '/admin/kategori/edit');
            } elseif ($state === 'add') {
                $this->breadcrumbs->push('Tambah', '/admin/kategori/add');
            }

            $extra  = array('page_title' => 'Kategori Produk');
            $output = $crud->render();

            $output = array_merge((array) $output, $extra);

            $this->_page_output($output);
        } catch (Exception $e) {
            show_error($e->getMessage() . ' --- ' . $e->getTraceAsString());
        }
    }

    public function sub_kategori_produk($parent)
    {
        try {

            $kategori = $this->db->get_where('kategori', array('id' => $parent))->row_array();

            $this->load->library(array('grocery_CRUD'));
            $crud = new Grocery_CRUD();

            $crud->set_table('kategori');
            $crud->set_subject('Sub Kategori Produk');
            $crud->order_by('nama', 'ASC');
            $crud->where('parent', $parent);

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
            } elseif ($state === 'add') {
                $this->breadcrumbs->push('Tambah', '/admin/sub-kategori-produk/' . $parent . '/add');
            }

            $extra  = array('page_title' => 'Sub Kategori Produk');
            $output = $crud->render();

            $output = array_merge((array) $output, $extra);

            $this->_page_output($output);
        } catch (Exception $e) {
            show_error($e->getMessage() . ' --- ' . $e->getTraceAsString());
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

    public function update_nomor_pengiriman()
    {

        $penjualan_id     = $this->input->post('penjualan_id');
        $nomor_pengiriman = $this->input->post('nomor_pengiriman');

        $this->db->where('id', $penjualan_id);
        $this->db->update('penjualan',
            array(
                'status'           => 'dikirim',
                'tgl_dikirim'      => date("Y-m-d H:i:s"),
                'nomor_pengiriman' => $nomor_pengiriman,
            )
        );

        redirect(site_url('admin/penjualan-kemas-kirim'), 'reload');
    }

    public function update_bayar()
    {
        $param        = explode("|", base64url_decode($this->uri->segment(3)));
        $penjualan_id = $param[0];
        $status_baru  = $param[1];
        $redirect     = $param[2];

        // var_dump($param);

        $this->db->where('id', $penjualan_id);
        $this->db->update('penjualan', array('status' => $status_baru));

        switch ($status_baru) {

            case 'bayar-tidak-valid':

                //update stok produk dari pembelian yang batal
                $penjualan = $this->db->get_where('penjualan_detail', array('penjualan_id' => $penjualan_id));

                foreach ($penjualan->result_array() as $p) {
                    $this->db->set('stok', 'stok+' . $p['qty'], false);
                    $this->db->where('id', $p['produk_id']);
                    $this->db->update('produk');
                }

                break;

            case 'dikemas':

                $this->db->where('id', $penjualan_id);
                $this->db->update('penjualan', array('tgl_dikemas' => date("Y-m-d H:i:s")));

                break;

            case 'dikirim':

                $this->db->where('id', $penjualan_id);
                $this->db->update('penjualan', array('tgl_dikirim' => date("Y-m-d H:i:s")));

                break;

            default:
                # code...
                break;
        }

        switch ($redirect) {
            case '001':
                redirect(site_url('admin/penjualan-konfirmasi-bayar'), 'reload');
                break;

            case '002':
                redirect(site_url('admin/penjualan-kemas-kirim'), 'reload');
                break;

            default:
                # code...
                break;
        }

        // redirect(site_url('admin/penjualan-konfirmasi-bayar','reload'));

    }

    public function penjualan_konfirmasi_bayar()
    {
        try {
            $this->load->library(array('grocery_CRUD'));
            $crud = new Grocery_CRUD();

            $crud->set_table('penjualan');
            $crud->set_subject('Konfirmasi Bayar');
            $crud->order_by('update_akhir', 'ASC');
            $crud->where('status', 'bayar-konfirmasi');

            $state = $crud->getState();

            $crud->unset_add();
            $crud->unset_delete();
            $crud->unset_edit();

            // $crud->required_fields('tgl_konfirmasi_bayar', 'ukuran', 'harga');
            $crud->columns('tgl_konfirmasi_bayar', 'bukti_bayar', 'harga_total', 'update_status');

            $crud->callback_column('bukti_bayar', function ($value, $row) {
                return "<a target='_BLANK' href='" . site_url('uploads/bukti_bayar/' . $row->bukti_bayar) . "'>Lihat</a>";
            });

            $crud->callback_column('harga_total', function ($value, $row) {
                return format_rupiah($row->pengiriman_tarif + $row->subtotal);
            });

            $crud->callback_column('update_status', function ($value, $row) {
                $link_tidak_valid = "<a href='" . site_url('admin/update-bayar/' . base64url_encode($row->id . '|bayar-tidak-valid|001')) . "' style='color:red'>TIDAK VALID</a>";
                $link_valid       = "<a href='" . site_url('admin/update-bayar/' . base64url_encode($row->id . '|bayar-valid|001')) . "' style='color:green'>VALID</a>";
                return $link_tidak_valid . '&nbsp|&nbsp' . $link_valid;
            });

            // $crud->set_field_upload('gambar', 'uploads/kotak_kado');

            $this->breadcrumbs->push('Dashboard', '/admin');
            $this->breadcrumbs->push('Penjualan', '/admin/penjualan');
            $this->breadcrumbs->push('Konfirmasi Bayar', '/admin/penjualan-konfirmasi-bayar');

            if ($state === 'edit') {
                $this->breadcrumbs->push('Ubah', '/admin/penjualan-konfirmasi-bayar/edit');
            } elseif ($state === 'add') {
                $this->breadcrumbs->push('Tambah', '/admin/penjualan-konfirmasi-bayar/add');
            }

            $extra = array(
                'page_title' => 'Konfirmasi Bayar',
            );

            $output = $crud->render();

            $output = array_merge((array) $output, $extra);

            $this->_page_output($output);
        } catch (Exception $e) {
            show_error($e->getMessage() . ' --- ' . $e->getTraceAsString());
        }
    }


    public function penjualan_selesai()
    {
        try {
            $this->load->library(array('grocery_CRUD'));
            $crud = new Grocery_CRUD();

            $crud->set_table('penjualan');
            $crud->set_subject('Konfirmasi Bayar');
            $crud->order_by('update_akhir', 'ASC');
            $crud->where('status', 'selesai');

            $state = $crud->getState();

            $crud->unset_add();
            $crud->unset_delete();
            $crud->unset_edit();

            // $crud->required_fields('tgl_konfirmasi_bayar', 'ukuran', 'harga');
            $crud->columns('ID','tgl_dikemas', 'tgl_dikirim', 'detail_order');

            $crud->display_as(
                array(
                    'tgl_dikemas' => 'Tanggal Kemas',
                    'tgl_dikirim' => 'Tanggal Kirim',
                )
            );

            $crud->callback_column('tgl_dikirim', function ($value, $row) {
                return $row->tgl_dikirim . '<br>Resi:&nbsp;<strong>' . $row->nomor_pengiriman . '</strong>';
            });

            $crud->callback_column('ID', function ($value, $row) {
                return '#' . $row->id;
            });

            $crud->callback_column('detail_order', function ($value, $row) {

                $link = '<a href="#" data-toggle="modal" data-target="#detail_order_' . $row->id . '">Lihat Detail</a>';

                $table_order = '<div class="tab-content">
                                  <div id="produk" class="tab-pane fade in active">
                                    <table class="table">
                                        <thead>
                                           <tr>
                                              <td class="name">Nama Produk</td>
                                              <td class="quantity">Qty</td>
                                              <td class="price">Harga</td>
                                              <td class="total">Total</td>
                                           </tr>
                                        </thead>
                                        <tbody>';

                $this->db->select("b.nama,
                                   CONCAT(c.slug ,'/',b.slug) AS link_produk,
                                   a.qty,a.harga");
                $this->db->where("a.penjualan_id", $row->id);
                $this->db->join("produk b", "a.produk_id = b.id", "left");
                $this->db->join("kategori c", "b.kategori_id = c.id", "left");
                $produk = $this->db->get('penjualan_detail a');

                foreach ($produk->result_array() as $p) {
                    $table_order .= '<tr>
                                    <td class="name">
                                       <a target="_blank" href="' . site_url($p['link_produk']) . '">' . $p['nama'] . '</a>
                                    </td>
                                    <td class="quantity">' . $p['qty'] . '</td>
                                    <td class="price">' . format_rupiah($p['harga']) . '</td>
                                    <td class="total">' . format_rupiah($p['harga'] * $p['qty']) . '</td>
                                 </tr>';
                }
                $table_order .= '</tbody>';

                $penjualan = $this->db->get_where('penjualan', array('id' => $row->id))->row_array();

                $table_order .= '<tfoot>
                                       <tr>
                                          <td colspan="3" class="price"><b>Sub-Total</b></td>
                                          <td class="total">' . format_rupiah($penjualan['subtotal']) . '</td>
                                       </tr>
                                       <tr>
                                          <td colspan="3" class="price"><b>Pengiriman</b></td>
                                          <td class="total">' . strtoupper($penjualan['pengiriman_kurir']) . ' <br> ' . $penjualan['pengiriman_layanan'] . '<br>ETD ' . $penjualan['pengiriman_etd']  .   ' </td>
                                       </tr>
                                       <tr>
                                          <td colspan="3" class="price"><b>Biaya Pengiriman</b></td>
                                          <td class="total">' . format_rupiah($penjualan['pengiriman_tarif']) . '</td>
                                       </tr>
                                       <tr>
                                          <td colspan="3" class="price"><b>Total Akhir</b></td>
                                          <td class="total">' . format_rupiah($penjualan['subtotal'] + $penjualan['pengiriman_tarif']) . '</td>
                                       </tr>
                                    </tfoot>';

                $table_order .= ' </table>
                                </div>';

                $table_order .= '<div id="pengiriman" class="tab-pane fade">
                                  <table class="table">
                                    <tbody>
                                       <tr>
                                          <td>Nama :</td>
                                          <td>' . strtoupper($penjualan['nama_penerima']) . '</td>
                                       </tr>
                                       <tr>
                                          <td>Telephon :</td>
                                          <td>' . $penjualan['telp_penerima'] . '</td>
                                       </tr>
                                       <tr>
                                          <td>Provinsi :</td>
                                          <td>' . strtoupper($penjualan['provinsi_pengiriman']) . '</td>
                                       </tr>
                                        <tr>
                                          <td>Kota / Kabupaten :</td>
                                          <td>' . strtoupper($penjualan['kab_kota_pengiriman']) . '</td>
                                       </tr>
                                        <tr>
                                          <td>Kodepos :</td>
                                          <td>' . strtoupper($penjualan['kodepos_pengiriman']) . '</td>
                                       </tr>
                                        <tr>
                                          <td>Alamat :</td>
                                          <td>' . strtoupper($penjualan['alamat_pengiriman']) . '</td>
                                       </tr>

                                    </tbody>

                                 </table>';

                $modal = '<div class="modal fade detail_order" tabindex="-1" role="dialog" aria-labelledby="detail_order" aria-hidden="true" id="detail_order_' . $row->id . '">
                             <div class="modal-dialog">
                                <div class="modal-content">
                                   <div class="modal-content">
                                      <div class="modal-header">
                                         <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                         <h4 class="modal-title" id="myModalLabel">Detail Order</h4>
                                      </div>
                                      <div class="modal-body">
                                        <ul class="nav nav-tabs">
                                          <li class="active"><a data-toggle="tab" href="#produk">Produk</a></li>
                                          <li><a data-toggle="tab" href="#pengiriman">Pengiriman</a></li>
                                        </ul>
                                      ' . $table_order . '
                                      </div>
                                      <div class="modal-footer">
                                         <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                                      </div>
                                   </div>
                                </div>
                             </div>
                          </div>';
                return $link . '<br>' . $modal;
            });

            // $crud->set_field_upload('gambar', 'uploads/kotak_kado');

            $this->breadcrumbs->push('Dashboard', '/admin');
            $this->breadcrumbs->push('Penjualan', '/admin/penjualan');
            $this->breadcrumbs->push('Selesai', '/admin/penjualan-selesai');

            if ($state === 'edit') {
                $this->breadcrumbs->push('Ubah', '/admin/penjualan-selesai/edit');
            } elseif ($state === 'add') {
                $this->breadcrumbs->push('Tambah', '/admin/penjualan-selesai/add');
            }

            $extra = array(
                'page_title' => 'Selesai',
            );

            $output = $crud->render();

            $output = array_merge((array) $output, $extra);

            $this->_page_output($output);
        } catch (Exception $e) {
            show_error($e->getMessage() . ' --- ' . $e->getTraceAsString());
        }
    }

    public function penjualan_kemas_kirim()
    {
        try {
            $this->load->library(array('grocery_CRUD'));
            $crud = new Grocery_CRUD();

            $crud->set_table('penjualan');
            $crud->set_subject('Konfirmasi Bayar');
            $crud->order_by('update_akhir', 'ASC');
            $crud->where('status', 'bayar-valid');
            $crud->or_where('status', 'dikemas');
            $crud->or_where('status', 'dikirim');

            $state = $crud->getState();

            $crud->unset_add();
            $crud->unset_delete();
            $crud->unset_edit();

            // $crud->required_fields('tgl_konfirmasi_bayar', 'ukuran', 'harga');
            $crud->columns('ID','tgl_dikemas', 'tgl_dikirim', 'detail_order', 'update_status');

            $crud->display_as(
                array(
                    'tgl_dikemas' => 'Tanggal Kemas',
                    'tgl_dikirim' => 'Tanggal Kirim',
                )
            );

            $crud->callback_column('tgl_dikirim', function ($value, $row) {
                return $row->tgl_dikirim . '<br>Resi:&nbsp;<strong>' . $row->nomor_pengiriman . '</strong>';
            });

            $crud->callback_column('ID', function ($value, $row) {
                return '#' . $row->id;
            });

            $crud->callback_column('detail_order', function ($value, $row) {

                $link = '<a href="#" data-toggle="modal" data-target="#detail_order_' . $row->id . '">Lihat Detail</a>';

                $table_order = '<div class="tab-content">
                                  <div id="produk" class="tab-pane fade in active">
                                    <table class="table">
                                        <thead>
                                           <tr>
                                              <td class="name">Nama Produk</td>
                                              <td class="quantity">Qty</td>
                                              <td class="price">Harga</td>
                                              <td class="total">Total</td>
                                           </tr>
                                        </thead>
                                        <tbody>';

                $this->db->select("b.nama,
                                   CONCAT(c.slug ,'/',b.slug) AS link_produk,
                                   a.qty,a.harga");
                $this->db->where("a.penjualan_id", $row->id);
                $this->db->join("produk b", "a.produk_id = b.id", "left");
                $this->db->join("kategori c", "b.kategori_id = c.id", "left");
                $produk = $this->db->get('penjualan_detail a');

                foreach ($produk->result_array() as $p) {
                    $table_order .= '<tr>
                                    <td class="name">
                                       <a target="_blank" href="' . site_url($p['link_produk']) . '">' . $p['nama'] . '</a>
                                    </td>
                                    <td class="quantity">' . $p['qty'] . '</td>
                                    <td class="price">' . format_rupiah($p['harga']) . '</td>
                                    <td class="total">' . format_rupiah($p['harga'] * $p['qty']) . '</td>
                                 </tr>';
                }
                $table_order .= '</tbody>';

                $penjualan = $this->db->get_where('penjualan', array('id' => $row->id))->row_array();

                $table_order .= '<tfoot>
                                       <tr>
                                          <td colspan="3" class="price"><b>Sub-Total</b></td>
                                          <td class="total">' . format_rupiah($penjualan['subtotal']) . '</td>
                                       </tr>
                                       <tr>
                                          <td colspan="3" class="price"><b>Pengiriman</b></td>
                                          <td class="total">' . strtoupper($penjualan['pengiriman_kurir']) . ' <br> ' . $penjualan['pengiriman_layanan'] . '<br>ETD ' . $penjualan['pengiriman_etd']  .   ' </td>
                                       </tr>
                                       <tr>
                                          <td colspan="3" class="price"><b>Biaya Pengiriman</b></td>
                                          <td class="total">' . format_rupiah($penjualan['pengiriman_tarif']) . '</td>
                                       </tr>
                                       <tr>
                                          <td colspan="3" class="price"><b>Total Akhir</b></td>
                                          <td class="total">' . format_rupiah($penjualan['subtotal'] + $penjualan['pengiriman_tarif']) . '</td>
                                       </tr>
                                    </tfoot>';

                $table_order .= ' </table>
                                </div>';

                $table_order .= '<div id="pengiriman" class="tab-pane fade">
                                  <table class="table">
                                    <tbody>
                                       <tr>
                                          <td>Nama :</td>
                                          <td>' . strtoupper($penjualan['nama_penerima']) . '</td>
                                       </tr>
                                       <tr>
                                          <td>Telephon :</td>
                                          <td>' . $penjualan['telp_penerima'] . '</td>
                                       </tr>
                                       <tr>
                                          <td>Provinsi :</td>
                                          <td>' . strtoupper($penjualan['provinsi_pengiriman']) . '</td>
                                       </tr>
                                        <tr>
                                          <td>Kota / Kabupaten :</td>
                                          <td>' . strtoupper($penjualan['kab_kota_pengiriman']) . '</td>
                                       </tr>
                                        <tr>
                                          <td>Kodepos :</td>
                                          <td>' . strtoupper($penjualan['kodepos_pengiriman']) . '</td>
                                       </tr>
                                        <tr>
                                          <td>Alamat :</td>
                                          <td>' . strtoupper($penjualan['alamat_pengiriman']) . '</td>
                                       </tr>

                                    </tbody>

                                 </table>';

                $modal = '<div class="modal fade detail_order" tabindex="-1" role="dialog" aria-labelledby="detail_order" aria-hidden="true" id="detail_order_' . $row->id . '">
                             <div class="modal-dialog">
                                <div class="modal-content">
                                   <div class="modal-content">
                                      <div class="modal-header">
                                         <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                         <h4 class="modal-title" id="myModalLabel">Detail Order</h4>
                                      </div>
                                      <div class="modal-body">
                                        <ul class="nav nav-tabs">
                                          <li class="active"><a data-toggle="tab" href="#produk">Produk</a></li>
                                          <li><a data-toggle="tab" href="#pengiriman">Pengiriman</a></li>
                                        </ul>
                                      ' . $table_order . '
                                      </div>
                                      <div class="modal-footer">
                                         <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                                      </div>
                                   </div>
                                </div>
                             </div>
                          </div>';
                return $link . '<br>' . $modal;
            });

            $crud->callback_column('update_status', function ($value, $row) {

                $link_kemas = "<a href='" . site_url('admin/update-bayar/' . base64url_encode($row->id . '|dikemas|002')) . "' style='color:blue'>KEMAS</a>";
                $link_kirim = '<a href="#" data-toggle="modal" data-target="#kirim_' . $row->id . '" style="color:green">KIRIM</a>';

                $modal = '<div class="modal fade kirim" tabindex="-1" role="dialog" aria-labelledby="kirim" aria-hidden="true" id="kirim_' . $row->id . '">
                             <div class="modal-dialog">
                                <div class="modal-content">
                                   <div class="modal-content">
                                      <div class="modal-header">
                                         <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                         <h4 class="modal-title" id="myModalLabel">Detail Pengiriman</h4>
                                      </div>
                                      <div class="modal-body">
                                        <form method="POST" action="' . site_url('admin/update-nomor-pengiriman') . '">
                                          <input type="hidden" value="' . $row->id . '" name="penjualan_id">
                                          <div class="form-group">
                                            <label for="email">Nomor Pengiriman (RESI)</label>
                                            <input type="text" class="form-control" name="nomor_pengiriman" id="nomor_pengiriman" required>
                                          </div>
                                          <button type="submit" class="btn btn-success">Submit</button>
                                        </form>
                                      </div>
                                      <div class="modal-footer">

                                      </div>
                                   </div>
                                </div>
                             </div>
                          </div>';

                if ($row->status === 'bayar-valid') {
                    return $link_kemas;
                } elseif ($row->status === 'dikemas') {
                    return '<label style="color:blue">SUDAH DIKEMAS</label>|&nbsp' . $link_kirim . '<br>' . $modal;
                } else {
                    return '<label style="color:green">SUDAH DIKIRIM</label>';
                }

            });

            // $crud->set_field_upload('gambar', 'uploads/kotak_kado');

            $this->breadcrumbs->push('Dashboard', '/admin');
            $this->breadcrumbs->push('Penjualan', '/admin/penjualan');
            $this->breadcrumbs->push('Pengemasan & Pengiriman', '/admin/penjualan-kemas-kirim');

            if ($state === 'edit') {
                $this->breadcrumbs->push('Ubah', '/admin/penjualan-kemas-kirim/edit');
            } elseif ($state === 'add') {
                $this->breadcrumbs->push('Tambah', '/admin/penjualan-kemas-kirim/add');
            }

            $extra = array(
                'page_title' => 'Pengemasan & Pengiriman',
            );

            $output = $crud->render();

            $output = array_merge((array) $output, $extra);

            $this->_page_output($output);
        } catch (Exception $e) {
            show_error($e->getMessage() . ' --- ' . $e->getTraceAsString());
        }
    }

    public function penjualan()
    {
        $this->breadcrumbs->push('Dashboard', '/admin');
        $this->breadcrumbs->push('Penjualan', '/admin/penjualan');

        $data['page_name'] = 'penjualan';
        $this->_page_output($data);
    }

    public function kotak_kado()
    {
        try {
            $this->load->library(array('grocery_CRUD'));
            $crud = new Grocery_CRUD();

            $crud->set_table('kotak_kado');
            $crud->set_subject('Kotak Kado');
            $crud->order_by('nama', 'ASC');

            $state = $crud->getState();

            $crud->required_fields('nama',  'harga');
            $crud->columns('nama', 'ukuran', 'harga','berat_isi_maks');

            $crud->set_field_upload('gambar', 'uploads/kotak_kado');

            $crud->callback_column('harga', function ($value, $row) {
                return format_rupiah($row->harga);
            });

            $crud->callback_column('berat_isi_maks', function ($value, $row) {
                return $row->berat_isi_maks . ' gram';
            });

            $this->breadcrumbs->push('Dashboard', '/admin');
            $this->breadcrumbs->push('Kotak kado', '/admin/kotak_kado');

            if ($state === 'edit') {
                $this->breadcrumbs->push('Ubah', '/admin/kotak-kado/edit');
            } elseif ($state === 'add') {
                $this->breadcrumbs->push('Tambah', '/admin/kotak-kado/add');
            }

            $extra = array(
                'page_title' => 'Kotak Kado',
            );

            $output = $crud->render();

            $output = array_merge((array) $output, $extra);

            $this->_page_output($output);
        } catch (Exception $e) {
            show_error($e->getMessage() . ' --- ' . $e->getTraceAsString());
        }

    }

    public function produk()
    {
        try {
            $this->load->library(array('grocery_CRUD'));
            $crud = new Grocery_CRUD();

            $crud->set_table('produk');
            $crud->set_subject('Produk');
            $crud->order_by('nama', 'ASC');

            $state = $crud->getState();

            $crud->required_fields('kategori_id', 'nama', 'merk', 'harga', 'rincian','berat');
            $crud->columns('nama', 'kategori_id', 'harga','berat', 'galeri');
            // $crud->set_relation('kategori_id', 'kategori', 'nama');

            $crud->callback_column('berat', function ($value, $row) {
                return $row->berat . ' gram';
            });

            $kategori = array();
            $this->db->where('parent <>', 0);
            $kat = $this->db->get('kategori');
            foreach ($kat->result_array() as $k) {
                $kategori[$k['id']] = $k['nama'];
            }

            $crud->field_type('kategori_id', 'dropdown', $kategori);
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

            $crud->callback_column('harga', function ($value, $row) {
                return format_rupiah($row->harga);
            });
            // $crud->callback_column('sold', array($this, '_sold'));

            $crud->callback_column('galeri', function ($value, $row) {
                return '<a href="' . site_url('admin/galeri-produk/' . $row->id) . '">Kelola</a>';
            });

            $crud->callback_after_insert(function ($post_array, $primary_key) {

                $this->db->insert('stok_opname',
                    array(
                        'produk_id' => $primary_key,
                        'stok'      => $post_array['stok'],
                        'tgl'       => date('Y-m-d'),
                    )
                );

            });

            $crud->field_type('slug', 'readonly');
            $crud->field_type('tgl_buat', 'hidden');
            $crud->field_type('slug', 'hidden');
            $crud->field_type('merk_slug', 'hidden');

            $this->breadcrumbs->push('Dashboard', '/admin');
            $this->breadcrumbs->push('Produk', '/admin/produk');

            if ($state === 'edit') {
                $this->breadcrumbs->push('Ubah', '/admin/produk/edit');
                $crud->field_type('stok','readonly');
            } elseif ($state === 'add') {
                $this->breadcrumbs->push('Tambah', '/admin/produk/add');
            }

            $extra = array(
                'page_title' => 'Produk',
            );

            $output = $crud->render();

            $output = array_merge((array) $output, $extra);

            $this->_page_output($output);
        } catch (Exception $e) {
            show_error($e->getMessage() . ' --- ' . $e->getTraceAsString());
        }
    }

    public function galeri_produk($produk_id)
    {
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
            $this->breadcrumbs->push('Galeri Produk', '/admin/galeri-produk/' . $produk_id);

            $extra = array(
                'page_title' => 'Data Gambar ',
            );

            $output = $image_crud->render();

            $output = array_merge((array) $output, $extra);

            $this->_page_output($output);
        } catch (Exception $e) {
            show_error($e->getMessage() . ' --- ' . $e->getTraceAsString());
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

            $crud->columns('nama_lengkap', 'username', 'jk', 'telp', 'email', 'transaksi');

            $crud->callback_column('transaksi', function ($value, $row) {
                $member = $this->db->get_where('member', array('id' => $row->id))->row_array();
                return '<a href="' . site_url('admin/transaction-history/' . $member['id']) . '">Daftar Transaksi</a>';
            });

            $crud->unset_read_fields('password');

            $this->breadcrumbs->push('Dashboard', '/admin');
            $this->breadcrumbs->push('Data member', '/admin/member');

            $state = $crud->getState();
            if ($state === 'edit') {
                $this->breadcrumbs->push('Ubah', '/admin/member/edit');
            } elseif ($state === 'add') {
                $this->breadcrumbs->push('Tambah', '/admin/member/add');
            }

            $crud->display_as('jk', 'Gender');

            $crud->unset_add();
            $crud->unset_edit();
            $crud->unset_delete();

            $extra  = array('page_title' => 'Data Member');
            $output = $crud->render();

            $output = array_merge((array) $output, $extra);

            $this->_page_output($output);
        } catch (Exception $e) {
            show_error($e->getMessage() . ' --- ' . $e->getTraceAsString());
        }
    }
    //</admin_user>

    public function transaction_history()
    {
        $id = $this->uri->segment(3);

        try {
            $this->load->library('grocery_CRUD');
            $crud = new Grocery_CRUD();

            $crud->set_table('view_penjualan');
            $crud->set_primary_key('id');
            $crud->set_subject('Data penjualan');
            $crud->where('member_id', $id);

            $crud->columns('tgl_pemesanan', 'status', 'subtotal', 'ongkir', 'detail');

            $crud->callback_column('detail', function ($value, $row) {
                return '<a href="' . site_url('admin/detail-transaction-history/' . $row->id) . '">Lihat</a>';
            });

            $this->breadcrumbs->push('Dashboard', '/admin');
            $this->breadcrumbs->push('Data member', '/admin/member');

            $state = $crud->getState();
            if ($state === 'edit') {
                $this->breadcrumbs->push('Ubah', '/admin/member/edit');
            } elseif ($state === 'add') {
                $this->breadcrumbs->push('Tambah', '/admin/member/add');
            }

            $crud->unset_add();
            $crud->unset_edit();
            $crud->unset_delete();

            $extra  = array('page_title' => 'Data Penjualan');
            $output = $crud->render();

            $output = array_merge((array) $output, $extra);

            $this->_page_output($output);
        } catch (Exception $e) {
            show_error($e->getMessage() . ' --- ' . $e->getTraceAsString());
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

            $crud->add_fields(array('level', 'username', 'password', 'email'));
            $crud->edit_fields(array('level', 'username', 'email'));

            $crud->required_fields('level', 'username', 'password');
            $crud->callback_before_insert(array($this, 'encrypt_password_callback'));

            $crud->columns('username', 'level');
            $crud->unique_fields(array('username', 'email'));

            $crud->unset_read_fields('password');

            $this->breadcrumbs->push('Dashboard', '/admin');
            $this->breadcrumbs->push('Settings', '/admin/settings');
            $this->breadcrumbs->push('Data User', '/admin/user');

            $extra  = array('page_title' => 'Data User');
            $output = $crud->render();

            $output = array_merge((array) $output, $extra);

            $this->_page_output($output);
        } catch (Exception $e) {
            show_error($e->getMessage() . ' --- ' . $e->getTraceAsString());
        }
    }

    public function stok_opname()
    {
        try {
            $this->load->library('grocery_CRUD');
            $crud = new Grocery_CRUD();

            $crud->set_table('stok_opname');
            $crud->set_subject('Data Stok Opname');
            $crud->order_by('tgl', 'DESC');

            $crud->required_fields('produk_id', 'stok', 'tgl');
            $crud->columns('produk_id', 'stok', 'tgl');

            $crud->set_relation('produk_id', 'produk', 'nama');
            $crud->display_as('produk_id', 'Produk');

            $this->breadcrumbs->push('Dashboard', '/admin');
            $this->breadcrumbs->push('Data Stok Opname', '/admin/stok-opname');

            $extra  = array('page_title' => 'Data Stok Opname');
            $output = $crud->render();

            $output = array_merge((array) $output, $extra);

            $this->_page_output($output);
        } catch (Exception $e) {
            show_error($e->getMessage() . ' --- ' . $e->getTraceAsString());
        }
    }

    public function settings()
    {

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
            show_error($e->getMessage() . ' --- ' . $e->getTraceAsString());
        }
    }

    public function blog_kategori()
    {
        try {
            $crud = new Grocery_CRUD();

            $crud->set_table('blog_kategori');
            $crud->set_subject('Blog Kategori');
            //judul,penulis,tanggal,kategori,komentar
            $crud->columns('nama', 'deskripsi');
            $crud->display_as('nama', 'Nama Kategori');
            $crud->display_as('deskripsi', 'Deskripsi');

            $this->breadcrumbs->push('Dashboard', '/admin');
            $this->breadcrumbs->push('Settings', '/admin/settings');
            $this->breadcrumbs->push('Data Blog', '/admin/blog');
            $this->breadcrumbs->push('Kategori Blog', '/admin/blog-kategori');

            $extra = array(
                // 'breadcrumbs' => $this->breadcrumbs->show(),
                'page_title' => 'Kategori',
            );

            $output = $crud->render();
            $output = array_merge((array) $output, $extra);
            $this->_page_output($output);

        } catch (Exception $e) {
            show_error($e->getMessage() . ' --- ' . $e->getTraceAsString());
        }
    }

    public function blog()
    {
        try {
            $this->load->library(array('grocery_CRUD', 'Grocery_Btn'));
            $crud = new Grocery_CRUD();

            $crud->set_table('blog');
            $crud->set_subject('Data Blog');

            // $crud->add_fields(array('level','username','password','email'));
            // $crud->edit_fields(array('level','username','email'));

            $crud->required_fields('judul', 'konten');
            $crud->set_field_upload('gambar', 'uploads/blogs');

            $crud->columns('judul', 'konten');
            // $crud->unique_fields(array('username','email'));

            // $crud->unset_read_fields('password');
            $crud->field_type('dibuat', 'hidden');
            $crud->field_type('diupdate', 'hidden');
            $crud->field_type('slug', 'hidden');

            $this->breadcrumbs->push('Dashboard', '/admin');
            $this->breadcrumbs->push('Settings', '/admin/settings');
            $this->breadcrumbs->push('Data Blog', '/admin/blog');

            $this->grocery_btn->push(site_url('admin/blog-kategori'), 'Kategori');

            $kategori = array();
            $kat      = $this->db->get('blog_kategori');
            foreach ($kat->result_array() as $k) {
                $kategori[$k['id']] = $k['nama'];
            }

            $crud->field_type('kategori', 'multiselect', $kategori);

            $extra = array(
                'page_title'  => 'Data Blog',
                'grocery_btn' => $this->grocery_btn->show(),
            );
            $output = $crud->render();

            $output = array_merge((array) $output, $extra);

            $this->_page_output($output);
        } catch (Exception $e) {
            show_error($e->getMessage() . ' --- ' . $e->getTraceAsString());
        }
    }

    public function web_konfigurasi($act = null, $param = null)
    {
        // $this->load->model(array('Basecrud_m'));
        $this->breadcrumbs->push('Dashboard', '/admin');
        $this->breadcrumbs->push('Settings', '/admin/settings');
        $this->breadcrumbs->push('Konfigurasi', '/web-konfigurasi');

        $data['breadcrumbs'] = $this->breadcrumbs->show();

        if ($act === 'upload') {
            if (!empty($_FILES['img']['name'])) {
                // $this->load->library(array('cloudinarylib'));
                // try{
                //   $imageupload = \Cloudinary\Uploader::upload($_FILES["img"]["tmp_name"]);
                //   $image_url = $imageupload['secure_url'];
                //
                //   $this->db->where('id', $blog_id);
                //   $this->db->update('blogs', array('image' => $image_url));
                //
                //   redirect('manage/blogs');
                //
                // }catch(Exception $e){
                //   $data['msg'] = 'ERROR : bukan file image !';
                // }

                $upload                  = array();
                $upload['upload_path']   = './uploads';
                $upload['allowed_types'] = 'jpeg|jpg|png';
                $upload['encrypt_name']  = true;

                $this->load->library('upload', $upload);

                if (!$this->upload->do_upload('img')) {
                    $data['msg'] = $this->upload->display_errors();
                } else {
                    $success  = $this->upload->data();
                    $value    = $success['file_name'];
                    $file_ext = $success['file_ext'];

                    $this->db->where('title', $param);
                    $this->db->update('settings', array('value' => $value, 'tipe' => 'image'));

                    redirect('admin/web-konfigurasi');
                }
            }
        } elseif ($act === 'edt') {
            $value = $this->input->post('value');

            $this->db->where('title', $param);
            $this->db->update('settings', array('value' => $value));

            exit(0);
        }

        $data['setting']    = $this->db->get('settings');
        $data['page_name']  = 'konfigurasi';
        $data['page_title'] = 'Data konfigurasi';

        $this->_page_output($data);
    }

}
