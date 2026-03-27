<?php
// $curl = curl_init();
// $token = "NPjwYN20tPqomqtIkBUhXsFa5JhunG8hkwEMVfayloYLCWhMZo1moTfxEEtbdfd6";
// $secret_key = "IwzFz1St";
// $random = true;
// $payload = [
//     "data" => [
//         [
//             'phone' => '6281807210104',
//             'message' => 'hello there',
//         ],
//         // [
//         //     'phone' => '6281218xxxxxx',
//         //     'message' => 'hello there',
//         // ]
//     ]
// ];
// curl_setopt($curl, CURLOPT_HTTPHEADER,
//     array(
//         "Authorization: $token.$secret_key",
//         "Content-Type: application/json"
//     )
// );
// curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
// curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
// curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($payload) );
// curl_setopt($curl, CURLOPT_URL,  "https://solo.wablas.com/api/v2/send-message");
// curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
// curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);

// $result = curl_exec($curl);
// curl_close($curl);
// echo "<pre>";
// print_r($result);
//echo "test";
?>

<!DOCTYPE html>
<html>
<body>

<h1>My first PHP page</h1>

<?php
echo "Hello World!";
?>

</body>
</html>