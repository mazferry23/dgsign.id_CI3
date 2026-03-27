<?php
$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, 'https://portal.dgsign.id/invitations/80749136/nada-yuda'.(isset($_GET['uuid']) ? '/'.$_GET['uuid'] : '') ); 
curl_setopt($curl, CURLOPT_VERBOSE,true);
curl_setopt($curl, CURLOPT_RETURNTRANSFER,true);
curl_setopt($curl, CURLOPT_FOLLOWLOCATION,true);
curl_setopt($curl, CURLOPT_ENCODING,"");
curl_setopt($curl, CURLOPT_AUTOREFERER,true);
curl_setopt($curl, CURLOPT_MAXREDIRS,5);
curl_setopt($curl, CURLOPT_TIMEOUT,30);
curl_setopt($curl, CURLOPT_HTTP_VERSION,CURL_HTTP_VERSION_1_1);
$response 			= curl_exec($curl);
$httpCode 			= curl_getinfo($curl, CURLINFO_HTTP_CODE);
$err      			= curl_error($curl);
echo $response;