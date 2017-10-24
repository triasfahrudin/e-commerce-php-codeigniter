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
                  <input type="button" value="Add to Cart" class="button">
               </p>
            </div>
             <?php }?>

         </div>
      </div>
   </div>
   <div class="clear"></div>
   <div class="box">
      <div>
         <h1 class="title_module"><span>Special Products</span></h1>
         <div class="box-content">
            <div class="box-product">
               <a class="image" href="product.html" title="View more"> <img src="<?php echo site_url('assets/web/image/ex/p5-209x179.jpg'); ?>" alt=""> <span class="new">Sale</span> </a>
               <h3 class="name"><a href="product.html" title="">Locomotive in green, red and blue</a></h3>
               <p class="wrap_price"> <span class="price-old">$119.50</span> <span class="price-new">$107.75</span> </p>
               <p class="submit">
                  <input type="button" value="Add to Cart" class="button">
               </p>
            </div>
            <div class="box-product">
               <a class="image" href="product.html" title="View more"> <img src="<?php echo site_url('assets/web/image/ex/p6-209x179.jpg'); ?>" alt=""> <span class="new">Sale</span> </a>
               <h3 class="name"><a href="product.html" title="">Brown shoes for boys</a></h3>
               <p class="wrap_price"> <span class="price-old">$119.50</span> <span class="price-new">$96.00</span> </p>
               <p class="submit">
                  <input type="button" value="Add to Cart" class="button">
               </p>
            </div>
            <div class="box-product">
               <a class="image" href="product.html" title="View more"> <img src="<?php echo site_url('assets/web/image/ex/p1-209x179.jpg'); ?>" alt=""> <span class="new">Sale</span> </a>
               <h3 class="name"><a href="product.html" title="">Funny toy in green, red and blue</a></h3>
               <p class="wrap_price"> <span class="price-old">$119.50</span> <span class="price-new">$60.75</span> </p>
               <p class="submit">
                  <input type="button" value="Add to Cart" class="button">
               </p>
            </div>
            <div class="box-product last-item">
               <a class="image" href="product.html" title="View more"> <img src="<?php echo site_url('assets/web/image/ex/p2-209x179.jpg'); ?>" alt=""> <span class="new">Sale</span> </a>
               <h3 class="name"><a href="product.html" title="">Brown jacket for boys and girls</a></h3>
               <p class="wrap_price"> <span class="price-old">$1,177.00</span> <span class="price-new">$707.00</span> </p>
               <p class="submit">
                  <input type="button" value="Add to Cart" class="button">
               </p>
            </div>
         </div>
      </div>
   </div>
   <div class="clear"></div>
   <div class="box">
      <div>
         <h1 class="title_module"><span>Featured Products</span></h1>
         <div class="box-content">
            <div class="box-product">
               <a class="image" href="product.html" title="View more"> <img src="<?php echo site_url('assets/web/image/ex/p3-209x179.jpg'); ?>" alt=""> </a>
               <h3 class="name"><a href="product.html" title="">Brown jacket for boys and girls</a></h3>
               <p class="wrap_price"> <span class="price">$589.50</span> </p>
               <p class="submit">
                  <input type="button" value="Add to Cart" class="button">
               </p>
            </div>
            <div class="box-product">
               <a class="image" href="product.html" title="View more"> <img src="<?php echo site_url('assets/web/image/ex/p4-209x179.jpg'); ?>" alt=""> </a>
               <h3 class="name"><a href="product.html" title="">Funny toy in green, red and blue</a></h3>
               <p class="wrap_price"> <span class="price">$120.68</span> </p>
               <p class="submit">
                  <input type="button" value="Add to Cart" class="button">
               </p>
            </div>
            <div class="box-product">
               <a class="image" href="product.html" title="View more"> <img src="<?php echo site_url('assets/web/image/ex/p5-209x179.jpg'); ?>" alt=""> <span class="new">Sale</span> </a>
               <h3 class="name"><a href="product.html" title="">Brown shoes for boys</a></h3>
               <p class="wrap_price"> <span class="price-old">$119.50</span> <span class="price-new">$107.75</span> </p>
               <p class="submit">
                  <input type="button" value="Add to Cart" class="button">
               </p>
            </div>
            <div class="box-product last-item">
               <a class="image" href="product.html" title="View more"> <img src="<?php echo site_url('assets/web/image/ex/p6-209x179.jpg'); ?>" alt=""> </a>
               <h3 class="name"><a href="product.html" title="">Locomotive in green, red and blue</a></h3>
               <p class="wrap_price"> <span class="price">$236.99</span> </p>
               <p class="submit">
                  <input type="button" value="Add to Cart" class="button">
               </p>
            </div>
         </div>
      </div>
   </div>
   <div class="clear"></div>
   <div id="carousel">
      <ul class=" jcarousel-skin-tfc">
        <?php foreach ($random_produk->result_array() as $rnd) {?>
          <li><a href="<?php echo site_url('produk/' . $rnd['slug']) ?>"><img src="<?php echo load_image('uploads/gambar_produk/' . $rnd['gambar'], 80, 80); ?>" alt="" title=""></a></li>
        <?php }?>
      </ul>
   </div>
</div>
