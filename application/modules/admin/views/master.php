<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="robots" content="noindex, nofollow">
      <title>ADMIN | Ecommerce</title>
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
      <style>
      h1.page-header{margin-top:-5px}.sidebar{padding-left:0}.main-container{background:#FFF;padding-top:15px;margin-top:-20px}.footer{width:100%}:focus{outline:0}.side-menu{position:relative;width:100%;height:100%;background-color:#f8f8f8;border-right:1px solid #e7e7e7}.side-menu .navbar{border:0}.side-menu .navbar-header{width:100%;border-bottom:1px solid #e7e7e7}.side-menu .navbar-nav .active a{background-color:transparent;margin-right:-1px;border-right:5px solid #e7e7e7}.side-menu .navbar-nav li{display:block;width:100%;border-bottom:1px solid #e7e7e7}.side-menu .navbar-nav li a{padding:15px}.side-menu .navbar-nav li a .glyphicon{padding-right:10px}.side-menu #dropdown{border:0;margin-bottom:0;border-radius:0;background-color:transparent;box-shadow:none}.side-menu #dropdown .caret{float:right;margin:9px 5px 0}.side-menu #dropdown .indicator{float:right}.side-menu #dropdown>a{border-bottom:1px solid #e7e7e7}.side-menu #dropdown .panel-body{padding:0;background-color:#f3f3f3}.side-menu #dropdown .panel-body .navbar-nav{width:100%}.side-menu #dropdown .panel-body .navbar-nav li{padding-left:15px;border-bottom:1px solid #e7e7e7}.side-menu #dropdown .panel-body .navbar-nav li:last-child{border-bottom:0}.side-menu #dropdown .panel-body .panel>a{margin-left:-20px;padding-left:35px}.side-menu #dropdown .panel-body .panel-body{margin-left:-15px}.side-menu #dropdown .panel-body .panel-body li{padding-left:30px}.side-menu #dropdown .panel-body .panel-body li:last-child{border-bottom:1px solid #e7e7e7}.side-menu #search-trigger{background-color:#f3f3f3;border:0;border-radius:0;position:absolute;top:0;right:0;padding:15px 18px}.side-menu .brand-name-wrapper{min-height:50px}.side-menu .brand-name-wrapper .navbar-brand{display:block}.side-menu #search{position:relative;z-index:1000}.side-menu #search .panel-body{padding:0}.side-menu #search .panel-body .navbar-form{padding:0;padding-right:50px;width:100%;margin:0;position:relative;border-top:1px solid #e7e7e7}.side-menu #search .panel-body .navbar-form .form-group{width:100%;position:relative}.side-menu #search .panel-body .navbar-form input{border:0;border-radius:0;box-shadow:none;width:100%;height:50px}.side-menu #search .panel-body .navbar-form .btn{position:absolute;right:0;top:0;border:0;border-radius:0;background-color:#f3f3f3;padding:15px 18px}.side-body{margin-left:310px}@media(max-width:768px){.side-menu{position:relative;width:100%;height:0;border-right:0}.side-menu .navbar{z-index:999;position:relative;height:0;min-height:0;background-color:none!important;border-color:none!important}.side-menu .brand-name-wrapper .navbar-brand{display:inline-block}@-moz-keyframes slidein{0%{left:-300px}100%{left:10px}}@-webkit-keyframes slidein{0%{left:-300px}100%{left:10px}}@keyframes slidein{0%{left:-300px}100%{left:10px}}@-moz-keyframes slideout{0%{left:0}100%{left:-300px}}@-webkit-keyframes slideout{0%{left:0}100%{left:-300px}}@keyframes slideout{0%{left:0}100%{left:-300px}}.side-menu-container>.navbar-nav.slide-in{-moz-animation:slidein 300ms forwards;-o-animation:slidein 300ms forwards;-webkit-animation:slidein 300ms forwards;animation:slidein 300ms forwards;-webkit-transform-style:preserve-3d;transform-style:preserve-3d}.side-menu-container>.navbar-nav{position:fixed;left:-300px;width:300px;top:43px;height:100%;border-right:1px solid #e7e7e7;background-color:#f8f8f8;overflow:auto;-moz-animation:slideout 300ms forwards;-o-animation:slideout 300ms forwards;-webkit-animation:slideout 300ms forwards;animation:slideout 300ms forwards;-webkit-transform-style:preserve-3d;transform-style:preserve-3d}@-moz-keyframes bodyslidein{0%{left:0}100%{left:300px}}@-webkit-keyframes bodyslidein{0%{left:0}100%{left:300px}}@keyframes bodyslidein{0%{left:0}100%{left:300px}}@-moz-keyframes bodyslideout{0%{left:300px}100%{left:0}}@-webkit-keyframes bodyslideout{0%{left:300px}100%{left:0}}@keyframes bodyslideout{0%{left:300px}100%{left:0}}.side-body{margin-left:5px;margin-top:70px;position:relative;-moz-animation:bodyslideout 300ms forwards;-o-animation:bodyslideout 300ms forwards;-webkit-animation:bodyslideout 300ms forwards;animation:bodyslideout 300ms forwards;-webkit-transform-style:preserve-3d;transform-style:preserve-3d}.body-slide-in{-moz-animation:bodyslidein 300ms forwards;-o-animation:bodyslidein 300ms forwards;-webkit-animation:bodyslidein 300ms forwards;animation:bodyslidein 300ms forwards;-webkit-transform-style:preserve-3d;transform-style:preserve-3d}.navbar-toggle-sidebar{border:0;float:left;padding:18px;margin:0;border-radius:0;background-color:#f3f3f3}#search .panel-body .navbar-form{border-bottom:0}#search .panel-body .navbar-form .form-group{margin:0}.side-menu .navbar-header{position:fixed;z-index:3;background-color:#f8f8f8}#dropdown .panel-body .navbar-nav{margin:0}}

      </style>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css" />
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/pace/1.0.2/themes/red/pace-theme-flash.css" />
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" />

      <?php
        if(isset($css_files)){
          foreach($css_files as $file): ?>
            <link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
          <?php endforeach;
        }else{ ?>
          <link href="https://cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css" rel="stylesheet" >
          <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
      <?php }; ?>

      <?php
        if(isset($js_files)){
          foreach($js_files as $file): ?>
            <script src="<?php echo $file; ?>"></script>
          <?php endforeach;
        }else{ ?>
          <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js"></script>
          <script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
          <!-- <script src="https://cdn.datatables.net/1.10.15/js/dataTables.bootstrap.min.js"></script> -->
          <script src="//cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>
      <?php }; ?>

      <!-- <script src="//code.jquery.com/jquery-1.10.2.min.js"></script> -->
      <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/Cookies.js/0.3.1/cookies.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/pace/1.0.2/pace.min.js"></script>
      <script src="<?php echo site_url('assets/manage/js/base64.js')?>"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.blockUI/2.70/jquery.blockUI.js"></script>

      <script type="text/javascript">
         $(document).ready(function(){
          <?php echo @$grocery_btn?>
         });
      </script>
   </head>
   <body>
      <nav class="navbar navbar-default navbar-static-top">
         <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
               <button type="button" class="navbar-toggle navbar-toggle-sidebar collapsed">
               MENU
               </button>
               <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
               <span class="sr-only">Toggle navigation</span>
               <span class="icon-bar"></span>
               <span class="icon-bar"></span>
               <span class="icon-bar"></span>
               </button>
               <a class="navbar-brand" href="#">
               Administrator
               </a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
               <!-- <form class="navbar-form navbar-left" method="GET" role="search">
                  <div class="form-group">
                     <input type="text" name="q" class="form-control" placeholder="Search">
                  </div>
                  <button type="submit" class="btn btn-default"><i class="glyphicon glyphicon-search"></i></button>
               </form> -->
               <ul class="nav navbar-nav navbar-right">
                  <!-- <li><a href="http://www.pingpong-labs.com" target="_blank">Visit Site</a></li> -->
                  <li class="dropdown ">
                     <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                     <?php echo strtoupper($this->session->userdata('user_username'))?>
                     <span class="caret"></span></a>
                     <ul class="dropdown-menu" role="menu">
                        <!-- <li class="dropdown-header">SETTINGS</li>
                        <li class=""><a href="#">Other Link</a></li>
                        <li class=""><a href="#">Other Link</a></li>
                        <li class=""><a href="#">Other Link</a></li>
                        <li class="divider"></li> -->
                        <li><a href="<?php echo site_url('admin/ganti-password')?>">Ganti Password</a></li>
                        <li><a href="<?php echo site_url('signout')?>">Logout</a></li>
                     </ul>
                  </li>
               </ul>
            </div>
            <!-- /.navbar-collapse -->
         </div>
         <!-- /.container-fluid -->
      </nav>
      <div class="container-fluid main-container">
         <div class="col-md-2 sidebar">
            <div class="row">
               <!-- uncomment code for absolute positioning tweek see top comment in css -->
               <div class="absolute-wrapper"> </div>
               <!-- Menu -->
               <div class="side-menu">
                  <nav class="navbar navbar-default" role="navigation">
                     <!-- Main Menu -->
                     <div class="side-menu-container">
                        <ul class="nav navbar-nav main-menu">
                           <li class="active"><a href="<?php echo site_url('admin/index')?>"><span class="glyphicon glyphicon-dashboard"></span> Dashboard</a></li>
                           <li><a href="<?php echo site_url('admin/kategori')?>"><span class="glyphicon glyphicon-list-alt"></span> Kategori</a></li>
                           <li><a href="<?php echo site_url('admin/produk')?>"><span class="glyphicon glyphicon-list-alt"></span> Produk</a></li>
                           <li><a href="<?php echo site_url('admin/kotak-kado')?>"><span class="glyphicon glyphicon-list-alt"></span> Kotak Kado</a></li>
                           <li><a href="<?php echo site_url('admin/member')?>"><span class="glyphicon glyphicon-list-alt"></span> Member</a></li>
                           <li><a href="<?php echo site_url('admin/penjualan')?>"><span class="glyphicon glyphicon-list-alt"></span> Penjualan</a></li>
                           <li><a href="<?php echo site_url('admin/stok-opname')?>"><span class="glyphicon glyphicon-list-alt"></span> Stok Opname</a></li>
                           <li><a href="<?php echo site_url('admin/settings')?>"><span class="glyphicon glyphicon-list-alt"></span> Web Setting</a></li>
                           <!-- <li><a href="<?php echo site_url('admin/user')?>"><span class="glyphicon glyphicon-list-alt"></span> Web User</a></li> -->

                           <!-- <li class="panel panel-default" id="dropdown">
                              <a data-toggle="collapse" href="#dropdown-lvl1">
                              <span class="glyphicon glyphicon-user"></span> Sub Level <span class="caret"></span>
                              </a>

                              <div id="dropdown-lvl1" class="panel-collapse collapse">
                                 <div class="panel-body">
                                    <ul class="nav navbar-nav">
                                       <li><a href="#">Link</a></li>
                                       <li><a href="#">Link</a></li>
                                       <li><a href="#">Link</a></li>

                                       <li class="panel panel-default" id="dropdown">
                                          <a data-toggle="collapse" href="#dropdown-lvl2">
                                          <span class="glyphicon glyphicon-off"></span> Sub Level <span class="caret"></span>
                                          </a>
                                          <div id="dropdown-lvl2" class="panel-collapse collapse">
                                             <div class="panel-body">
                                                <ul class="nav navbar-nav">
                                                   <li><a href="#">Link</a></li>
                                                   <li><a href="#">Link</a></li>
                                                   <li><a href="#">Link</a></li>
                                                </ul>
                                             </div>
                                          </div>
                                       </li>
                                    </ul>
                                 </div>
                              </div>
                           </li>
                           <li><a href="#"><span class="glyphicon glyphicon-signal"></span> Link</a></li> -->
                        </ul>
                     </div>
                     <!-- /.navbar-collapse -->
                  </nav>
               </div>
            </div>
         </div>
         <div class="col-md-10 content">
           <?php echo $this->breadcrumbs->show();?>
           <?php if(isset($output)){ echo $output; }else{ include $page_name . ".php";} ?>
         </div>
         <footer class="pull-left footer">
            <p class="col-md-12">
            <hr class="divider">
            <!-- Copyright &COPY; 2015 <a href="http://www.pingpong-labs.com">Gravitano</a> -->
            </p>
         </footer>
      </div>
      <script type="text/javascript">
         $(function () {
          	$('.navbar-toggle-sidebar').click(function () {
          		$('.navbar-nav').toggleClass('slide-in');
          		$('.side-body').toggleClass('body-slide-in');
          		$('#search').removeClass('in').addClass('collapse').slideUp(200);
          	});

          	$('#search-trigger').click(function () {
          		$('.navbar-nav').removeClass('slide-in');
          		$('.side-body').removeClass('body-slide-in');
          		$('.search-input').focus();
          	});
          });

          $(document).ready(function () {
            var index = Cookies.get('active');
            $('.main-menu').find('li').removeClass('active');
            $(".main-menu").find('li').eq(index).addClass('active');
            $('.main-menu').on('click', 'li', function (e) {
                // e.preventDefault();
                $('.main-menu').find('li').removeClass('active');
                $(this).addClass('active');
                Cookies.set('active', $('.main-menu li').index(this));
            });
          });


          <?php if(has_alert()):
            foreach(has_alert() as $type => $message): ?>
            <?php if($type === 'alert-danger'){ ?>
              swal({
                  title: 'Ada kesalahan!',
                  text: '<?php echo $message; ?>',
                  type: 'error',
                  confirmButtonText: 'Ok'
              });
            <?php }else{ ?>
              swal({
                  title: 'Berhasil',
                  text: '<?php echo $message; ?>',
                  type: 'success',
                  confirmButtonText: 'Ok'
              });
           <?php } ?>
            <?php endforeach;
          endif; ?>

          function base64url_encode( data){
            var str = base64.encode(data);
            str = str.replace('+','-');
            str = str.replace('==','');

            return str.replace('/','_');
          }


          $(".fancybox").fancybox({
            openEffect: "elastic",
            closeEffect: "elastic"
          });

      </script>
   </body>
</html>
