<div id="content">
   <div id="slide-wrapper">
      <ul id="slider">
        <?php foreach ($slides->result_array() as $slide) {?>
          <li>
             <div class="border_on_img"></div>
             <div class="content_slider">
                <p><?php echo $slide['keterangan'] ?></p>
             </div>
             <img src="<?php echo load_image('uploads/slider/' . $slide['file_name'], 698, 320); ?>" alt="Lorem ipsum dolor sit amet, consectetuer adipiscing elit.">
          </li>
        <?php }?>
      </ul>
   </div>
   <div class="banner">
      <div><a href="specials.html"><img src="<?php echo site_url('assets/web/image/small-banner-green-225x161.png'); ?>" alt="Lorem ipsum dolor sit amet, consectetur adipiscing elit" title="Lorem ipsum dolor sit amet, consectetur adipiscing elit"></a> </div>
   </div>
   <div class="banner">
      <div><img src="<?php echo site_url('assets/web/image/small-banner-blue-225x161.png'); ?>" alt="Lorem ipsum dolor sit amet, consectetur adipiscing elit" title="Lorem ipsum dolor sit amet, consectetur adipiscing elit"> </div>
   </div>
   <div class="box">


      <div>
         <h1 class="title_module"><span>Produk Terbaru</span></h1>
         <div class="box-content">
            <?php foreach ($produk_terbaru->result_array() as $terbaru) {?>
            <div class="box-product">
               <a class="image" href="<?php echo site_url($terbaru['kategori_slug'] . '/' . $terbaru['slug']) ?>" title="View more"> 
                  <img src="<?php echo load_image('uploads/gambar_produk/' . $terbaru['gambar'],209,179,1,0)?>" alt=""> 
                  <?php if($terbaru['status_harga'] === 'diskon'){ ?>
                  <span class="new">Sale</span>
                  <?php } ?>
               </a>
               <h3 class="name"><a href="<?php echo site_url($terbaru['kategori_slug'] . '/' . $terbaru['slug']) ?>" title=""><?php echo $terbaru['nama']; ?></a></h3>
               <?php if($terbaru['status_harga'] === 'normal'){ ?>
               <p class="wrap_price"> <span class="price"><?php echo format_rupiah($terbaru['harga'])?></span> </p>
               <?php }else{ ?>
               <p class="wrap_price"> <!-- <span class="price-old"><?php echo format_rupiah($terbaru['harga_lama'])?></span> --> <span class="price-new"><?php echo format_rupiah($terbaru['harga'])?></span> </p>
               <?php } ?>   
               <p class="submit">
                <input type="button" value="Add to Cart" class="button" onclick="addtocart(<?php echo $terbaru['id']?>)">
               </p>
            </div>
            <?php }?>
         </div>
      </div>
   </div>
   <div class="clear"></div>
   <div class="box">
      <div>
         <h1 class="title_module"><span>Sedang Diskon!</span></h1>
         <div class="box-content">
            <?php foreach ($produk_diskon->result_array() as $diskon) {?>
            <div class="box-product">
               <a class="image" href="<?php echo site_url($diskon['kategori_slug'] . '/' . $diskon['slug']) ?>" title="View more"> 
                  <img src="<?php echo load_image('uploads/gambar_produk/' . $diskon['gambar'],209,179,1,0)?>" alt=""> 
                  <?php if($diskon['status_harga'] === 'diskon'){ ?>
                  <span class="new">Sale</span>
                  <?php } ?>
               </a>
               <h3 class="name"><a href="<?php echo site_url($diskon['kategori_slug'] . '/' . $terbaru['slug']) ?>" title=""><?php echo $diskon['nama']; ?></a></h3>
               <?php if($diskon['status_harga'] === 'normal'){ ?>
               <p class="wrap_price"> <span class="price"><?php echo format_rupiah($diskon['harga'])?></span> </p>
               <?php }else{ ?>
               <p class="wrap_price"> <!-- <span class="price-old"><?php echo format_rupiah($diskon['harga_lama'])?></span> --> <span class="price-new"><?php echo format_rupiah($diskon['harga'])?></span> </p>
               <?php } ?>   
               <p class="submit">
                  <input type="button" value="Add to Cart" class="button" onclick="addtocart(<?php echo $diskon['id']?>)">
               </p>
            </div>
            <?php }?>
         </div>
      </div>
   </div>
   <div class="clear"></div>
   <div class="box">
      <div>
         <h1 class="title_module"><span>Produk Pilihan</span></h1>
         <div class="box-content">
            <?php foreach ($produk_pilihan->result_array() as $pilihan) {?>
            <div class="box-product">
               <a class="image" href="<?php echo site_url($pilihan['kategori_slug'] . '/' . $pilihan['slug']) ?>" title="View more"> 
                  <img src="<?php echo load_image('uploads/gambar_produk/' . $pilihan['gambar'],209,179,1,0)?>" alt=""> 
                  <?php if($pilihan['status_harga'] === 'diskon'){ ?>
                  <span class="new">Sale</span>
                  <?php } ?>
               </a>
               <h3 class="name"><a href="<?php echo site_url($pilihan['kategori_slug'] . '/' . $pilihan['slug']) ?>" title=""><?php echo $pilihan['nama']; ?></a></h3>
               <?php if($pilihan['status_harga'] === 'normal'){ ?>
               <p class="wrap_price"> <span class="price"><?php echo format_rupiah($pilihan['harga'])?></span> </p>
               <?php }else{ ?>
               <p class="wrap_price"> <!-- <span class="price-old"><?php echo format_rupiah($pilihan['harga_lama'])?></span> --> <span class="price-new"><?php echo format_rupiah($pilihan['harga'])?></span> </p>
               <?php } ?>   
               <p class="submit">
                  <input type="button" value="Add to Cart" class="button" onclick="addtocart(<?php echo $pilihan['id']?>)">
               </p>
            </div>
            <?php }?>
         </div>
      </div>
   </div>
   <div class="clear"></div>
   <div id="carousel">
      <ul class=" jcarousel-skin-tfc">
        <?php foreach ($random_produk->result_array() as $rnd) {?>
          <li><a href="<?php echo site_url($rnd['kategori_slug'] . '/' . $rnd['slug']) ?>"><img src="<?php echo load_image('uploads/gambar_produk/' . $rnd['gambar'], 80, 80); ?>" alt="" title=""></a></li>
        <?php }?>
      </ul>
   </div>
</div>
