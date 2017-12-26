  <?php include "kolom_kanan.php";?>
  <div id="content">
    <div class="breadcrumb"> <a href="index.html">Home</a> » <a href="#">Account</a> </div>
    <h1><span class="h1-top">Akun saya</span></h1>
    <div class="information_content">
      <h2>Akun</h2>
      <div class="content">
        <ul class="greenrect">
          <li><a href="<?php echo site_url('member/ubah-informasi-akun')?>">Ubah informasi akun</a></li>
          <li><a href="<?php echo site_url('member/ubah-password')?>">Ubah Password</a></li>
          <li><a href="<?php echo site_url('member/buku-alamat-pengiriman')?>">Ubah atau tambah alamat pengiriman anda</a></li>
          <!-- <li><a href="wishlist.html">Modify your wish list</a></li> -->
        </ul>
      </div>
      <h2>Riwayat Pembelianku</h2>
      <div class="content">
        <ul class="greenrect">
          <li><a href="<?php echo site_url('member/status-order/belumbayar')?>">Belum Bayar</a></li>
          <li><a href="<?php echo site_url('member/status-order/dikemas')?>">Dikemas</a></li>
          <li><a href="<?php echo site_url('member/status-order/dikirim')?>">Dikirim</a></li>
          <li><a href="<?php echo site_url('member/status-order/selesai')?>">Selesai</a></li>
          <li><a href="<?php echo site_url('member/status-order/batal')?>">Batal</a></li>
          <li><a href="<?php echo site_url('member/status-order/pengembalian')?>">Pengembalian</a></li>
        </ul>
      </div>
      <!-- <h2>Newsletter</h2>
      <div class="content">
        <ul class="greenrect">
          <li><a href="#">Subscribe / unsubscribe to newsletter</a></li>
        </ul>
      </div> -->
    </div>
  </div>