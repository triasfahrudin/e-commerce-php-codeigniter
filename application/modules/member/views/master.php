<!DOCTYPE html>
<html dir="ltr" lang="en">
   <head>
      <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>Things For Cuties - A Premium Responsive Kids / Baby Related Shop Template</title>
      <meta name="description" content="Things For Cuties - A Premium Responsive Kids / Baby Related Shop Template, available at Themeforest.">
      <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:400,600,700">
      <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Gochi+Hand">
      <link rel="stylesheet" type="text/css" href="<?php echo site_url('assets/web/css/stylesheet.css');?>">
      <link rel="stylesheet" type="text/css" href="<?php echo site_url('assets/web/css/mobile.css')?>">
      <link rel="stylesheet" type="text/css" href="<?php echo site_url('assets/web/css/cloud-zoom.css')?>">
      <link rel="stylesheet" type="text/css" href="<?php echo site_url('assets/web/css/carousel.css')?>">
      <!-- <script type="text/javascript" src="js/jquery-1.7.1.min.js"></script> -->
      <script type="text/javascript" src="<?php echo site_url('assets/web/js/jquery-1.7.1.min.js');?>"></script>
      <script type="text/javascript" src="<?php echo site_url('assets/web/js/jquery.jcarousel.min.js');?>"></script>
      <script type="text/javascript" src="<?php echo site_url('assets/web/js/jquery.cycle.all.js');?>"></script>
      <script type="text/javascript" src="<?php echo site_url('assets/web/js/jquery.selectBox.js');?>"></script>
      <script type="text/JavaScript" src="<?php echo site_url('assets/web/js/cloud-zoom.1.0.2.js');?>"></script>
      <script type="text/JavaScript" src="<?php echo site_url('assets/web/js/cuties.js') . '?v=' . uniqid('js.',true);?>"></script>
      <script src="https://cdn.rawgit.com/johnboker/jquery.blink/944ae640/jquery.blink.js"></script>

      <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
      <![endif]-->
      <style>
         .sub_menu ul li{
           list-style-type: none;  text-transform: uppercase;
           font-size: 18px; letter-spacing: 1px;
           font-weight: normal;  margin: 0px 0px 0px 0px;
         }
      </style>
   </head>
   <body>
      <div id="container">
         <div id="header">
            <div id="logo"><a href="<?php echo site_url()?>"><img src="<?php echo site_url('assets/web/image/logo.png');?>" title="Things for Cuties" alt="Things for Cuties"></a></div>
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
                     <div class="checkout"><a class="button mr" href="<?php echo site_url('keranjang-belanja')?>">Lihat keranjang</a><a class="button" href="<?php echo site_url('konfirmasi-pemesanan')?>">Konfirmasi Pemesanan</a></div>
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
                     <a href="<?php echo site_url('konfirmasi-pemesanan')?>">Konfirmasi Pemesanan</a>
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
               <!-- <li class="menu_item down">
                  <a href="category.html">Clothes For Girls</a>
                  <div class="sub_menu" style="">
                     <div class="bubble"></div>
                     <div class="sub_menu_block" style="width:326px">
                        <ul>
                           <li><a href="category.html">Retrorsum</a></li>
                           <li><a href="category.html">Suos</a></li>
                           <li><a href="category.html">Eam</a></li>
                           <li><a href="category.html">Famulus</a></li>
                           <li><a href="category.html">Participat</a></li>
                           <li><a href="category.html">Indulgentia</a></li>
                           <li><a href="category.html">Dianae</a></li>
                           <li><a href="category.html">Scitote</a></li>
                           <li><a href="category.html">Nunc</a></li>
                           <li><a href="category.html">Lugens</a></li>
                        </ul>
                        <ul>
                           <li><a href="category.html">Retrorsum</a></li>
                           <li><a href="category.html">Suos</a></li>
                           <li><a href="category.html">Eam</a></li>
                           <li><a href="category.html">Famulus</a></li>
                           <li><a href="category.html">Participat</a></li>
                           <li><a href="category.html">Indulgentia</a></li>
                           <li><a href="category.html">Dianae</a></li>
                           <li><a href="category.html">Scitote</a></li>
                           <li><a href="category.html">Nunc</a></li>
                           <li><a href="category.html">Lugens</a></li>
                        </ul>
                     </div>
                  </div>
               </li>
               <li class="menu_item down"><a href="category.html">Clothes For Boys</a> </li>
               <li class="menu_item down">
                  <a href="category.html">Toys</a>
                  <div class="sub_menu" style="">
                     <div class="bubble"></div>
                     <div class="sub_menu_block" style="width:163px">
                        <ul>
                           <li><a href="category.html">Participat</a></li>
                           <li><a href="category.html">Scitote</a></li>
                        </ul>
                     </div>
                  </div>
               </li>
               <li class="menu_item down">
                  <a href="category.html">Safety</a>
                  <div class="sub_menu" style="">
                     <div class="bubble"></div>
                     <div class="sub_menu_block" style="width:163px">
                        <ul>
                           <li><a href="category.html">Scitote</a></li>
                           <li><a href="category.html">Participat</a></li>
                        </ul>
                     </div>
                  </div>
               </li>
               <li class="menu_item down">
                  <a href="category.html">Furniture</a>
                  <div class="sub_menu" style="">
                     <div class="bubble"></div>
                     <div class="sub_menu_block" style="width:163px">
                        <ul>
                           <li><a href="category.html">Participat</a></li>
                           <li><a href="category.html">Scitote</a></li>
                           <li><a href="category.html">Scitote</a></li>
                           <li><a href="category.html">WScitote</a></li>
                        </ul>
                     </div>
                  </div>
               </li>
               <li class="menu_item down"><a href="category.html">Prams</a> </li>
               <li class="menu_item down"><a href="category.html">At Home</a> </li> -->
               <!-- <li class="last_item menu_item down"><a href="category.html">Child Seats</a> </li> -->
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
         <div id="footer_top">
            <div class="footer_wrapper">
               <div id="footer_top_content">
                  <div id="footer_top_item">
                     <div class="footer_top_item" id="about_us">
                        <h3 class="title_item_1 down"><a href="about.html">About us</a></h3>
                        <p class="text_item content_item_1 about"> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean interdum tellus ac velit faucibus feugiat. Donec dignissim, eros elementum porttitor tempor, massa ligula cursus libero, vel ullamcorper dui ipsum id magna. Pellentesque adipiscing euismod mauris id pharetra. </p>
                        <p class="text_item content_item_1 about">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean interdum tellus ac velit faucibus feugiat. Donec dignissim, eros elementum porttitor tempor, massa ligula cursus libero, vel ullamcorper dui ipsum id magna.</p>
                     </div>
                     <div class="footer_top_item" id="contact_us">
                        <h3 class="title_item_2 down"><a href="contact.html">Contact us</a></h3>
                        <div class="text_item">
                           <p class="info_contact"> <span>Things for Cuties<br>
                              John Doodely Doe
                              <br>
                              only the best childish products
                              <br>
                              John Doe Street 123<br>
                              1112345 Berlin<br>
                              Germany
                              </span>
                           </p>
                           <p class="online_contact"> <span class="phone">012 - 34 456 778</span> <span class="phone">012 - 345 67 89</span> <span class="fax">012 - 345 67 890</span> <span class="mail"><a class="color" href="mailto:contact@thingsforcuties.doe" title="Mail">contact@thingsforcuties.doe</a></span> </p>
                        </div>
                     </div>
                     <!-- <div class="footer_top_item " id="twitter_news">
                        <h3 class="title_item_3 down" ><a href="http://www.twitter.com/Mouseevent">Twitter Feed</a></h3>
                        <div class="text_item content_item_3">
                           <div id="twitter_update_list">
                              <a class="twitter-timeline"  width="232" height="250" data-chrome="nofooter noheader transparent noscrollbar" data-tweet-limit="2" href="https://twitter.com/Mouseevent"  data-widget-id="346591733494202368"></a>
                              <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
                           </div>
                        </div>
                     </div> -->
                     <!-- <div class="footer_top_item last_footer_item" id="facebook">
                        <h3 class="title_item_4 down"><a href="https://www.facebook.com/mouseevent.berlin.brandenburg">Facebook</a></h3>
                        <div class="text_item content_item_4">
                           <div id="fb-root"></div>
                           <script>(function(d, s, id) {
                              var js, fjs = d.getElementsByTagName(s)[0];
                              if (d.getElementById(id)) return;
                              js = d.createElement(s); js.id = id;
                              js.src = "//connect.facebook.net/de_DE/all.js#xfbml=1&appId=371189259657718";
                              fjs.parentNode.insertBefore(js, fjs);
                              }(document, 'script', 'facebook-jssdk'));
                           </script>
                           <div class="fb-like-box" data-href="https://www.facebook.com/mouseevent.berlin.brandenburg" data-width="220" data-height="250" data-show-faces="true" data-stream="false" data-show-border="false" data-header="false"></div>
                        </div>
                     </div> -->
                     <div class="clear"></div>
                  </div>
               </div>
            </div>
         </div>
         <div class="footer_wrapper">
            <div id="footer_bottom">
               <div class="footer_bottom_item">
                  <h3 class="bottom_item_1 down"><a>Information</a></h3>
                  <ul class="menu_footer_item text_item">
                     <li><a href="<?php echo site_url('web/tentang-kami')?>" title="About Us">Tentang Kami</a></li>
                     <li><a href="<?php echo site_url('web/blog')?>" title="Blog">Blog</a></li>
                     <li><a href="comparison.html" title="Privacy Policy">Compare List</a></li>
                     <li><a href="#" title="Terms &amp; Conditions">Terms &amp; Conditions</a></li>
                  </ul>
               </div>
               <div class="footer_bottom_item">
                  <h3 class="bottom_item_2 down"><a>Customer Service</a></h3>
                  <ul class="menu_footer_item text_item">
                     <li><a href="contact.html">Contact Us</a></li>
                     <li><a href="#">Returns</a></li>
                     <li><a href="#">Site Map</a></li>
                  </ul>
               </div>
               <div class="footer_bottom_item">
                  <h3 class="bottom_item_3 down"><a>Extras</a></h3>
                  <ul class="menu_footer_item text_item">
                     <li><a href="brands.html">Brands</a></li>
                     <li><a href="gifts.html">Gift Vouchers</a></li>
                     <li><a href="#">Affiliates</a></li>
                     <li><a href="specials.html">Specials</a></li>
                  </ul>
               </div>
               <div class="footer_bottom_item">
                  <h3 class="bottom_item_4 down"><a>My Account</a></h3>
                  <ul class="menu_footer_item text_item">
                     <li><a href="myaccount.html">My Account</a></li>
                     <li><a href="orderhistory.html">Order History</a></li>
                     <li><a href="wishlist.html">Wish List</a></li>
                     <li><a href="#">Newsletter</a></li>
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
                        <li><a href="#">Returns</a></li>
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
                        <li><a href="myaccount.html">My Account</a></li>
                        <li><a href="orderhistory.html">Order History</a></li>
                        <li><a href="wishlist.html">Wish List</a></li>
                        <li><a href="#">Newsletter</a></li>
                     </ul>
                  </div>
               </div>
            </div>
         </div>
         <div id="footer-text">
            <p>Things for Cuties © 2013 - Template by <a href="http://themeforest.net/user/ssievert?ref=ssievert">ssievert</a></p>
         </div>
      </div>
      <script type="text/javascript">
        $('.error').blink(100);
      </script>
   </body>
</html>
