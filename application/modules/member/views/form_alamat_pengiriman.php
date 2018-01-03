<?php 
    $uri = $this->uri->segment(2);

    if($uri === 'tambah-alamat-pengiriman'){
        $nama_lengkap = set_value('nama_lengkap');
        $telp = set_value('telp');
        $provinsi = null;
        $kodepos = set_value('kodepos');
        $alamat = set_value('alamat');
        $default = set_value('default');
    }else{        
        $nama_lengkap = $det['nama_lengkap'];
        $telp = $det['telp'];
        $provinsi = $det['provinsi'];
        $kota_kab = $det['kota_kab'];
        $kodepos = $det['kodepos'];
        $alamat = $det['alamat'];
        $default = $det['default'];


    }

?>
<style>
   input.large-field, select.large-field { width: 90%; }
   .checkout-content .left { float: left; width: 100%; }
</style>

<?php include "kolom_kanan.php";?>

<div id="content">
    <div class="breadcrumb"> <a href="<?php echo site_url('member')?>">Beranda</a> » <a href="<?php echo site_url('member/buku-alamat-pengiriman')?>">Buku alamat pengiriman</a> » <a href="#">Tambah Alamat</a> </div>
    <h1><span class="h1-top">Buku Alamat Pengiriman</span></h1>
    <div class="information_content">
      <form action="" method="post" id=form_alamat>
        <h2>Detail Alamat</h2>
        <div class="content" id="content_form">
          <table class="form">
            <tbody>
              <tr>
                <td><span class="required">*</span> Nama Penerima:</td>
                <td><input type="text" name="nama_lengkap" value="<?php echo $nama_lengkap?>" required=""></td>
              </tr>
              <tr>
                <td><span class="required">*</span> Telephon:</td>
                <td><input type="text" name="telp" value="<?php echo $telp;?>" required=""></td>
              </tr>
              <tr>
                <td><span class="required">*</span> Provinsi:</td>
                <td>
                    <select class="form-control" name="provinsi" id="provinsi" onchange="load_kota(this)">
                        <option value="" selected="" disabled="">Pilih Provinsi</option>
                        <?php $this->load->view('rajaongkir/getProvince',array('provinsi' => $provinsi)); ?>
                    </select>
                </td>
              </tr>
              <tr>
                <td><span class="required">*</span> Kota/Kabupaten:</td>
                <td  id="div_kab_kota">
                    <select class="form-control" name="kota_kab" id="kota_kab" required="">
                        <option value="" selected="" disabled="">Pilih Kota</option>
                    </select>
                </td>
              </tr>

              <tr>
                <td><span id="postcode-required" class="required" style="">*</span> Kode Pos:</td>
                <td><input type="text" name="kodepos" value="<?php echo $kodepos?>" required=""></td>
              </tr>
              <tr>
                <td><span class="required">*</span> Alamat:</td>
                <td><textarea name="alamat" required=""><?php echo $alamat?></textarea></td>
              </tr>
               <tr>
                <td>Alamat utama:</td>
                <td>
                    <input type="radio" name="default" <?php echo $default === 'Y' ? 'checked':''?> value="Y">Ya
                  <input type="radio" name="default" <?php echo $default === 'N' ? 'checked':''?> value="N">Tidak </td>
              </tr>

              
            </tbody>
          </table>
          <div class="buttons">
            <div class="left"><a href="<?php echo site_url('member/buku-alamat-pengiriman')?>" class="button">Kembali</a></div>
            <div class="right">
              <input type="submit" value="Simpan" class="button">
            </div>
          </div>
        </div>
        
      </form>
    </div>
  </div> 

<script>
    
    function load_kota(sel){
        var val = sel.value;
        $('#content_form').block({ message: '<h1>Processing</h1>', css: { border: '1px solid #a00' }  });
        $.post("<?php echo base_url(); ?>member/getCity/"+ val,function(obj){
             $('#kota_kab').html(obj);
        })
        .done(function( data ){
           $('#content_form').unblock();
        });
    }

    <?php  
    if($uri === 'ubah-alamat-pengiriman'){ ?>
        $('#content_form').block({ message: '<h1>Processing</h1>', css: { border: '1px solid #a00' }  });
        $.post("<?php echo base_url(); ?>member/getCity/"+ <?php echo $provinsi?>,function(obj){
             $('#kota_kab').html(obj);
        })
        .done(function( data ){
            $('#content_form').unblock();
            $('#kota_kab').val('<?php echo $kota_kab?>');
        });
    <?php } ?>
</script>