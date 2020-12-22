<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $fillable = [ 'title', 'content', 'is_published' ];
    public function getSomePostData() {
        return $this->title . ' - ovo je iz metode!';
    }

    public static function published() {
        return self::where('is_published', 1);
    }

    public static function unpublished() {
        return self::where('is_published', 0);
    }

    public function comments() {
        return $this->hasMany(Comment::class);
    }

    public function tags() {
        return $this->belongsToMany(Tag::class);
    }


    public function createComment($content) {
        return $this->comments()->create([
            'content' => $content
        ]);
    }

    public function author() {
        return $this->belongsTo(User::class, 'user_id');
      }

    //load nad modelom kada ucitavamo podatke
    //with nad query bilderom
}

