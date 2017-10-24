<style>
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
<div id="column-left">
   <div class="box">
      <div class="box-heading">Categories</div>
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
   <!-- <div class="box">
      <div>
         <h1 class="title_module"><span>Featured</span></h1>
         <div class="box-content">
            <div class="box-product">
               <a class="image" href="product.html" title="View more"> <img src="image/ex/pro-1.png" alt=""> </a>
               <h3 class="name"><a href="product.html" title="">Lorem ipsum dolor sit</a></h3>
               <p class="wrap_price"> <span class="price">$589.50</span> </p>
               <p class="submit">
                  <input type="button" value="Add to Cart" class="button">
               </p>
            </div>
            <div class="box-product">
               <a class="image" href="product.html" title="View more"> <img src="image/ex/pro-2.png" alt=""> </a>
               <h3 class="name"><a href="product.html" title="">Lorem ipsum dolor sit</a></h3>
               <p class="wrap_price"> <span class="price">$120.68</span> </p>
               <p class="submit">
                  <input type="button" value="Add to Cart" class="button">
               </p>
            </div>
            <div class="box-product">
               <a class="image" href="product.html" title="View more"> <img src="image/ex/pro-3.png" alt=""> </a>
               <h3 class="name"><a href="product.html" title="">Lorem ipsum dolor sit</a></h3>
               <p class="wrap_price"> <span class="price-old">$119.50</span> <span class="price-new">$107.75</span> </p>
               <p class="submit">
                  <input type="button" value="Add to Cart" class="button">
               </p>
            </div>
            <div class="box-product">
               <a class="image" href="product.html" title="View more"> <img src="image/ex/pro-4.png" alt=""> </a>
               <h3 class="name"><a href="product.html" title="">Lorem ipsum dolor sit</a></h3>
               <p class="wrap_price"> <span class="price">$236.99</span> </p>
               <p class="submit">
                  <input type="button" value="Add to Cart" class="button">
               </p>
            </div>
            <div class="box-product last-item">
               <a class="image" href="product.html" title="View more"> <img src="image/ex/pro-5.png" alt=""> </a>
               <h3 class="name"><a href="product.html" title="">Lorem ipsum dolor sit</a></h3>
               <p class="wrap_price"> <span class="price">$1,177.00</span> </p>
               <p class="submit">
                  <input type="button" value="Add to Cart" class="button">
               </p>
            </div>
         </div>
      </div>
   </div> -->
   <!-- <div class="clear"></div> -->
   <!-- <div class="box">
      <div>
         <h1 class="title_module"><span>Specials</span></h1>
         <div class="box-content">
            <div class="box-product">
               <a class="image" href="product.html" title="View more"> <img src="image/ex/pro-1.png" alt=""> </a>
               <h3 class="name"><a href="product.html" title="">Lorem ipsum dolor sit</a></h3>
               <p class="wrap_price"> <span class="price">$589.50</span> </p>
               <p class="submit">
                  <input type="button" value="Add to Cart" class="button">
               </p>
            </div>
            <div class="box-product">
               <a class="image" href="product.html" title="View more"> <img src="image/ex/pro-2.png" alt=""> </a>
               <h3 class="name"><a href="product.html" title="">Lorem ipsum dolor sit</a></h3>
               <p class="wrap_price"> <span class="price">$120.68</span> </p>
               <p class="submit">
                  <input type="button" value="Add to Cart" class="button">
               </p>
            </div>
            <div class="box-product">
               <a class="image" href="product.html" title="View more"> <img src="image/ex/pro-3.png" alt=""> </a>
               <h3 class="name"><a href="product.html" title="">Lorem ipsum dolor sit</a></h3>
               <p class="wrap_price"> <span class="price-old">$119.50</span> <span class="price-new">$107.75</span> </p>
               <p class="submit">
                  <input type="button" value="Add to Cart" class="button">
               </p>
            </div>
            <div class="box-product">
               <a class="image" href="product.html" title="View more"> <img src="image/ex/pro-4.png" alt=""> </a>
               <h3 class="name"><a href="product.html" title="">Lorem ipsum dolor sit</a></h3>
               <p class="wrap_price"> <span class="price">$236.99</span> </p>
               <p class="submit">
                  <input type="button" value="Add to Cart" class="button">
               </p>
            </div>
            <div class="box-product last-item">
               <a class="image" href="product.html" title="View more"> <img src="image/ex/pro-5.png" alt=""> </a>
               <h3 class="name"><a href="product.html" title="">Lorem ipsum dolor sit</a></h3>
               <p class="wrap_price"> <span class="price">$1,177.00</span> </p>
               <p class="submit">
                  <input type="button" value="Add to Cart" class="button">
               </p>
            </div>
         </div>
      </div>
   </div> -->
   <!-- <div class="clear"></div> -->
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
                  <input type="button" value="Add to Cart" class="button">
               </p>
            </div>
            <?php } ?>
            
            
            <!-- <div class="box-product">
               <a class="image" href="product.html" title="View more"> <img src="image/ex/pro-2.png" alt=""> </a>
               <h3 class="name"><a href="product.html" title="">Lorem ipsum dolor sit</a></h3>
               <p class="wrap_price"> <span class="price">$120.68</span> </p>
               <p class="submit">
                  <input type="button" value="Add to Cart" class="button">
               </p>
            </div>
            
            <div class="box-product">
               <a class="image" href="product.html" title="View more"> <img src="image/ex/pro-4.png" alt=""> </a>
               <h3 class="name"><a href="product.html" title="">Lorem ipsum dolor sit</a></h3>
               <p class="wrap_price"> <span class="price">$236.99</span> </p>
               <p class="submit">
                  <input type="button" value="Add to Cart" class="button">
               </p>
            </div>
            <div class="box-product last-item">
               <a class="image" href="product.html" title="View more"> <img src="image/ex/pro-5.png" alt=""> </a>
               <h3 class="name"><a href="product.html" title="">Lorem ipsum dolor sit</a></h3>
               <p class="wrap_price"> <span class="price">$1,177.00</span> </p>
               <p class="submit">
                  <input type="button" value="Add to Cart" class="button">
               </p>
            </div> -->
         </div>
      </div>
   </div>
   <div class="clear"></div>
</div>
<div id="content">
   <div class="breadcrumb"> &nbsp;<a href="<?php echo site_url()?>">Home&nbsp;</a> » &nbsp;Beli&nbsp;<a href="#"><?php echo $kategori_detail['nama']?>&nbsp;</a> </div>
   <h1><span class="h1-top">Beli&nbsp;<?php echo $kategori_detail['nama']?></span></h1>
   <div class="category-info">
      <?php echo $kategori_detail['keterangan']?>
   </div>
   <div class="product-filter">
      <div class="display">
         <label>Display:</label>
         <p><span id="list" class="list_on"></span> <span id="grid" onclick="display('grid');"></span></p>
      </div>
      <div class="sort">
         <label>Sort By:</label>
         <select class="selectBox">
            <option value="1" selected="selected">Default</option>
            <option value="2">Name (A - Z)</option>
            <option value="3">Name (Z - A)</option>
            <option value="4">Price (Low &gt; High)</option>
            <option value="5">Price (High &gt; Low)</option>
            <!-- <option value="6">Rating (Highest)</option> -->
            <!-- <option value="7">Rating (Lowest)</option> -->
            <!-- <option value="8">Model (A - Z)</option> -->
            <!-- <option value="9">Model (Z - A)</option> -->
         </select>
      </div>
      <div class="limit">
         <label>Show:</label>
         <select class="selectBox">
            <option value="1" selected="selected">15</option>
            <option value="2">25</option>
            <option value="3">50</option>
            <option value="4">75</option>
            <option value="5">100</option>
         </select>
      </div>
   </div>
   <div class="product-compare"><a href="#" id="compare-total">Product Compare (0)</a></div>
   <div class="product-list">
      <!-- <div class="box-product">
         <span class="new">Sale</span> <a class="image" href="product.html" title="View more"> <img src="image/ex/p1-small.jpg" alt=""> <span class="new2">Sale</span> </a>
         <div class="list_grid_right">
            <h3 class="name"><a href="product.html" title="">Brown Shoes for Boys</a></h3>
            <p class="wrap_price"> <span class="price-old">$119.50</span> <span class="price-new">$60.75</span> <span class="price-tax">Ex Tax: $50.00</span> </p>
            <p class="description">Tudium lectorum. Mirum est notare quam littera gothica, quam nunc putamus parum claram, anteposuerit litterarum formas humanitatis per seacula quarta decima et quinta decima. Eodem modo typi, qui nunc nobis videntur parum clari, fiant sollemnes in futurum. Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy.</p>
            <p class="submit">
               <input type="button" value="Add to Cart" class="button">
            </p>
            <p class="links_add"> <a>Add to Wish List</a> <a>Add to Compare</a> </p>
         </div>
      </div> -->
      <?php foreach ($produk->result_array() as $prod) { ?>
        <div class="box-product">
           <a class="image" href="<?php echo site_url($prod['kategori_slug'] . '/' . $prod['slug'])?>" title="View more"> <img src="<?php echo load_image('uploads/gambar_produk/' . $prod['gambar'],184,184,1,0)?>" alt=""></a>
           <div class="list_grid_right">
              <h3 class="name"><a href="<?php echo site_url($prod['kategori_slug'] . '/' . $prod['slug'])?>" title=""><?php echo $prod['nama']?></a></h3>
              <p class="wrap_price"> <span class="price"><?php echo format_rupiah($prod['harga'])?></span> <!--<span class="price-tax">Ex Tax: $100.00</span>--> </p>
              <p class="description"><?php echo limit_text($prod['deskripsi'],400)?></p>
              <p class="submit">
                 <input type="button" value="Add to Cart" class="button">
              </p>
              <p class="links_add"> <a>Add to Wish List</a> <a>Add to Compare</a> </p>
           </div>
        </div>
      <?php } ?>

      <!-- <div class="box-product">
         <a class="image" href="product.html" title="View more"> <img src="image/ex/p3-small.jpg" alt=""></a>
         <div class="list_grid_right">
            <h3 class="name"><a href="product.html" title="">Brown Shoes for Boys</a></h3>
            <p class="wrap_price"> <span class="price">$119.50</span> <span class="price-tax">Ex Tax: $100.00</span> </p>
            <p class="description">Tudium lectorum. Mirum est notare quam littera gothica, quam nunc putamus parum claram, anteposuerit litterarum formas humanitatis per seacula quarta decima et quinta decima. Eodem modo typi, qui nunc nobis videntur parum clari, fiant sollemnes in futurum. Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy.</p>
            <p class="submit">
               <input type="button" value="Add to Cart" class="button">
            </p>
            <p class="links_add"> <a>Add to Wish List</a> <a>Add to Compare</a> </p>
         </div>
      </div> -->
      <!-- <div class="box-product last-item row-first">
         <a class="image" href="product.html" title="View more"> <img src="image/ex/p4-small.jpg" alt=""></a>
         <div class="list_grid_right">
            <h3 class="name"><a href="product.html" title="">Brown Shoes for Boys</a></h3>
            <p class="wrap_price"> <span class="price">$119.50</span> <span class="price-tax">Ex Tax: $100.00</span> </p>
            <p class="description">Tudium lectorum. Mirum est notare quam littera gothica, quam nunc putamus parum claram, anteposuerit litterarum formas humanitatis per seacula quarta decima et quinta decima. Eodem modo typi, qui nunc nobis videntur parum clari, fiant sollemnes in futurum. Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy.</p>
            <p class="submit">
               <input type="button" value="Add to Cart" class="button">
            </p>
            <p class="links_add"> <a>Add to Wish List</a> <a>Add to Compare</a> </p>
         </div>
      </div> -->
   </div>
   <div class="pagination">
      <div class="results"><?php echo $this->pagination->create_links();?></div>
   </div>
</div>
