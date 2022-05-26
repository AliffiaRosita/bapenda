<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
class TextEditorController extends Controller
{
    public function fileUpload(Request $request)
    {
        if($request->file('image')){
            $image= $request->file('image');
            $files= $image->move('ckeditor-files',$image->hashName());
            $url= asset($files);
        }
        return response()->json([
            'url'=>$url,
            'fileName'=>$files->getPathname()
        ]);
    }
    public function fileDelete(Request $request)
    {

        File::delete(public_path($request['filename']));
        return response()->json([
            'message'=> "berhasil"
        ]);
    }
}
