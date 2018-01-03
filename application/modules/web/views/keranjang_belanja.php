<div id="content">
   <div class="breadcrumb"> <a href="<?php echo site_url();?>">Beranda</a> » <a href="#">Shopping Cart</a> </div>
   <h1><span class="h1-top">Keranjang Belanja        &nbsp;(<?php echo round($berat_total/1000,2);?> Kg) </span></h1>
   <!-- <form action="" method="post" enctype="multipart/form-data"> -->
      <div class="cart-info" style="margin-bottom: 0px">
         <table>
            <thead>
               <tr>
                  <td class="image">Gambar</td>
                  <td class="name">Nama Produk</td>
                  <!-- <td class="model">Model</td> -->
                  <td class="quantity">Qty</td>
                  <td class="price">Harga</td>
                  <td class="total">Sub Total</td>
               </tr>
            </thead>
            <tbody>
               <?php foreach ($this->cart->contents() as $items): ?>
               <tr>
                  <td class="image"><a href="<?php echo $items['link_produk'] ?>"><img src="<?php echo load_image('uploads/gambar_produk/' . $items['gambar'],300,300,1,0)?>" alt="" title="" width="130" height="130"></a></td>
                  <td class="name">
                     <a href="<?php echo $items['link_produk'] ?>"><?php echo $items['name'] ?></a>
                     <div> </div>
                  </td>
                  <!-- <td class="model">0002</td> -->
                  <td class="quantity"><input type="text" name="qty" id="qty_<?php echo $items['id']?>" value="<?php echo $items['qty']?>" size="1"></td>
                  <td class="price"><?php echo format_rupiah($items['price'])?></td>
                  <td class="total">
                     <?php echo format_rupiah($items['subtotal'])?>
                     <div class="reload">
                        <input type="image" src="<?php echo site_url('assets/web/image/reload.png');?>" alt="Update" title="Update" onclick="update_cart_qty('<?php echo $items['rowid'] . '|qty_' . $items['id']?>')">
                        &nbsp; &nbsp;<a href="<?php echo site_url('web/remove-item/' . $items['rowid'] . '/keranjang-belanja')?>"><img src="<?php echo site_url('assets/web/image/del.png');?>" alt="Remove" title="Remove"></a>
                     </div>
                  </td>
               </tr>
               <tr>
                  <td colspan="6" class="emptyrow"></td>
               </tr>
               <?php endforeach; ?>

               <?php if($this->cart->total_items() == 0){ ?>
               <tr>
                 <td colspan="6"><h3 style="text-align: center;">Keranjang anda masih kosong</h3></td>
               </tr>
               <?php } ?>

               
            </tbody>
         </table>
      </div>
   <!-- </form> -->
   <?php if($this->cart->total_items() > 0){ ?>
   <h2 style="border-bottom: 0px;margin-bottom: 0px">&nbsp;</h2>
   <div class="content">
      <h3>* klik tombol <img src="<?php echo site_url('assets/web/image/reload.png');?>"> setelah anda merubah qty.</h3>
      <!-- <table class="radio">
         <tbody>
            <tr class="highlight">
               <td><input type="radio" name="next" value="coupon" id="use_coupon"></td>
               <td><label for="use_coupon">Use Coupon Code</label></td>
            </tr>
            <tr class="highlight">
               <td><input type="radio" name="next" value="voucher" id="use_voucher"></td>
               <td><label for="use_voucher">Use Gift Voucher</label></td>
            </tr>
            <tr class="highlight">
               <td><input type="radio" name="next" value="shipping" id="shipping_estimate"></td>
               <td><label for="shipping_estimate">Estimate Shipping &amp; Taxes</label></td>
            </tr>
         </tbody>
      </table> -->
   </div>

   <div class="cart-total" style="border-top: 0px">
      <table id="total">
         <tbody>
            <!-- <tr>
               <td class="right"><b>Sub-Total:</b></td>
               <td class="right last">$150.00</td>
            </tr>
            <tr>
               <td class="right"><b>Eco Tax (-2.00):</b></td>
               <td class="right last">$4.00</td>
            </tr>
            <tr>
               <td class="right"><b>VAT (17.5%):</b></td>
               <td class="right last">$26.25</td>
            </tr> -->
            <tr>
               <td class="right lastrow"><b>Total:</b></td>
               <td class="right last lastrow"><?php echo format_rupiah($this->cart->total())?></td>
            </tr>
         </tbody>
      </table>
   </div>
   <div class="buttons">
      <div class="right"><a href="<?php echo site_url('konfirmasi-pemesanan')?>" class="button">Konfirmasi Pemesanan</a></div>
      <div class="center"><a href="<?php echo site_url()?>" class="button">Lanjut Belanja</a></div>
   </div>
   <?php } ?>
</div>