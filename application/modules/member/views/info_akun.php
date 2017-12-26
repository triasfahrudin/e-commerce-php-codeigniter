<style>
   input.large-field, select.large-field { width: 90%; }
   .checkout-content .left { float: left; width: 100%; }
</style>
<?php include "kolom_kanan.php";?>
<div id="content">
   <div class="breadcrumb"> <a href="index.html">Home</a> » <a href="#">Shopping Cart</a> » <a href="#">Checkout</a> </div>
   <h1><span class="h1-top">Ubah Informasi Akun</span></h1>
   <div class="checkout">
      <div id="shipping-address">
         <!-- <div class="checkout-heading checkout2">Step 2: Account &amp; Billing Details</div> -->
         <div class="checkout-content" style="display: block; ">
            <div class="left">
               <h2>Detail Informasi Akun Anda</h2>
               <?php if(isset($pesan)){ ?>
               <h3>
                  <div class="error" style="color:#2D61D5"><?php echo $pesan?></div>
               </h3>
               <?php } ?>
               <span class="required">*</span> Email:<br>
               <input type="text" name="email" value="<?php echo $info_akun['email']?>" class="large-field" readonly disabled>
               <br>
               <br>
               <form method="post" action="">
                  <span class="required">*</span> Nama Lengkap:<br>
                  <input type="text" name="nama_lengkap" value="<?php echo $info_akun['nama_lengkap']?>" class="large-field" required>
                  <br>
                  <br>
                  <span class="required">*</span> Jenis Kelamin:<br>
                  <select name="jk" class="large-field">
                     <option value=""> --- Silahkan Pilih --- </option>
                     <option <?php echo $info_akun['jk'] === 'Laki' ? 'selected':'';?> value="Laki"> Laki-laki </option>
                     <option <?php echo $info_akun['Perempuan'] === 'Laki' ? 'selected':'';?> value="Perempuan"> Perempuan </option>
                  </select>
                  <br>
                  <br>
                  <span class="required">*</span> Telephone:<br>
                  <input type="text" name="telp" value="<?php echo $info_akun['telp'];?>" class="large-field" required>
                  <br>
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
</div>