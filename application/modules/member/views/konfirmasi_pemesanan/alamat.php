<style>
   input.large-field, select.large-field { width: 50%; }
   .checkout-content .left { float: left; width: 100%; }
</style>
<div id="content">
   <div class="breadcrumb"> <a href="<?php echo site_url()?>">Beranda</a> » <a href="#">Konfirmasi Pemesanan</a> » <a href="#">Alamat</a> </div>
   <h1><span class="h1-top">Checkout</span></h1>
   <div class="checkout" id="content_form">
      <div id="shipping-address">
         <div class="checkout-heading checkout2">Langkah 1: Alamat Pengiriman</div>
         <div class="checkout-content" style="display: block;">
            <div class="left">
               <h2>Alamat Anda</h2>
               Pilih Alamat Tersimpan<br>
               <!-- <input type="text" name="company" value="" class="large-field"> -->
               <select name="alamat_tersimpan" id="alamat_tersimpan" onchange="isi_alamat(this)">
                  <option value="">-Pilih Alamat-</option>
                  <?php foreach ($alamat_tersimpan->result_array() as $at) { ?>
                     <option value="<?php echo $at['id']?>">Alamat <?php echo $at['id']?></option>
                  <?php } ?>
               </select>
               
               <br>
               <br>
               <form method="post" action="">
                  <div id="company-id-display" style="">
                     <span id="company-id-required" class="required" style="display: none; ">*</span> Nama Penerima:<br>
                     <input type="text" name="nama_lengkap" id="nama_lengkap" value="" class="large-field" required="">                  
                  </div>
                  
                  <!-- <br> -->
                  <br>

                  <span class="required">*</span> Telephon:<br>
                  <input type="text" name="telp" id="telp" value="" class="large-field">
                 
                  <br>
                  <br>
                 
                  <span class="required">*</span> Provinsi:<br>
                  <select class="form-control" name="provinsi" id="provinsi" onchange="load_kota(this)">
                    <option value="" selected="" disabled="">Pilih Provinsi</option>
                    <?php $this->load->view('rajaongkir/getProvince',array('provinsi' => null)); ?>
                  </select>

                  <br>
                  <br>

                  <span class="required">*</span> Kabupaten / Kota:<br>
                  <select class="form-control" name="kota_kab" id="kota_kab" required="">
                     <option value="" selected="" disabled="">Pilih Kota</option>
                  </select>

                  <br>
                  <br>

                  <span class="required">*</span> Kode Pos:<br>
                  <input type="text" name="kodepos" id="kodepos" value="" class="large-field" required="">
                 
                  <br>
                  <br>

                  <span class="required">*</span> Alamat:<br>
                  <textarea name="alamat" id="alamat" class="large-field" required=""></textarea>
                 
                  <br>
                  <br>

                 
                  

                  <br>
                  <div class="buttons"> Saya telah menyetujui dengan ketentuan <a class="colorbox cboxElement" href="#" alt="Privacy Policy"><b>Privacy Policy</b></a>
                     <input type="checkbox" name="agree" value="1" required="">
                     <input type="submit" value="Lanjut" id="button-register" class="button">
                  </div>
               </form>
            </div>
         </div>
      </div>

   </div>
</div>

<script type="text/javascript">
   function load_kota(sel){
      var val = sel.value;
      $('#content_form').block({ message: '<h1>Mohon tunggu</h1>', css: { border: '1px solid #a00' }  });
      $.post("<?php echo base_url(); ?>member/getCity/"+ val,function(obj){
             $('#kota_kab').html(obj);
      })
      .done(function( data ){
         $('#content_form').unblock();
      });
   }

   function isi_alamat(sel){
      var val = sel.value;

      $.post( "<?php echo site_url('member/getAlamatDetail')?>", {
           alamat_id: val           
      }, 'json')
      .done(function (data) {
         $('#nama_lengkap').val(data.nama_lengkap); 
         $('#telp').val(data.telp);
         $('#kodepos').val(data.kodepos);
         $('#alamat').val(data.alamat);  

         $('#provinsi').val(data.provinsi);     

         var kota_kab = data.kota_kab;
         $('#content_form').block({ message: '<h1>Mohon tunggu</h1>', css: { border: '1px solid #a00' }  });
         $.post("<?php echo base_url(); ?>member/getCity/"+ data.provinsi,function(obj){
                $('#kota_kab').html(obj);
         })
         .done(function( data ){
               $('#content_form').unblock({});
               $('#kota_kab').val(kota_kab);
         });  

      })
   }
</script>
