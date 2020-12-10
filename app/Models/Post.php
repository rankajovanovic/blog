<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    public function getSomePostData() {
        return $this->title . ' - ovo je iz metode!';
    }

    public static function published() {
        return self::where('is_published', 1);
    }

    public static function unpublished() {
        return self::where('is_published', 0);
    }
}
