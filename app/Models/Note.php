<?php

namespace App\Models;

use App\Models\Like;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Note extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'note_content'
    ];

    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    public function isLiked()
    {
         // Maybe later
    }
}
