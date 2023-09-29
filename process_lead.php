<?php

$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$phone = $_POST['phone'];
$email = $_POST['email'];

$data = [
    'box_id' => 28,
    'offer_id' => 3,
    'countryCode' => 'RU',
    'language' => 'ru', 
    'password' => 'qwerty12',
    'ip' => $_SERVER['REMOTE_ADDR'],
    'landingUrl' => $_SERVER['HTTP_REFERER'],
    'firstName' => $firstName,
    'lastName' => $lastName,
    'phone' => $phone,
    'email' => $email
];

$apiUrl = 'https://convertedcurrencyexchange.000webhostapp.com/addlead.php';
$token = 'ba67df6a-a17c-476f-8e95-bcdb75ed3958';
$ch = curl_init($apiUrl);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    'Content-Type: application/json',
    'Authorization: Bearer'.$token
]);
$response = curl_exec($ch);

$data = json_decode($response, true);
$info = curl_getinfo($ch);
$statusCode = $info["http_code"];

if ($statusCode == 200) {
    header('Location: views/statuses.php');
} else {
    print_r([
        'status' => $statusCode,
        'message' => $data
    ]);
}

exit;
?>
