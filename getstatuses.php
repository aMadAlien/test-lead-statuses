<?php

$dateFormat = 'Y-m-d H:i:s';
$limit = 100;
$page = 0;

$apiUrl = 'https://crm.belmar.pro/api/v1/getstatuses';
$token = 'ba67df6a-a17c-476f-8e95-bcdb75ed3958';

$dateFrom = isset($_GET['date_from']) ? date($dateFormat, strtotime($_GET['date_from'])) : date($dateFormat, strtotime("-1 month"));
$dateTo = isset($_GET['date_to']) ? date($dateFormat, strtotime($_GET['date_to'])) : date($dateFormat, time());

$body = array(
    'date_from' => $dateFrom,
    'date_to' => $dateTo,
    'page' => $page,
    'limit' => $limit
);

$curl = curl_init();
curl_setopt_array($curl, array(
    CURLOPT_URL => $apiUrl,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'GET',
    CURLOPT_POSTFIELDS => $body,
    CURLOPT_HTTPHEADER => array(
        'Content-Type: application/json',
        'token: '.$token
    ),
));


$response = curl_exec($curl);
$httpStatus = curl_getinfo($curl, CURLINFO_HTTP_CODE);

curl_close($curl);

if ($httpStatus === 200) {
    $responseJson = json_decode($response, true);

    if ($responseJson['status']) {
        $data = $responseJson['data'];
    } else {
        print_r($responseJson);
    }
} else {
    echo 'HTTP Error: ' . $httpStatus;
}

?>