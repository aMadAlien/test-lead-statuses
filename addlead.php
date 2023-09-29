<?php
require_once 'config/Connection.php';
require_once 'config/Token.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);
    
    $token = (new Token())->validate();

    if ($data === null) {
        http_response_code(400);
        echo json_encode([
            'status' => false,
            'error' => 'Invalid JSON data'
            ]);
    } else {
        $db = new Connection;

        try {
            $query = 'INSERT INTO `lead_statuses` (`firstName`, `lastName`, `phone`, `email`, `password`, `status`, `ip`, `landingUrl`, `countryCode`, `offer_id`, `box_id`) VALUES (:firstName, :lastName, :phone, :email, :password, "registered", :ip, :landingUrl, :countryCode, :offer_id, :box_id)';

            $stmt = $db->prepare($query);
            $stmt->bindParam(':firstName', $data['firstName']);
            $stmt->bindParam(':lastName', $data['lastName']);
            $stmt->bindParam(':phone', $data['phone']);
            $stmt->bindParam(':email', $data['email']);
            $stmt->bindParam(':password', $data['password']);
            $stmt->bindParam(':ip', $data['ip']);
            $stmt->bindParam(':landingUrl', $data['landingUrl']);
            $stmt->bindParam(':countryCode', $data['countryCode']);
            $stmt->bindParam(':offer_id', $data['offer_id']);
            $stmt->bindParam(':box_id', $data['box_id']);
            $stmt->execute();
            
            $response = $stmt->fetchAll(PDO::FETCH_ASSOC);
            
            http_response_code(200);
            echo(json_encode([
                'status' => true,
                'message' => 'Request processed successfully'
            ]));
        } catch(Exception $e){
            print_r($e);
        }
    }
} else {
    http_response_code(405);
    echo json_encode([
        'status' => false,
        'error' => 'Method not allowed'
    ]);
}


?>