<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\UploadImageRequest;
use App\Core\Uploader\ImageUploader;
use Storage;

class UploadController extends Controller
{

    public function image(UploadImageRequest $request)
    {
        $file = (new ImageUploader)->make($request->file('image'));
        $data = [
            'url' => Storage::disk('public')->url('images/' . $file),
            'uploaded' => 1,
        ];
        return response()->json($data);
    }
}
