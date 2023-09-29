<?php
require_once 'config/Connection.php';
require_once 'config/Token.php';


if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $token = (new Token())->validate();

    $orderBy = isset($_GET['sortBy']) ? $_GET['sortBy'] : 'ASC';
    $startDate = isset($_GET['startDate']) ? $_GET['startDate'] : null;
    $endDate = isset($_GET['endDate']) ? $_GET['endDate'] : null;

    $query = 'SELECT * FROM `lead_statuses` WHERE 1';

    if ($startDate !== null && $endDate !== null) {
        $query .= ' AND `created_at` >= :start_date AND `created_at` <= :end_date';
    }

    $query .= ' ORDER BY `created_at` ' . $orderBy;

    $db = new Connection;
    $stmt = $db->prepare($query);
    
    if ($startDate !== null && $endDate !== null) {
        $stmt->bindParam(':start_date', $startDate);
        $stmt->bindParam(':end_date', $endDate);
    }

    $stmt->execute();

    $response = $stmt->fetchAll(PDO::FETCH_ASSOC);

    http_response_code(200);
    echo(json_encode([
        'status' => true,
        'message' => 'Request processed successfully',
        'data' => $response
    ]));
} else {
    http_response_code(405);
    echo json_encode([
        'status' => false,
        'error' => 'Method not allowed'
    ]);
}

