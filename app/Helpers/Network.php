<?php

function getUserIpAddress()
{
    $ipaddress = '';
    if (isset($_SERVER['HTTP_CLIENT_IP'])) {
        $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
    } else {
        if (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
        } else {
            if (isset($_SERVER['HTTP_X_FORWARDED'])) {
                $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
            } else {
                if (isset($_SERVER['HTTP_FORWARDED_FOR'])) {
                    $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
                } else {
                    if (isset($_SERVER['HTTP_FORWARDED'])) {
                        $ipaddress = $_SERVER['HTTP_FORWARDED'];
                    } else {
                        if (isset($_SERVER['REMOTE_ADDR'])) {
                            $ipaddress = $_SERVER['REMOTE_ADDR'];
                        } else {
                            $ipaddress = 'UNKNOWN';
                        }
                    }
                }
            }
        }
    }
    return $ipaddress;
}
function initiateHttpRequest($url, $method, $headers = [], $data = [])
{
    // Initialize curl
    $curl = curl_init();

    // Set curl options
    curl_setopt_array($curl, [
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_CUSTOMREQUEST => $method,
        CURLOPT_HTTPHEADER => $headers,
    ]);

    // If the request method is POST or PUT, add the data to the curl request
    if ($method == 'POST' || $method == 'PUT') {
        curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($data));
    }

    // Execute curl request and get response
    $response = curl_exec($curl);

    // Close curl
    curl_close($curl);

    // Return the response as an associative array
    return json_decode($response, true);
}
function curlPostNoSSL($url, $payload, $headers = null)
{
    $curl = curl_init();

    curl_setopt_array($curl, array(
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_SSL_VERIFYPEER => false,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => json_encode($payload),
        CURLOPT_HTTPHEADER => $headers,
        CURLOPT_FAILONERROR => true,
    ));

    $response = curl_exec($curl);

    if (curl_errno($curl)) {
        $error_msg = curl_error($curl);
    }
    //$info = curl_getinfo($curl);


    curl_close($curl);
    if (isset($error_msg)) {
        return $error_msg;
    }
    return json_decode($response, true);
}
function curlGetNoSSL($url, $headers = null)
{
    $curl = curl_init();

    curl_setopt_array($curl, array(
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_SSL_VERIFYPEER => false,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
        CURLOPT_HTTPHEADER => $headers,
    ));

    $response = curl_exec($curl);
    $info = curl_getinfo($curl);

    curl_close($curl);
    return json_decode($response, true);

}
function curlGetSSL($url, $headers = null)
{
    $curl = curl_init();

    curl_setopt_array($curl, array(
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
        CURLOPT_HTTPHEADER => $headers,
    ));

    $response = curl_exec($curl);
    $info = curl_getinfo($curl);

    curl_close($curl);
    return json_decode($response, true, 512, JSON_THROW_ON_ERROR);
}
function getLatLon($ip)
{
    if($ip === '127.0.0.1'){
        $ip = '44.48.0.2';
    }
    $url = 'http://ip-api.com/php/'.$ip;
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);

    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);

    curl_close($ch);

    if ($response !== false) {
        return unserialize($response);
    }

    return  false;
}
