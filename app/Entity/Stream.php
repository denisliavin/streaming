<?php

namespace App\Entity;

use App\Traits\HasImage;
use Illuminate\Database\Eloquent\Model;

/**
* @property $name
* @property $description
* @property $i_stream
* @property $image_id
* @property $user_id
 */
class Stream extends Model
{
    protected $table = 'streams';
    protected $guarded = [];

    use HasImage;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public static function createObj($data, $streamId, $user_id)
    {
        $obj = self::create([
           'name' => $data->name,
           'description' => $data->description,
           'i_stream' => $streamId,
           'user_id' => $user_id
        ]);

        $obj->addImage($data);

        return $obj;
    }

    public function deleteObj()
    {
        if ($this->image) {
            $this->image->deleteImage();
        }

        $this->delete();
    }
}
