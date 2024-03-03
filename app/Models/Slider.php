<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    use HasFactory;

    protected $fillable = [
        'title_en',
        'title_ar',
        'content_en',
        'content_ar',
        'image',
        'icon',
    ];

    public function getTitleAttribute()
    {
        return $this['title_' . app()->getLocale()];
    }

    public function getContentAttribute()
    {
        return $this['content_' . app()->getLocale()];
    }

}
