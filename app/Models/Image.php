<?php

namespace App\Models;

use Conner\Likeable\Likeable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Image extends Model
{
    use HasFactory, Likeable;

    protected $fillable = ['file_name', 'url', 'token', 'mime_type', 'user_id'];


    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
