<?php
    require 'httpControl.php';
    $httpControl = httpControl::getInstance();
    
    $raw = file_get_contents('php://input'); // POSTされた生のデータを受け取る
    $data = json_decode($raw); // json形式をphp変数に変換
    $result = $httpControl->Request($data);
    // echoすると返せる
    echo json_encode($result['message']); // json形式にして返す
?>