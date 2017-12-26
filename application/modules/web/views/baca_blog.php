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
    <div class="breadcrumb"> <a href="<?php echo site_url()?>">Beranda</a> » <a href="<?php echo site_url('web/blog')?>">Blog</a> » <a href="#">Lorem Ipsum Dolor Sit Amet Consectetur Adipiscing Elit</a></div>
    <h1><span class="h1-top">Baca Blog</span></h1>
    <div class="information_content">
      <div class="post_item">
        <h2><?php echo $blog_konten['judul']?></h2>
        <p class="post_info">Ditulis oleh <a href="#">admin</a> pada <?php echo tgl_panjang($blog_konten['dibuat'])?></p>
        <div class="imageborder"><a href="blog-details.html"><img alt="About" src="<?php echo load_image('uploads/blogs/' . $blog_konten['gambar'],674,300,0,1)?>"></a></div>
        <?php echo $blog_konten['konten'];?>
        <div class="links-share"> <span>Share it:</span>
          <ul>
            <li><a class="twitter" href="#tw">&nbsp;</a></li>
            <li><a class="facebook" href="#tw">&nbsp;</a></li>
            <li><a class="addshare" href="#tw">&nbsp;</a></li>
            <li><a class="mails" href="#tw">&nbsp;</a></li>
          </ul>
        </div>
      </div>
      <div class="clear"></div>
      <!-- <div class="post_item commentsblock">
        <h2>Comments (2)</h2>
        <ul class="comments">
          <li class="comment">
            <div class="avatar">
              <div class="img"></div>
            </div>
            <div class="comment_content">
              <div class="comment_item">
                <h3 class="name">Little Baby Boy</h3>
                <span class="time">June 10, 2012</span>
                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.</p>
              </div>
              <div class="reply_comment">
                <div class="avatar">
                  <div class="img"></div>
                </div>
                <div class="comment_item">
                  <h3 class="name">Little Baby Boy</h3>
                  <span class="time">June 10, 2012</span>
                  <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.</p>
                </div>
              </div>
            </div>
          </li>
          <li class="comment">
            <div class="avatar">
              <div class="img"></div>
            </div>
            <div class="comment_content">
              <div class="comment_item">
                <h3 class="name">Little Baby Boy</h3>
                <span class="time">June 10, 2012</span>
                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.</p>
              </div>
            </div>
          </li>
        </ul>
      </div> -->
<!--       <h2>Your Comment</h2>
      <div class="one-two"> <span class="small">Name (required):</span><br>
        <input type="text" name="name" value="" style="width:314px">
      </div>
      <div class="two-two"> <span class="small">E-Mail Address (required):</span><br>
        <input type="text" name="email" value="" style="width:314px">
      </div>
      <div> <span class="small">Your Comment:</span><br>
        <textarea name="enquiry" cols="40" rows="10" style="width: 98%;"></textarea>
      </div>
      <div class="buttons">
        <div class="right">
          <input type="submit" value="Submit" class="button">
        </div>
      </div> -->
    </div>
  </div>
</div>
