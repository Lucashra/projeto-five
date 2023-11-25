<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FileModel;

class fileController extends Controller
{

    protected readonly FileModel $file;
    protected readonly string $file_path;

    public function __construct(FileModel $file)
    {
        $this->file = $file;
        $this->file_path = "files/";
    }


    public function index()
    {
        return view('file-upload', compact('file'));
    }

    public function create()
    {
        // Exibe o formulário de criação de post
        return view('file-upload');
    }

    public function store(Request $request)
    {
        $this->file->create([
            'file'      =>  $request->file,
            'description'   =>  $request->description
        ]);

        return redirect()->route('file-upload');
    }
}
