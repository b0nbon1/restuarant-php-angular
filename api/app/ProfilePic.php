<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

class ProfilePic extends Model
{
    protected $fillable = ['path', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getPath()
    {
        return asset("/storage" . $this->path);
    }

    public static function removeFile($location)
    {
        $filename = public_path() . '/storage' . $location;
        try {
            unlink($filename);
        } catch (\ErrorException $e) {
        }
    }

    public function delet()
    {
        self::removeFile($this->path);
        return parent::delete(); // TODO: Change the autogenerated stub
    }
}
