<?php

namespace App\Repositories;

use App\Models\File;
use Illuminate\Support\Facades\Storage;

use Illuminate\Http\File as HttpFile;
use Illuminate\Support\Facades\Http;


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

    public function uploadFromPath(string $path, $fileable, $tableName = 'default')
{
    $baseDir = 'assets/images/catalog/';

    $fullPath = public_path($baseDir . $path);

    logger("Trying image: " . $fullPath);

    if (!file_exists($fullPath)) {
        logger("❌ NOT FOUND: " . $fullPath);
        return null;
    }

    $storedPath = Storage::disk('public')->putFile(
        'uploads',
        new \Illuminate\Http\File($fullPath)
    );

    logger("✅ STORED: " . $storedPath);

    $file = $fileable->files()->create([
        'url'        => $storedPath,
        'table_name' => $tableName
    ]);

    logger("📦 DB SAVED: " . json_encode($file));

    return $file;
}

public function uploadFromUrl(string $url, $fileable, $tableName = 'default')
{
    try {
        $response = Http::timeout(15)->get($url);

        if (!$response->successful()) {
            logger("❌ Failed to fetch image: $url");
            return null;
        }

        $filename = basename(parse_url($url, PHP_URL_PATH));

        $storedPath = 'uploads/' . uniqid() . '_' . $filename;

        Storage::disk('public')->put($storedPath, $response->body());

        logger("✅ STORED: " . $storedPath);

        return $fileable->files()->create([
            'url'        => $storedPath,
            'table_name' => $tableName
        ]);

    } catch (\Exception $e) {
        logger("❌ ERROR uploading $url: " . $e->getMessage());
        return null;
    }
}



}
