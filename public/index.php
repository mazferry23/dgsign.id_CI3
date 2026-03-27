<?php
$curl = curl_init();
$token = "NPjwYN20tPqomqtIkBUhXsFa5JhunG8hkwEMVfayloYLCWhMZo1moTfxEEtbdfd6";
$secret_key = "F5Bwhiz1";
$random = true;
$payload = [
    "data" => [
        [
            'phone' => '6281807210104',
            'message' => 'hello there dgsign.id',
        ],
        [
            'phone' => '6281807210104',
            'message' => 'hello there dgsign.id',
        ]
    ]
];
curl_setopt($curl, CURLOPT_HTTPHEADER,
    array(
        "Authorization: $token.$secret_key",
        "Content-Type: application/json"
    )
);
curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($payload) );
curl_setopt($curl, CURLOPT_URL,  "https://pati.wablas.com/api/v2/send-message");
curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);

$result = curl_exec($curl);
curl_close($curl);
echo "<pre>";
print_r($result);
// //echo "halo";


?>

<?php
// $curl = curl_init();
// $token = "NPjwYN20tPqomqtIkBUhXsFa5JhunG8hkwEMVfayloYLCWhMZo1moTfxEEtbdfd6";
// $secret_key = "IwzFz1St";
// $data = [
// 'phone' => '6281807210104',
// 'message' => 'hello there',
// ];
// curl_setopt($curl, CURLOPT_HTTPHEADER,
//     array(
//         "Authorization: $token.$secret_key",
//     )
// );
// curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
// curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
// curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($data));
// curl_setopt($curl, CURLOPT_URL,  "https://solo.wablas.com/api/send-message");
// curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
// curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
// $result = curl_exec($curl);
// curl_close($curl);
// echo "<pre>";
// print_r($result);

?>

<?php
// $curl = curl_init();
// $token = "NPjwYN20tPqomqtIkBUhXsFa5JhunG8hkwEMVfayloYLCWhMZo1moTfxEEtbdfd6";
// $secret_key = "IwzFz1St";
// $data = [
//     'phone' => '6281807210104',
//     'message' => 'hello there',
// ];

// curl_setopt($curl, CURLOPT_HTTPHEADER, [
//     "Authorization: $token $secret_key", // Adjusted format
//     "Content-Type: application/x-www-form-urlencoded" // Specify content type
// ]);
// curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
// curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
// curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($data));
// curl_setopt($curl, CURLOPT_URL, "https://solo.wablas.com/api/send-message");
// curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
// curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);

// $result = curl_exec($curl);

// // Check for cURL errors
// if ($result === false) {
//     echo 'Curl error: ' . curl_error($curl);
// } else {
//     // Decode the JSON response
//     $response = json_decode($result, true);
//     echo "<pre>";
//     print_r($response); // Print the decoded response
// }

// curl_close($curl);
?>

<?php

//     $ch = curl_init();
//     curl_setopt($ch, CURLOPT_URL,"https://solo.wablas.com/api/send-message");
//     curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
//     curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
//     $curlresult=curl_exec ($ch);
//      curl_close ($ch);



//     if ($curlresult == "OK") {
//         $result = "The curl action was succeeded! (OUTPUT of curl is: ".$curlresult.")";
//     } else {
//         $result = "The curl action has FAILED! (OUTPUT of curl is: ".$curlresult.")";
//     }

// //var_dump($curlresult);
// echo $result;

?>