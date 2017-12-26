<style>
   input.large-field, select.large-field { width: 90%; }
   .checkout-content .left { float: left; width: 100%; }
</style>

<?php include "kolom_kanan.php";?>

<div id="content">
   <div class="breadcrumb"> <a href="index.html">Home</a> » <a href="#">Shopping Cart</a> » <a href="#">Checkout</a> </div>
   <h1><span class="h1-top">Ubah atau tambah buku alamat pengiriman anda</span></h1>
   <div class="checkout">
      
      <div id="confirm">
        <!-- <div class="checkout-heading checkout5">Step 5: Confirm Order</div> -->
        <div class="checkout-content" style="display: block; ">
          <div class="checkout-product">
            <table>
              <thead>
                <tr>
                  <td class="name">Nama</td>
                  <td class="model">Alamat</td>
                  <td class="quantity">Edit</td>
                  
                </tr>
              </thead>
              <tbody>
               <?php foreach ($buku_alamat->result_array() as $ba) { ?>
                <tr>
                  <td class="name"><?php echo $ba['nama_lengkap']?></td>
                  <td class="model"><?php echo $ba['alamat']?></td>
                  <td class="quantity"><a href="<?php echo site_url('member/ubah-alamat-pengiriman/' . $ba['id'])?>">Edit</a></td>
                  
                </tr>
               <?php } ?>
                
              </tbody>
              
            </table>
          </div>
          
          
          <a class="button" href="<?php echo site_url('member/tambah-alamat-pengiriman');?>">Tambah Alamat Pengiriman</a>
        </div>
      </div>
</div>