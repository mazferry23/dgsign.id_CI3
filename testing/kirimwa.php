<?php
define('WABLAS_KEY','aVmpEg13UreoJ4YOkZ9qOIGTXx4gRp00LEB7RKSXsdyI3KOlBOWHKqPPuMMGQ2GI');
define('WABLAS_URL','https://teras.wablas.com');
$curl = curl_init();
$data = [
    'phone' => '085788508482',
	'message'=>'heelooww'
    //'caption' => 'hi', // can be null
    //'image' => 'http://fe857e5092df.ngrok.io/dgsign/testing/imageholder.php',
];

curl_setopt($curl, CURLOPT_HTTPHEADER,
    array(
        "Authorization: ".WABLAS_KEY,
    )
);
curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($data));
//curl_setopt($curl, CURLOPT_URL, "https://teras.wablas.com/api/send-image");
curl_setopt($curl, CURLOPT_URL, "https://teras.wablas.com/api/send-message");
curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
$result = curl_exec($curl);
curl_close($curl);

echo "<pre>";
print_r($result);

?>