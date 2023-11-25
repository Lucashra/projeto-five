<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;
use App\Models\FileModel;
use App\Services\StorageService;
use App\Http\Requests\FileRequest;

class fileController extends Controller
{

    protected readonly FileModel $file;
    protected readonly StorageService $storage_service;
    protected readonly string $file_path;

    public function __construct(FileModel $file, StorageService $storage_service)
    {
        $this->file = $file;
        $this->storage_service = $storage_service;
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

    public function store(FileRequest $request)
    {
        try {
            $this->storage_service->saveAwsFile($this->file_path, $request->file);
            $this->file->create([
                'file'      =>  $request->file->getClientOriginalName(),
                'description'   =>  $request->description
            ]);
            return redirect()->route('file-upload')->with('success', 'Arquivo enviado com sucesso!');;
        } catch (\Exception $e) {
           return  $e->getMessage();    
        }
    }
}
