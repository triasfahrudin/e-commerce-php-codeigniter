<style>
   input.large-field, select.large-field { width: 90%; }
   .checkout-content .left { float: left; width: 100%; }
</style>

<?php include "kolom_kanan.php";?>

<div id="content">
   <div class="breadcrumb"> <a href="index.html">Home</a> » <a href="#">Shopping Cart</a> » <a href="#">Checkout</a> </div>
   <h1><span class="h1-top">Ubah Password</span></h1>
   <div class="checkout">
      
      <div id="shipping-address">
         <!-- <div class="checkout-heading checkout2">Step 2: Account &amp; Billing Details</div> -->
         <div class="checkout-content" style="display: block; ">
            <div class="left">
               <h2>Ubah Password Akun Anda</h2>
               
               <?php if(isset($pesan)){ ?>
               <h3>
                  <div class="error" style="color:#2D61D5"><?php echo $pesan?></div>
               </h3>   
               <?php } ?>

               <form method="post" action="">
                  <span class="required">*</span> Password Lama:<br>
                  <input type="password" name="password_lama" value="" class="large-field" required="">
                  <br>
                  <br>
                  
                  <span class="required">*</span> Password Baru:<br>
                  <input type="password" name="password_baru" value="" class="large-field" required>
                  <br>
                  <br>
                  
                  <span class="required">*</span> Ulangi Password Baru:<br>
                  <input type="password" name="ulangi_password_baru" value="" class="large-field" required>
                  <br>
                  <br>

                  <div class="buttons">
                     <!-- <input type="checkbox" name="agree" value="1"> -->
                     <input type="submit" value="Simpan" id="button-register" class="button">
                  </div>
               </form>
               
               
            </div>
            
      </div>
      
      
      
   </div>
</div>