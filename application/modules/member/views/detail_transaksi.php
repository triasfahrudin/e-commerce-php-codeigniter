<style>
   input.large-field, select.large-field { width: 90%; }
   .checkout-content .left { float: left; width: 100%; }
</style>
<?php include "kolom_kanan.php";?>
<div id="content">
    <div class="breadcrumb"> <a href="index.html">Home</a> » <a href="myaccount.html">Account</a> » <a href="#">Order History</a> » <a href="./orderhistory_files/orderhistory.html">Order Information</a> </div>
    <h1><span class="h1-top">Riwayat Pembelian</span></h1>
    <div class="information_content">
      <table class="list">
        <thead>
          <tr>
            <td class="left" colspan="2">Order Detail</td>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td class="left" style="width: 50%;"><b>Order ID:</b> #<?php echo $transaksi['id']?><br>
              <b>Tanggal Pembelian:</b> <?php echo tgl_panjang($transaksi['tgl_pemesanan'])?></td>
            <td class="left" style="width: 50%;"><b>Metode Pembayaran:</b> Transfer Bank<br>
              <b>Layanan Pengiriman:</b> <?php echo strtoupper($transaksi['pengiriman_kurir']) . ' - ' . $transaksi['pengiriman_layanan'];?> </td>
          </tr>
        </tbody>
      </table>
      <table class="list">
        <thead>
          <tr>
            <td class="left">Alamat Pembayaran</td>
            <td class="left">Alamat Pengiriman</td>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td class="left">-</td>
            <td class="left">
            	<?php echo strtoupper($transaksi['nama_penerima'] . '<br>' . 
            			   $transaksi['telp_penerima'] . '<br>' . 
            	           $transaksi['alamat_pengiriman'] . '<br>' .
            	           $transaksi['kodepos_pengiriman'] . '<br>' . 
            	           $transaksi['kab_kota_pengiriman'] . ' - ' . 
            	           $transaksi['provinsi_pengiriman']);?>
            </td>
          </tr>
        </tbody>
      </table>
      <table class="list">
        <thead>
          <tr>
            <td class="left">Nama Produk</td>
            <td class="left">Merk</td>
            <td class="right">Qty</td>
            <td class="right">Harga</td>
            <td class="right">Total</td>
          </tr>
        </thead>
        <tbody>
        <?php foreach ($dtrans->result_array() as $dt) { ?>
	      <tr>
            <td class="left">
            	<a target="_blank" href="<?php echo site_url($dt['slug_kategori'] . '/' . $dt['slug_produk'])?>"><?php echo $dt['nama_produk'];?></a>
            </td>
            <td class="left"><?php echo $dt['merk'];?></td>
            <td class="right"><?php echo $dt['qty']?></td>
            <td class="right"><?php echo format_rupiah($dt['harga'])?></td>
            <td class="right"><?php echo format_rupiah($dt['harga'] * $dt['qty']);?></td>
          </tr>
        <?php } ?>          
        <tfoot>
          <tr>
            <td colspan="3"></td>
            <td class="right"><b>Sub-Total:</b></td>
            <td class="right"><?php echo format_rupiah($transaksi['subtotal']);?></td>
          </tr>
          <tr>
            <td colspan="3">Catatan : <br>"Harga produk dan biaya jasa pengiriman yang tertera disini <br>&nbsp;&nbsp;&nbsp;merupakan harga produk pada saat pembelian dilakukan"</td>
            <td class="right"><b>Pengiriman <?php echo strtoupper($transaksi['pengiriman_kurir']) . '<br>' . $transaksi['pengiriman_layanan'];?></b></td>
            <td class="right"><?php echo format_rupiah($transaksi['pengiriman_tarif']);?></td>
          </tr>
          <tr>
            <td colspan="3"></td>
            <td class="right"><b>Total:</b></td>
            <td class="right"><?php echo format_rupiah($transaksi['subtotal'] + $transaksi['pengiriman_tarif']);?></td>
          </tr>
        </tfoot>
      </table>
      <table class="list">
        <thead>
          <tr>
            <td class="left">Catatan</td>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td class="left"><?php echo $transaksi['catatan'];?></td>
          </tr>
        </tbody>
      </table>
      <h2>Order History</h2>
      <table class="list">
        <thead>
          <tr>
            <td class="left">Tanggal</td>
            <td class="left">Status</td>
            <!-- <td class="left">Comment</td> -->
          </tr>
        </thead>
        <tbody>
          <?php if($transaksi['tgl_selesai'] !== '0000-00-00 00:00:00'){ ?> 	
          <tr>
            <td class="left"><?php echo tgl_panjang($transaksi['tgl_selesai'],'lm',true)?></td>
            <td class="left">Selesai</td>
            <!-- <td class="left"></td> -->
          </tr>
          <?php } ?>

          <?php if($transaksi['tgl_batal'] !== '0000-00-00 00:00:00'){ ?> 	
          <tr>
            <td class="left"><?php echo tgl_panjang($transaksi['tgl_batal'],'lm',true)?></td>
            <td class="left">Pembelian dibatalkan</td>
            <!-- <td class="left"></td> -->
          </tr>
          <?php } ?>

          <?php if($transaksi['tgl_dikirim'] !== '0000-00-00 00:00:00'){ ?> 	
          <tr>
            <td class="left"><?php echo tgl_panjang($transaksi['tgl_dikirim'],'lm',true)?></td>
            <td class="left">Barang dikirim</td>
            <!-- <td class="left"></td> -->
          </tr>
          <?php } ?>

          <?php if($transaksi['tgl_dikemas'] !== '0000-00-00 00:00:00'){ ?> 	
          <tr>
            <td class="left"><?php echo tgl_panjang($transaksi['tgl_dikemas'],'lm',true)?></td>
            <td class="left">Pengemasan barang</td>
            <!-- <td class="left"></td> -->
          </tr>
          <?php } ?>

          <?php if($transaksi['tgl_konfirmasi_bayar'] !== '0000-00-00 00:00:00'){ ?> 	
          <tr>
            <td class="left"><?php echo tgl_panjang($transaksi['tgl_konfirmasi_bayar'],'lm',true)?></td>
            <td class="left">Konfirmasi pembayaran</td>
            <!-- <td class="left"></td> -->
          </tr>
          <?php } ?>

          <?php if($transaksi['tgl_pemesanan'] !== '0000-00-00 00:00:00'){ ?> 	
          <tr>
            <td class="left"><?php echo tgl_panjang($transaksi['tgl_pemesanan'],'lm',true)?></td>
            <td class="left">Pembelian dilakukan</td>
            <!-- <td class="left"></td> -->
          </tr>
          <?php } ?>
        </tbody>
      </table>
      <div class="buttons">
        <div class="right"><a href="<?php echo site_url('member/riwayat-pembelian');?>" class="button">Riwayat Pembelian</a></div>
      </div>
    </div>
  </div>
</div>