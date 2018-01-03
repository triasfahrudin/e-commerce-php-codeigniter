 <style>
.fade.in { opacity: 1;}
.alert-success { color: #3c763d;  background-color: #dff0d8; border-color: #d6e9c6;}
.alert-danger {  color: #a94442;  background-color: #f2dede;  border-color: #ebccd1;}
.alert { padding: 15px; margin-bottom: 20px; border: 1px solid transparent; border-radius: 4px;}
.fade { opacity: 0; -webkit-transition: opacity .15s linear; -o-transition: opacity .15s linear; transition: opacity .15s linear;}
.close { float: right; font-size: 21px; font-weight: 700; line-height: 1;  color: #000; text-shadow: 0 1px 0 #fff; filter: alpha(opacity=20); opacity: .2;}
a { color: #337ab7; text-decoration: none;}
a { background-color: transparent;}
</style>
<div id="column-left">
   <div class="box">
      <div class="box-heading">Kategori</div>
      <div class="box-content">
         <ul class="box-category">
            <?php foreach ($menus->result_array() as $menu) { ?>
            <li>
               <a id="<?php echo $menu['slug']?>" href="<?php echo site_url($menu['slug'])?>"><?php echo $menu['nama']?> <label id="label_count_<?php echo $menu['id']?>">0</label></a>
               <?php $sub_menus = sub_menus($menu['id']);
                  if($sub_menus->num_rows() > 0){ ?>
               <ul>
                  <?php $i = 1;
                     $count_sub_menus = $sub_menus->num_rows();
                     foreach ($sub_menus->result_array() as $sub_menu) { ?>
                  <li <?php echo ($i == $count_sub_menus) ? 'class="last-item"' : ''?>><a href="<?php echo site_url($sub_menu['slug'])?>"><?php echo $sub_menu['nama']?></a></li>
                  <?php $i++;} ?>
               </ul>
               <script>
                  $('#label_count_<?php echo $menu['id']?>').html(' (<?php echo $sub_menus->num_rows()?>)');
               </script>
               <?php } ?>
            </li>
            <?php } ?>
         </ul>
      </div>
   </div>
   <div class="box">
      <div>
         <h1 class="title_module"><span>Pilihan</span></h1>
         <div class="box-content">
            <?php foreach ($produk_pilihan->result_array() as $pilihan) { ?>
            <div class="box-product">
               <a class="image" href="<?php echo site_url($pilihan['kategori_slug'] . '/' . $pilihan['slug']) ?>" title="View more"> 
                  <img src="<?php echo load_image('uploads/gambar_produk/' . $pilihan['gambar'],55,47,1,0)?>" alt=""> 
               </a>
               <h3 class="name"><a href="<?php echo site_url($pilihan['kategori_slug'] . '/' . $pilihan['slug']) ?>" title=""><?php echo limit_text($pilihan['nama'],20); ?></a></h3>
               <!-- <p class="wrap_price"> 
                  <span class="price-old">$119.50</span> 
                  <span class="price-new">$107.75</span> 
               </p> -->
               <?php if($pilihan['status_harga'] === 'normal'){ ?>
               <p class="wrap_price"> <span class="price"><?php echo format_rupiah($pilihan['harga'])?></span> </p>
               <?php }else{ ?>
               <p class="wrap_price"> <span class="price-old"><?php echo format_rupiah($pilihan['harga_lama'])?></span> <span class="price-new"><?php echo format_rupiah($pilihan['harga'])?></span> </p>
               <?php } ?>  
               <p class="submit">
                  <input type="button" value="Beli" class="button" onclick="addtocart(<?php echo $pilihan['id']?>)">
               </p>
            </div>
            <?php } ?>
         </div>
      </div>
   </div>
   <div class="clear"></div>
   <div class="box">
      <div>
         <h1 class="title_module"><span>Sedang Diskon</span></h1>
         <div class="box-content">
            <?php foreach ($produk_diskon->result_array() as $diskon) { ?>
            <div class="box-product">
               <a class="image" href="<?php echo site_url($diskon['kategori_slug'] . '/' . $diskon['slug']) ?>" title="View more"> 
                  <img src="<?php echo load_image('uploads/gambar_produk/' . $diskon['gambar'],55,47,1,0)?>" alt=""> 
               </a>
               <h3 class="name"><a href="<?php echo site_url($diskon['kategori_slug'] . '/' . $diskon['slug']) ?>" title=""><?php echo limit_text($diskon['nama'],20); ?></a></h3>
               <!-- <p class="wrap_price"> 
                  <span class="price-old">$119.50</span> 
                  <span class="price-new">$107.75</span> 
               </p> -->
               <?php if($diskon['status_harga'] === 'normal'){ ?>
               <p class="wrap_price"> <span class="price"><?php echo format_rupiah($diskon['harga'])?></span> </p>
               <?php }else{ ?>
               <p class="wrap_price"> <span class="price-old"><?php echo format_rupiah($diskon['harga_lama'])?></span> <span class="price-new"><?php echo format_rupiah($diskon['harga'])?></span> </p>
               <?php } ?>  
               <p class="submit">
                  <input type="button" value="Beli" class="button" onclick="addtocart(<?php echo $diskon['id']?>)">
               </p>
            </div>
            <?php } ?>
         </div>
      </div>
   </div>
   <div class="clear"></div>
   <div class="box">
      <div>
         <h1 class="title_module"><span>Terbaru</span></h1>
         <div class="box-content">
            <?php foreach ($produk_terbaru->result_array() as $terbaru) { ?>
            <div class="box-product">
               <a class="image" href="<?php echo site_url($terbaru['kategori_slug'] . '/' . $terbaru['slug']) ?>" title="View more"> 
                  <img src="<?php echo load_image('uploads/gambar_produk/' . $terbaru['gambar'],55,47,1,0)?>" alt=""> 
               </a>
               <h3 class="name"><a href="<?php echo site_url($terbaru['kategori_slug'] . '/' . $terbaru['slug']) ?>" title=""><?php echo limit_text($terbaru['nama'],20); ?></a></h3>
               <!-- <p class="wrap_price"> 
                  <span class="price-old">$119.50</span> 
                  <span class="price-new">$107.75</span> 
               </p> -->
               <?php if($terbaru['status_harga'] === 'normal'){ ?>
               <p class="wrap_price"> <span class="price"><?php echo format_rupiah($terbaru['harga'])?></span> </p>
               <?php }else{ ?>
               <p class="wrap_price"> <span class="price-old"><?php echo format_rupiah($terbaru['harga_lama'])?></span> <span class="price-new"><?php echo format_rupiah($terbaru['harga'])?></span> </p>
               <?php } ?>  
               <p class="submit">
                  <input type="button" value="Beli" class="button" onclick="addtocart(<?php echo $terbaru['id']?>)">
               </p>
            </div>
            <?php } ?>
         </div>
      </div>
   </div>
   <div class="clear"></div>
</div>

<div id="content">
    <div class="breadcrumb"> <a href="<?php echo site_url();?>">Beranda</a> » <a href="#">Contact Us</a> </div>
    <h1><span class="h1-top">Contact Us</span></h1>
    <div class="information_content">
      <p>
        Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse. 
      </p>
    </div>
    <div class="information_content">
      <form action="" method="post" enctype="multipart/form-data" id="form_pesan">
        <h2>Our Location</h2>
        <div class="map"> 
          <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d2236.6151622054485!2d114.3693674!3d-8.2246016!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xb66fae51ac63a12a!2sErma+Clodi+Kertosari!5e1!3m2!1sen!2sid!4v1514682915311" width="432" height="225" frameborder="0" style="border:0" allowfullscreen></iframe>
          <!-- <iframe width="432" height="225" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.de/maps?f=q&amp;source=s_q&amp;hl=de&amp;geocode=&amp;q=Wildensteiner+Stra%C3%9Fe+6,+10318,+Berlin&amp;aq=0&amp;oq=Wildensteiner+Str.+6,+10318&amp;sll=52.08049,13.699819&amp;sspn=0.152545,0.348473&amp;ie=UTF8&amp;hq=&amp;hnear=Wildensteiner+Stra%C3%9Fe+6,+10318+Berlin&amp;t=m&amp;ll=52.480271,13.523569&amp;spn=0.005881,0.018497&amp;z=15&amp;output=embed"></iframe> -->
        </div>
        <div class="contact-info">
          <ul>
            <li class="item_1">Jl. Kolonel Sugiono No.15, Tukangkayu, Kec. Banyuwangi, Kabupaten Banyuwangi, Jawa Timur 68416</li>
            <li class="item_2">0877-5550-3242</li>
            <!-- <li class="item_3">030 - 123456710</li> -->
          </ul>
        </div>
        <div class="social-info"> <span>Find us on</span>
          <ul>
            <li><a class="twitter" href="#" title="Twitter">&nbsp;</a></li>
            <li><a class="facebook" href="#" title="Facebook">&nbsp;</a></li>
            <li><a class="youtube" href="#" title="Youtube">&nbsp;</a></li>
            <li><a class="vimeo" href="#" title="Vimeo">&nbsp;</a></li>
           </ul>
        </div>
        <h2>Form Pesan</h2>
        <div class="content">
          <p>
            Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse.
          </p>
          
          <?php echo validation_errors(
            '<div class="alert alert-danger fade in">
              <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
              <strong>Peringatan!&nbsp;</strong>',
            '</div>
            <script>$("html, body").animate({ scrollTop: $("#form_pesan").offset().top + 300}, 2000);</script>'); 
          ?>

          <div class="one-two"> <span class="small">Nama Lengkap:</span><br>
            <input type="text" name="nama_lengkap" value="<?php echo set_value('nama_lengkap')?>" style="width:314px" required="">
          </div>
          <div class="two-two"> <span class="small">Alamat E-Mail:</span><br>
            <input type="text" name="email" value="<?php echo set_value('email');?>" style="width:314px" required="">
          </div>
          <div> <span class="small">Pesan:</span><br>
            <textarea name="pesan" cols="40" rows="10" style="width: 98%;" required=""><?php echo set_value('pesan');?></textarea>
            <?php echo $this->recaptcha->render();?>
          </div>
          <div class="buttons">            
            <div class="right">
              <input type="submit" value="Kirim Pesan" class="button">
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>

<script type="text/javascript">   

   <?php $this->load->config('recaptcha', true); ?>
     var CaptchaCallback = function() {
       $('.g-recaptcha').each(function(index, el) {
         grecaptcha.render(el, {'sitekey' : '<?php echo $this->config->item('recaptcha_sitekey', 'recaptcha')?>'});
       });
     };
</script>
