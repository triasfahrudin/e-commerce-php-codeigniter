<style>
   input.large-field, select.large-field { width: 50%; }
   .checkout-content .left { float: left; width: 100%; }
</style>
<div id="content">
   <div class="breadcrumb"> <a href="<?php echo site_url()?>">Beranda</a> » <a href="#">Konfirmasi Pemesanan</a> » <a href="#">Alamat</a> </div>
   <h1><span class="h1-top">Checkout</span></h1>
   <div class="checkout">
     
      
      
      <div id="confirm">
         <div class="checkout-heading checkout5">Langkah 4: Rekap Pembelian</div>
         <div class="checkout-content" style="display: block; ">
            <div class="checkout-product">
               <h2>Detail Pembelian</h2>
               <table>
                  <thead>
                     <tr>
                        <td class="name">Nama Produk</td>
                        <!-- <td class="model">Qty</td> -->
                        <td class="quantity">Qty</td>
                        <td class="price">Harga</td>
                        <td class="total">Sub Total</td>
                     </tr>
                  </thead>
                  <tbody>
                     <?php foreach ($this->cart->contents() as $items): ?>
                     <tr>
                        <td class="name">
                           <a target="_blank" href="<?php echo $items['link_produk'] ?>"><?php echo $items['name'] ?></a>
                        </td>
                        <!-- <td class="model">0001</td> -->
                        <td class="quantity"><?php echo $items['qty']?></td>
                        <td class="price"><?php echo format_rupiah($items['price'])?></td>
                        <td class="total"><?php echo format_rupiah($items['subtotal'])?></td>
                     </tr>
                     <?php endforeach; ?>
                  </tbody>
                  <tfoot>
                     <tr>
                        <td colspan="3" class="price"><b>Sub-Total:</b></td>
                        <td class="total"><?php echo format_rupiah($this->cart->total())?></td>
                     </tr>
                     <tr>
                        <td colspan="3" class="price"><b>Biaya Pengiriman:</b></td>
                        <td class="total"><?php echo format_rupiah($ongkir);?></td>
                     </tr>
                     <!-- <tr>
                        <td colspan="3" class="price"><b>Eco Tax (-2.00):</b></td>
                        <td class="total">$4.00</td>
                     </tr>
                     <tr>
                        <td colspan="3" class="price"><b>VAT (17.5%):</b></td>
                        <td class="total">$9.63</td>
                     </tr> -->
                     <tr>
                        <td colspan="3" class="price"><b>Total:</b></td>
                        <td class="total"><?php echo format_rupiah($this->cart->total() + $ongkir);?></td>
                     </tr>
                  </tfoot>
               </table>

               <h2>Detail Pengiriman</h2>
               <table>
                  
                  <tbody>
                     <tr>
                        <td>Nama :</td>
                        <td><?php echo $this->session->userdata('konfirmasi_alamat')['nama_lengkap'];?></td>
                     </tr>
                     <tr>
                        <td>Telephon :</td>
                        <td><?php echo $this->session->userdata('konfirmasi_alamat')['telp'];?></td>
                     </tr>
                     <tr>
                        <td>Provinsi :</td>
                        <td><?php echo $provinsi_tujuan;?></td>
                     </tr>
                      <tr>
                        <td>Kota / Kabupaten :</td>
                        <td><?php echo $kota_kab_tujuan;?></td>
                     </tr>
                      <tr>
                        <td>Kodepos :</td>
                        <td><?php echo $this->session->userdata('konfirmasi_alamat')['kodepos'];?></td>
                     </tr>
                      <tr>
                        <td>Alamat :</td>
                        <td><?php echo $this->session->userdata('konfirmasi_alamat')['alamat'];?></td>
                     </tr>
                     
                  </tbody>
                  
               </table>
            </div>
            <div class="payment">
               <div class="buttons">
                  <div class="right">
                     <form method="post" action="">
                        <input type="hidden" name="onsubmit" value="1">
                        <input type="submit" value="Konfirmasi" id="button-confirm" class="button">   
                     </form>
                     
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>

