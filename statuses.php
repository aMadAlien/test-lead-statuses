<?php

$apiUrl = "https://convertedcurrencyexchange.000webhostapp.com/getstatuses.php";
$token = 'ba67df6a-a17c-476f-8e95-bcdb75ed3958';

$queries = array();

if (isset($_GET['date-asc'])) {
    $queries['sortBy'] = 'ASC';
} elseif (isset($_GET['date-desc'])) {
    $queries['sortBy'] = 'DESC';
}

if (isset($_GET['start_date'], $_GET['end_date'])) {
    $queries += [
        'startDate' => $_GET['start_date'],
        'endDate' => $_GET['end_date']
    ];
}

if (!empty($queries)) {
    $apiUrl .= '?' . http_build_query($queries);
}

$ch = curl_init($apiUrl);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, ['Authorization: Bearer'.$token]);
$response = curl_exec($ch);

$info = curl_getinfo($ch);
$statusCode = $info["http_code"];

curl_close($ch);

if ($statusCode == 200) {
    $data = json_decode($response, true);
} else {
    print_r([
        'status' => $statusCode,
        'message' => 'server error'
    ]);
}