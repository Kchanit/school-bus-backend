<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class ApiNotificationController extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
    public function sendNotification(Request $request)
    {
        $SERVER_API_KEY = 'AAAAaRqmZt8:APA91bGi-jKCAdkxXJPK-6d9OW7X0jU4KPeL1RhrHfk8RtPrOb8QsF7sWKsmukil-mZN4_wUaY55M3Q7q-K6kwLFFhT9X8C1aMLBUmM9IFPL1rPk5ivswYEKwcsb1fd9K1I_tdIA4ufn';

        $data = [
            'body' => $request->body,
            'title' => $request->title,
            'click_action' => 'FLUTTER_NOTIFICATION_CLICK', // Modify as needed
            'sound' => 'default',
            'content_available' => 'true',
            'priority' => 'high',
        ];

        $fields = array(
            'to' => $request->fbtoken,
            'notification' => $data,
            // 'data' => $data,
        );

        $headers = [
            'Authorization: key=' . $SERVER_API_KEY,
            'Content-Type: application/json',
        ];

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));

        $response = curl_exec($ch);
        curl_close($ch);
        echo $response;
        // echo "fbtoken: $fbtoken, title: $title, body: $body";
    }
}