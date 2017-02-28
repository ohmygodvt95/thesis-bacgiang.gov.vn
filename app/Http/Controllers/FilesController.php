<?php

namespace App\Http\Controllers;

use App\File;
use Illuminate\Http\Request;

class FilesController extends Controller
{
    private $perPage = 10;

    public function show($id)
    {
        $file = File::find($id);
        if(empty($file)){
            return redirect('/');
        }
        else{
            $file->views++;
            $file->save();
            return view('files.show', [
                'pageTitle' => $file->title,
                'file' => $file,
                'relatedFiles' => $file->getCategory()->getFiles($this->perPage)
            ]);
        }
    }
}
