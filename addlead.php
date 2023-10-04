<?php

$apiUrl = 'https://crm.belmar.pro/api/v1/addlead';
$token = 'ba67df6a-a17c-476f-8e95-bcdb75ed3958';

$firstName = $_POST['firstName'] ?: '';
$lastName = $_POST['lastName'] ?: '';
$phone = $_POST['phone'] ?: '';
$email = $_POST['email'] ?: '';

$ip = $_SERVER['REMOTE_ADDR'];
$landingUrl = $_SERVER['HTTP_REFERER'];

$boxId = 28;
$offerId = 3;
$countryCode = 'RU';
$password = 'qwerty12';
$language = 'ru';

$data = array(
    'firstName' => $firstName,
    'lastName' => $lastName,
    'phone' => $phone,
    'email' => $email,
    'password' => $password,
    'countryCode' => $countryCode,
    'language' => $language,
    'box_id' => $boxId,
    'offer_id' => $offerId,
    'landingUrl' => $landingUrl,
    'ip' => $ip,
    'clickId' => '',
    'quizAnswers' => '',
    'custom1' => '',
    'custom2' => '',
    'custom3' => ''
);

$body = json_encode($data);

$curl = curl_init();
curl_setopt_array($curl, array(
    CURLOPT_URL => $apiUrl,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'POST',
    CURLOPT_POSTFIELDS => $body,
    CURLOPT_HTTPHEADER => array(
        'Content-Type: application/json',
        'token: ' . $token
    )
));

$response = curl_exec($curl);
$httpStatus = curl_getinfo($curl, CURLINFO_HTTP_CODE);

if ($httpStatus === 200) {
    $dataJson = json_decode($response, true);

    if (filter_var($dataJson['status'], FILTER_VALIDATE_BOOLEAN)) {
        header('Location: views/statuses.php');
        exit;
    } else {
        print_r($dataJson);
    }
} else {
    echo 'HTTP Error: ' . $httpStatus;
}


curl_close($curl);

?>