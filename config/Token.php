<?php

class Token {
    private $validTokens;

    public function __construct() {
        $this->validTokens = ['ba67df6a-a17c-476f-8e95-bcdb75ed3958'];
    }

    public function validate() {
        $headers = getallheaders();
        $token = isset($headers['Authorization']) ? trim(str_replace('Bearer', '', $headers['Authorization'])) : '';

        if (!in_array($token, $this->validTokens)) {
            http_response_code(401);
            echo json_encode(['error' => 'Unauthorized']);
            exit;
        }
    }
}