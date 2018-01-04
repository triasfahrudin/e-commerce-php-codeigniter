<?php

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "http://api.rajaongkir.com/starter/province",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 300,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
  CURLOPT_HTTPHEADER => array(
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

  // echo "<option>Pilih Kabupaten/kota</option>";  
  for ($i=0; $i < count($data['rajaongkir']['results']); $i++){
    
    if($data['rajaongkir']['results'][$i]['province_id'] == $provinsi){
      echo "<option selected value='".$data['rajaongkir']['results'][$i]['province_id']."'>".$data['rajaongkir']['results'][$i]['province']."</option>";
    }else{
      echo "<option value='".$data['rajaongkir']['results'][$i]['province_id']."'>".$data['rajaongkir']['results'][$i]['province']."</option>";  
    }    
  
  }

}

?>