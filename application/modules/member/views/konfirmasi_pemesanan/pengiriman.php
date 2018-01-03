<style>
   input.large-field, select.large-field { width: 50%; }
   .checkout-content .left { float: left; width: 100%; }
</style>
<div id="content">
   <div class="breadcrumb"> <a href="<?php echo site_url()?>">Beranda</a> » <a href="#">Konfirmasi Pemesanan</a> » <a href="#">Pengiriman</a> </div>
   <h1><span class="h1-top">Checkout</span></h1>
   <div class="checkout">
      <div id="shipping-method">
         <div id="shipping-address">
            <div class="checkout-heading checkout2">Langkah 2 : Pilih Pengiriman</div>
            <div class="checkout-content" style="display: block;">
               <div class="left">
                  <h2>Pilihan Jasa pengiriman</h2>
                  <select class="form-control" name="courier" id="courier" onchange="tampil_data('data')">
                     <option value="pilih">Pilih Kurir</option>
                     <option value="jne">JNE</option>
                     <option value="pos">POS</option>
                     <option value="tiki">TIKI</option>
                  </select>
                  <br>
                  <script>
                     function tampil_data(act){
                           var w = 42;
                           var x = <?php echo $this->session->userdata('konfirmasi_alamat')['kota_kab']?>;
                           var y = <?php echo $btotal;?>;
                           var z = $('#courier').val();
                     
                           if(z !== 'pilih'){
                              $('.checkout-content').block({ message: '<h1>Mohon tunggu</h1>', css: { border: '1px solid #a00' }  }); 
                              $.ajax({
                                  url: "<?php echo base_url(); ?>member/getCost",
                                  type: "GET",
                                  data : {origin: w, destination: x, berat: y, courier: z},
                                  success: function (ajaxData){
                                      //$('#tombol_export').show();
                                      //$('#hasilReport').show();
                                      $('.checkout-content').unblock();
                                      $("#hasil").html(ajaxData);
                                  }
                              });
                           }
                       };
                  </script>
                  <div id="hasil"></div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>