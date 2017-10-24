<div id="content">
   <div class="breadcrumb"> <a href="index.html">Beranda</a> » <a href="#">Login</a> </div>
   <h1><span class="h1-top">Login Atau Buat Akun Baru</span></h1>
   <div class="checkout">
      <div id="checkout">
         <!-- <div class="checkout-heading checkout1">Step 1: Checkout Options</div> -->
         <div class="checkout-content" style="display: block;">
            <div class="left">
               <form method="post" action="<?php echo site_url('buat-akun')?>">
                <h2>Buat Akun Baru</h2>
                <?php echo validation_errors(); ?>
                 <span class="required">*</span> Nama Lengkap:<br>
                 <input type="text" name="nama_lengkap" value="" class="large-field" required="">
                 <br>
                 <br>              
                 <span class="required">*</span> E-Mail:<br>
                 <input type="text" name="email" value="" class="large-field" required="">
                 <br>
                 <br>
                 <span class="required">*</span> Telephone:<br>
                 <input type="text" name="telp" value="" class="large-field" required="">
                 <br>
                 <br>
                 <input type="submit" value="Lanjut" id="button-account" class="button">
                 <br>
                 <br>  
               </form>
               
            </div>
            <div id="login" class="right">
               <h2>Login dengan akun saya</h2>
               <!-- <p>I am a returning customer</p> -->
               <form action="<?php echo site_url('login')?>" method="post">
                 <b>E-Mail:</b><br>
                 <input type="text" name="email" value="" required="">
                 <br>
                 <br>
                 <b>Password:</b><br>
                 <input type="password" name="password" value="" required="">
                 <br>
                 <a href="<?php echo site_url('lupa-password')?>">Lupa password ?</a><br>
                 <br>
                 <input type="submit" value="Login" id="button-login" class="button">
                 <br>
                 <br>
               </form>               
            </div>
         </div>
      </div>
   </div>
</div>