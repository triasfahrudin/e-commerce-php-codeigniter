<?php  
$curl = curl_init();


curl_setopt_array($curl, array(
  CURLOPT_URL => "http://api.rajaongkir.com/starter/cost",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => "origin=$origin&destination=$destination&weight=$berat&courier=$courier",
  CURLOPT_HTTPHEADER => array(
    "content-type: application/x-www-form-urlencoded",
    "key: 2b79c65f11f4efacdcfe9079add7fc73"
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
  //echo $response;
  $data = json_decode($response, true);
  //echo json_encode($k['rajaongkir']['results']);

  /*
  for ($k=0; $k < count($data['rajaongkir']['results']); $k++){
  

    echo "<li='".$data['rajaongkir']['results'][$k]['code']."'>".$data['rajaongkir']['results'][$k]['service']."</li>";
  	//echo $data['rajaongkir']['results'][$k]['code'];
  }
  */
  //echo $data['rajaongkir']['results']['costs']['service'];
}
?>

<?php echo $data['rajaongkir']['origin_details']['city_name'];?> ke <?php echo $data['rajaongkir']['destination_details']['city_name'];?> @<?php echo $berat;?>gram Kurir : <?php echo strtoupper($courier); ?>

<?php
 for ($k=0; $k < count($data['rajaongkir']['results']); $k++) {
?>
	 <div title="<?php echo strtoupper($data['rajaongkir']['results'][$k]['name']);?>" style="padding:10px" class="cart-info">
		 <table>
			 <thead>
				 <tr>
					 <td>No.</td>
					 <td>Jenis Layanan</td>
					 <td>Perkiraan Sampai</td>
					 <td>Tarif</td>
					 <td>Pilih</td>
				 </tr>
			 </thead>
			 <tbody>
			 <?php for ($l=0; $l < count($data['rajaongkir']['results'][$k]['costs']); $l++) { 
			 	$etd = $data['rajaongkir']['results'][$k]['costs'][$l]['cost'][0]['etd'];
			 	$tarif = $data['rajaongkir']['results'][$k]['costs'][$l]['cost'][0]['value'];
			 	$service = $data['rajaongkir']['results'][$k]['costs'][$l]['service'];
			 ?>
			 <tr>
				 <td><?php echo $l+1;?></td>
				 <td>
					 <div style="font:bold 16px Arial"><?php echo $service; ?></div>
					 <div style="font:normal 11px Arial"><?php echo $data['rajaongkir']['results'][$k]['costs'][$l]['description'];?></div>
				 </td>
				 <td>
				 	<div style="font:bold 16px Arial">
				 		<?php echo $etd ;?>
				 	</div>	
				 </td>
				 <td>
				 	<div style="font:bold 16px Arial">
				 		<?php echo number_format($tarif);?>
				 	</div>	
				 </td>
				 <td>
				 	<!-- <div class="buttons">  -->
                     <!-- <input type="checkbox" name="agree" value="1" required=""> -->
                     <form method="POST" action="">
                     	<input type="hidden" name="kurir" value="<?php echo $courier;?>">
                     	<input type="hidden" name="layanan" value="<?php echo $service;?>">
                     	<input type="hidden" name="tarif" value="<?php echo $tarif;?>">
                     	<input type="hidden" name="etd" value="<?php echo $etd;?>">
                     	<input type="submit" value="Pilih" id="button-register" class="button">	
                     </form>
                     
                  <!-- </div> -->
				 </td>
			 </tr>
			 <?php } ?>	
			 </tbody>
			 
		 </table>
	 </div>
 <?php
 }
 ?>