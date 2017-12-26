<div id="column-right">
<div class="box">
      <div class="box-heading">Kategori</div>
      <div class="box-content">
        <ul>
          <?php foreach ($blog_kategori->result_array() as $bk) { ?>
          <li><a href="<?php echo site_url('web/blog-kategori/' . $bk['slug'])?>"><?php echo ucwords($bk['nama']) ?></a></li>
          <?php } ?>
          
          <!-- <li><a href="#">Ipsum</a></li>
          <li><a href="#">Dolor Sit</a></li>
          <li><a href="#">Amet Lorem</a></li>
          <li><a href="#">Ipsum Dolor</a></li>
          <li class="last-item"><a href="#">Sit Amet</a></li> -->
        </ul>
      </div>
    </div>
    <div class="box">
      <div class="box-heading">Archive</div>
      <div class="box-content archive">
        <ul>
          <?php foreach ($blog_tahunsekarang->result_array() as $blog_sekarang) { ?>
          <li> <a href="<?php echo site_url('web/blog-archive/' . strtolower($blog_sekarang['bulan']) . '.'.  DATE('Y'))?>"><?php echo $blog_sekarang['bulan'] ?> <span>(<?php echo $blog_sekarang['jml_artikel']?>)</span> </a> </li>
          <?php } ?>
          
          <?php foreach ($blog_tahunsebelumnya->result_array() as $blog_sebelumnya) { ?>
          <li> <a href="<?php echo site_url('web/blog-archive/' . strtolower($blog_sebelumnya['tahun']) )?>"><?php echo $blog_sebelumnya['tahun'] ?> <span>(<?php echo $blog_sebelumnya['jml_artikel']?>)</span> </a> </li>
          <?php } ?>
          


         <!--  <li> <a href="blog.html">August <span>(14)</span> </a> </li>
          <li> <a href="blog.html">July <span>(22)</span> </a> </li>
          <li> <a href="blog.html">June <span>(9)</span> </a> </li>
          <li> <a href="blog.html">May <span>(15)</span> </a> </li> -->
          <!-- <li class="last-item"> <a href="blog.html">April <span>(10)</span> </a> </li> -->
        </ul>
      </div>
    </div>
    <div class="box">
      <div>
        <h1 class="title_module"><span>Artikel Populer</span></h1>
        <div class="box-content popular">
          <?php foreach ($populer_blog->result_array() as $pop_blog) { ?>
          <div class="box-product"> <a class="image" href="<?php echo site_url('web/baca-blog/' . $pop_blog['slug'])?>" title="View more"> <img src="<?php echo load_image('uploads/blogs/' . $pop_blog['gambar'],55,47,0,1)?>" alt=""> </a>
            <h3 class="name"><a href="<?php echo site_url('web/baca-blog/' . $pop_blog['slug'])?>" title=""><?php echo limit_text($pop_blog['judul'],20)?></a></h3>
            <p class="wrap_price"> <span><?php echo tgl_panjang($pop_blog['dibuat'])?></span> </p>
          </div>
          <?php } ?>          
        </div>
      </div>
    </div>
    <div class="clear"></div>
  </div>
  
  
  <div id="content">
    <div class="breadcrumb"> <a href="<?php echo site_url()?>">Home</a> » <a href="#">Blog</a></div>
    <h1><span class="h1-top">Artikel Blog</span></h1>
    <div class="information_content">
      <?php foreach ($artikels->result_array() as $artikel) { ?>
      <div class="post_item">
        <h2><a href="<?php echo site_url('web/baca-blog/' . $artikel['slug'])?>" style="font-size: 20px;" ><?php echo $artikel['judul']?></a></h2>
        <p class="post_info">Ditulis oleh <a href="#">admin</a> pada <?php echo tgl_panjang($artikel['dibuat'])?></p>
        <div class="imageborder"><a href="blog-details.html"><img alt="About" src="<?php echo load_image('uploads/blogs/' . $artikel['gambar'],674,213,0,1)?>"></a></div>
        <p class="short_content"> <?php echo limit_text($artikel['konten'],300)?></p>
        <p class="short_content"><a href="<?php echo site_url('web/baca-blog/' . $artikel['slug'])?>" title="Read more...">read more...</a> </p>
      </div>
      <?php } ?>
      
      
    </div>
     <div class="pagination">
      <div class="results"><?php echo $this->pagination->create_links();?></div>
     </div>
  </div>
</div>