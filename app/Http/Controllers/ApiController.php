<?php

namespace App\Http\Controllers;

use App\Services\FileService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ApiController extends Controller
{

    /**
     * @param Request $request
     * @return void
     */
    public function uploadImage(Request $request)
    {
        $funcNum = $request['CKEditorFuncNum'];
        $message = 'File is Uploaded';
        $path = FileService::storeImage($request->file('upload'), 'images');
        $url = Storage::url($path);
        echo "<script type='text/javascript'>window.parent.CKEDITOR.tools.callFunction($funcNum, '$url', '$message');</script>";
    }
}
