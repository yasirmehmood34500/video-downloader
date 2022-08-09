<?php
if (isset($_POST['url'])) {

$curl = curl_init();
$url=$_POST['url'];
curl_setopt_array($curl, array(
  CURLOPT_URL => 'http://sub.societyfia.org/new',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS => array('url' => $url),
));

$response = curl_exec($curl);

curl_close($curl);
$response= json_decode($response);
$arr='<tr><th scope="col">Quantity</th><th scope="col">Size</th><th scope="col">Type</th><th scope="col">Sub Type</th><th class="text-center" scope="col">Status</th></tr>';
foreach($response->fmt_streams as $val){
    $arr .=' <tr class="'.$val->type.'_list"><td>'.$val->resolution.'</td><td>'.$val->_filesize.'</td><td>'.$val->type.'</td><td>'.$val->subtype.'</td><td><a href="'.$val->url.'" class="btn btn-success w-100" target="_blank">Download</a></td></tr>';
}
echo $arr;
}
