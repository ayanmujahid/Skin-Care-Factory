<?php

namespace App\Repositories;

use App\Models\File;
use Illuminate\Support\Facades\Storage;

class FileRepository
{
    // Upload a single file
    public function upload($file, $fileable, $tableName = 'default')
    {
        $path = $file->store('uploads', 'public');
        return $fileable->files()->create([
            'url' => $path,
            'table_name' => $tableName
        ]);
    }

    // Upload multiple files
    public function uploadMultiple($files, $fileable, $tableName = 'default')
    {
        $uploaded = [];
        foreach ($files as $file) {
            $uploaded[] = $this->upload($file, $fileable, $tableName);
        }
        return $uploaded;
    }

    // Delete file
    public function delete(File $file)
    {
        Storage::disk('public')->delete($file->url);
        $file->delete();
    }

    // Delete all files for a fileable and table_name
    public function deleteAll($fileable, $tableName = null)
    {
        $query = $fileable->files();
        if ($tableName) {
            $query->where('table_name', $tableName);
        }

        foreach ($query->get() as $file) {
            $this->delete($file);
        }
    }
}
