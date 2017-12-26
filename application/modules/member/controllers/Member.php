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
        $data['logged_in'] = $this->session->userdata('user_id');
        $data['logged_in'] = $this->session->userdata('user_id');
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
            CURLOPT_TIMEOUT        => 30,
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
                $filename    = $success['file_name'];
                // $file_ext = $success['file_ext'];

                $this->db->where('id', $transaksi_id);
                $this->db->update('penjualan', array('bukti_bayar' => $filename));

                redirect('member/riwayat-pembelian','reload');
            }
        }
    }
}
