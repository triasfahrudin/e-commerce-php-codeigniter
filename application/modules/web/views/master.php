<!DOCTYPE html>
<html dir="ltr" lang="en">
   <head>
      <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>Erma Clodi - Things For Cuties</title>
      <meta name="description" content="Things For Cuties - A Premium Responsive Kids / Baby Related Shop Template, available at Themeforest.">
      <style>

         .sub_menu ul li{
           list-style-type: none;  text-transform: uppercase;
           font-size: 18px; letter-spacing: 1px;
           font-weight: normal;  margin: 0px 0px 0px 0px;
         }

         
         .pagination {
             display: inline-block;
             text-align: center;
         }

         .pagination a {
             color: black;
             float: left;
             padding: 8px 16px;
             text-decoration: none;
             border: 1px solid #ddd;
         }

         .pagination a.active {
             background-color: #4CAF50;
             color: white;
             border: 1px solid #4CAF50;
         }

         .pagination a:hover:not(.active) {background-color: #ddd;}

         .pagination a:first-child {
             border-top-left-radius: 5px;
             border-bottom-left-radius: 5px;
         }

         .pagination a:last-child {
             border-top-right-radius: 5px;
             border-bottom-right-radius: 5px;
         }

      </style>
      <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:400,600,700">
      <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Gochi+Hand">
      <link href="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/theme-default.min.css" rel="stylesheet" type="text/css" />
      <link rel="stylesheet" type="text/css" href="<?php echo site_url('assets/web/css/stylesheet.css')  . '?v=' . uniqid('css.',true);?>">
      <link rel="stylesheet" type="text/css" href="<?php echo site_url('assets/web/css/mobile.css') . '?v=' . uniqid('css.',true)?>">
      <link rel="stylesheet" type="text/css" href="<?php echo site_url('assets/web/css/cloud-zoom.css') . '?v=' . uniqid('css.',true)?>">
      <link rel="stylesheet" type="text/css" href="<?php echo site_url('assets/web/css/carousel.css') . '?v=' . uniqid('css.',true)?>">
      <!-- <script type="text/javascript" src="js/jquery-1.7.1.min.js"></script> -->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/pace/1.0.2/themes/blue/pace-theme-bounce.min.css" />

      <script type="text/javascript">
         var base_url = "<?php echo site_url('web')?>";         
      </script>

      <script type="text/javascript" src="http://code.jquery.com/jquery-1.7.1.min.js"></script>
      <script type="text/javascript" src="<?php echo site_url('assets/web/js/jquery.jcarousel.min.js'). '?v=' . uniqid('js.',true);?>"></script>
      <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jcarousel/0.3.0/jquery.jcarousel.min.js"></script> -->
      <!-- <script type="text/javascript" src="<?php echo site_url('assets/web/js/jquery.cycle.all.js'). '?v=' . uniqid('js.',true);?>"></script> -->
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.cycle/2.9999.8/jquery.cycle.all.min.js"></script>
      <script type="text/javascript" src="<?php echo site_url('assets/web/js/jquery.selectBox.js'). '?v=' . uniqid('js.',true);?>"></script>
      <script type="text/JavaScript" src="<?php echo site_url('assets/web/js/cloud-zoom.1.0.2.js'). '?v=' . uniqid('js.',true);?>"></script>
      <script type="text/JavaScript" src="<?php echo site_url('assets/web/js/cuties.js') . '?v=' . uniqid('js.',true);?>"></script>
      <script src="https://cdn.rawgit.com/johnboker/jquery.blink/944ae640/jquery.blink.js"></script>

      <link rel="stylesheet" type="text/css" href="<?php echo site_url('assets/web/css/colorbox.css');?>">
      <!-- <script type="text/JavaScript" src="<?php echo site_url('assets/web/js/jquery.colorbox-min.js');?>"></script> -->
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.colorbox/1.4.30/jquery.colorbox.js"></script>
      <script src="https://fastcdn.org/Readmore.js/2.1.0/readmore.min.js"></script>
      <script src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/jquery.form-validator.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/pace/1.0.2/pace.min.js"></script>
            <script src="https://www.google.com/recaptcha/api.js?onload=CaptchaCallback&render=explicit&hl=id" async defer></script>
      <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
      <![endif]-->

   </head>
   <body>
      <div id="container">
         <div id="header">
            <div id="logo"><a href="<?php echo site_url()?>"><img src="<?php echo site_url('assets/web/image/logo.png?v=' . uniqid());?>" title="Things for Cuties" alt="Things for Cuties"></a></div>
            <div id="header_right">
               <form action="index.html" method="post" enctype="multipart/form-data">
                  <div id="language">
                     <!-- <ul class="currence">
                        <li class="first_item"><a class="selected" title="English">en</a></li>
                        <li><a title="Russia">rs</a></li>
                        <li class="last_item"><a title="Deutsch">de</a></li>
                     </ul> -->
                  </div>
               </form>
               <form action="index.html" method="post" enctype="multipart/form-data">
                  <div id="currency">
                     <!-- <ul class="currence">
                        <li class="first_item"><a title="Euro">€</a></li>
                        <li><a title="Pound Sterling" >£</a></li>
                        <li class="last_item"><a class="selected" title="US Dollar">$</a></li>
                     </ul> -->
                  </div>
               </form>
               <div id="search">
                  <div class="button-search"></div>
                  <input type="text" name="search" placeholder="Search" value="">
               </div>
               <div id="cart">
                  <div class="heading">
                     <div class="cart_top_in">
                        <h4>Keranjang</h4>
                        <a><span id="cart-total"><?php echo $this->cart->total_items();?> item(s) - <?php echo format_rupiah($this->cart->total())?></span></a>
                     </div>
                  </div>
                  <div class="content">
                     <div class="mini-cart-info">
                        <table>
                           <tbody>
                              <?php foreach ($this->cart->contents() as $items): ?>
                              <tr>
                                 <td class="image"><a href="product.html">
                                    <img src="<?php echo load_image('uploads/gambar_produk/' . $items['gambar'],40,40,1,0)?>" alt="" title=""></a>
                                 </td>
                                 <td class="name">
                                    <a href="<?php echo $items['link_produk'] ?>"><?php echo $items['name'] ?></a>
                                    <div> </div>
                                 </td>
                                 <td class="quantity">x&nbsp;<?php echo $items['qty']?></td>
                                 <td class="total"><?php echo format_rupiah($items['price'])?></td>
                                 <td class="remove">
                                    <a href="<?php echo site_url('web/remove-item/' . $items['rowid'])?>">
                                       <img src="<?php echo site_url('assets/web/image/remove-small.png');?>" alt="Remove" title="Remove">
                                    </a>   
                                 </td>
                              </tr>
                              <?php endforeach; ?>

                              <?php if($this->cart->total_items() == 0){ ?>
                                 <h3>Keranjang anda masih kosong</h3>
                              <?php } ?>   
                           </tbody>
                        </table>
                     </div>
                     <?php if($this->cart->total_items() > 0){ ?>
                     <div class="mini-cart-total">
                        <table>
                           <tbody>                              
                              <tr class="last_item">
                                 <td class="right"><b>Total:</b></td>
                                 <td class="right"><?php echo format_rupiah($this->cart->total())?></td>
                              </tr>
                           </tbody>
                        </table>
                     </div>
                     <div class="checkout">
                      <a class="button mr" href="<?php echo site_url('keranjang-belanja')?>">Lihat keranjang</a>
                      <?php if($this->cart->total_items() > 0){ ?>  
                      <a class="button" href="<?php echo site_url('konfirmasi-pemesanan')?>">Konfirmasi Pemesanan</a>
                      <?php } ?>
                    </div>
                     <?php } ?>
                  </div>

               </div>
               <div id="bottom_right">                  
                  <?php if(!isset($logged_in)){ ?>                 
                  <p id="welcome"> Selamat datang pengunjung, anda bisa <a href="<?php echo site_url('login')?>">login</a> atau <a href="<?php echo site_url('login')?>">buat akun</a>. </p>
                  <?php } ?> 
                    
                  <div class="links">
                     <!-- <a href="wishlist.html" id="wishlist-total">Wish List (1)</a> -->
                     <?php if(isset($logged_in)){ ?>   
                     <a href="<?php echo site_url('member')?>">Akun ku</a>
                     <?php } ?>
                     <a href="<?php echo site_url('keranjang-belanja');?>">Keranjang</a>
                     <?php if($this->cart->total_items() > 0){ ?>  
                     <a href="<?php echo site_url('konfirmasi-pemesanan')?>">Konfirmasi Pemesanan</a>
                     <?php } ?>
                  </div>                  
               </div>
            </div>
         </div>
         <div id="menu">
            <ul>
            <?php $i = 1;
                  foreach ($menus->result_array() as $menu) { ?>
                <li class="<?php echo ($i == $menus->num_rows()) ? 'last_item ' : ''?>menu_item down">
                   <a href="<?php echo site_url($menu['slug'])?>"><?php echo $menu['nama']?></a>
            <?php  $sub_menus = sub_menus($menu['id']);
                   if($sub_menus->num_rows() > 0){ ?>
                     <div class="sub_menu" style="">
                        <div class="bubble"></div>
                        <div class="sub_menu_block" style="width:326px">
                          <ul>
                    <?php foreach ($sub_menus->result_array() as $sub_menu) { ?>
                             <li><a href="<?php echo site_url($sub_menu['slug'])?>"><?php echo $sub_menu['nama']?></a></li>
                  <?php  } ?>
                          </ul>
                        </div>
                     </div>
            <?php   } ?>

                </li>
              <?php $i++;} ?>
               
            </ul>
         </div>
         <div id="mobile-menu">
            <div id="mobile-menu-nav">
               <ul>
          <?php foreach ($menus->result_array() as $menu) { ?>
                <li><a href="<?php echo site_url($menu['slug'])?>"><?php echo $menu['nama']?></a> </li>
          <?php } ?>
               </ul>
            </div>
         </div>
         <?php include $page . ".php";?>
      </div>
      <div id="footer">
         
          <div class="footer_wrapper">
            <div id="footer_bottom">
               <div class="footer_bottom_item">
                  <h3 class="bottom_item_1 down"><a>Informasi</a></h3>
                  <ul class="menu_footer_item text_item">
                     <li><a href="<?php echo site_url('tentang-kami')?>" title="About Us">Tentang Kami</a></li>
                     <li><a href="<?php echo site_url('web/blog')?>" title="Blog">Blog</a></li>
                     <!-- <li><a href="comparison.html" title="Privacy Policy">Compare List</a></li>
                     <li><a href="#" title="Terms &amp; Conditions">Terms &amp; Conditions</a></li> -->
                  </ul>
               </div>
               <div class="footer_bottom_item">
                  <h3 class="bottom_item_2 down"><a>Layanan Konsumen</a></h3>
                  <ul class="menu_footer_item text_item">
                     <li><a href="<?php echo site_url('hubungi-kami')?>">Hubungi kami</a></li>
                     <!-- <li><a href="#">Returns</a></li> -->
                     <li><a href="#">Site Map</a></li>
                  </ul>
               </div>
              <!--  <div class="footer_bottom_item">
                  <h3 class="bottom_item_3 down"><a>Extras</a></h3>
                  <ul class="menu_footer_item text_item">
                     <li><a href="brands.html">Brands</a></li>
                     <li><a href="gifts.html">Gift Vouchers</a></li>
                     <li><a href="#">Affiliates</a></li>
                     <li><a href="specials.html">Specials</a></li>
                  </ul>
               </div> -->
               <div class="footer_bottom_item">
                  <h3 class="bottom_item_4 down"><a>Akun Ku</a></h3>
                  <ul class="menu_footer_item text_item">
                     <li><a href="<?php echo site_url('member')?>">Akun ku</a></li>
                     <li><a href="<?php echo site_url('member/riwayat-pembelian')?>">Riwayat Pembelian</a></li>
                     <!-- <li><a href="wishlist.html">Wish List</a></li>
                     <li><a href="#">Newsletter</a></li> -->
                  </ul>
               </div>
               <div class="clear"></div>
            </div>
            <div id="mobile-footer">
               <div class="mobile-footer-menu">
                  <h3>Information</h3>
                  <div class="mobile-footer-nav" style="display: none;">
                     <ul>
                        <li><a href="about.html" title="About Us">About Us</a></li>
                        <li><a href="blog.html" title="Delivery Information">Blog</a></li>
                        <li><a href="comparison.html" title="Privacy Policy">Compare List</a></li>
                        <li><a href="#" title="Terms &amp; Conditions">Terms &amp; Conditions</a></li>
                     </ul>
                  </div>
                  <h3>Customer Service</h3>
                  <div class="mobile-footer-nav" style="display: none;">
                     <ul>
                        <li><a href="contact.html">Contact Us</a></li>
                        <!-- <li><a href="#">Returns</a></li> -->
                        <li><a href="#">Site Map</a></li>
                     </ul>
                  </div>
                  <h3>Extras</h3>
                  <div class="mobile-footer-nav" style="display: none;">
                     <ul>
                        <li><a href="brands.html">Brands</a></li>
                        <li><a href="gifts.html">Gift Vouchers</a></li>
                        <li><a href="#">Affiliates</a></li>
                        <li><a href="specials.html">Specials</a></li>
                     </ul>
                  </div>
                  <h3>My Account</h3>
                  <div class="mobile-footer-nav" style="display: none;">
                     <ul>
                        <li><a href="<?php echo site_url('member')?>">Akun ku</a></li>
                        <li><a href="<?php echo site_url('member/riwayat-pembelian')?>">Riwayat Pembelian</a></li>
                        <!-- <li><a href="wishlist.html">Wish List</a></li>
                        <li><a href="#">Newsletter</a></li> -->
                     </ul>
                  </div>
               </div>
            </div>
         </div>
         <div id="footer-text">
            <!-- <p>Things for Cuties © 2013 - Template by <a href="http://themeforest.net/user/ssievert?ref=ssievert">ssievert</a></p> -->
         </div>
      </div>
      
      <script type="text/javascript">
        $('.error').blink(100);
      </script>
   </body>
</html>
