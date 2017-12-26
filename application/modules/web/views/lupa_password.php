<script src="https://cdn.rawgit.com/johnboker/jquery.blink/944ae640/jquery.blink.js"></script>

<div id="content">
   <div class="breadcrumb"> <a href="<?php echo site_url()?>">Beranda</a> » Lupa Password </div>
   <h1><span class="h1-top">Lupa Password</span></h1>
   <div class="checkout">
      <div id="checkout">
         <!-- <div class="checkout-heading checkout1">Step 1: Checkout Options</div> -->
         <div class="checkout-content" style="display: block;">
            <div class="left">
              <br><br>
              <p>Masukkan alamat email yang anda gunakan untuk mendaftar pertama kali. Kami akan mengirimkan link reset password ke alamat email anda</p>
             </div>  
            <div class="right">
               <form method="post" action="">
                <h2>Masukkan email anda </h2>
                <h3>
                <?php echo validation_errors('<div class="error" style="color:#FF3F3F">', '</div>'); ?>
                </h3>
                 <span class="required">*</span>Email:<br>
                 <input type="text" name="email" value="<?php echo set_value('email'); ?>" class="large-field" required="">
                 <br><br>
                 <input type="submit" value="Lanjut" id="button-account" class="button">
                 <br>
                 <br>  
               </form>
               
            </div>
            
         </div>
      </div>
   </div>
</div>

<script type="text/javascript">
  $('.error').blink(100);
</script>