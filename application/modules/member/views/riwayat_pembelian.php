<style>
   input.large-field, select.large-field { width: 90%; }
   .checkout-content .left { float: left; width: 100%; }
</style>

<?php include "kolom_kanan.php";?>

<div id="content">
   <div class="breadcrumb"> <a href="index.html">Home</a> » <a href="#">Riwayat Pembelian</a> » <a href="#">Checkout</a> </div>
   <h1><span class="h1-top">Riwayat Pembelian yang telah anda lakukan</span></h1>
   <div class="checkout">
      
      <div id="confirm">
        <!-- <div class="checkout-heading checkout5">Step 5: Confirm Order</div> -->
        <div class="checkout-content" style="display: block; ">
          <div class="checkout-product">
            <table>
              <thead>
                <tr>
                  <td class="name">Tanggal Pembelian</td>
                  <td class="model">Status Pembelian</td>
                  <td>Upload Pembayaran</td>
                  <td>Detail</td>                  
                </tr>
              </thead>
              <tbody>
               <?php if($transaksi->num_rows() == 0){ ?>
                <tr>
                  <td colspan="3" style="text-align: center">Belum ada transaksi</td>
                </tr>
               <?php }else{  
               
               foreach ($transaksi->result_array() as $trans) { ?>
                <tr>
                  <td class="name"><?php echo $trans['tgl_pemesanan']?></td>
                  <td class="model">
                    <?php 
                    if($trans['status'] === 'bayar-konfirmasi' && $trans['bukti_bayar'] !== ""){ 
                      echo "Menunggu validasi";
                    }else{ 
                      echo strtoupper($trans['status']) . '<br><br>';
                      if($trans['status'] === 'dikirim'){
                        echo "<a class='button' href='" . site_url('member/barang-sudah-terima/' . base64url_encode(generate_uuid() . '|' . $trans['id'] . '|' . generate_uuid()) ) ."'>Terima Barang</a>";
                      }
                    } 
                    ?>  

                      
                  </td>
                  <td>
                    <?php if(($trans['status'] === 'belum-bayar') || ($trans['status'] === 'bayar-konfirmasi')){ ?>
                     <form action="<?php echo site_url('member/upload-bukti/' . $trans['id'])?>" method="POST" enctype="multipart/form-data">
                       <input class="upload" name="buktibayar" onchange="this.form.submit()" multiple="" type="file">
                     </form>
                     <?php if($trans['bukti_bayar'] !== ""){ ?>
                     <?php echo '</br>Terakhir Upload : <a target="_blank" href="' . site_url('uploads/bukti_bayar/' . $trans['bukti_bayar']) . '">'  . $trans['tgl_konfirmasi_bayar'] . '</a>';?>
                     <?php } ?> 
                    <?php }else{ ?>
                      <?php echo $trans['tgl_konfirmasi_bayar']?>
                    <?php } ?>  
                  </td>
                  <td><a href="<?php echo site_url('member/detail-transaksi/' . base64url_encode(generate_uuid() . '|' . $trans['id'] . '|' . generate_uuid()))?>">Lihat</a></td>
                </tr>
               <?php } 
                 } ?>
              </tbody>
            </table>
          </div>
          <!-- <a class="button" href="<?php echo site_url('member/tambah-alamat-pengiriman');?>">Tambah Alamat Pengiriman</a> -->
        </div>
      </div>
</div>
</div>