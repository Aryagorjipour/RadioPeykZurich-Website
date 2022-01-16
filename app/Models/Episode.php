<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Episode extends Model
{
    use HasFactory;
    use Sluggable;

    protected $fillable = ['title','slug','youtube_link','cloud_link','description','img_path','user_id'];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function sluggable(): array{
        return[
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
}
