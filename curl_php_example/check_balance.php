<?php

// Step 1: set your API_KEY from https://yourweburl.com/sms-api/info

$api_key = 'qwertyuiop1234567890=';


// <sms/api> is mandatory.

$url = 'https://sms.hupesi.com/sms/api';

// Create SMS Body for request
$sms_body = array(
    'action' => 'check-balance',
    'api_key' => $api_key
);

$send_data = http_build_query($sms_body);

$gateway_url = $url . "?" . $send_data;

try {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $gateway_url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_HTTPGET, 1);
    $output = curl_exec($ch);

    if (curl_errno($ch)) {
        $output = curl_error($ch);
    }
    curl_close($ch);

    var_dump($output);

}catch (Exception $exception){
    echo $exception->getMessage();
}
