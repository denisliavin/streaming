<?php

namespace App\Entity;

use App\Helpers\SystemHelper;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

/**
* @property $path
* @property $date
* @property $folder
* @property $src
 */
class Image extends Model
{
    protected $table = 'images';
    protected $guarded = [];

    public function getImagePath()
    {
        $path = "storage/images/{$this->path}/{$this->date}/{$this->folder}/" . $this->src;

        if (!SystemHelper::isExistFile($path)) {
            return self::defaultmage();
        }

        return asset($path);
    }

    public static function defaultmage()
    {
        return asset("images/noimage.png");
    }

    public function deleteObj()
    {
        Storage::disk('public')->delete("images/{$this->path}/{$this->date}/{$this->folder}/{$this->src}");
        Storage::disk('public')->deleteDirectory("images/{$this->path}/{$this->date}/{$this->folder}");

        $this->delete();
    }

    public function createObj($request)
    {
        $file = $request->file('image');
        if (!$file) {
            return null;
        }

        $this->src = time() . '.' . $file->getClientOriginalExtension();
        $this->setDateAndFolder();
        $file->storeAs("public/images/{$this->path}/{$this->date}/{$this->folder}", $this->src);
        $this->saveOrFail();
    }

    public function setDateAndFolder()
    {
        $date = Carbon::now('UTC');
        $this->date = $date->format('ym');
        $this->folder = SystemHelper::getRandomNumbersAndLetters(20);
        Storage::disk('public')->makeDirectory("/images/{$this->path}/{$this->date}/{$this->folder}");
    }
}
