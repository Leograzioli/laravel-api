<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Project extends Model 
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'slug', 'cover_image', 'type_id'];

    public static function toStr ($data) {
        return Str::slug($data);
    }

    public function type () {
        return $this->belongsTo(Type::class);
    }

    public function technologies () {
        return $this->belongsToMany(technology::class);
    }
}
