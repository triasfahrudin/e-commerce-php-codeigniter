
<div id="content">
   <div class="breadcrumb"> <a href="<?php echo site_url()?>">Beranda</a> » Reset Password </div>
   <h1><span class="h1-top">Reset Password</span></h1>
   <div class="checkout">
      <div id="checkout">
         <!-- <div class="checkout-heading checkout1">Step 1: Checkout Options</div> -->
         <div class="checkout-content" style="display: block;">
            <div class="left">
              <br><br>
              <p>Masukkan password baru anda untuk masuk ke dalam akun anda. Gunakan kombinasi angka, huruf kecil dan huruf besar dan juga karakter unik untuk password baru anda</p>
             </div>  
            <div class="right">
               <form method="post" action="">
                <h2>Masukkan password baru </h2>
                <h3>
                <?php echo validation_errors('<div class="error" style="color:#FF3F3F">', '</div>'); ?>
                </h3>
                 <span class="required">*</span>Password baru:<br>
                 <input type="password" name="password" value="" class="large-field" required="">
                 <br><br>
                 <span class="required">*</span>Ulangi:<br>
                 <input type="password" name="ulangi" value="" class="large-field" required="">
                 <br><br>
                 <input type="submit" value="Reset" id="button-account" class="button">
                 <br>
                 <br>  
               </form>
               
            </div>
            
         </div>
      </div>
   </div>
</div>
