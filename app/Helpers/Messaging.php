<?php


use App\Models\User;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;



function sendWithSMSONLINEGH($receiver,string $massage,string $sender = "GABSAB")
{
    try {
        $url = env('SMS_GH_ONLINE_BASE_URL') . '/v5/sms/send';
        $headers = [
            'Content-Type:application/json',
            'Authorization:key ' . env('SMS_GH_ONLINE_KEY'),
        ];

        $payload = [
            "text" => $massage,
            "type" => 0,
            "sender" => $sender,
            "destinations" => [$receiver]
        ];


        if(env('APP_DEBUG')){
            return curlPostNoSSL($url, $payload, $headers);
        }

        return Http::withHeaders($headers)->post($url, $payload)->json();

    } catch (Throwable $throwable) {
        return $throwable->getMessage();
    }
}

function sendSlackMessage($message): bool|string
{
    $url = env('SLACK_ALERT_WEBHOOK');
    $data = array(
        "type" => "section",
        "text" => $message,
    );
    $payload = json_encode($data);

    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $result = curl_exec($ch);
    curl_close($ch);

    return $result;
}


function sendWhatsAppMessage($mobileNumber, $message)
{

}
