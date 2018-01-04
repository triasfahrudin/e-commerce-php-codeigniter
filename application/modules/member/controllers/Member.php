<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Member extends MX_Controller
{
    private $user_id;
    private $user_email;
    private $user_namalengkap;

    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');

        $this->load->database();
        $this->load->library(array('cart', 'form_validation', 'alert', 'recaptcha', 'session', 'form_validation'));
        $this->load->helper(array('url', 'libs', 'form'));

        // $this->breadcrumbs->load_config('default');
        // $this->load->model('Admin_model','admin_m');

        $this->user_id = $this->session->userdata('user_id');

        if (!isset($this->user_id)) {
            redirect(site_url('web/login'), 'reload');
        }

        $level = $this->session->userdata('user_level');
        if ($level !== 'member') {
            redirect(site_url('web'), 'reload');
        }

        $this->user_email       = $this->session->userdata('user_email');
        $this->user_namalengkap = $this->session->userdata('user_namalengkap');

        $this->output->set_header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT');
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, no-transform, max-age=0, post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');
        $this->output->set_header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
    }

    public function _page_output($data = null)
    {
        // echo $this->session->userdata('user_id') .'lol';
        $data['logged_in'] = $this->session->userdata('user_id');
        // $data['logged_in'] = $this->session->userdata('user_id');
        // $data['produk_terbaru'] = $this->latest_product(4);
        // $data['produk_pilihan'] = $this->produk_pilihan(4);
        // $data['produk_diskon']  = $this->produk_diskon(4);
        $data['menus'] = $this->db->get_where('kategori', array('parent' => 0));

        $this->load->view('master.php', $data);
    }

    public function index()
    {
        $data = array(
            'page' => 'beranda',
        );

        $this->_page_output($data);
    }

    public function ubah_informasi_akun()
    {

        $data = array(
            'page'      => 'info_akun',
            'info_akun' => $this->db->get_where('member', array('id' => $this->user_id))->row_array(),
        );

        if (!empty($_POST)) {

            $this->form_validation->set_rules('nama_lengkap', 'Nama lengkap', 'trim|required');
            $this->form_validation->set_rules('jk', 'jk', 'trim|required');
            $this->form_validation->set_rules('telp', 'Telp', 'trim|required');

            if ($this->form_validation->run() == true) {
                $nama_lengkap = $this->input->post('nama_lengkap');
                $jk           = $this->input->post('jk');
                $telp         = $this->input->post('telp');

                $data['pesan'] = 'Data berhasil disimpan';
                $this->db->where('id', $this->user_id);
                $this->db->update('member', array('nama_lengkap' => $nama_lengkap, 'jk' => $jk, 'telp' => $telp));
            }

        }

        $this->_page_output($data);
    }

    public function ubah_password()
    {
        $data = array(
            'page' => 'ubah_password',
        );

        if (!empty($_POST)) {

            $this->form_validation->set_rules('password_lama', 'Password Lama', 'trim|required');
            $this->form_validation->set_rules('password_baru', 'Password Baru', 'trim|required');
            $this->form_validation->set_rules('ulangi_password_baru', 'Ulangi Password Baru', 'trim|required');

            if ($this->form_validation->run() == true) {
                $password_lama        = $this->input->post('password_lama');
                $password_baru        = $this->input->post('password_baru');
                $ulangi_password_baru = $this->input->post('ulangi_password_baru');

                $cek = $this->db->get_where('member', array('id' => $this->user_id, 'password' => md5($password_lama)));

                if ($password_baru !== $ulangi_password_baru) {
                    $data['pesan'] = 'Password baru tidak sama dengan password ulang';
                } elseif ($cek->num_rows() == 0) {
                    $data['pesan'] = 'Password lama salah!';
                } else {
                    $data['pesan'] = 'Password berhasil diubah';

                    $this->db->where('id', $this->user_id);
                    $this->db->update('member', array('password' => md5($password_baru)));
                }

            }

        }

        $this->_page_output($data);
    }

    public function buku_alamat_pengiriman()
    {
        $data = array(
            'buku_alamat' => $this->db->get_where('member_alamat', array('member_id' => $this->user_id)),
            'page'        => 'buku_alamat_pengiriman',
        );

        $this->_page_output($data);
    }

    public function ubah_alamat_pengiriman()
    {

        $alamat_id = $this->uri->segment(3);

        $data = array(
            'page' => 'form_alamat_pengiriman',
            'det'  => $this->db->get_where('member_alamat', array('id' => $alamat_id))->row_array(),
        );

        if (!empty($_POST)) {
            $nama_lengkap = $this->input->post('nama_lengkap');
            $telp         = $this->input->post('telp');
            $provinsi     = $this->input->post('provinsi');
            $kota_kab     = $this->input->post('kota_kab');
            $kodepos      = $this->input->post('kodepos');
            $alamat       = $this->input->post('alamat');
            $default      = $this->input->post('default');

            $this->db->where('id', $alamat_id);

            $this->db->update('member_alamat',
                array(
                    'nama_lengkap' => $nama_lengkap,
                    'telp'         => $telp,
                    'provinsi'     => $provinsi,
                    'kota_kab'     => $kota_kab,
                    'kodepos'      => $kodepos,
                    'alamat'       => $alamat,
                    'default'      => $default,
                )
            );

            redirect(site_url('member/buku-alamat-pengiriman'), 'reload');

        }

        $this->_page_output($data);
    }

    public function tambah_alamat_pengiriman()
    {
        $data = array(
            'page' => 'form_alamat_pengiriman',
        );

        if (!empty($_POST)) {
            $nama_lengkap = $this->input->post('nama_lengkap');
            $telp         = $this->input->post('telp');
            $provinsi     = $this->input->post('provinsi');
            $kota_kab     = $this->input->post('kota_kab');
            $kodepos      = $this->input->post('kodepos');
            $alamat       = $this->input->post('alamat');
            $default      = $this->input->post('default');

            $member_id = $this->user_id;

            $this->db->insert('member_alamat',
                array(
                    'nama_lengkap' => $nama_lengkap,
                    'telp'         => $telp,
                    'provinsi'     => $provinsi,
                    'kota_kab'     => $kota_kab,
                    'kodepos'      => $kodepos,
                    'alamat'       => $alamat,
                    'default'      => $default,
                    'member_id'    => $member_id,
                )
            );

            redirect(site_url('member/buku-alamat-pengiriman'), 'reload');

        }

        $this->_page_output($data);
    }

    public function getCity($province)
    {

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL            => "http://api.rajaongkir.com/starter/city?province=$province",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING       => "",
            CURLOPT_MAXREDIRS      => 10,
            CURLOPT_TIMEOUT        => 300,
            CURLOPT_HTTP_VERSION   => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST  => "GET",
            CURLOPT_HTTPHEADER     => array(
                "key: 2b79c65f11f4efacdcfe9079add7fc73",
            ),
        ));

        $response = curl_exec($curl);
        $err      = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            //echo $response;
            $data = json_decode($response, true);
            //echo json_encode($k['rajaongkir']['results']);
            echo "<option>Pilih Kabupaten/kota</option>";
            for ($j = 0; $j < count($data['rajaongkir']['results']); $j++) {

                echo "<option value='" . $data['rajaongkir']['results'][$j]['city_id'] . "'>" . $data['rajaongkir']['results'][$j]['city_name'] . "</option>";

            }
        }
    }

    public function getCost()
    {
        $origin      = $this->input->get('origin');
        $destination = $this->input->get('destination');
        $berat       = $this->input->get('berat');
        $courier     = $this->input->get('courier');

        $data = array('origin' => $origin,
            'destination'          => $destination,
            'berat'                => $berat,
            'courier'              => $courier,

        );

        $this->load->view('rajaongkir/getCost', $data);
    }

    public function riwayat_pembelian()
    {

        $this->db->order_by('tgl_pemesanan DESC');
        $transaksi = $this->db->get_where('penjualan', array('member_id' => $this->user_id));
        $data      = array(
            'transaksi' => $transaksi,
            'page'      => 'riwayat_pembelian',
        );

        $this->_page_output($data);
    }

    public function upload_bukti()
    {

        $transaksi_id = $this->uri->segment(3);

        if (!empty($_FILES['buktibayar']['name'])) {
            $upload                  = array();
            $upload['upload_path']   = './uploads/bukti_bayar';
            $upload['allowed_types'] = 'jpeg|jpg|png|rar|zip';
            $upload['encrypt_name']  = true;

            $this->load->library('upload', $upload);

            if (!$this->upload->do_upload('buktibayar')) {
                $data['msg'] = $this->upload->display_errors();
            } else {
                $success  = $this->upload->data();
                $filename = $success['file_name'];
                // $file_ext = $success['file_ext'];

                $this->db->where('id', $transaksi_id);
                $this->db->update('penjualan',
                    array(
                        'bukti_bayar'          => $filename,
                        'status'               => 'bayar-konfirmasi',
                        'tgl_konfirmasi_bayar' => date("Y-m-d H:i:s"),
                    )
                );

                redirect('member/riwayat-pembelian', 'reload');
            }
        }
    }

    public function getProvinsiName($province_id)
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL            => "https://api.rajaongkir.com/starter/province?id=$province_id",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING       => "",
            CURLOPT_MAXREDIRS      => 10,
            CURLOPT_TIMEOUT        => 300,
            CURLOPT_HTTP_VERSION   => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST  => "GET",
            CURLOPT_SSL_VERIFYHOST => 0,
            CURLOPT_SSL_VERIFYPEER => 0,
            CURLOPT_HTTPHEADER     => array(
                "content-type: application/x-www-form-urlencoded",
                "key: 2b79c65f11f4efacdcfe9079add7fc73",
            ),
        ));

        $response = curl_exec($curl);
        $err      = curl_error($curl);

        curl_close($curl);

        if ($err) {
            return "cURL Error #:" . $err;
        } else {
            // echo $response;
            $data = json_decode($response, true);
            return $data['rajaongkir']['results']['province'];
        }
    }

    public function getCityName($id, $province)
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL            => "https://api.rajaongkir.com/starter/city?id=$id&province=$province",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING       => "",
            CURLOPT_MAXREDIRS      => 10,
            CURLOPT_TIMEOUT        => 300,
            CURLOPT_HTTP_VERSION   => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST  => "GET",
            CURLOPT_SSL_VERIFYHOST => 0,
            CURLOPT_SSL_VERIFYPEER => 0,
            CURLOPT_HTTPHEADER     => array(
                "content-type: application/x-www-form-urlencoded",
                "key: 2b79c65f11f4efacdcfe9079add7fc73",
            ),
        ));

        $response = curl_exec($curl);
        $err      = curl_error($curl);

        curl_close($curl);

        if ($err) {
            return "cURL Error #:" . $err;
        } else {
            // echo $response;
            $data = json_decode($response, true);
            return $data['rajaongkir']['results']['city_name'];
        }
    }

    public function kirim_email_konfirmasi()
    {
        $ongkir = $this->session->userdata('konfirmasi_pengiriman')['tarif'];

        $message = 'Terimakasih telah melakukan pembelian di&nbsp;&nbsp;' . site_url() . '<br>';
        $message .= 'Berikut ini adalah detail pembelian anda&nbsp;&nbsp;:&nbsp;&nbsp;<br>';
        $message .= '<table>';
        $message .= '  <thead>';
        $message .= '    <tr>';
        $message .= '      <td>Nama produk</td>';
        $message .= '      <td>Qty</td>';
        $message .= '      <td>Harga</td>';
        $message .= '      <td>Subtotal</td>';
        $message .= '    </tr>';
        $message .= '  </thead>';
        $message .= '  <tbody>';

        foreach ($this->cart->contents() as $items) {
            $message .= '   <tr>';
            $message .= '     <td>' . $items['name'] . '</td>';
            $message .= '     <td>' . $items['qty'] . '</td>';
            $message .= '     <td>' . format_rupiah($items['price']) . '</td>';
            $message .= '     <td>' . $items['subtotal'] . '</td>';
            $message .= '   </tr>';
        }

        $message .= '  </tbody>';
        $message .= '</table>';
        $message .= '<h3>Total Pembelian: ' . format_rupiah($this->cart->total()) . '</h3>';
        $message .= '<h3>Biaya Pengiriman: ' . format_rupiah($ongkir) . '</h3>';
        $message .= '<h3>Total yang harus dibayar: ' . format_rupiah($ongkir + $this->cart->total()) . '</h3>';
        $message .= 'Silahkan melakukan pembayaran ke BCA nomor : 123456789 an: Emilia Kontesa <br>';
        $message .= 'Harap melakukan pembayaran sebelum 1x24 Jam setelah melakukan pembelian<br>';
        $message .= 'Kirimkan bukti pembayaran ke <a href="' . site_url('member/riwayat-pembelian') . '">Menu Riwayat Pembelian</a><br>';
        $message .= 'tracking-code:&nbsp;' . generate_uuid();

        send_email($this->session->userdata('user_email'), 'Rekap Pembelian ' . site_url(), $message);
    }

    public function konfirmasi_pemesanan()
    {

        $langkah = $this->uri->segment(3, 'alamat');

        switch ($langkah) {
            case 'alamat':

                if (!empty($_POST)) {
                    /*
                    nama_lengkap:trias fahrudin
                    telp:0815217088807
                    provinsi:11
                    kota_kab:42
                    kodepos:85421
                    alamat:jajangsurat
                    agree:1
                     */

                    $data = array(
                        'nama_lengkap' => $this->input->post('nama_lengkap'),
                        'telp'         => $this->input->post('telp'),
                        'provinsi'     => $this->input->post('provinsi'),
                        'kota_kab'     => $this->input->post('kota_kab'),
                        'kodepos'      => $this->input->post('kodepos'),
                        'alamat'       => $this->input->post('alamat'),
                    );

                    $this->session->set_userdata('konfirmasi_alamat', $data);

                    redirect(site_url('member/konfirmasi-pemesanan/pengiriman'), 'reload');
                }

                $data = array(
                    'page'             => 'konfirmasi_pemesanan/alamat',
                    'alamat_tersimpan' => $this->db->get_where('member_alamat', array('member_id' => $this->user_id)),
                );

                $this->_page_output($data);
                break;

            case 'pengiriman':

                $btotal = 0;
                foreach ($this->cart->contents() as $items):
                    $btotal += ($items['berat'] * $items['qty']);
                endforeach;

                $data = array(
                    'page'   => 'konfirmasi_pemesanan/pengiriman',
                    'btotal' => $btotal,
                );

                if (!empty($_POST)) {
                    /*
                    kurir
                    tarif
                    etd
                     */

                    $data = array(
                        'kurir'   => $this->input->post('kurir'),
                        'layanan' => $this->input->post('layanan'),
                        'tarif'   => $this->input->post('tarif'),
                        'etd'     => $this->input->post('etd'),
                    );

                    $this->session->set_userdata('konfirmasi_pengiriman', $data);

                    redirect(site_url('member/konfirmasi-pemesanan/catatan-pembelian'), 'reload');
                }

                $this->_page_output($data);
                break;

            case 'catatan-pembelian':

                $data = array(
                    'page' => 'konfirmasi_pemesanan/catatan',
                );

                if (!empty($_POST)) {
                    /*
                    kurir
                    tarif
                    etd
                     */

                    $data = array(
                        'catatan' => $this->input->post('catatan'),
                    );

                    $this->session->set_userdata('konfirmasi_catatan', $data);

                    redirect(site_url('member/konfirmasi-pemesanan/rekap-pembelian'), 'reload');
                }

                $this->_page_output($data);
                break;

            case 'rekap-pembelian':

                // exit(0);

                $btotal = 0;
                foreach ($this->cart->contents() as $items):
                    $btotal += ($items['berat'] * $items['qty']);
                endforeach;

                $curl = curl_init();

                $origin      = 42;
                $destination = $this->session->userdata('konfirmasi_alamat')['kota_kab'];
                $weight      = $btotal;
                $courier     = $this->session->userdata('konfirmasi_pengiriman')['kurir'];

                $layanan = $this->session->userdata('konfirmasi_pengiriman')['layanan'];

                curl_setopt_array($curl, array(
                    CURLOPT_URL            => "http://api.rajaongkir.com/starter/cost",
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_ENCODING       => "",
                    CURLOPT_MAXREDIRS      => 10,
                    CURLOPT_TIMEOUT        => 300,
                    CURLOPT_HTTP_VERSION   => CURL_HTTP_VERSION_1_1,
                    CURLOPT_CUSTOMREQUEST  => "POST",
                    CURLOPT_POSTFIELDS     => "origin=$origin&destination=$destination&weight=$weight&courier=$courier",
                    CURLOPT_HTTPHEADER     => array(
                        "content-type: application/x-www-form-urlencoded",
                        "key: 2b79c65f11f4efacdcfe9079add7fc73",
                    ),
                ));

                $response = curl_exec($curl);
                $err      = curl_error($curl);

                curl_close($curl);

                if ($err) {
                    echo "cURL Error #:" . $err;
                } else {
                    $data = json_decode($response, true);

                    for ($k = 0; $k < count($data['rajaongkir']['results']); $k++) {
                        for ($l = 0; $l < count($data['rajaongkir']['results'][$k]['costs']); $l++) {
                            $etd     = $data['rajaongkir']['results'][$k]['costs'][$l]['cost'][0]['etd'];
                            $tarif   = $data['rajaongkir']['results'][$k]['costs'][$l]['cost'][0]['value'];
                            $service = $data['rajaongkir']['results'][$k]['costs'][$l]['service'];

                            if ($layanan === $service) {
                                $this->session->unset_userdata('konfirmasi_pengiriman');

                                $session_data = array(
                                    'kurir'   => $courier,
                                    'layanan' => $service,
                                    'tarif'   => $tarif,
                                    'etd'     => $etd,
                                );

                                $this->session->set_userdata('konfirmasi_pengiriman', $session_data);
                            }

                        }
                    }
                }

                $data = array(
                    'page'            => 'konfirmasi_pemesanan/rekap',
                    'ongkir'          => $this->session->userdata('konfirmasi_pengiriman')['tarif'],
                    'provinsi_tujuan' => $this->getProvinsiName($this->session->userdata('konfirmasi_alamat')['provinsi']),
                    'kota_kab_tujuan' => $this->getCityName($this->session->userdata('konfirmasi_alamat')['kota_kab'], $this->session->userdata('konfirmasi_alamat')['provinsi']),
                );

                if (!empty($_POST)) {
                    //masukkan cart ke database
                    //kirim email
                    //hapus session konfirmasi_alamat, konfirmasi_pengiriman, konfirmasi_catatan
                    //hapus cart
                    //redirect ke member/terimakasih_atas_pembeliannya

                    /*
                    $data = array(
                    'id'          => 'sku_' . $id,
                    'qty'         => $qty,
                    'price'       => $price,
                    'name'        => $name,
                    'gambar'      => $this->produk_detail($id, 'gambar'),
                    'link_produk' => site_url($this->produk_detail($id, 'kategori_slug') . '/' . $this->produk_detail($id, 'slug')),
                    'berat'       => $berat,
                    );
                     */

                    /*
                    $data = array(
                    'nama_lengkap' => $this->input->post('nama_lengkap'),
                    'telp'         => $this->input->post('telp'),
                    'provinsi'     => $this->input->post('provinsi'),
                    'kota_kab'     => $this->input->post('kota_kab'),
                    'kodepos'      => $this->input->post('kodepos'),
                    'alamat'       => $this->input->post('alamat'),
                    );

                    $this->session->set_userdata('konfirmasi_alamat', $data);
                     */

                    /*
                    $this->session->set_userdata('konfirmasi_catatan', $data);
                     */

                    // exit(0);

                    $ka                = $this->session->userdata('konfirmasi_alamat');
                    $kp                = $this->session->userdata('konfirmasi_pengiriman');
                    $catatan_pembelian = $this->session->userdata('konfirmasi_catatan')['catatan'];

                    $data_penjualan = array(
                        'member_id'           => $this->user_id,
                        'nama_penerima'       => $ka['nama_lengkap'],
                        'provinsi_pengiriman' => $this->getProvinsiName($ka['provinsi']),
                        'kab_kota_pengiriman' => $this->getCityName($ka['kota_kab'], $ka['provinsi']),
                        'alamat_pengiriman'   => $ka['alamat'],
                        'kodepos_pengiriman'  => $ka['kodepos'],
                        'telp_penerima'       => $ka['telp'],
                        'catatan'             => $catatan_pembelian,
                        'subtotal'            => $this->cart->total(),
                        'pengiriman_kurir'    => $kp['kurir'],
                        'pengiriman_layanan'  => $kp['layanan'],
                        'pengiriman_tarif'    => $kp['tarif'],
                        'pengiriman_etd'      => $kp['etd'],

                    );

                    $this->db->insert('penjualan', $data_penjualan);
                    $insert_id = $this->db->insert_id();

                    /*
                    $data = array(
                    'kurir'   => $this->input->post('kurir'),
                    'layanan' => $this->input->post('layanan'),
                    'tarif'   => $this->input->post('tarif'),
                    'etd'     => $this->input->post('etd'),
                    );

                    $this->session->set_userdata('konfirmasi_pengiriman', $data);

                     */

                    /*
                    $data = array(
                    'id'          => 'sku_' . $id,
                    'qty'         => $qty,
                    'price'       => $price,
                    'name'        => $name,
                    'gambar'      => $this->produk_detail($id, 'gambar'),
                    'link_produk' => site_url($this->produk_detail($id, 'kategori_slug') . '/' . $this->produk_detail($id, 'slug')),
                    'berat'       => $berat,
                    );
                     */

                    foreach ($this->cart->contents() as $items) {
                        $id    = str_replace('sku_', '', $items['id']);
                        $qty   = $items['qty'];
                        $price = $items['price'];

                        $this->db->insert('penjualan_detail',
                            array(
                                'penjualan_id' => $insert_id,
                                'produk_id'    => $id,
                                'qty'          => $qty,
                                'harga'        => $price,
                            )
                        );

                        //update stok produk akibat pembelian
                        $this->db->set('stok', 'stok - ' . $qty, false);
                        $this->db->where('id', $id);
                        $this->db->update('produk');
                    }

                    //kirim email
                    $this->kirim_email_konfirmasi();

                    //hapus session konfirmasi_alamat, konfirmasi_pengiriman, konfirmasi_catatan

                    $this->session->unset_userdata('konfirmasi_alamat');
                    $this->session->unset_userdata('konfirmasi_pengiriman');
                    $this->session->unset_userdata('konfirmasi_catatan');

                    $this->cart->destroy();

                    //redirect ke member/terimakasih_atas_pembeliannya

                    redirect(site_url('member/terimakasih_atas_pembeliannya'), 'reload');
                }

                $this->_page_output($data);
                break;

            default:
                # code...
                break;
        }

    }

    public function terimakasih_atas_pembeliannya()
    {
        $data = array(
            'page' => 'terimakasih_atas_pembeliannya',

        );
        $this->_page_output($data);
    }

    public function getAlamatDetail()
    {
        header('content-type: application/json');

        $alamat_id = $this->input->post('alamat_id');

        $qry = $this->db->get_where('member_alamat', array('id' => $alamat_id));

        echo json_encode($qry->row());
    }

    public function barang_sudah_terima()
    {
        $token_pembelian = explode('|', base64_decode($this->uri->segment(3, 'no-token')));

        $penjualan_id = $token_pembelian[1];

        $this->db->where('id', $penjualan_id);
        $this->db->update('penjualan', array(
            'status'      => 'selesai',
            'tgl_selesai' => date("Y-m-d H:i:s"),
        )
        );

        redirect(site_url('member/riwayat-pembelian'), 'reload');
    }

    public function detail_transaksi()
    {
        $token_pembelian = explode('|', base64_decode($this->uri->segment(3, 'no-token')));

        $penjualan_id = $token_pembelian[1];
        //echo base64_decode($this->uri->segment(3,'no-token'));
        //exit();
        // echo $penjualan_id;

        $penjualan = $this->db->get_where('penjualan', array('member_id' => $this->user_id, 'id' => $penjualan_id));
        if ($penjualan->num_rows() == 0) {
            redirect(site_url('member/riwayat-pembelian'), 'reload');
        }

        $this->db->select('b.nama AS nama_produk,
                           c.slug AS slug_kategori,
                           b.slug AS slug_produk,
                           b.merk,
                           a.qty,
                           a.harga
                        ');
        $this->db->join('produk b', 'a.produk_id = b.id', 'left');
        $this->db->join('kategori c', 'b.kategori_id = c.id', 'left');
        $detail_transaksi = $this->db->get_where('penjualan_detail a', array('penjualan_id' => $penjualan_id));

        $data = array(
            'page'      => 'detail_transaksi',
            'transaksi' => $this->db->get_where('penjualan', array('id' => $penjualan_id))->row_array(),
            'dtrans'    => $detail_transaksi,
        );
        $this->_page_output($data);

    }

}
