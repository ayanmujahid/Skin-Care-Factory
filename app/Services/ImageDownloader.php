<?php

namespace App\Services;

use App\Repositories\FileRepository;

class ImageDownloader
{
    protected $files;

    public function __construct(
        FileRepository $files
    )
    {
        $this->files = $files;
    }

    public function saveImages(
        $product,
        $images
    )
    {
        foreach($images as $index=>$image)
        {
            $this->files->uploadFromUrl(
                $image['src'],
                $product,
                $index == 0
                    ? 'main_image'
                    : 'gallery'
            );
        }
    }
}