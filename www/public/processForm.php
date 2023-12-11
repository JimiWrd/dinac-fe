<?php

use public\model\dinacResponseModel;
require __DIR__ . '/model/dinacResponseModel.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET' & $_GET['location'] != '') {
    $location = $_GET['location'];

    $apiUrl = "http://localhost:8080/api/dinac";

    $apiUrl .= "?location=" . urlencode($location);

    $curl = curl_init($apiUrl);

    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

    try {
        $response = curl_exec($curl);

        $response = json_decode($response, true);

        $response = new dinacResponseModel($response);

        $response = json_encode($response);

        echo $response;
    } catch (Exception $e) {
        error_log($e->getMessage());
        echo json_encode('Error');
    } finally {
        curl_close($curl);
    }
}
else {
    $response = [
        'isCoatNeeded' => null,
        'description' => 'Please provide a location.'
    ];
    $response = new dinacResponseModel($response);
    echo json_encode($response);
}
?>
