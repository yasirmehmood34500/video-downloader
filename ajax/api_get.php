<?php
if (isset($_POST['url'])) {
    $url  = $_POST['url'];
    $curl = curl_init();
    curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://py-testing-yes.herokuapp.com/check',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => array(
            'url' => $url
        )
    ));
    $response = curl_exec($curl);
    curl_close($curl);
    $response        = json_decode($response);
    $title_thumbnail = ' <img src="' . $response->thumbnail . '" alt="image"><br><p class="description mt-2" id="video_title" style="padding:3px 10px;margin:0px 30px">' . $response->title . '</p>';
    $response2       = json_decode($response->array);
    $audio_video     = array();
    $audio_video     = '<tr><th scope="col">Quantity</th><th scope="col">Size</th><th scope="col">Type</th><th scope="col">Sub Type</th><th class="text-center" scope="col">Status</th></tr>';
    $i               = 1;
    foreach ($response2->fmt_streams as $val) {
        $audio_video .= ' <tr class="' . $val->type . '_list"><td>' . $val->resolution . '</td><td>' . $val->_filesize . '</td><td>' . $val->type . '</td><td>' . $val->subtype . '</td><td class="download_td"><span data-itag="' . $val->itag . '" title="' . $val->itag . '" class="btn btn-success w-100 download_video" id="' . $i++ . '" >Download</span></td></tr>';
    }
    $audio_video;
?>
<div class="container">
	<div class="row order border-dark">
		<div class="col-lg-10 col-md-12 col-xs-12 col-sm-12 mx-auto b">
			<div class="row">
				<div class="col-lg-6 col-md-6 col-sm-12 text-center mt-3">
					<div class="image">
						<?php echo $title_thumbnail; ?>
					</div>
				</div>
				<div class="col-lg-6 col-md-6 col-xs-12 col-sm-12 mt-3">
					<div class="text">
						<table class="table border border-dark  rounded-1">
							<thead class=py-2>
								<tr>
									<th scope="col">
										<button class="btn btn-primary w-100 video_list_btn">Video</button>
									</th>
									<th></th>
									<th scope="col">
										<button class="btn btn-primary w-100 audio_list_btn">Audio</button>
									</th>
								</tr>
							</thead>
							<tbody id="data_res">
								<?php echo $audio_video; ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php } 
if (isset($_POST['itag'])) {
    $itag = $_POST['itag'];
    $url  = $_POST['g_url'];
    $curl = curl_init();
    curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://py-testing-yes.herokuapp.com/download',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => array(
            'url' => $url,
            'itag' => $itag
        )
    ));
    $response = curl_exec($curl);
    curl_close($curl);
    echo $response;
}
?>