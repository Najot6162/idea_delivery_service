<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class FileController extends Controller
{
    public function uploadAppFile(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'version' => 'required',
            'code' => 'required',
            'app' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }
        $path = $request->file('app')->store('public/app');

        $data = [
            "version" => $request->version,
            "code" => $request->code,
            "file_path" => $path
        ];
        Storage::disk('public')->put('app.json', json_encode($data));

        return "saved";
    }
}
