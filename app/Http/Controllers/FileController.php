<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class FileController extends Controller
{
    public function uploadAppFile(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'latest_version' => 'required',
            'code_version' => 'required',
            'app' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }
        $path = $request->file('app')->store('public/app');

        $data = [
            "version" => $request->latest_version,
            "code" => $request->code_version,
            "file_path" => $path,
            "url"=>'http://devserv.gx.uz/api/download-app'
        ];
        Storage::disk('public')->put('app.json', json_encode($data));

        return "saved";
    }

    public function getDownload()
    {
        $app_json = json_decode(file_get_contents(storage_path() . "/app/public/app.json"), true);
        $file= storage_path(). "/app/".$app_json['file_path'];

        $headers = array(
            'Content-Type: application/pdf',
        );

        return Response::download($file, 'idea-delivery.app', $headers);
    }

    public function readAppJsonFile()
    {
        $app_json = json_decode(file_get_contents(storage_path() . "/app/public/app.json"), true);

        echo "<pre>";
        print_r($app_json);
    }
}
