
<div id="column-left">
   <div class="box">
      <div class="box-heading">Kategori</div>
      <div class="box-content">
         <ul class="box-category">
            <?php foreach ($menus->result_array() as $menu) { ?>
            <li>
               <a id="<?php echo $menu['slug']?>" href="<?php echo site_url($menu['slug'])?>" <?php echo $current_slug === $menu['slug'] ? 'class="active"' : ''?>><?php echo $menu['nama']?> <label id="label_count_<?php echo $menu['id']?>">0</label></a>
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
                  <input type="button" value="Beli" class="button">
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
                  <input type="button" value="Beli" class="button">
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
                  <input type="button" value="Beli" class="button">
               </p>
            </div>
            <?php } ?>
         </div>
      </div>
   </div>
   <div class="clear"></div>
</div>
<div id="content">
   <div class="breadcrumb"> <a href="<?php echo site_url();?>">Beranda</a> » <a href="category.html">Clothes For Girls</a> » <a href="#">Brown Shoes for Boys</a> </div>
   <h1><span class="h1-top"><?php echo $produk['nama']?></span></h1>
   <div class="product-info">
      <div class="left">
         <div class="image">
            <a href="<?php echo load_image('uploads/gambar_produk/' .$produk['gambar'],590,590)?>" title="" class="cloud-zoom" id='zoom1' rel="adjustX: 0, adjustY:0">
               <img src="<?php echo load_image('uploads/gambar_produk/' .$produk['gambar'],590,590)?>" title="" alt="" id="image" />
              <!--  <?php if($produk['status_harga'] === 'diskon'){ ?>
               <span class="new">Sale</span>
               <?php } ?> -->
            </a>
            <div class="zoom"><a id="zoomer" class="colorbox" href="<?php echo site_url('uploads/gambar_produk/' . $produk['gambar'])?>">+ Zoom</a></div>
         </div>
         <div class="image-additional">
            <div id="carousel-p">
               <ul class="jcarousel-skin-tfc">
                  <li>
                     <a href="<?php echo load_image('uploads/gambar_produk/' .$produk['gambar'],590,590)?>" title="" class="cloud-zoom-gallery" rel="useZoom: 'zoom1', smallImage: '<?php echo load_image('uploads/gambar_produk/' .$produk['gambar'],590,590)?>' "><img src="<?php echo load_image('uploads/gambar_produk/' .$produk['gambar'],300,300)?>" title="" alt="" /></a>
                  </li>
                  <?php
                  $list_gambar = $this->db->get_where('gambar_produk',array('produk_id' => $produk['id']));
                  foreach ($list_gambar->result_array() as $lg) { ?>
                    <li>
                       <a href="<?php echo site_url('uploads/gambar_produk/galeri/' .$lg['gambar'])?>" title="" class="cloud-zoom-gallery" rel="useZoom: 'zoom1', smallImage: '<?php echo load_image('uploads/gambar_produk/galeri/' .$lg['gambar'],590,590)?>' "><img src="<?php echo load_image('uploads/gambar_produk/galeri/' .$lg['gambar'],300,300)?>" title="" alt="" /></a>
                    </li>
                  <?php } ?>
               </ul>
            </div>
         </div>
      </div>
      <div class="right">
         <div class="description">
            <div class="price">
               <span id="line_s"></span>
               <?php if($produk['status_harga'] === 'diskon'){ ?>
                 <p class="wrap_price">
                  <!-- <span class="price-old"><?php echo format_rupiah($produk['harga_lama'])?></span>  -->
                  <span class="price-new"><?php echo format_rupiah($produk['harga'])?></span>
               </p>
                 <p><span class="price-old"><?php echo format_rupiah($produk['harga_lama'])?></span></p> 
               <?php }else{ ?>
                 <p class="wrap_price"><span class="price-new"><?php echo format_rupiah($produk['harga'])?></span></p>
                 <!-- <p><span class="price-tax">Ex Tax: $50.00</span></p> -->
               <?php } ?>

            </div>
         </div>
         <div class="desc2"> <span>Merk:</span> <a href="<?php echo site_url('brands/' . $produk['merk_slug'])?>"><?php echo $produk['merk']?></a><br>
            <span>Kode Produk:</span> <?php echo 'SKU' . str_pad($produk['id'], 8, "0", STR_PAD_LEFT);?> <br>
            <span>Stok:</span> <?php echo $produk['stok'] == 0 ? 'stok habis' : $produk['stok'];?>
         </div>
         <?php if($produk['stok'] > 0){ ?>
         <div class="cart">
            
            <form method="post" action="">
               <input type="hidden" name="id" value="<?php echo $produk['id']?>">
               <input type="hidden" name="price" value="<?php echo $produk['harga']?>">
               <input type="hidden" name="name" value="<?php echo $produk['nama']?>">
               <input type="hidden" name="berat" value="<?php echo $produk['berat']?>">
               

               <div>Qty:
                  <input type="text" name="qty" size="5" style="width:50px" value="1" data-validation="number" data-validation-allowing="range[1;100]">
                  &nbsp;
                  <input type="submit" value="Beli" id="button-cart" class="button" >
                  <!-- <span>&nbsp;&nbsp;- OR -&nbsp;&nbsp;</span> <span class="links"><a>Add to Wish List</a><br>
                  <a>Add to Compare</a></span> -->
               </div>
            </form>            
         </div>
         <?php } ?>
         <!-- <div class="review">
            <div><img src="<?php echo site_url('assets/web/image/stars-4.png');?>" alt="0 reviews"></div>
            <div><a>6 reviews</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a>Write a review</a></div>
            <div class="share"><img src="<?php echo site_url('assets/web/image/share2.png')?>" alt=""></div>
         </div> -->
      </div>
   </div>
   <div id="tabs" class="htabs">
    <a href="#tab-description">Deskripsi</a>
    <a href="#tab-specification">Detail</a>
    <!-- <a href="#tab-review">Reviews (6)</a>  -->
  </div>
   <div id="tab-description" class="tab-content">
      <div class="cpt_product_description ">
         <div id="deskripsi">
            <?php echo $produk['deskripsi']?>
         </div>
      </div>
   </div>
   <div id="tab-specification" class="tab-content">
      <div class="cpt_product_description ">
         <div>
            <?php echo $produk['detail']?>
         </div>
      </div>
   </div>
   <!-- <div id="tab-review" class="tab-content">
      <div id="review">
         <div class="review-list">
            <div class="author"><b>ssievert</b>  on  12/02/2013</div>
            <div class="rating"><img src="image/stars-4.png" alt="1 reviews"></div>
            <div class="text">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.</div>
         </div>
         <div class="pagination">
            <div class="results">Showing 1 to 1 of 1 (1 Pages)</div>
         </div>
      </div>
      <h2 id="review-title">Write a review</h2>
      <b>Your Name:</b><br>
      <input type="text" name="name" value="">
      <br>
      <br>
      <b>Your Review:</b>
      <textarea name="text" cols="40" rows="8" style="width: 98%;"></textarea>
      <span style="font-size: 11px;"><span style="color: #FF0000;">Note:</span> HTML is not translated!</span><br>
      <br>
      <b>Rating:</b> <span>Bad</span>&nbsp;
      <input type="radio" name="rating" value="1">
      &nbsp;
      <input type="radio" name="rating" value="2">
      &nbsp;
      <input type="radio" name="rating" value="3">
      &nbsp;
      <input type="radio" name="rating" value="4">
      &nbsp;
      <input type="radio" name="rating" value="5">
      &nbsp;<span>Good</span><br>
      <br>
      <div class="buttons">
         <div class="right"><a id="button-review" class="button">Continue</a></div>
      </div>
   </div> -->
</div>
<script type="text/javascript"><!--
   $('#carousel-p ul').jcarousel({
      vertical: false,
      visible: 3,
      scroll: 1
   });
   $('.colorbox').colorbox({
     overlayClose: true,
     opacity: 0.4,
     rel: "colorbox"
   });

   $('#deskripsi').readmore({
     speed: 75,
     lessLink: '<a href="#"><input type="button" value="- Tutup" class="button"></a>',
     moreLink: '<a href="#"><input type="button" value="+ Selengkapnya" class="button"></a>'
   });

   //-->
     var myLanguage = {
        requiredField : 'Input ini dibutuhkan',
        errorTitle: 'Form submission failed!',
        requiredFields: 'You have not answered all required fields',
        badTime: 'You have not given a correct time',
        badEmail: 'Alamat email tidak valid',
        badTelephone: 'You have not given a correct phone number',
        badSecurityAnswer: 'You have not given a correct answer to the security question',
        badDate: 'You have not given a correct date',
        lengthBadStart: 'The input value must be between ',
        lengthBadEnd: ' characters',
        lengthTooLongStart: 'The input value is longer than ',
        lengthTooShortStart: 'The input value is shorter than ',
        notConfirmed: 'Input values could not be confirmed',
        badDomain: 'Incorrect domain value',
        badUrl: 'The input value is not a correct URL',
        badCustomVal: 'The input value is incorrect',
        andSpaces: ' and spaces ',
        badInt: 'Stok tidak mencukupi',
        badSecurityNumber: 'Your social security number was incorrect',
        badUKVatAnswer: 'Incorrect UK VAT Number',
        badStrength: 'The password isn\'t strong enough',
        badNumberOfSelectedOptionsStart: 'You have to choose at least ',
        badNumberOfSelectedOptionsEnd: ' answers',
        badAlphaNumeric: 'The input value can only contain alphanumeric characters ',
        badAlphaNumericExtra: ' and ',
        wrongFileSize: 'The file you are trying to upload is too large (max %s)',
        wrongFileType: 'Only files of type %s is allowed',
        groupCheckedRangeStart: 'Please choose between ',
        groupCheckedTooFewStart: 'Please choose at least ',
        groupCheckedTooManyStart: 'Please choose a maximum of ',
        groupCheckedEnd: ' item(s)',
        badCreditCard: 'The credit card number is not correct',
        badCVV: 'The CVV number was not correct',
        wrongFileDim : 'Incorrect image dimensions,',
        imageTooTall : 'the image can not be taller than',
        imageTooWide : 'the image can not be wider than',
        imageTooSmall : 'the image was too small',
        min : 'min',
        max : 'max',
        imageRatioNotAccepted : 'Image ratio is not accepted'
  };

  $.validate({
      language : myLanguage,
      modules : 'date',
      borderColorOnError : '#E22929'
  });
</script>
