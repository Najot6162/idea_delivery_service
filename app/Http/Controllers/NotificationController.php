<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class NotificationController extends Controller
{
    public function sendNotification(Request $request)
    {
        $firebaseToken = User::whereNotNull('fcm_token')->pluck('fcm_token')->where('id','user_id')->all();

        $SERVER_API_KEY = 'AAAAgkmO-9I:APA91bF0-yitF0ni_yVGEma5eaP_K_1-BlDcpbkT6h874w4EXzY0X8PtS6Bm0Oo9-DIBQm8XUxYzis1UGq9PRqZCXPf4MlR0wQDnBiLIVd3TU_2jdGu4qL_U0K6E7bMFDHJWKjpD-WQ6';

        $data = [
            "registration_ids" => $firebaseToken,
            "notification" => [
                "title" => 'Поступление новый заказ!',
                "body" => 'Доставка до бектемир поста Желателно где то к 14:00',
            ]
        ];
        $dataString = json_encode($data);

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
        curl_setopt($ch, CURLOPT_POSTFIELDS, $dataString);

        $response = curl_exec($ch);

        return back()->with('success', 'Notification send successfully.');
    }

    public function createFcmToken(Request $request,$id){
        $validator = Validator::make(
            request()->all(),
            [
                'fcm_token' => 'required',
            ]
        );

        if ($validator->fails()) {
            return $validator->errors();
        }
        $user = User::findOrFail($id);

        $user->fcm_token = $request->fcm_token;
        if ($user->save()){
            echo "saved fcm token.";
        }
    }
}
