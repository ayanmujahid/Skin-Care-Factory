<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Repositories\FileRepository;

use Illuminate\Http\Request;

class BodyImgController extends Controller
{
    //
    protected $fileRepo;

    public function __construct(FileRepository $fileRepo)
    {
        $this->fileRepo = $fileRepo;
    }
}
