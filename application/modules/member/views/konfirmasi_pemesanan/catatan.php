<style>
   input.large-field, select.large-field { width: 50%; }
   .checkout-content .left { float: left; width: 100%; }
</style>
<div id="content">
   <div class="breadcrumb"> <a href="<?php echo site_url()?>">Beranda</a> » <a href="#">Konfirmasi Pemesanan</a> » <a href="#">Catatan</a> </div>
   <h1><span class="h1-top">Checkout</span></h1>
   <div class="checkout">

      <div id="shipping-method">
         <div class="checkout-heading checkout3">Langkah 3: Catatan Pembelian</div>
         <div class="checkout-content" style="display: block; ">
            <p>Silahkan mencantumkan catatan pembelian (jika ada)</p>
            <form method="post" action="">
               <textarea name="catatan" rows="8" style="width: 98%;"></textarea>
               <br>
               <br>
               <div class="buttons">
                  <div class="right">
                     <input type="submit" value="Lanjut" id="button-register" class="button">
                  </div>
               </div>   
            </form>            
         </div>
      </div>
      
      
   </div>
</div>


