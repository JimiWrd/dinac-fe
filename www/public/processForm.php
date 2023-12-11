<?php
    if($_SERVER['REQUEST_METHOD'] === 'GET') {
        $location = isset($_GET['location']) ? $_GET['location'] : '';

        $apiUrl = "http://localhost:8080/api/dinac";

        $apiUrl .= "?location=" . urlencode($location);

        $curl = curl_init($apiUrl);

        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

        try {
            $response = curl_exec($curl);
            echo $response;
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        } finally {
            curl_close($curl);
        }
    }
?>
