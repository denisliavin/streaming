<?php

namespace App\Traits;

use App\Entity\Image;

trait HasImage
{
    public function getImagePath()
    {
        if ($this->image) {
            return $this->image->getImagePath();
        }

        return Image::defaultmage();
    }

    public function image()
    {
        return $this->belongsTo(Image::class);
    }

    public function addImage($request)
    {
        if (!$request->file('image')) {
            throw new \DomainException('No file');
        }

        $image = Image::make(['path' => $this->table]);
        $image->createObj($request);

        if ($image->id) {
            $this->update([
                'image_id' => $image->id
            ]);
        }
    }

    public function deleteImage()
    {
        if ($this->image) {
            $this->image->deleteObj();
        }

        $this->update([
            'image_id' => null
        ]);
    }
}
